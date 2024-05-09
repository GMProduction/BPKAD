<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class FaqController extends Controller
{
    public function index()
    {
        return view('faq');
    }
}
