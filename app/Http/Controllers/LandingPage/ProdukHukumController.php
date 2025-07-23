<?php


namespace App\Http\Controllers\LandingPage;


use App\Helper\CustomController;
use App\Models\MayorLawProduct;
use App\Models\RegionLawProduct;

class ProdukHukumController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function regionPage()
    {
        $regions = RegionLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('produkhukumperda')->with([
            'regions' => $regions,
        ]);
    }

    public function mayorPage()
    {
        $mayors = MayorLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('produkhukumperwali')->with([
            'mayors' => $mayors
        ]);
    }

    public function destroyPerda($id)
    {
        RegionLawProduct::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }

    public function destroyPerwali($id)
    {
        MayorLawProduct::findOrFail($id)->delete();
        return response()->json(['message' => 'Berhasil dihapus']);
    }
}
