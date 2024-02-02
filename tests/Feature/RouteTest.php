<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function guest_can_access_register_and_login_routes()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_access_home_route()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_access_profile_routes()
    {
        $user = User::factory()->create();

        // Edit profile route
        $response = $this->actingAs($user)->get('/profile/edit');
        $response->assertStatus(200);

        // Update profile route
        $response = $this->actingAs($user)->put('/profile/edit', [
            'name' => $user->name,
            'email' => $user->email,
            'current_password' => 'password', 
            'password' => 'newpassword', 
            'password_confirmation' => 'newpassword', 
        ]);
        $response->assertStatus(302); // Redirect after updating

        // Logout route
        $response = $this->actingAs($user)->post('/logout');
        $response->assertStatus(302);
    }

    /** @test */
    public function authenticated_user_can_access_employee_routes()
    {
        $user = User::factory()->create();

        // Employee index route
        $response = $this->actingAs($user)->get('/employees');
        $response->assertStatus(200);

        // Employee create route
        $response = $this->actingAs($user)->get('/employee/create');
        $response->assertStatus(200);

        // Employee store route
        $response = $this->actingAs($user)->post('/employee');
        $response->assertStatus(302); // Redirect since POST request

        $employee = Employee::factory()->create();

        // Employee edit route
        $response = $this->actingAs($user)->get('/employee/' . $employee->id . '/edit');
        $response->assertStatus(200);

        // Employee update route
        $response = $this->actingAs($user)->put('/employee/' . $employee->id);
        $response->assertStatus(302); // Redirect since PUT request

        // Employee delete route
        $response = $this->actingAs($user)->delete('/employee/' . $employee->id);
        $response->assertStatus(302); // Redirect since DELETE request
    }

    /** @test */
    public function admin_can_access_users_routes()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        // Users index route
        $response = $this->actingAs($admin)->get('/users');
        $response->assertStatus(200);

        // User create route
        $response = $this->actingAs($admin)->get('/user/create');
        $response->assertStatus(200);

        // User store route
        $response = $this->actingAs($admin)->post('/user');
        $response->assertStatus(302); // Redirect since POST request

        $user = \App\Models\User::factory()->create();

        // User edit route
        $response = $this->actingAs($admin)->get('/user/' . $user->id . '/edit');
        $response->assertStatus(200);

        // User update route
        $response = $this->actingAs($admin)->put('/user/' . $user->id);
        $response->assertStatus(302); // Redirect since PUT request

        // User delete route
        $response = $this->actingAs($admin)->delete('/user/' . $user->id);
        $response->assertStatus(302); // Redirect since DELETE request
    }

    /** @test */
    public function authenticated_user_can_access_car_routes()
    {
        $user = User::factory()->create();

        // Car index route
        $response = $this->actingAs($user)->get('/cars');
        $response->assertStatus(200);

        // Car create route
        $response = $this->actingAs($user)->get('/car/create');
        $response->assertStatus(200);

        // Car store route
        $response = $this->actingAs($user)->post('/car');
        $response->assertStatus(302); // Redirect since POST request

        $car = \App\Models\Car::factory()->create();

        // Car edit route
        $response = $this->actingAs($user)->get('/car/' . $car->id . '/edit');
        $response->assertStatus(200);

        // Car update route
        $response = $this->actingAs($user)->put('/car/' . $car->id);
        $response->assertStatus(302); // Redirect since PUT request

        // Car delete route
        $response = $this->actingAs($user)->delete('/car/' . $car->id);
        $response->assertStatus(302); // Redirect since DELETE request
    }
}
