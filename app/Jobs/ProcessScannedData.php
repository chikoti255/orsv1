<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Scans;
use Illuminate\Support\Facades\Log;



class ProcessScannedData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     protected $scannedData;

    public function __construct($scannedData)
    {
        $this->scannedData = $scannedData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
          $parts= explode('|', $this->scannedData);

          $userId= $parts[0]; //userid
          $email= $parts[1]; //email
          $qrcodeString= $parts[2]; //qrcodestring


          $scans = new Scans;

          $scans->qr_code_string= $qrcodeString;
          $scans->user_id= $userId;
          $scans->save();

        

        }
        catch (\Exception $e) {
            // Handle any exceptions here
            //\Log::error('Error processing scanned data: ' . $e->getMessage());
        }

    }
}
