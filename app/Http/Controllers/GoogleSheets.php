<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleSheets extends Controller
{
    public function store(Request $request) {
        //for validation of incoming data

        $data= $request->all();

        return response()->json([
            'message' => 'Data received successfully'
        ]);
    }
}
