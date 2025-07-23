<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Filesystem\chmod;
use Illuminate\Http\Request;

class CustomizeServiceController extends CustomController
{

    public function index()
    {
        if (request()->isMethod('POST')) {
            return $this->saveData();
        }
        $berkala = Service::where('service_type', '=', 1)->first();
        $setiap  = Service::where('service_type', '=', 3)->first();
        $layanan  = Service::where('service_type', '=', 5)->first();

        return view('admin/customize/customize_layanan', ['berkala' => $berkala, 'setiap' => $setiap, 'layanan' => $layanan]);
    }

    public function saveData()
    {
        $type = 'setiapsaat';
        if (request('service_type') == 1) {
            $type = 'berkala';
        } elseif (request('service_type') == 2) {
            $type = 'sertamerta';
        }

        try {

            if (request('service_type') == 2) {
                request()->validate(
                    [
                        'sector' => 'required',
                    ],
                    [
                        'sector.required' => 'Nama sector harus di isi',
                    ]
                );
                $field = [
                    'sector'       => request('sector'),
                    'type_file'    => request('type_file'),
                    'service_type' => request('service_type'),
                    'url'          => request('url'),
                ];
            } else {
                $field = [
                    'type_file'    => request('type_file'),
                    'service_type' => request('service_type'),
                    'url'          => request('url'),
                ];
            }

            if (request('type_file') == 1) {
                request()->validate(
                    [
                        'url' => 'required|max:2000',
                    ],
                    [
                        'url.required' => 'File harus di isi',
                        'url.max'      => 'Ukuran file tidak boleh lebih dari 2Mb',
                    ]
                );

                $uuid_name    = $this->generateImageName('url');
                $image_name   = '/assets/service/' . $uuid_name;
                $field['url'] = $image_name;
                $this->uploadImage('url', $uuid_name, 'serviceImage');
            } else {
                request()->validate(
                    [
                        'url' => 'required',
                    ],
                    [
                        'url.required' => 'Link url harus di isi',
                    ]
                );
            }

            $service = Service::find(request('id'));
            if ($service) {
                if (request('type_file') == 1) {
                    if (file_exists(public_path() . $service->url)) {
                        if ($service->url) {
                            unlink(public_path() . $service->url);
                        }
                    }
                }
                $service->update($field);
            } else {
                $service = new Service();
                $service->create($field);
            }

            return redirect()->back()->with('success', 'berhasil merubah data...')->with('type', $type);
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'gagal merubah data...' . $e->getMessage())->with('type', $type);
        }
    }

    public function dataTable()
    {
        $data = Service::where('service_type', 2);

        return DataTables::of($data)->addColumn('action', function ($data) {
            // array data baris
            $payload = [
                'id'          => $data->id,
                'sector'      => $data->sector,
                'typeFile'    => $data->type_file,
                'url'         => $data->url,
                'serviceType' => $data->service_type,
            ];

            // encode ke JSON dan amankan petiknya
            $json = htmlspecialchars(json_encode($payload), ENT_QUOTES, 'UTF-8');

            return '
        <div class="actionButtonContainer">
            <a role="button" onclick="openEdit(' . $json . ')" class="editbutton">Ubah</a>
            <a role="button" onclick="deleteData(' . $data->id . ')" data-id="' . $data->id . '" class="deletebutton">Hapus</a>
        </div>';
        })->make(true);
    }

    public function deleteData(Request $request)
    {

        try {
            $service = Service::find($request->id);
            $service->delete();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
