<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminage\Support\Facades\Log;

class GoogleSheets extends Controller
{
    public function store(Request $request) {
        //for validation of incoming data


            $data= $request->input('data');

            return response()->json([
                'message' => 'Data received successfully'
            ]);

            Log::info('data received successfully ', ['data' => $data]);


    }
}
