<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\AssetSector;
use App\Models\BudgetSector;
use App\Models\FinancialSector;
use App\Models\HomeSetting;
use App\Models\SecretarialSector;
use App\Models\Sector;
use App\Models\SectorImage;
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
                    'history' => $this->postField('history'),
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
                $uuid_name    = $this->generateImageName('structure');
                $data_request = [
                    'vision'  => $this->postField('vision'),
                    'mission' => $this->postField('mission'),
                ];
                if ($uuid_name !== '') {
                    $image_name                = '/assets/structure/'.$uuid_name;
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
        if ($this->request->method() === 'POST') {
            $data_sector = Sector::find(request('id'));
            DB::beginTransaction();
            try {
                $data_request = [
                    'job'            => $this->postField('job'),
                    'sub_sector'     => $this->postField('sub_sector'),
                    'sub_sector_job' => $this->postField('sub_sector_job'),
                    'type'           => $this->postField('type'),
                ];
                if ($data_sector) {
                    $data_sector->update($data_request);
                } else {
                    Sector::create($data_request);
                }

                DB::commit();

                return redirect()->back()->with('success', 'berhasil merubah data...');
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()->back()->with('failed', 'gagal merubah data...');
            }
        }
        $sector                  = Sector::all();
        $data_secretarial_sector = null;
        $data_budget_sector      = null;
        $data_financial_sector   = null;
        $data_asset_sector       = null;
        foreach ($sector as $d) {
            if ($d->type == 'secretarial') {
                $data_secretarial_sector = $d;
            } elseif ($d->type == 'budget') {
                $data_budget_sector = $d;
            } elseif ($d->type == 'financial') {
                $data_financial_sector = $d;
            } else {
                $data_asset_sector = $d;
            }
        }

        return view('admin.customize.customize_bidang')->with(
            [
                'data_secretarial_sector' => $data_secretarial_sector,
                'data_budget_sector'      => $data_budget_sector,
                'data_financial_sector'   => $data_financial_sector,
                'data_asset_sector'       => $data_asset_sector,
            ]
        );
    }

    public function patch_image()
    {

        if (request()->method() == 'GET') {
            return $this->get_image();
        }
        try {
            if (request('action') == 2) {
                $this->deleteImg('SectorImage', request('id'), request('name'));
                $payload = [];

            } else {
                $uuid_name  = $this->generateImageName('file');
                $image_name = '/assets/sector/'.$uuid_name;
                $image      = $image_name;
                $this->uploadImage('file', $uuid_name, 'sectorImage');
                $res  = SectorImage::create(
                    [
                        'sector_id' => request('id'),
                        'image'     => $image,
                    ]
                );
                $data = [
                    'id'    => $res['id'],
                    'image' => $res['image'],
                    'size'  => number_format(floor(filesize(public_path($res['image']))) / 1025, 1, '.', '').' KB',
                ];
                $payload = $data;

            }
            $message = 'success';
            $code    = 200;
        } catch (\Exception $err) {
            $message = 'gagal '.$err;
            $payload = [];
            $code    = 500;
        }

        return $this->jsonResponse($message, $code, $payload);

    }

    public function get_image()
    {
        try {
            $type   = $this->request->get('type');
            $sector = Sector::where('type', $type)->first();
            $img    = null;
            if ($sector) {
                $img = SectorImage::where('sector_id', '=', $sector->id)->get();
            }
            $data = [];
            foreach ($img as $key => $im) {
                $data[$key] = [
                    'id'    => $im['id'],
                    'image' => $im['image'],
                    'size'  => filesize(public_path($im['image'])),
                ];
            }
            $payload = $data;
            $message = 'success';
            $code    = 200;
        } catch (\Exception $err) {
            $message = 'gagal '.$err;
            $payload = [];
            $code    = 500;
        }

        return $this->jsonResponse($message, $code, $payload);
    }
}
