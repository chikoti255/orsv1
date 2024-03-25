<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\QrCodeController;

class UsersController extends Controller
{
    public function register(Request $request) {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|unique:users.email',
          'password' => 'required|string|min:5|confirmed',
      ]);

      $user= User::create([
        'name' => $request->name,
        'email'=> $request->email,
        'password' => Hash::make($request->password),
      ]);

      $qrCodeController= new QrCodeController(); //qrCode controller instance
      $qrCode= $qrCodeController->generate($request);

      $qrCodeImage= $qrCode->getContent();

      return view('qrCode', ['qr_code_image', $qrCodeImage]);
    }
}
