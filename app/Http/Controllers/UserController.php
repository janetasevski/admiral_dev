<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Method to show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Method to handle registration form submission
    public function register(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Authenticate the user after registration
        Auth::login($user);

        
        session()->flash('success', 'Registration successful. Welcome!');
        // Redirect to dashboard with success message
        return redirect('/')->with('success', 'Registration successful. Welcome!');

        
    }

    // Method to show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Method to handle login form submission
    public function login(Request $request)
    {
        // Validate the login form data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful, redirect to dashboard
            session()->flash('success', 'Login Successful. Welcome!');
            return redirect('/');
        } else {
            // Authentication failed, redirect back with error message
            return back()->withInput()->withErrors(['email' => 'Invalid email or password.']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout the currently authenticated user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to the login page after logout
    }


}
