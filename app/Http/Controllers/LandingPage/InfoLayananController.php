<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class InfoLayananController extends Controller
{
    public function index()
    {
        $service = PublicService::orderBy('year', 'DESC')->get();
        return view('informasilayanan', ['data' => $service]);
    }
}
