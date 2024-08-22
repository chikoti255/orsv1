<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RegisterAttendee;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function showAnalytics() {

        $eacaCount = RegisterAttendee::where('membership','EACA Member')->count();
        $nonEacaCount = RegisterAttendee::where('membership','Non-EACA Member')->count();
        $studentCount = RegisterAttendee::where('membership','Student')->count();

        $payed = RegisterAttendee::where('confirm_payment', 'YES, i Complete my payment')->count();
        $notPayed= RegisterAttendee::where('confirm_payment', 'No, I will pay on arrival')->count();

        return view('analytics.analytics',
              compact('eacaCount','nonEacaCount','studentCount','payed','notPayed'));

    }

    public function getCountries() {
        //optimization for Eager loading (fetching all the attendees and count them by grouping countries)
        $attendeesByCountry = RegisterAttendee::select('country', DB::raw('count(*) as count'))
                              ->groupBy('country')
                              ->get();
          //returns array with objects [{countrty: 'Tanzania', count(*): 4}]

          return response()->json($attendeesByCountry);
    }


}
