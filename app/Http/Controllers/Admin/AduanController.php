<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\PublicService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AduanController extends CustomController
{
    public function index()
    {
        return view("admin.customize.customize_aduan");
    }
    public function getData()
    {
    }

    public function saveYear()
    {
    }

    public function deleteData()
    {
    }
}
