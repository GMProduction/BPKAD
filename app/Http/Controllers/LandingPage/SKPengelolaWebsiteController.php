<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class SKPengelolaWebsiteController extends Controller
{
    public function index()
    {
        $profile = new ProfileController();
        $data    = $profile->json_data();

        return view('skpengelolaanweb', ['data' => $data]);
    }
}
