<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\AssetSector;
use App\Models\BudgetSector;
use App\Models\FinancialSector;
use App\Models\HomeSetting;
use App\Models\SecretarialSector;
use App\Models\VisionSettings;
use Illuminate\Support\Facades\DB;

class CustomizeController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $data = HomeSetting::first();
        if ($this->request->method() === 'POST') {
            DB::beginTransaction();
            try {
                $data_request = [
                    'history' => $this->postField('history')
                ];


                if ($data) {
                    $data->update($data_request);
                } else {
                    HomeSetting::create($data_request);
                }
                DB::commit();
                return redirect()->back()->with('success', 'berhasil merubah data...');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('failed', 'gagal merubah data...');
            }
        }
        return view('admin.customize.customize_beranda')->with(['data' => $data]);
    }

    public function profile()
    {
        $data = VisionSettings::first();
        if ($this->request->method() === 'POST') {
            DB::beginTransaction();
            try {
                $uuid_name = $this->generateImageName('structure');
                $data_request = [
                    'vision' => $this->postField('vision'),
                    'mission' => $this->postField('mission'),
                ];
                if ($uuid_name !== '') {
                    $image_name = '/assets/structure/' . $uuid_name;
                    $data_request['structure'] = $image_name;
                    $this->uploadImage('structure', $uuid_name, 'structureImage');
                }
                if ($data) {
                    $data->update($data_request);
                } else {
                    VisionSettings::create($data_request);
                }
                DB::commit();
                return redirect()->back()->with('success', 'berhasil merubah data...');
            } catch (\Exception $e) {
                return redirect()->back()->with('failed', $e->getMessage());
            }
        }
        return view('admin.customize.customize_profil')->with(['data' => $data]);
    }

    public function bidang()
    {
        $data_secretarial_sector = SecretarialSector::first();
        $data_budget_sector = BudgetSector::first();
        $data_financial_sector = FinancialSector::first();
        $data_asset_sector = AssetSector::first();
        if ($this->request->method() === 'POST') {
            DB::beginTransaction();
            try {
                if ($this->postField('type') === 'secretarial') {
                    $data_request = [
                        'job' => $this->postField('job'),
                        'sub_sector' => $this->postField('sub_sector'),
                        'sub_sector_job' => $this->postField('sub_sector_job'),
                    ];
                    if ($data_secretarial_sector) {
                        $data_secretarial_sector->update($data_request);
                    } else {
                        SecretarialSector::create($data_request);
                    }
                }

                if ($this->postField('type') === 'budget') {
                    $data_request = [
                        'job' => $this->postField('job'),
                        'sub_sector' => $this->postField('sub_sector'),
                        'sub_sector_job' => $this->postField('sub_sector_job'),
                    ];
                    if ($data_budget_sector) {
                        $data_budget_sector->update($data_request);
                    } else {
                        BudgetSector::create($data_request);
                    }
                }

                if ($this->postField('type') === 'financial') {
                    $data_request = [
                        'job' => $this->postField('job'),
                        'sub_sector' => $this->postField('sub_sector'),
                        'sub_sector_job' => $this->postField('sub_sector_job'),
                    ];
                    if ($data_financial_sector) {
                        $data_financial_sector->update($data_request);
                    } else {
                        FinancialSector::create($data_request);
                    }
                }

                if ($this->postField('type') === 'asset') {
                    $data_request = [
                        'job' => $this->postField('job'),
                        'sub_sector' => $this->postField('sub_sector'),
                        'sub_sector_job' => $this->postField('sub_sector_job'),
                    ];
                    if ($data_asset_sector) {
                        $data_asset_sector->update($data_request);
                    } else {
                        AssetSector::create($data_request);
                    }
                }
                DB::commit();
                return redirect()->back()->with('success', 'berhasil merubah data...');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('failed', 'gagal merubah data...');
            }
        }
        return view('admin.customize.customize_bidang')->with([
            'data_secretarial_sector' => $data_secretarial_sector,
            'data_budget_sector' => $data_budget_sector,
            'data_financial_sector' => $data_financial_sector,
            'data_asset_sector' => $data_asset_sector,
        ]);
    }
}
