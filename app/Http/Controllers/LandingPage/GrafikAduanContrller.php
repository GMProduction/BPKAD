<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class GrafikAduanContrller extends Controller
{
    public function index()
    {
        $service = PublicService::orderBy('year', 'DESC')->get();
        return view('grafikAduan', ['data' => $service]);
    }
}
