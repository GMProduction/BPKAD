<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicService;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.customize.customize_faq');
    }
}
