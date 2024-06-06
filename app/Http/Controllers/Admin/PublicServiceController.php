<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\PublicService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Filesystem\chmod;

class PublicServiceController extends CustomController
{
    public function getData()
    {
        if (request()->method() == 'POST') {
            return $this->saveYear();
        }

        return PublicService::orderBy('year', 'DESC')->get();
    }

    public function saveYear()
    {
        request()->validate([
            'year' => 'required|unique:public_services',
        ], [
            'year.required' => 'Tahun harus di isi',
            'year.unique'   => 'Tahun sudah ada',
        ]);

        PublicService::create([
            'year' => request('year'),
        ]);

        return 'success';
    }

    public function saveFile()
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make(request()->all(), [
                'file' => 'required|max:2000',
            ], [
                'file.required' => 'Tahun harus di isi',
                'file.max'      => 'Ukuran maksimal file 2Mb',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 422);
            }
            $name          = request('name');
            $publicService = PublicService::find(request('id'));
            if ($publicService[$name]) {
                if (file_exists(public_path() . $publicService[$name])) {
                    if ($publicService[$name]) {
                        unlink(public_path() . $publicService[$name]);
                    }
                }
            }
            $uuid_name   = $this->generateImageName('file');
            $image_name  = '/assets/public-service/' . $uuid_name;
            $form[$name] = $image_name;
            $this->uploadImage('file', $uuid_name, 'publicService');
            $publicService->update($form);
            DB::commit();

            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }

    public function deleteData()
    {
        DB::beginTransaction();
        try {
            $name          = request('name');
            $id            = request('id');
            $publicService = PublicService::find($id);

            if ($name) {
                if ($publicService[$name]) {
                    if (file_exists(public_path() . $publicService[$name])) {
                        if ($publicService[$name]) {
                            unlink(public_path() . $publicService[$name]);
                        }
                    }
                }
                $form[$name] = null;
                $publicService->update($form);
            } else {
                if ($publicService['quarter_1']) {
                    if (file_exists(public_path() . $publicService['quarter_1'])) {
                        if ($publicService['quarter_1']) {
                            unlink(public_path() . $publicService['quarter_1']);
                        }
                    }
                }
                if ($publicService['quarter_2']) {
                    if (file_exists(public_path() . $publicService['quarter_2'])) {
                        if ($publicService['quarter_2']) {
                            unlink(public_path() . $publicService['quarter_2']);
                        }
                    }
                }
                if ($publicService['quarter_3']) {
                    if (file_exists(public_path() . $publicService['quarter_3'])) {
                        if ($publicService['quarter_3']) {
                            unlink(public_path() . $publicService['quarter_3']);
                        }
                    }
                }
                if ($publicService['quarter_4']) {
                    if (file_exists(public_path() . $publicService['quarter_4'])) {
                        if ($publicService['quarter_4']) {
                            unlink(public_path() . $publicService['quarter_4']);
                        }
                    }
                }

                PublicService::destroy($id);
            }
            DB::commit();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
