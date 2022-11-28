<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\HomeSetting;
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
                    // dd($data_request);
                    HomeSetting::create($data_request);
                }


                DB::commit();


                return redirect()->back()->with('success', 'berhasil merubah data...');
            } catch (\Exception $e) {
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
}
