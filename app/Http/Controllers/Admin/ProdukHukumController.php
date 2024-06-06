<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PublicService;
use Yajra\DataTables\DataTables;
use Illuminate\Filesystem\chmod;

class ProdukHukumController extends CustomController
{

    public function index()
    {

        return view('admin.customize.produkhukum');
    }
}
