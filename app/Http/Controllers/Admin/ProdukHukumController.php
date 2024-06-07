<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\MayorLawProduct;
use App\Models\PublicService;
use App\Models\RegionLawProduct;
use Yajra\DataTables\DataTables;
use Illuminate\Filesystem\chmod;

class ProdukHukumController extends CustomController
{

    public function index()
    {
        $regions = RegionLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        $mayors = MayorLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.customize.produkhukum');
    }
}
