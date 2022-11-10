<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\Aspiration;

class AspirationController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Aspiration::orderBy('date', 'ASC')->orderBy('is_send', 'ASC')->get();
        return view('admin.aspirasi.aspirasi')->with(['data' => $data]);
    }
}
