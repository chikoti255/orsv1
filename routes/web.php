<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\ScansController;
use App\Http\Controllers\AnalyticsController;


Route::get('/', function () {
    return view('home');
});


Route::get('/scanner', function() {
  return view('scanner.scanner');
})->name('scanner');


Route::post('/handleScanned', [ScansController::class, 'handleScannedData'])->name('handleScanned');

Route::get('/scan-cont', function() {
  return view('scanner.scan-cont');
})->name('scanContainer');

/*Route::middleware('auth')->group(function() {

    Route::get('/qr-code/{id}', [QrCodeController::class, 'show'])->name('qr-code.show');
    Route::post('/user/{id}/generate', [QrCodeController::class, 'generateQrCode'])->name('qr-code.generateQrCode');
}); */

Route::get('/myQr', function() {
  return view('qrCode.show');
})->middleware(['auth', 'verified'])->name('myQr');

Route::middleware('admin')->group(function() {

  Route::prefix('/attendee')->group(function() {

          Route::prefix('/analytics')->group(function() {
                Route::get('/', [AnalyticsController::class, 'showAnalytics'])->name('analytics.show');

                Route::get('/get-countries', [AnalyticsController::class, 'getCountries'])->name('analytics.getCountries');
          });

        Route::get('/qr-code-image/{attendeeId}', [QrCodeController::class, 'getImage'])->name('qr-code.getImage');
          Route::post('/qr-code/{attendeeId}', [QrCodeController::class, 'generateQrCode'])->name('qr-code.generateQrCode');

    Route::get('/registered', [AttendeeController::class, 'index'])->name('attendee.registered');
    Route::post('/register_attendee', [AttendeeController::class, 'store'])->name('attendee.register');

    Route::get('/checkedIn', [AttendeeController::class, 'checkedIn'])->name('attendee.checkedIn');
    Route::get('/absent', [AttendeeController::class, 'absent'])->name('attendee.absent');



    Route::get('/{id}', [AttendeeController::class, 'show'])->name('attendee.show');

  });
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
