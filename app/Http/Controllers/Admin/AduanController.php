<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintCalculation;
use App\Models\PublicService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class AduanController extends CustomController
{
    public function index()
    {
        $data = Complaint::with([])
            ->orderBy('year', 'DESC')
            ->get();
        $dataCharts = ComplaintCalculation::with([])
            ->orderBy('year', 'DESC')
            ->get();
        if ($this->request->method() === 'POST') {
            return $this->store();
        }
        return view("admin.customize.customize_aduan")->with([
            'data' => $data,
            'dataCharts' => $dataCharts,
        ]);
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

    public function changeFile()
    {
        try {
            $id = $this->postField('id');
            $quarterName = $this->postField('name');

            $complaint = Complaint::with([])
                ->where('id', '=', $id)
                ->first();
            if ($complaint) {
                if ($this->request->hasFile('file')) {
                    $file = $this->request->file('file');
                    $extension = $file->getClientOriginalExtension();
                    $document = Uuid::uuid4()->toString() . '.' . $extension;
                    $storage_path = public_path('assets/complaint');
                    $documentName = $storage_path . '/' . $document;

                    $fieldName = 'quarter_' . $quarterName;
                    $data_request[$fieldName] = '/assets/complaint/' . $document;
                    $file->move($storage_path, $documentName);

                    $complaint->update($data_request);
                }
            } else {
                return redirect()->back()->with('failed', 'Data tidak ditemukan...');
            }
            return redirect()->back()->with('success', 'Berhasil menyimpan data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'internal server error...');
        }
    }

    public function dropFile($id, $quarter)
    {
        try {
            $complaint = Complaint::with([])
                ->where('id', '=', $id)
                ->first();
            if (!$complaint) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                    'data' => null
                ], 404);
            }
            $fieldName = 'quarter_' . $quarter;
            $data_request[$fieldName] = null;
            $complaint->update($data_request);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus file',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'internal server error',
                'data' => null
            ], 500);
        }
    }

    public function dropYear($id)
    {
        try {
            Complaint::destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus file',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'internal server error',
                'data' => null
            ], 500);
        }
    }

    public function chart()
    {
        try {
            $data_request = [
                'year' => $this->postField('year'),
            ];
            ComplaintCalculation::create($data_request);
            return redirect()->back()->with('success', 'Berhasil menyimpan data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'internal server error...');
        }
    }

    public function changeChart($id, $field)
    {
        try {
            $value = $this->postField('value');
            $complaintCalculation = ComplaintCalculation::with([])
                ->where('id', '=', $id)
                ->first();
            if ($complaintCalculation) {
                $data_request[$field] = $value;
                $complaintCalculation->update($data_request);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data tidak ditemukan',
                    'data' => null
                ], 404);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil merubah data...',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'internal server error',
                'data' => null
            ], 500);
        }
    }

    function dropChart($id)
    {
        try {
            ComplaintCalculation::destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus file',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'internal server error',
                'data' => null
            ], 500);
        }
    }
}
