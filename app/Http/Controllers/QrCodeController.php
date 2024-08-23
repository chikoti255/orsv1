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



class QrCodeController extends Controller
{


    public function generateQrCode($id) {
          //$id= Auth::id();
          $attendee = RegisterAttendee::all();
        GenerateQrCode::dispatch($id);

        return redirect()->route('attendee.registered', ['id' => $id])->with('status', 'QR Code generation dispatched!');
    }



    public function show($id) {

      $qrCode= QrCodeModel::where('user_id', $id)->first();
      $user = RegisterAttendee::with('qrCode')->findOrFail($id);

      /*if(!$qrCode) {
          return redirect()->back()->with('error', 'Qr Code not found');
      }*/

      return view('attendee.registered', compact('user','qrCode'));
    }






}
