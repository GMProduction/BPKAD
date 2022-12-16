<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\OnlineApplication;
use Yajra\DataTables\DataTables;

class OnlineApplicationController extends CustomController
{
    public function datatable()
    {
        $data = OnlineApplication::query();

        return DataTables::of($data)->addColumn(
            'action',
            function ($data) {
                return '<div class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="'.route('customize.aplikasi.online.form', ['q' => $data->id]).'" data-modal-toggle="modalEdit"
                                    class="font-medium text-blue-600  button-link bg-blue-100">Ubah</a>

                                    <a href="#" data-modal-toggle="modalEdit"
                                    class="font-medium text-red-700  button-link bg-red-100">Hapus</a>
                            </div>';
            }
        )->make(true);
    }

    public function index()
    {
        $data = OnlineApplication::all();

        return view('admin.customize.customize_aplikasi_online')->with(['data' => $data]);
    }

    public function form()
    {
        $data = OnlineApplication::find($this->request->get('q'));
        if ($this->request->method() == 'POST') {
            return $this->patch_data($data);
        }

        return view('admin.customize.customize_aplikasi_online_form')->with(['data' => $data]);
    }

    public function patch_data($data)
    {

        $field = $this->request->validate(
            [
                'name'              => 'required',
                'short_description' => 'required',
                'description'       => 'required',
                'icon'              => 'max:2000',
                'url'               => 'required',
            ]
        );

        $uuid_name = $this->generateImageName('icon');
        if ($uuid_name !== '') {
            $image_name     = '/assets/application/'.$uuid_name;
            $field['image'] = $image_name;
            $this->uploadImage('icon', $uuid_name, 'applicationImage');
        }
        if ($data) {
            $data->update($field);
            $message = 'merubah';
        } else {
            $data = new OnlineApplication();
            $data->create($field);
            $message = 'menambah';
        }

        return redirect()->back()->with('success', "berhasil $message data...");

    }

}
