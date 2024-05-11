<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;
use App\Models\Service;

class InfoLayananController extends Controller
{
    public function index()
    {
//        $service = PublicService::orderBy('year', 'DESC')->get();
        $layanan  = Service::where('service_type', '=', 5)->first();

        return view('informasilayanan', ['data' => $layanan]);
    }
}
