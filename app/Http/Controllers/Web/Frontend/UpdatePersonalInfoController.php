<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class UpdatePersonalInfoController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([

            'firstName' => 'string|max:255',
            'lastName' => 'string|max:255',
            'email' => 'email|max:255',
            'streetAddress' => 'string|max:255',
            'city_update' => 'string|max:255',
            'state_update' => 'string|max:255',
            'zip_update' => 'string|max:255',

        ]);

        try {

            $user = auth()->user();

            if ($request->filled('firstName') && $request->filled('lastName')) {
                $user->first_name = $request->firstName;
                $user->last_name = $request->lastName;
            }

            if ($request->filled('email')) {
                $user->email = $request->email;
            }

            if ($request->filled('streetAddress') && $request->filled('city_update') && $request->filled('state_update') && $request->filled('zip_update')) {
                $user->address = $request->streetAddress;
                $user->city = $request->city_update;
                $user->state = $request->state_update;
                $user->zipcode = $request->zip_update;
            }

            $user->save();

            return redirect()->route('updatePersonalInformation')->with('t-success',  ' personal information updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
