<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for displaying the registration form
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');

// Route for handling registration form submission
Route::post('/register', [UserController::class, 'register']);

// Route for displaying the login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Route for handling login form submission
Route::post('/login', [UserController::class, 'login']);

// logout route
Route::post('/logout', [UserController::class, 'logout']);

//Users Routes
// Route for displaying the edit profile page
// Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit_profile');

//Employees Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    
});
//Profile Routes
Route::middleware(['auth'])->group(function () {

    //Route for displaying the edit profile page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');

    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');


    
});
// Route for displaying the list of employees (home page)
Route::get('/', [EmployeeController::class, 'index'])->name('home');
// Route for displaying the form for creating a new employee
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

// Route for storing the new employee data
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');

// Route for displaying the employee edit form
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');

// Route for updating the employee data
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');

// Route for deleting the employee
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
