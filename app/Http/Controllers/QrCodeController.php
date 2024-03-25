<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use APP\Models\QrCodeModel;
use Illuminate\Support\Facades\Auth;


class QrCodeController extends Controller
{
    public function generate(User $user, Request $request) {

        $userId= $user->id;
        $userEmail= $user->email;

        //for the unique qrcode string to differentiate the qrcodes
        $qrCodeString= uniqid('qr_');

        $qrCode= QrCode::format('png')->size(250)
                  ->generate($qrCodeString);
        $qrData = [
          'user_id' => $userId,
          'qr_code' => $qrCodeString, //unique qrCode id
          'qr_code_image' => $qrCode,
          'email' => $userEmail,
        ];

        $qrCodeModel= new QrCodeModel($qrData);
        $qrCodeModel->save();

        //dispatch the qrcode processing from the normal flow
        ProcessQrCodeScan::dispatch($qrCodeString);

        /*return response()->json([
            'qrCodeString' => $qrCodeString,
            'qrData' => $qrData,
            'qrCodeId' => $qrCode->id,
            'qr_code_image' => $qrcode,
        ]);*/

        return response($qrCode)->header(
          'Content-Type', 'img/png');

    }

    /*public function showQrCode($qrCodeId) {
          $qrCode = QrCode::findOrFail($qrCodeId);
          $qr_code_image= $qrCode->qr_code_image;


        return view('qrCode', ['qr_code_image' => $qr_code_image]);
    }*/

}
