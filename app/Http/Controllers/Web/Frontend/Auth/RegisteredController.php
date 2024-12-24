<?php

namespace App\Http\Controllers\Web\Frontend\Auth;

use App\Models\BusinessAddress;
use App\Models\OperatingHour;
use App\Models\Verification;
use App\Notifications\SendOtpNotification;
use Exception;
use App\Models\User;
use App\Mail\OtpMail;
use App\Helpers\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Password;

class RegisteredController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
        ]);
    
        $otp = rand(100000, 999999); // Generate random OTP
        $expiresAt = now()->addMinutes(10); // OTP expires in 10 minutes
    
        try {
            $user = User::firstOrNew(['email' => $request->email]);
            $user->password = Hash::make($request->password);
            $user->otp = $otp;
            $user->otp_expires_at = $expiresAt;
            $user->save();
    
            // Send OTP via notification with the requested email
            Notification::send($user, new SendOtpNotification($otp));
    
            return redirect()->route('signUpWithCode')->with('t-success', 'OTP sent successfully.');
        } catch (Exception $e) {
            \Log::error('Error in sendOtp: ' . $e->getMessage());
            return redirect()->route('signUp')->with('t-error', 'An error occurred while sending the OTP.');
        }
    }

    /**
     * Verify the OTP sent to the user's email.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', Password::defaults()],
            'verifyCode' => ['required', 'numeric', 'digits:6'],
        ]);

        try {
            $user = User::where('email', $request->email)
                ->where('otp', $request->verifyCode)
                ->where('otp_expires_at', '>=', now())
                ->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('t-error', 'Invalid email, password, or OTP has expired.');
            }

            $user->update([
                'otp' => 'email_verified',
                'otp_expires_at' => null,
            ]);

            session(['verified_email' => $request->email]);

            return redirect()->route('selectType')->with('t-success', 'OTP verified successfully.');
        } catch (Exception $e) {
            \Log::error('Error in verifyOtp: ' . $e->getMessage());
            return redirect()->route('signUpWithCode')->with('t-error', 'An error occurred while verifying the OTP.');
        }
    }

    /**
     * Select user type during registration.
     */
    public function selectType(Request $request)
    {
        // Validate the selected user type
        $request->validate([
            'options' => 'required|in:individual,professional,business',
        ]);

        try {
            // Retrieve the verified email from the session
            $email = session('verified_email');

            // Check if the session email exists
            if (!$email) {
                return redirect()->back()->with('t-error', 'Session expired. Please verify your OTP again.');
            }

            // Find the user by email without logging them in
            $user = User::where('email', $email)->firstOrFail();

            // Update the user type
            $user->user_type = $request->options;
            $user->save();

            // Redirect to the profile information page with success message
            return redirect()->route('profileInformation')->with('t-success', 'User type selected successfully.');
        } catch (Exception $e) {
            \Log::error('Error in selectType: ' . $e->getMessage());
            // Redirect to OTP verification if an error occurs
            return redirect()->route('signUpWithCode')->with('t-error', 'An error occurred while selecting the user type.');
        }
    }

    /**
     * Update user profile information.
     */
    public function profileInformation(Request $request)
    {
        $request->validate([
            'upload-image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'numeric', 'digits:11'],
            'streetAddress' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
        ]);

        try {
            // Retrieve the email from the session
            $email = session('verified_email');

            if (!$email) {
                return redirect()->back()->with('t-error', 'Session expired. Please verify your OTP again.');
            }

            // Retrieve the user based on the session email
            $user = User::where('email', $email)->firstOrFail();

            // Handle the profile image upload
            if ($request->hasFile('upload-image')) {
                $image = Helper::fileUpload(
                    $request->file('upload-image'),
                    'profile',
                    $request->file('upload-image')->getClientOriginalName()
                );
                $user->avatar = $image;
            }

            // Update the user profile information
            $user->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'phone' => $request->phoneNumber,
                'address' => $request->streetAddress,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zip,
            ]);

            // Redirect based on the user type
            if ($user->user_type !== 'individual') {
                return redirect()->route('businessInformation')->with('t-success', 'Profile information updated successfully.');
            }

            return redirect()->route('userHomePage')->with('t-success', 'Profile information updated successfully.');
        } catch (Exception $e) {
            \Log::error('Error in profileInformation: ' . $e->getMessage());
            return redirect()->back()->with('t-error', 'An error occurred while updating profile information.');
        }
    }

    /**
     * Update business information for non-individual users.
     */
    public function businessInformation(Request $request)
    {



        $request->validate([
            'businessName' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'businessUrl' => ['required', 'string', 'max:255'],
            'businessNameStreetAddress' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'licenseNumber' => ['required', 'string', 'max:255'],
            'businessPhoto' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);



        try {
            $email = session('verified_email');
            $user = User::where('email', $email)->first();

            if ($request->hasFile('businessPhoto')) {
                $image = Helper::fileUpload($request->file('businessPhoto'), 'profile', $request->file('businessPhoto')->getClientOriginalName());
            }

            $user->businessAddress()->updateOrCreate([
                'business_name' => $request->businessName,
                'business_speciality' => $request->category,
                'business_website' => $request->businessUrl,
                'business_address' => $request->businessNameStreetAddress,
                'business_city' => $request->city,
                'business_state' => $request->state,
                'business_zip' => $request->zip,
                'business_license' => $request->licenseNumber,
                'image' => $image ?? 0,
            ]);

            return redirect()->route('operatingHours')->with('t-success', 'Business information updated successfully.');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('t-error', 'An error occurred while updating business information.');
        }
    }

    public function operatingHours(Request $request)
    {
        // Retrieve user ID based on the verified email in session
        $email = session('verified_email');
        $id = User::where('email', $email)->first()->id;

        $request->validate([
            's_' => 'required|array',
            's_.*' => 'required|string',
            'su_' => 'required|array',
            'su_.*' => 'required|string',
            'm_' => 'required|array',
            'm_.*' => 'required|string',
            't_' => 'required|array',
            't_.*' => 'required|string',
            'w_' => 'required|array',
            'w_.*' => 'required|string',
            'th_' => 'required|array',
            'th_.*' => 'required|string',
            'f_' => 'required|array',
            'f_.*' => 'required|string',
        ]);

        $this->validateStartAndEndTime($request);

        // Prepare the data for storing or updating
        $data = [
            'user_id' => $id,
            'saturday' => json_encode($request->input('s_')),
            'sunday' => json_encode($request->input('su_')),
            'monday' => json_encode($request->input('m_')),
            'tuesday' => json_encode($request->input('t_')),
            'wednesday' => json_encode($request->input('w_')),
            'thursday' => json_encode($request->input('th_')),
            'friday' => json_encode($request->input('f_')),
        ];

        OperatingHour::updateOrCreate(
            ['user_id' => $id], // Condition to find the existing record
            $data // Data to be saved or updated
        );

        // Redirect with a success message
        return redirect()->route('businessDescription')->with('t-success', 'Operating hours saved successfully!');
    }


    protected function validateStartAndEndTime(Request $request)
    {
        $days = ['s_', 'su_', 'm_', 't_', 'w_', 'th_', 'f_'];

        foreach ($days as $day) {
            if ($request->has($day)) {
                $times = $request->input($day);

                // Ensure there are at least two times (start and end)
                if (count($times) >= 2) {
                    $startTime = $times[1]; // Assume 1st index is the start time
                    $endTime = $times[2]; // Assume 2nd index is the end time

                    // Validate start time is not equal to end time
                    if ($startTime === $endTime) {
                        // Add a custom validation message
                        $request->validate([
                            $day => 'required|array',
                        ]);
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time must be different.'],
                        ]);
                    }
                }
            }
        }
    }

    public function businessDescription(Request $request)
    {
        $email = session('verified_email');
        $id = User::where('email', $email)->first()->id;
        $request->validate([
            'business_description' => 'required|string',
        ]);

        $business = BusinessAddress::where('user_id', $id)->first();
        $business->business_about = $request->business_description;
        $business->save();
        return redirect()->route('businessPhoto')->with('t-success', 'Business Description are created successfully!');
    }

    public function businessPhoto(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $email = session('verified_email');
        $id = User::where('email', $email)->first()->id;
        $business = BusinessAddress::where('user_id', $id)->first();

        if ($request->hasFile('businessPhoto')) {
            $image = Helper::fileUpload(
                $request->file('businessPhoto'),
                'business/image',
                $request->file('businessPhoto')->getClientOriginalName()
            );
            $business->doc_image = $image;
        }
        $business->save();

        return redirect()->route('submitVerification')->with('t-success', 'Business Photo upload successfully!');
    }

    public function submitVerification(Request $request)
    {
        $email = session('verified_email');
        $id = User::where('email', $email)->first()->id;

        // Validation
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phoneNumber' => 'required|numeric',
            'businessNameStreetAddress' => 'required|string|max:255',
            'streetAddress' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'businessDoc' => 'nullable|file|mimes:pdf|max:5120', // Allow ZIP files up to 5MB
            'businessDoc1' => 'nullable|file|mimes:pdf|max:5120', // Allow ZIP files up to 5MB
            'category' => 'required|string|max:255',
            'businessUrl' => 'required|url', // Ensure valid URL
        ]);

        try {
            // Initialize file paths
            $businessDocPath = null;
            $businessDoc1Path = null;

            // Check if a verification record exists for the user
            $verification = Verification::where('user_id', $id)->first();

            // Handle file upload for businessDoc
            if ($request->hasFile('businessDoc')) {
                // Delete the previous file if it exists
                if ($verification && $verification->pdf && file_exists(storage_path('app/public/' . $verification->pdf))) {
                    unlink(storage_path('app/public/' . $verification->pdf));
                }

                // Upload the new file
                $businessDocPath = Helper::fileUpload(
                    $request->file('businessDoc'),
                    'business/pdf',
                    $request->file('businessDoc')->getClientOriginalName()
                );
            }

            // Handle file upload for businessDoc1
            if ($request->hasFile('businessDoc1')) {
                // Delete the previous file if it exists
                if ($verification && $verification->image && file_exists(storage_path('app/public/' . $verification->image))) {
                    unlink(storage_path('app/public/' . $verification->image));
                }

                // Upload the new file
                $businessDoc1Path = Helper::fileUpload(
                    $request->file('businessDoc1'),
                    'business/pdf',
                    $request->file('businessDoc1')->getClientOriginalName()
                );
            }

            if ($verification) {
                // Update existing record
                $verification->update([
                    'first_name' => $validatedData['firstName'],
                    'last_name' => $validatedData['lastName'],
                    'business_city' => $validatedData['phoneNumber'],
                    'business_address' => $validatedData['businessNameStreetAddress'],
                    'address' => $validatedData['streetAddress'],
                    'city' => $validatedData['city'],
                    'state' => $validatedData['state'],
                    'zipcode' => $validatedData['zip'],
                    'pdf' => $businessDocPath ?: $verification->pdf, // Use new path or keep existing
                    'image' => $businessDoc1Path ?: $verification->image, // Use new path or keep existing
                    'store_ny' => $validatedData['category'],
                    'business_url' => $validatedData['businessUrl'],
                ]);
            } else {
                // Create a new record
                Verification::create([
                    'user_id' => $id,
                    'first_name' => $validatedData['firstName'],
                    'last_name' => $validatedData['lastName'],
                    'business_city' => $validatedData['phoneNumber'],
                    'business_address' => $validatedData['businessNameStreetAddress'],
                    'address' => $validatedData['streetAddress'],
                    'city' => $validatedData['city'],
                    'state' => $validatedData['state'],
                    'zipcode' => $validatedData['zip'],
                    'pdf' => $businessDocPath,
                    'image' => $businessDoc1Path,
                    'store_ny' => $validatedData['category'],
                    'business_url' => $validatedData['businessUrl'],
                ]);
            }

            return redirect('/')->with('t-success', 'Form submitted successfully. Please wait for admin approval.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while processing your request.']);
        }
    }

}
