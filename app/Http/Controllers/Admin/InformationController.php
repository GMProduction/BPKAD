<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\ProgramActivity;
use App\Models\ProgramActivityDetail;
use App\Models\PublicAgencyInformation;
use Illuminate\Support\Facades\Validator;

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
            'informasi-tentang-profil-badan-publik',
            'ringkasan-program-dan-kegiatan-yang-sedang-dijalankan'
        ];

        if (!in_array($slug, $available_menu)) {
            abort(404);
        }

        if ($slug === $available_menu[0]) {
            if ($this->request->method() === 'POST') {
                try {
                    $data_request = [
                        'information' => $this->postField('information'),
                    ];
                    if ($this->postField('tr-konten') === 'tr-link') {
                        $validator = Validator::make($this->request->all(), [
                            'link' => 'required|url'
                        ], [
                            'link.url' => 'kolom link harus berupa url website sertakan http:// atau https://'
                        ]);
                        if ($validator->fails()) {
                            return redirect()->back()->withErrors($validator->errors());
                        }
                        $data_request['type'] = 0;
                        $data_request['target'] = $this->postField('link');
                    } else {
                        $data_request['type'] = 1;
                        $uuid_name = $this->generateImageName('file');
                        if ($uuid_name !== '') {
                            $file_name = '/assets/structure/' . $uuid_name;
                            $data_request['target'] = $file_name;
                            $this->uploadImage('file', $uuid_name, 'publicAgency');
                        }
                    }
                    PublicAgencyInformation::create($data_request);
                    return redirect()->back()->with('success', 'Berhasil Menambahkan Data...');
                } catch (\Exception $e) {
                    return redirect()->back()->with('failed', 'Terjadi kesalahan server...');
                }
            }
            $data = PublicAgencyInformation::all();
            return view('admin.informasi.informasi-detail')->with(['data' => $data, 'slug' => $slug]);
        } else {
            $title = '-';
            $categories = [];
            $data = [];
            switch ($slug) {
                case $available_menu[1]:
                    $title = 'RINGKASAN PROGRAM DAN KEGIATAN YANG SEDANG DIJALANKAN';
                    $data = ProgramActivityDetail::with(['program_activity'])->orderBy('year', 'DESC')->get();
                    $categories = ProgramActivity::all();
                    break;
                default:
                    break;
            }
            return view('admin.informasi.informasi-detail-byyear')->with([
                'title' => $title,
                'data' => $data,
                'categories' => $categories
            ]);
        }
    }

    public function periodic_information_patch($id)
    {
        try {

        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan server...');
        }
    }

}
