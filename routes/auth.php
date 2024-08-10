<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;


//Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

//});
Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);


Route::middleware('auth')->group(function () {


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


/* ----Admin Routes ---*/
Route::prefix('admin')->group(function() {
Route::get('/login',[LoginController::class, 'create'])->name('admin.login');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard')
    ->middleware('admin');

Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');
});
