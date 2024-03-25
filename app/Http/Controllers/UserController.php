<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\QrCodeController;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->put('token', $token = 'abc');

        return view('register', [
            'token' => $token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->token != session()->get('token')) {
            abort(419);
        }

        session()->put('token', 'def');

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,id',
            'organization' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $user= new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email= $request->input('email');
        $user->organization= $request->input('organization');
        $user->country= $request->input('country');

        $user->save();


        $qrCodeController= new QrCodeController(); //qrCode controller instance
        $qrCode= $qrCodeController->generate($user,$request);

        $qrCodeImage= $qrCode->getContent();

        return view('qrCode.show', ['qr_code_image' => $qrCodeImage])->with('success', 'user registered successfully');
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
