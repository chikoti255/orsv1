<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use App\Models\QrCodeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Jobs\ProcessQrCodeScan;



class QrCodeController extends Controller
{
    public function generate(User $user, Request $request) {

        $userId= $user->id;
        $userEmail= $user->email;

        //for the unique qrcode string to differentiate the qrcodes
        $qrCodeString= uniqid('qr_');

          //concatenation of data into one string later for explode method
          $data= "$userId|$userEmail|$qrCodeString";

        $qrCode= QrCode::format('png')->size(250)
                  ->generate($data);

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

        $responseData= [
          'qr_code_image' => $qrCode,
          'data' => $data,
        ];
        $jsonResponse= json_encode($responseData);

        return Response::make($jsonResponse)->header(
          'Content-Type', 'application/json');

    }

    public function show() {
        $user= Auth::user();

        $qr= QrCodeModel::where('user_id', $user->id)->firstOrFail();

        //returning qr code image in response
        return Response::make($qr->qr_code_image)->header('Content-Type', 'image/png');
    }

}
