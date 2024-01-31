<?php

namespace App\Repositories;

use App\Models\User;

class ProfileRepository
{
    /**
     * Get the user's profile.
     *
     * @param  \App\Models\User  $user
     * @return \App\Models\User
     */
    public function getUserProfile(User $user): User
    {
        return $user;
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Models\User  $user
     * @param  array  $data
     * @return bool
     */
    public function updateUserProfile(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * Delete the user's account.
     *
     * @param  \App\Models\User  $user
     * @return bool|null
     */
    public function deleteUserAccount(User $user): ?bool
    {
        return $user->delete();
    }
}
