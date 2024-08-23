<?php

namespace App\Jobs;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\QrCodeModel;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\RegisterAttendee;


class GenerateQrCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
     protected $attendeeId;

     //public $tries = 3;

    public function __construct($attendeeId)
    {
        $this->attendeeId = $attendeeId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
          $attendee = RegisterAttendee::find($this->attendeeId);

            if(!$attendee) {
                Log::error("User not found with id : {$attendee->id}");

                return;
            }
              $qr_code_string= uniqid('qr_');


              $data= "{$qr_code_string}|{$attendee->id}|{$attendee->email}";

              //Generating qr code
              $renderer= new ImageRenderer(
                new RendererStyle(400),
                new SvgImageBackEnd()
              );

                //Initilizing qr code writer
              $writer = new Writer($renderer);
              //generating qr code as svg string
              $qrCode= $writer->writeString($data);

              $path = "qr_codes/user_{$attendee->id}.svg";

              Storage::disk('public')->put($path, $qrCode);

              /*QrCodeModel::firstOrCreate(
                    ['user_id' => $user_id, 'qr_code_string' => $qr_code_string],
                    ['qr_code_path' => $filePath]
              );*/

              $qrModel = new QrCodeModel();
              $qrModel->attendee_id = $attendee->id;
              $qrModel->qr_code_string = $qr_code_string;
              $qrModel->qr_code_path = $path;
              $qrModel->save();

              Log::info("Qr code generated and stored for the user id: {$attendee->id}");


        } catch(\Exception $e) {
            Log::error('Error Generating the QR Code: ' . $e->getMessage());
        }

    }

}
