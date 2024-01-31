<?php

namespace App\Http\Controllers;

use App\Repositories\ProfileRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Profile repository instance.
     *
     * @var \App\Repositories\ProfileRepository
     */
    protected $profileRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\ProfileRepository  $profileRepository
     * @return void
     */
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
    }

    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $this->profileRepository->getUserProfile($request->user()),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
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

        // Update the user's profile
        $updated = $this->profileRepository->updateUserProfile($user, [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        ]);

        if ($updated) {
            // Flash a success message
            session()->flash('success', 'Profile updated successfully.');
        } else {
            // Flash an error message
            session()->flash('error', 'Failed to update profile.');
        }

        return redirect()->route('home');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $deleted = $this->profileRepository->deleteUserAccount($user);

        if ($deleted) {
            // Flash a success message
            session()->flash('success', 'Account deleted successfully.');
        } else {
            // Flash an error message
            session()->flash('error', 'Failed to delete account.');
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
