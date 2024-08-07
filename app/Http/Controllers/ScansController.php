<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessScannedData;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class ScansController extends Controller
{


  public function handleScannedData(Request $request) {
        if(isset($request->scanned_data)) {
            $scannedData= $request->input('scanned_data');

            //ProcessScannedData::dispatch($scannedData);
            dispatch(new ProcessScannedData($scannedData));
            Log::info('ProcessScannedData Job is dispatched successfully.');

            return response()->json([
                'success' => true,
                'message' => 'Scanned Data Processed in the background'
            ]);
        }

        return response()->json([
            'message' => 'No scanned Data Received'
        ], 400);
  }


}
