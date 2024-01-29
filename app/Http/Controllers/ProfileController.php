<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;

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


public function update(ProfileUpdateRequest $request): RedirectResponse
{
    // $request->validate();
    $user = $request->user();
    

    
    // Validate the current password
    // if (!Hash::check($request->current_password, $user->password)) {
    //     return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
    // }
    // Proceed with updating the user's profile
    $user->fill($request->validated());

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    session()->flash('success', 'Profile updated successfully.');

    return redirect()->route('edit.profile');
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
