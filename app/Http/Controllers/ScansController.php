<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessScannedData;
use App\Models\User;
use App\Models\Scans;


class ScansController extends Controller
{


  public function handleScannedData(Request $request) {
        if(isset($request->scanned_data)) {
            $scannedData= $request->input('scanned_data');


            if($this->isDuplicate($scannedData)) {
                return responsse()->json([
                    'message' => 'Duplicate scan data. Already exists in scans table.'
                ],400);
            }

            //ProcessScannedData::dispatch($scannedData);
            dispatch(new ProcessScannedData($scannedData));

            return response()->json([
                'message' => 'Scanned Data Processed in the background'
            ]);
        }

        return response()->json([
            'message' => 'No scanned Data Received'
        ], 400);
  }

  public function isDuplicate($scannedData) {
      $parts= explode('|', $scannedData);

      $user_id= $parts[0];
      $email= $parts[1];
      $qr_code_string= $parts[2];

      //checking if scans data exists through model

      return Scans::where('user_id', $user_id)
                  
                  ->where('qr_code_string', $qr_code_string)
                  ->exists();

  }


}
