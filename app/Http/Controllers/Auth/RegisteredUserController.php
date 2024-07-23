<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Controllers\QrCodeController;
use App\Jobs\GenerateQrCode;
use App\Jobs\SignupEmail;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Log;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'organization' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'organization'=> $request->organization,
            'country'=> $request->country,
            //'password' => Hash::make($request->password),
        ]);

        if(!$user) {
          \Log::error('User not autheniticated');
        }



        /*$qrCodeController= new QrCodeController(); //qrCode controller instance
        $qrCode= $qrCodeController->generate($user,$request);

        $qrCodeImage= $qrCode->getContent();*/

        Auth::login($user);

        $id= $user->id;

        Log::info('User registered with Id: '. $user->id);
        event(new UserRegistered($user));

        SignupEmail::dispatch($user);

        //return redirect(route('dashboard', absolute: false));
        return redirect()->route('qr-code.show', ['id'=> $user->id])->with('status','Attendee registered successfully');
    }


}
