<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AttendeeController extends Controller
{
    public function search(Request $request) {
        $search= $request->search;

        $attendees= User::where(function($query) use($search) {
            $query->where('first_name','like',"%$search%")
              ->orWhere('last_name','like', "%$search%");
            })
            ->get();

            return view('attendee.attendee', compact('search', 'attendees'));
        }




}
