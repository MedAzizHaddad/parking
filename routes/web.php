<?php
use App\Http\Controllers\ProfileController;
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
    Route::get('/addParking', [\App\Http\Controllers\AdminParkingController::class, 'index'])->name('addParking');


    Route::get('/reservations', [\App\Http\Controllers\AdminParkingController::class, 'reservation'])->name('reservations');



    Route::get('/users', [\App\Http\Controllers\AdminUsersController::class, 'index'])->name('users');


});




Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/park', [\App\Http\Controllers\UserParkingController::class, 'index'])->name('park');

    Route::get('/history', [\App\Http\Controllers\UserParkingController::class, 'history'])->name('history');
});


require __DIR__ . '/auth.php';
