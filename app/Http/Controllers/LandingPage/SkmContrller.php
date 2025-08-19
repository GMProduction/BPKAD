<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class SkmContrller extends Controller
{
    public function index()
    {
        $latest = PublicService::orderBy('year', 'DESC')->first();

        $highlight = null;

        if ($latest) {
            // cek dari quarter terakhir (4 → 1)
            if ($latest->quarter_4) {
                $highlight = $latest->quarter_4;
            } elseif ($latest->quarter_3) {
                $highlight = $latest->quarter_3;
            } elseif ($latest->quarter_2) {
                $highlight = $latest->quarter_2;
            } elseif ($latest->quarter_1) {
                $highlight = $latest->quarter_1;
            }
        }

        $service = PublicService::orderBy('year', 'DESC')->get();

        return view('skm', [
            'data' => $service,
            'highlight' => $highlight,
            'latestYear' => $latest?->year,
        ]);
    }
}
