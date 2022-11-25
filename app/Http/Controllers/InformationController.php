<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Category;
use App\Models\PublicAgencyInformation;

class InformationController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function periodic_information()
    {
        $data = Category::all();
        return view('info-berkala')->with(['data' => $data]);
    }

    public function periodic_information_by_slug($slug)
    {
        $category = Category::where('slug', '=', $slug)->firstOrFail();
        if ($category->id === 1) {
            $data = PublicAgencyInformation::all();
            return view('informasi')->with(['data' => $data, 'category' => $category]);
        }
        return abort(404);
    }
}
