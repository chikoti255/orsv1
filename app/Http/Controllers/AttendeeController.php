<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegisterAttendee;
use App\Models\QrCodeModel;


class AttendeeController extends Controller
{
    /*public function search(Request $request) {
        $search= $request->search;

        $attendees= User::where(function($query) use($search) {
            $query->where('first_name','like',"%$search%")
              ->orWhere('last_name','like', "%$search%");
            })
            ->get();

            return view('attendee.attendee', compact('search', 'attendees'));
        }*/

        public function store(Request $request) {
          $request->validate([
              'full_name' => ['required', 'string', 'max:255'],
              'title' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.RegisterAttendee::class],
              'organization' => ['required', 'string', 'max:255'],
              'country' => ['required', 'string', 'max:255'],
              'membership' => ['required','string', 'max:255'],
              'confirm_payment' => ['required','string','max:255'],
              'mobile_no' => ['required', 'string', 'max:255'],

          ]);

          $user = RegisterAttendee::create([
              'full_name' => $request->full_name,
              'comments' => $request->comments,
              'email' => $request->email,
              'organization'=> $request->organization,
              'country'=> $request->country,
              'membership' => $request->membership,
              'payment_slip' => $request->payment_slip,
              'title' => $request->title,
              'confirm_payment' => $request->confirm_payment,
              'mobile_no' => $request->mobile_no
          ]);

          return redirect()->route('attendee.registered')->with('status','Attendee registered successfully');

        }

        public function index() {

          $attendees = RegisterAttendee::all();

        // Create an array to hold QR codes for each attendee
        $qrCodes = [];

        // Loop through each attendee and fetch their QR code
        foreach ($attendees as $attendee) {
            $qrCodes[$attendee->id] = QrCodeModel::where('user_id', $attendee->id)->first();
        }

          return view('attendee.registered', compact('attendees','qrCodes'));
        }

        public function show($id) {
            $attendee = RegisterAttendee::findOrFail($id);

            return response()->json($attendee);
        }





}
