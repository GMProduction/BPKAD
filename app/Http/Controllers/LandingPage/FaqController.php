<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PublicService;

class FaqController extends Controller
{
    public function index()
    {
        $data = Faq::all();
        return view('faq', ['data' => $data]);
    }
}
