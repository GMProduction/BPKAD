<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\PublicAgencyInformation;

class InformationController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.informasi.informasi');
    }

    public function periodic_information($slug)
    {
        $available_menu = [
            'informasi-tentang-profil-badan-publik'
        ];

        if (!in_array($slug, $available_menu)) {
            abort(404);
        }
        if ($this->request->method() === 'POST') {
            try {
                $data_request = [
                    'information' => $this->postField('information'),
                ];
                if ($this->postField('tr-konten') === 'tr-link') {
                    $data_request['type'] = 0;
                    $data_request['target'] = $this->postField('link');
                    PublicAgencyInformation::create($data_request);
                }
                return redirect()->back()->with('success', 'Berhasil Menambahkan Data...');
            } catch (\Exception $e) {
                return redirect()->back()->with('failed', 'Terjadi kesalahan server...');
            }
        }
        $data = PublicAgencyInformation::all();
        return view('admin.informasi.informasi-detail')->with(['data' => $data]);
    }

}
