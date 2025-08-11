<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use Carbon\Carbon;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $today = Carbon::today()->toDateString();
        $ip = $request->ip();

        // Cek apakah IP hari ini sudah tercatat
        $existingVisit = Visit::where('ip_address', $ip)
            ->where('visit_date', $today)
            ->first();

        if (!$existingVisit) {
            Visit::create([
                'ip_address' => $ip,
                'visit_date' => $today,
            ]);
        }

        return response()->json(['message' => 'Visit recorded.']);
    }
}
