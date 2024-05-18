<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\PublicService;

class SkAduanController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with([])->orderBy('year', 'DESC')->get();
        return view('skaduan', ['data' => $complaints]);
    }
}
