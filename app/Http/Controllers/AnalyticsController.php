<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RegisterAttendee;

class AnalyticsController extends Controller
{
    public function showAnalytics() {

        $eacaCount = RegisterAttendee::where('membership','EACA Member')->count();
        $nonEacaCount = RegisterAttendee::where('membership','Non-EACA Member')->count();
        $studentCount = RegisterAttendee::where('membership','Student')->count();

        $payed = RegisterAttendee::where('confirm_payment', 'YES, i Complete my payment')->count();
        $notPayed= RegisterAttendee::where('confirm_payment', 'No, I will pay on arrival')->count();

        return view('analytics.analytics', compact('eacaCount','nonEacaCount','studentCount','payed','notPayed'));

    }
}
