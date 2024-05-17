<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\PublicService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AduanController extends CustomController
{
    public function index()
    {
        $data = Complaint::with([])
            ->orderBy('year', 'DESC')
            ->get();
        if ($this->request->method() === 'POST') {
            return $this->store();
        }
        return view("admin.customize.customize_aduan")->with(['data' => $data]);
    }

    private function store()
    {
        try {
            $data_request = [
                'year' => $this->postField('year')
            ];
            Complaint::create($data_request);
            return redirect()->back()->with('success', 'Berhasil menyimpan data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'internal server error...');
        }
    }

    public function getData()
    {
    }

    public function saveYear()
    {
    }

    public function deleteData()
    {
    }
}
