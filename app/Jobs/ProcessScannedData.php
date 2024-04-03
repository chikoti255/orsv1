<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Scans;


class ProcessScannedData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle($data): void
    {
        $parts= explode('|', $data);

        $part0= $parts[0];
        $part1= $parts[1];
        $part2= $parts[2];

        $scannedData = [
            'userId' => $part0,
            'email' => $part1,
            'qrCodeString' => $part2,
        ];

        $scans = new Scans($scannedData);
            $scans->save();

        \Log::info($scannedData);
    }
}
