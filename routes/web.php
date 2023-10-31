<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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



// --------------------------------Route for login routes

// Route for login success
Route::get('/success', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    return view('success');
})->name('success');

// Routes for LOGIN
Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('/login', [AuthenticateController::class, 'doLogin'])->name('login');

// Routes for register
Route::get('/register', [AuthenticateController::class, 'register'])->name('register');
Route::post('/register', [AuthenticateController::class, 'doRegister'])->name('register');

// Routes for admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::resource('students', StudentController::class);
    Route::resource('rooms', RoomController::class);
    Route::post('/search', [StudentController::class, 'search'])->name('search');
    Route::resource('subjects', SubjectController::class);


})
;
// Routes for student
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Route for logout
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');



