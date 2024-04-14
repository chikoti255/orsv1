<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendeeController;


Route::get('/', function () {
    return view('home');
});

Route::get('/scanner', function() {
  return view('scanner.scanner');
})->name('scanner');



Route::middleware('auth')->group(function() {
    Route::post('/handleScanned', [QrCodeController::class, 'handleScannedData'])->name('handleScanned');
    Route::get('/qr-code', [QrCodeController::class, 'show'])->name('qr-code.show');
});

Route::get('/myQr', function() {
  return view('qrCode.show');
})->middleware(['auth', 'verified'])->name('myQr');

Route::middleware('admin')->group(function() {

  Route::prefix('/attendee')->group(function() {
    Route::get('/registered', [UserController::class, 'index'])->name('attendee.registered');
    Route::get('/checkedIn', [UserController::class, 'checkedIn'])->name('attendee.checkedIn');
    Route::get('/absent', [UserController::class, 'absent'])->name('attendee.absent');
  });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
