<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\QrCode;

class ProcessQrCodeScan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $qrCodeString;
    /**
     * Create a new job instance.
     */
    public function __construct($qrCodeString)
    {
        $this->qrCodeString = $qrCodeString;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    { //handling all the queue operations

        //retriving qr code data from the database
        $qrCode = QrCode::where('qr_code', $this->qrCodeString);
        //qrcode column matches unique string from the job_constructor

        i($qrCode) {
          //if the qrcode is found retrive it with associated user
          $user= $qrCode->user; //belongs to relationship

          // 4. Handle retrieved data (e.g., send to database, send notification)
           // You can perform actions based on the retrieved user data.
           // For example:
           //   - Update user activity in the database
           //   - Send a notification to the user about the scan

           $scannedData = [
              'qr_code_id' => $qrCode->id,
              'user_id' => $user->id,
              'scanned_at' => now(),
           ];

           //DB::table('scans')->insert($scannedData);
        }
        else {
          // 5. Handle case where QR code is not found (optional)
            // You may want to log an error or take other actions if the QR code is not found.
            // For example, logging a message to a log file.
            \Log::info('Qr Code not found: '. $this->qrCodeString);
        }

    }
}
