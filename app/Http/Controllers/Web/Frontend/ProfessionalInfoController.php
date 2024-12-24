<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\AboutUser;
use Illuminate\Http\Request;
use App\Models\OperatingHour;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class ProfessionalInfoController extends Controller
{

    public function aboutUserUpdate(Request $request)
    {

        $request->validate([
            'about_you' => 'nullable|string|max:5000',
        ]);

        try {
            // Retrieve the user's about information or create a new one
            $user = User::where('id', Auth::id())->firstOrNew();

            // Update the fields only if provided
            if ($request->filled('about_you')) {
                $user->about = $request->input('about_you');
            }

            // Save the user's information
            $user->save();

            return redirect()->back()->with('t-success', 'Personal information updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }

    /* public function operatingHoursUpdate(Request $request)
    {
        dd($request->all()); // Dump the request to check the data

        // Validation of inputs
        $request->validate([
            'saturday_opens_at' => 'required|string',
            'saturday_close_at' => 'required|string',
            'sunday_opens_at' => 'required|string',
            'sunday_close_at' => 'required|string',
            'monday_opens_at' => 'required|string',
            'monday_close_at' => 'required|string',
            'tuesday_opens_at' => 'required|string',
            'tuesday_close_at' => 'required|string',
            'wednesday_opens_at' => 'required|string',
            'wednesday_close_at' => 'required|string',
            'thursday_opens_at' => 'required|string',
            'thursday_close_at' => 'required|string',
            'friday_opens_at' => 'required|string',
            'friday_close_at' => 'required|string',
        ]);

        try {
            // Get the current authenticated user
            $user = Auth::user();

            // Check if the user already has operating hours set
            $operatingHours = OperatingHour::updateOrCreate(
                ['user_id' => $user->id], // Condition to find existing entry
                [
                    'saturday' => json_encode([
                        'opens_at' => $request->saturday_opens_at,
                        'close_at' => $request->saturday_close_at,
                    ]),
                    'sunday' => json_encode([
                        'opens_at' => $request->sunday_opens_at,
                        'close_at' => $request->sunday_close_at,
                    ]),
                    'monday' => json_encode([
                        'opens_at' => $request->monday_opens_at,
                        'close_at' => $request->monday_close_at,
                    ]),
                    'tuesday' => json_encode([
                        'opens_at' => $request->tuesday_opens_at,
                        'close_at' => $request->tuesday_close_at,
                    ]),
                    'wednesday' => json_encode([
                        'opens_at' => $request->wednesday_opens_at,
                        'close_at' => $request->wednesday_close_at,
                    ]),
                    'thursday' => json_encode([
                        'opens_at' => $request->thursday_opens_at,
                        'close_at' => $request->thursday_close_at,
                    ]),
                    'friday' => json_encode([
                        'opens_at' => $request->friday_opens_at,
                        'close_at' => $request->friday_close_at,
                    ]),
                ]
            );

            return redirect()->back()->with('t-success', 'Operating hours updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    } */

    /* public function operatingHoursUpdate(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            's_' => 'array',
            's_.*' => 'string',
            'su_' => 'array',
            'su_.*' => 'string',
            'm_' => 'array',
            'm_.*' => 'string',
            't_' => 'array',
            't_.*' => 'string',
            'w_' => 'array',
            'w_.*' => 'string',
            'th_' => 'array',
            'th_.*' => 'string',
            'f_' => 'array',
            'f_.*' => 'string',
        ]);

        $this->validateStartAndEndTime($request);

        // Prepare the data for storing or updating
        $data = [
            'user_id' => $user->id,
            'saturday' => json_encode($request->input('s_')),
            'sunday' => json_encode($request->input('su_')),
            'monday' => json_encode($request->input('m_')),
            'tuesday' => json_encode($request->input('t_')),
            'wednesday' => json_encode($request->input('w_')),
            'thursday' => json_encode($request->input('th_')),
            'friday' => json_encode($request->input('f_')),
        ];

        OperatingHour::updateOrCreate(
            ['user_id' => $user->id], // Condition to find the existing record
            $data // Data to be saved or updated
        );

        // Redirect with a success message
        return redirect()->route('professionalPersonalInfo')->with('t-success', 'Operating hours updated successfully!');
    } */
    public function operatingHoursUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            's_' => 'array',
            's_.*' => 'string',
            'su_' => 'array',
            'su_.*' => 'string',
            'm_' => 'array',
            'm_.*' => 'string',
            't_' => 'array',
            't_.*' => 'string',
            'w_' => 'array',
            'w_.*' => 'string',
            'th_' => 'array',
            'th_.*' => 'string',
            'f_' => 'array',
            'f_.*' => 'string',
        ]);

        $this->validateStartAndEndTime($request);

        $days = [
            'saturday' => 's_',
            'sunday' => 'su_',
            'monday' => 'm_',
            'tuesday' => 't_',
            'wednesday' => 'w_',
            'thursday' => 'th_',
            'friday' => 'f_'
        ];
        $data = ['user_id' => $user->id];

        foreach ($days as $dayKey => $dayInput) {
            $dayData = $request->input($dayInput);

            if (is_array($dayData)) {
                // Remove 'off' if 'on' is present
                if (in_array('on', $dayData)) {
                    $dayData = array_diff($dayData, ['off']);
                }

                // Check if valid data exists and 'on' is selected
                if (is_array($dayData) && in_array('on', $dayData) && count($dayData) >= 3) {
                    $data[$dayKey] = json_encode($dayData); // Valid JSON
                } else {
                    $data[$dayKey] = json_encode(['closed']); // Mark as 'closed'
                }
            } else {
                $data[$dayKey] = json_encode(['closed']); // Default to 'closed'
            }
        }

        OperatingHour::updateOrCreate(
            ['user_id' => $user->id], // Condition to find the existing record
            $data // Data to be saved or updated
        );

        return redirect()->route('professionalPersonalInfo')->with('t-success', 'Operating hours updated successfully!');
    }



    protected function validateStartAndEndTime(Request $request)
    {
        $days = ['s_', 'su_', 'm_', 't_', 'w_', 'th_', 'f_'];

        foreach ($days as $day) {
            if ($request->has($day)) {
                $times = $request->input($day);

                // Ensure $times is an array
                if (!is_array($times)) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        $day => ['Invalid input format for operating hours.'],
                    ]);
                }

                // Remove 'off' values and reindex the array
                $times = array_values(array_filter($times, fn($value) => $value !== 'off'));

                if (empty($times)) {
                    continue;
                }

                if (isset($times[0]) && $times[0] === 'on') {
                    if (count($times) < 3) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time are required when status is on.'],
                        ]);
                    }

                    $startTime = $times[1] ?? null;
                    $endTime = $times[2] ?? null;

                    if ($startTime === $endTime) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time must be different.'],
                        ]);
                    }
                }
            }
        }
    }


    /* protected function validateStartAndEndTime(Request $request)
    {
        $days = ['s_', 'su_', 'm_', 't_', 'w_', 'th_', 'f_'];

        foreach ($days as $day) {
            if ($request->has($day)) {
                $times = $request->input($day);

                // Remove 'off' if present
                $times = array_filter($times, fn($value) => $value !== 'off');

                // Skip validation if the array is empty after filtering
                if (empty($times)) {
                    continue;
                }

                // Ensure the first value is 'on' and validate times
                if (isset($times[0]) && $times[0] === 'on') {
                    if (count($times) < 3) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time are required when status is on.'],
                        ]);
                    }

                    $startTime = $times[1]; // 1st index is the start time
                    $endTime = $times[2];   // 2nd index is the end time

                    // Validate start time and end time
                    if (empty($startTime) || empty($endTime)) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time must not be empty when status is on.'],
                        ]);
                    }

                    if ($startTime === $endTime) {
                        throw \Illuminate\Validation\ValidationException::withMessages([
                            $day => ['Start time and end time must be different.'],
                        ]);
                    }
                } else {
                    // If 'on' is missing or invalid
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        $day => ['Invalid status or missing times for the day.'],
                    ]);
                }
            }
        }
    } */







    /* protected function validateStartAndEndTime(Request $request)
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
    } */

    public function imageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Upload the file using a helper function
            $image = Helper::fileUpload($request->file('image'), 'profile', $request->file('image')->getClientOriginalName());

            // Update the user's avatar in the database
            $user = User::find(Auth::id());
            $user->avatar = $image;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Image uploaded successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong! Please try again.']);
        }
    }
}
