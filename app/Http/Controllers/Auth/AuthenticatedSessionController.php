<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Jobs\SignupEmail;
use App\Jobs\GenerateQrCode;
use App\Models\User;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, User $user): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        //$userId= Auth::user()->id;

          SignupEmail::dispatch($user);

          GenerateQrCode::dispatch(Auth::user()->id);
        //  dd(Auth::user()->id);
        return redirect()->intended(route('qr-code.show', ['id' => Auth::user()->id], absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
