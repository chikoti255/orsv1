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

    public function index(Request $request)
    {
        //$search= $request->search;
        $users= User::all();
        /*$users = User::where(function($query) use ($search) {
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%") // Include searching by email
                  ->orWhere('organization', 'like', "%$search%"); // Include searching by organization
        })
        ->get();*/

        return view('attendee.registered', compact('users'));
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
