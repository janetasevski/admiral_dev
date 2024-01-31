<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user using the repository
        $user = $this->userRepository->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

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
        if (auth()->attempt($credentials)) {
            // Authentication successful, redirect to dashboard
            session()->flash('success', 'Login Successful. Welcome!');
            return redirect('/');
        } else {
            // Authentication failed, redirect back with error message
            return back()->withInput()->withErrors(['email' => 'Invalid email or password.']);
        }
    }

    // Method to logout
    public function logout(Request $request)
    {
        auth()->logout(); // Logout the currently authenticated user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        session()->flash('error', 'You have been logged out!');
        return redirect('/'); // Redirect to the login page after logout
    }

    // Method to display all users
    public function index()
    {
        $users = $this->userRepository->all();
        return view('user.index', compact('users'));
    }

    // Method to display the form for adding a new user
    public function create()
    {
        return view('user.create');
    }

    // Method to store a newly created user
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create a new user using the repository
        $user = $this->userRepository->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update the user using the repository
        $this->userRepository->update($user, [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => isset($validatedData['password']) ? bcrypt($validatedData['password']) : $user->password,
        ]);

        session()->flash('success', 'User updated successfully.');
        return redirect()->route('users.index');
    }

    // Method to delete a user
    public function destroy(User $user)
    {
        // Delete the user using the repository
        $this->userRepository->delete($user);
        session()->flash('error', 'User deleted successfully');
        return redirect('/users');
    }
}
