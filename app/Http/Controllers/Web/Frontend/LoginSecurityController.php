<?php

namespace App\Http\Controllers\Web\Frontend;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginSecurityController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:8', 'different:current_password'],
            'new_password_confirmation' => ['required'],
        ]);

        try {
            $user = auth()->user();
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('t-success', 'Password updated successfully.');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update password.');
        }

    }

}
