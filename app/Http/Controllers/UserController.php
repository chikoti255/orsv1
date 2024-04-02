<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\QrCodeController;
//use App\Http\Middleware\GenerateSafeSubmitToken;



class UserController extends Controller
{
    /*public function __construct() {
        $this->middleware(GenerateSafeSubmitToken::class)->only(['create','store']);
    }*/

    public function index()
    {
        $users= User::all();

        return view('attendee.registered', compact('users'));
    }

    public function attendee() {
        return view('attendee.attendee');
    }

    public function absent() {
      return view('attendee.absent');
    }

    public function checkedIn() {
      return view('attendee.checkedIn');
    }


     //#[Middleware(GenerateSafeSubmitToken::class)]
    public function create()
    {
        /*the token was first generated here
          session()->put('token', $token = 'abc');
        $token= session()->get('custom_token');

        return view('register', [
            'custom_token' => $token
        ]);*/
    }


     //#[Middleware(GenerateSafeSubmitToken::class)]
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
