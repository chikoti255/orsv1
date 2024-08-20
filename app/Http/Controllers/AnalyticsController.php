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

        //optimization for Eager loading (fetching all the attendees and count them by grouping countries)
        $attendeesByCountry = RegisterAttendee::select('country', DB::raw('count(*)'))
                              ->groupBy('country')
                              ->get();

        $china= $attendeesByCountry->where('country','China')->first()->count() ?? 0;
        $ethiopia= $attendeesByCountry->where('country','Ethiopia')->first()->count() ?? 0;
        $kenya= $attendeesByCountry->where('country','Kenya')->first()->count() ?? 0;
        $nigeria= $attendeesByCountry->where('country','Nigeria')->first()->count() ?? 0;
        $norway= $attendeesByCountry->where('country', 'Norway')->first()?->count() ?? 0;
        $rwanda= $attendeesByCountry->where('country','Rwanda')->first()->count() ?? 0;
        $southAfrica= $attendeesByCountry->where('country','China')->first()->count() ?? 0;
        $sweden= $attendeesByCountry->where('country','Sweden')->first()?->count() ?? 0;
        $tanzania= $attendeesByCountry->where('country','Tanzania')->first()->count() ?? 0;
        $uganda= $attendeesByCountry->where('country','Uganda')->first()->count() ?? 0;
        $uk= $attendeesByCountry->where('country','United Kingdom')->first()->count() ?? 0;
        $netherlands= $attendeesByCountry->where('country','Netherlands')->first()?->count() ?? 0;


        return view('analytics.analytics',
              compact('eacaCount','nonEacaCount','studentCount','payed','notPayed',
                        'china','ethiopia','kenya','rwanda','nigeria','norway','southAfrica','sweden','tanzania','uganda','uk','netherlands'));

    }
}
