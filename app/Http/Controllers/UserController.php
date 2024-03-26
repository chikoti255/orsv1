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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
     //#[Middleware(GenerateSafeSubmitToken::class)]
    public function create()
    {
        //the token was first generated here
            //session()->put('token', $token = 'abc');
        $token= session()->get('custom_token');

        return view('register', [
            'custom_token' => $token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
     //#[Middleware(GenerateSafeSubmitToken::class)]
    public function store(Request $request)
    {
        /*if($request->token != session()->get('token')) {
            abort(419);
        }
        session()->put('token', 'def');*/

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

        if($user) {
          $formSubmitSuccess= true;
        } else {
          $formSubmitSuccess= false;
        }


        $qrCodeController= new QrCodeController(); //qrCode controller instance
        $qrCode= $qrCodeController->generate($user,$request);

        $qrCodeImage= $qrCode->getContent();

        //return view('qrCode.show', ['qr_code_image' => $qrCodeImage])->with('success', 'user registered successfully');
        if($formSubmitSuccess) {
            return redirect('/users');
        } else {
          return back()->withErrors(errors());
        }
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
