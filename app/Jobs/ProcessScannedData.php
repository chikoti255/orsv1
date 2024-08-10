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

          $userId= $parts[1]; //userid
          $email= $parts[2]; //email
          $qrcodeString= $parts[0]; //qrcodestring



            $scanned_database= Scans::where('qr_code_string',$qrcodeString)->first();

            if(!$scanned_database) {
                  $scans = new Scans;
                  $scans->qr_code_string= $qrcodeString;
                  $scans->user_id= $userId;

                    Log::info('Processing scanned data: userId='. $userId. ', email='.$email . ', qrcodeString='. $qrcodeString);
                  $scans->save();

                    Log::info('Saving scan data: ' .json_encode($scans->toArray()));
                      Log::info('Scan data saved successfully.');

            }else {
                Log::info('Scanned data already exists in database.');
            }


        }
        catch (\Exception $e) {
            // Handle any exceptions here
            Log::error('Error processing scanned data: ' . $e->getMessage());

        }

    }
}
