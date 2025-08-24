<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Sector;
use App\Models\UPTDSector;

class SectorController
{
    public function sekretariat()
    {
        $sector = Sector::with('images')->where('type', '=', 'secretarial')->first();

        return view('sekretariat')->with(['data' => $sector]);
    }

    public function anggaran()
    {
        $sector = Sector::where('type', '=', 'budget')->first();
        return view('anggaran')->with(['data' => $sector]);
    }

    public function perbendaharaan()
    {
        $sector = Sector::where('type', '=', 'financial')->first();
        return view('perbendaharaan')->with(['data' => $sector]);
    }

    public function aset()
    {
        $sector = Sector::where('type', '=', 'asset')->first();
        return view('aset')->with(['data' => $sector]);
    }

    public function uptd()
    {
        $sector = Sector::where('type', '=', 'uptd')->first();
        return view('uptd')->with(['data' => $sector]);
    }
}
