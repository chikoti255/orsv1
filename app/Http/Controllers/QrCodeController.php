<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use App\Models\QrCodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Jobs\GenerateQrCode;
use App\Jobs\ProcessScannedData;
use App\Models\RegisterAttendee;
use Illuminate\Support\Facades\Log;



class QrCodeController extends Controller
{


    public function generateQrCode($attendeeId) {
          //$id= Auth::id();
          $attendee = RegisterAttendee::all();

          $job = new GenerateQrCode($attendeeId);
                  dispatch($job);

        return redirect()->back()->with('success','Qr Code generation initiated successfully');
    }



      public function getImage($attendeeId) {

          $attendee = QrCodeModel::where('attendee_id',$attendeeId)->firstOrFail();

          $imagePath = $attendee->qr_code_path;

          Log::info($imagePath);


         if($imagePath) {

              $imageUrl = asset('storage/'. $imagePath);

              return response()->json(['image_url' => $imageUrl]);
              //returns image as binary response
          } else {

              return response()->json(['error' => 'Image not found'], 404);
          }
      }






}
