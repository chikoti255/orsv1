<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider as BaseQrCodeServiceProvider;
use Illuminate\Support\Facades\Log;

class QrCodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(BaseQrCodeServiceProvider::class);

        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
