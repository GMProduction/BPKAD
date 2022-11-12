<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\HomeSetting;
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
                $uuid_name = $this->generateImageName('image');
                $data_request = [
                    'history' => $this->postField('history')
                ];
                if ($uuid_name !== '') {
                    $image_name = '/assets/home/' . $uuid_name;
                    $data_request['image'] = $image_name;
                    $this->uploadImage('image', $image_name, 'homeImage');
                }
                if ($data) {
                    $data->update($data_request);
                } else {
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
}
