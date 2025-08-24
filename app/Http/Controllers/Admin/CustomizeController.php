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
use Illuminate\Filesystem\chmod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

                return redirect()->back()->with('failed', "gagal merubah data...");
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
                    'motto'   => $this->postField('motto'),
                    'url'     => $this->postField('url'),
                ];
                if ($uuid_name !== '') {
                    $image_name                = '/assets/structure/' . $uuid_name;
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
        $data_uptd_sector       = null;
        foreach ($sector as $d) {
            if ($d->type == 'secretarial') {
                $data_secretarial_sector = $d;
            } elseif ($d->type == 'budget') {
                $data_budget_sector = $d;
            } elseif ($d->type == 'financial') {
                $data_financial_sector = $d;
            } elseif ($d->type == 'asset') {
                $data_asset_sector = $d;
            } else {
                $data_uptd_sector = $d;
            }
        }

        return view('admin.customize.customize_bidang')->with(
            [
                'data_secretarial_sector' => $data_secretarial_sector,
                'data_budget_sector'      => $data_budget_sector,
                'data_financial_sector'   => $data_financial_sector,
                'data_asset_sector'       => $data_asset_sector,
                'data_uptd_sector'       => $data_uptd_sector,
            ]
        );
    }

    public function patch_image(Request $request)
    {
        Log::info('MASUK DI PATCH IMAGE');

        if (request()->method() == 'GET') {
            return $this->get_image();
        }

        // Tangani hapus gambar
        if ($request->action == 2) {
            $image = SectorImage::find($request->id);
            if (!$image) {
                Log::warning('Gambar tidak ditemukan dengan ID: ' . $request->id);
                return response()->json([
                    'status' => 404,
                    'message' => 'Gambar tidak ditemukan',
                ]);
            }

            // Hapus file dari sistem
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
                Log::info('File dihapus: ' . $image->image);
            } else {
                Log::warning('File tidak ditemukan di path: ' . public_path($image->image));
            }

            // Hapus data dari database
            $image->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Gambar berhasil dihapus',
            ]);
        }

        // Tangani upload gambar
        $sector = Sector::where('type', $request->type)->first();
        if (!$sector) {
            Log::info('cARI sECTOR');
            Log::info('TYPE', ['type' => $request->type]);
            Log::info('sector', ['sector' => $sector]);
            return response()->json([
                'status' => 400,
                'message' => 'Sector tidak ditemukan untuk type: ' . $request->type,
                'payload' => []
            ]);
        }

        Log::info('image ' . $request->image);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/sector'), $filename);

            Log::info('file' . $file);
            Log::info('filename' . $filename);
            $image = new SectorImage();
            $image->sector_id = $sector->id;
            $image->image = 'assets/sector/' . $filename;
            $image->save();

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'payload' => [
                    'id' => $image->id,
                    'image' => asset($image->image),
                    'size' => filesize(public_path('assets/sector/' . $filename)),
                ]
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'File not found',
            'payload' => []
        ]);
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
                $filePath = public_path($im['image']);

                if (!file_exists($filePath)) {
                    continue; // atau bisa dilewatkan
                }

                $data[$key] = [
                    'id'    => $im['id'],
                    'image' => asset($im['image']),
                    'size'  => filesize($filePath),
                ];
            }
            $payload = $data;
            $message = 'success';
            $code    = 200;
        } catch (\Exception $err) {
            $message = 'gagal ' . $err;
            $payload = [];
            $code    = 500;
        }

        return $this->jsonResponse($message, $code, $payload);
    }
}
