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
                $id = $data->id;
                return '<div class="container-button-action ">
                                <a href="' . route('customize.aplikasi.online.form', ['q' => $data->id]) . '" data-modal-toggle="modalEdit"
                                    class="button-action  is-blue">Ubah</a>

                                    <a href="#" id="deleteData" data-id="' . $id . '"
                                    class="button-action  is-red">Hapus</a>
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
            $image_name     = '/assets/application/' . $uuid_name;
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

    public function destroy(OnlineApplication $apps)
    {
        try {
            $this->deleteImg('OnlineApplication', $apps->id, $apps->image);
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
