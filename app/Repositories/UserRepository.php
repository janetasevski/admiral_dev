<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    // Method to retrieve all users
    public function all()
    {
        return $this->model->paginate(5);
    }

    // Method to create a new user
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Method to update an existing user
    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    // Method to delete an user
    public function delete(User $user)
    {
        $user->delete();
    }
}
