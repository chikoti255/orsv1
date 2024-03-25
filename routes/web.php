<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('home');
});

/*Route::get('/register', function () {
    return view('register');
});
Route::post('/register', function() {
  return view('register');
});*/

Route::get('/scanner', function() {
  return view('scanner.scanner');
});

/*Route::prefix('qr-code')->group(function() {
    Route::post('/generate', [QrCodeController::class, 'generate']);
    Route::get('/showQrCode/{qrCodeId}', [QrCodeController::class, 'showQrCode']);
});*/

Route::resource('users', UserController::class);
