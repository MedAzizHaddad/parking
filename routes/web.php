<?php

use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

//Auth::routes();

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


    Route::get('/addParking', [\App\Http\Controllers\ParkingController::class, 'create'])->name('addParking');
    Route::get('/parkings', [\App\Http\Controllers\ParkingController::class, 'index'])->name('parkings.index');
    Route::post('/parkingStore', [\App\Http\Controllers\ParkingController::class, 'store'])->name('parkingStore');
    Route::get('/parkings/{parking}', [App\Http\Controllers\ParkingController::class, 'show'])->name('parkings.show');
    Route::get('/parkings/{parking}/edit', [App\Http\Controllers\ParkingController::class, 'edit'])->name('parkings.edit');
    Route::put('/parkings/{parking}', [App\Http\Controllers\ParkingController::class, 'update'])->name('parkings.update');
    Route::delete('/parkings/{parking}', [App\Http\Controllers\ParkingController::class, 'destroy'])->name('parkings.destroy');
//    Route::get('/reservations', [\App\Http\Controllers\AdminParkingController::class, 'reservation'])->name('reservations');
//    Route::get('/users', [\App\Http\Controllers\AdminUsersController::class, 'index'])->name('users');

    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])->name('reservations.admin');

    Route::put('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
    Route::put('/reservations/{reservation}/decline', [ReservationController::class, 'decline'])->name('reservations.decline');
    //    Route::put('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
//    Route::put('/reservations/{reservation}/decline', [ReservationController::class, 'decline'])->name('reservations.decline');
});





Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/park', [\App\Http\Controllers\UserParkingController::class, 'index'])->name('reservations.create');
    Route::get('/history', [\App\Http\Controllers\UserParkingController::class, 'history'])->name('history');

// Index - List all reservations
    Route::get('/mes-reservations', [ReservationController::class, 'userIndex'])->name('reservations.user');

// Create - Show the form to create a new reservation
    Route::get('/reservations/create', [\App\Http\Controllers\ReservationController::class, 'create'])->name('reservations.create');

// Store - Save a new reservation
    Route::post('/reservationStore', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store');

    Route::put('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

// Show - Display a specific reservation
    Route::get('/reservations/{reservation}', [\App\Http\Controllers\ReservationController::class, 'show'])->name('reservations.show');

// Edit - Show the form to edit a reservation
    Route::get('/reservations/{reservation}/edit', [\App\Http\Controllers\ReservationController::class, 'edit'])->name('reservations.edit');

// Update - Save changes to a reservation
    Route::put('/reservations/{reservation}', [\App\Http\Controllers\ReservationController::class, 'update'])->name('reservations.update');

// Destroy - Delete a reservation
    Route::delete('/reservations/{reservation}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservations.destroy');


});





require __DIR__ . '/auth.php';
