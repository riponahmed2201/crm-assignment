<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Attempt login using Laravel's built-in authentication
            if (Auth::attempt($validated, $request->boolean('remember'))) {
                // Regenerate session to prevent fixation attacks
                $request->session()->regenerate();

                // Redirect to the dashboard
                return redirect()->intended(route('dashboard'))->with('success', 'Login successful');
            }

            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        } catch (Exception $exception) {
            // Log the exception and show a generic error message
            logger()->error('Login error: ' . $exception->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or home page
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}
