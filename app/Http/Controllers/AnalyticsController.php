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

        return view('analytics.analytics', compact('eacaCount','nonEacaCount','studentCount'));

    }
}
