<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Retrieve the authenticated user
        $user = Auth::user();

        // Store the user's email in the session
        session(['verified_email' => $user->email]);

        // Redirect based on user type
        if ($user->user_type === 'admin') {
            return redirect()->intended(RouteServiceProvider::HOME); // Redirect to admin dashboard
        }

        // Check if OTP verification is pending
        if (is_null($user->otp_expires_at)) {
            Auth::logout();
            return redirect()->route('verifyEmail')->with('t-error', 'Please verify your email before logging in.');
        }

        // Check if profile information is incomplete
        if (is_null($user->first_name)) {
            Auth::logout();
            return redirect()->route('profileInformation')->with('t-error', 'Complete your profile information to proceed.');
        }

        // Check if profile information is incomplete
        if (is_null($user->businessAddress) || is_null($user->businessAddress->user_id)) {
            Auth::logout();
            return redirect()->route('businessInformation')->with('t-error', 'Complete your business information to proceed.');
        }

        if (is_null($user->verification)) {
            Auth::logout();
            return redirect()->route('submitVerification')->with('t-error', 'Complete your verifications information to proceed.');
        }

        // Check if account status is inactive
        if ($user->status == 0) {
            Auth::logout();
            return redirect()->back()->with('t-error', 'Your account is inactive. Please wait for admin approval.');
        }


        // Redirect regular users to their home page
        return redirect()->route('userHomePage')->with('t-success', 'Login successful.');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
