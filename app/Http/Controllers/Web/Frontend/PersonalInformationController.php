<?php

namespace App\Http\Controllers\Web\Frontend;

use Exception;
use App\Models\User;
use App\Helpers\Helper;
// use App\Models\AboutUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{

    public function store(Request $request)
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
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong! Please try again.']);
        }
    }
}
