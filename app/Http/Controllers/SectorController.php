<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\AssetSector;
use App\Models\BudgetSector;
use App\Models\FinancialSector;
use App\Models\SecretarialSector;
use App\Models\UPTDSector;

class SectorController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function secretarial()
    {
        $data = SecretarialSector::first();
        return view('sekretariat')->with(['data' => $data]);
    }

    public function budget()
    {
        $data = BudgetSector::first();
        return view('anggaran')->with(['data' => $data]);
    }

    public function financial()
    {
        $data = FinancialSector::first();
        return view('perbendaharaan')->with(['data' => $data]);
    }

    public function asset()
    {
        $data = AssetSector::first();
        return view('aset')->with(['data' => $data]);
    }

    public function uptd()
    {
        $data = UPTDSector::first();
        return view('uptd')->with(['data' => $data]);
    }
}
