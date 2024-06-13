<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\MayorLawProduct;
use App\Models\PublicService;
use App\Models\RegionLawProduct;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\DataTables;
use Illuminate\Filesystem\chmod;

class ProdukHukumController extends CustomController
{

    public function index()
    {
        if ($this->request->method() === 'POST') {
            return $this->store();
        }
        $regions = RegionLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        $mayors = MayorLawProduct::with([])
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.customize.produkhukum')->with([
            'regions' => $regions,
            'mayors' => $mayors
        ]);
    }

    private function store()
    {
        try {
            $type = $this->request->request->get('type');
            $name = $this->request->request->get('name');
            $contentType = $this->request->request->get('tr-konten');
            $contentTypeValue = 1;
            $link = '';

            if ($type === 'region') {
                if ($contentType === 'tr-link') {
                    $link = $this->request->request->get('url');
                }

                if ($contentType === 'tr-file') {
                    $contentTypeValue = 2;
                    $link = $this->request->request->get('file');
                    if ($this->request->hasFile('file')) {
                        $file = $this->request->file('file');
                        $extension = $file->getClientOriginalExtension();
                        $document = Uuid::uuid4()->toString() . '.' . $extension;
                        $storage_path = public_path('assets/region-law');
                        $documentName = $storage_path . '/' . $document;

                        $link = '/assets/region-law/' . $document;
                        $file->move($storage_path, $documentName);
                    }
                }
                $data = [
                    'name' => $name,
                    'link' => $link,
                    'type' => $contentTypeValue
                ];
                RegionLawProduct::create($data);
            }

            if ($type === 'mayor') {
                if ($contentType === 'tr-linkperwali') {
                    $link = $this->request->request->get('url');
                }

                if ($contentType === 'tr-fileperwali') {
                    $contentTypeValue = 2;
                    $link = $this->request->request->get('file');
                    if ($this->request->hasFile('file')) {
                        $file = $this->request->file('file');
                        $extension = $file->getClientOriginalExtension();
                        $document = Uuid::uuid4()->toString() . '.' . $extension;
                        $storage_path = public_path('assets/mayor-law');
                        $documentName = $storage_path . '/' . $document;

                        $link = '/assets/mayor-law/' . $document;
                        $file->move($storage_path, $documentName);
                    }
                }

                $data = [
                    'name' => $name,
                    'link' => $link,
                    'type' => $contentTypeValue
                ];
                MayorLawProduct::create($data);
            }
            return redirect()->back()->with('success', 'Berhasil menambahkan data...');
        }catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('failed', 'terjadi kesalahan server...');
        }
    }
}
