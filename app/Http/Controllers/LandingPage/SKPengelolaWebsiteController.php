<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class SKPengelolaWebsiteController extends Controller
{
    public function index()
    {
        return view('skpengelolaanweb');
    }
}
