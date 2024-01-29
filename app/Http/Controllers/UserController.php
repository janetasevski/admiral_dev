<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|',
            'email' => 'required||email|unique:users',
            'password' => 'required||min:8|confirmed',
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
        session()->flash('error', 'You have been logged out!');
        return redirect('/'); // Redirect to the login page after logout
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    // Method to store a newly created user
    public function store(Request $request)
    {
       
            // Validate the incoming request data
            $validatedData = $request->validate([
            'name' => 'required||max:255',
            'email' => 'required||email||unique:users',
            'password' => 'required|min:8',
        ]);

            // Create a new user instance with the validated data
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
               'password' => bcrypt($validatedData['password']),
                
            ]);
            // Save the user to the database
            $user->save();

            session()->flash('success', 'User added successfully.');
            // Redirect back to the home page with a success message
            return redirect('/users');
       
    }

    // Method to show form for editing a user
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Method to update a user
    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|',
            'email' => 'required|email||unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update the user's name and email
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        // Check if a new password is provided and update the password if so
        if ($validatedData['password']) {
            $user->update([
                'password' => bcrypt($validatedData['password']),
            ]);
        }

        session()->flash('success', 'User updated successfully.');
        return redirect()->route('users.index');
    }
}
