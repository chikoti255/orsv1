<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\RegisterAttendee;
use App\Models\Scans;
//use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /*public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }*/

    public function create(): View {
          return view('admin.login');
      }

    public function dashboard() {

      $registered_attendee= RegisterAttendee::count();

      $checked_in_attendee= Scans::count();
      $absent_attendee = RegisterAttendee::whereDoesntHave('scans')->count();


        return view('admin.dashboard', compact('registered_attendee','checked_in_attendee','absent_attendee'));
    }

      public function login(Request $request): RedirectResponse
       {
            //dd($request->all());
              $check= $request->all();

              if(Auth::guard('admin')->attempt([ 'email' => $check['email'], 'password' => $check['password'] ])) {

                Session::flash('admin_login_success', 'Success login as Admin');

                return redirect()->route('admin.dashboard');
              }
              else {
                    Session::flash('admin_login_failed', 'Incorrect Email or Password');
                return back();
              }
      }

}
