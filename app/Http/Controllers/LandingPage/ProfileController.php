<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\VisionSettings;

class ProfileController extends Controller
{
    public function json_data(){
       return VisionSettings::first();

    }
    public function vision(){
        return view('visimisi',['data' => $this->json_data()]);
    }

    public function structure(){
        return view('struktur',['data' => $this->json_data()]);
    }

}
