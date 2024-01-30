<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
     // Update the user's profile information.

public function update(Request $request, User $user)
{
    $user = $request->user();

    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'current_password' => 'required',
        'password' => 'nullable|min:8|confirmed',
    ]);

    // Check if the provided current password matches the user's actual current password
    if (!Hash::check($validatedData['current_password'], $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the user's name and email
    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
    ]);

    // If a new password is provided, update the password
    if ($validatedData['password']) {
        $user->password = bcrypt($validatedData['password']);
        $user->save();
    }

    // Flash a success message
    session()->flash('success', 'Profile updated successfully.');

    return redirect()->route('home');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
