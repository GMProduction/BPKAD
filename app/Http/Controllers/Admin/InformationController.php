<?php


namespace App\Http\Controllers\Admin;


use App\Helper\CustomController;
use App\Models\Category;
use App\Models\InformationCategory;
use App\Models\InformationDetail;
use App\Models\ProgramActivity;
use App\Models\ProgramActivityDetail;
use App\Models\PublicAgencyInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InformationController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data_berkala = Category::where('type', '=', 0)->get();

        //informasi serta merta
        $categories_serta_merta = InformationCategory::with('category')
            ->whereHas('category', function ($q) {
                return $q->where('slug', '=', 'informasi-serta-merta');
            })->get();
        $data_serta_merta = InformationDetail::with(['information_category'])
            ->whereHas('information_category', function ($q) {
                return $q->with('category')->whereHas('category', function ($q2) {
                    return $q2->where('slug', '=', 'informasi-serta-merta');
                });
            })
            ->get();

        //informasi setiap saat
        $categories_setiap_saat = InformationCategory::with('category')
            ->whereHas('category', function ($q) {
                return $q->where('slug', '=', 'informasi-setiap-saat');
            })->get();
        $data_setiap_saat = InformationDetail::with(['information_category'])
            ->whereHas('information_category', function ($q) {
                return $q->with('category')->whereHas('category', function ($q2) {
                    return $q2->where('slug', '=', 'informasi-setiap-saat');
                });
            })
            ->get();

        //informasi dikecualikan
        $categories_dikecualikan = InformationCategory::with('category')
            ->whereHas('category', function ($q) {
                return $q->where('slug', '=', 'informasi-di-kecualikan');
            })->get();
        $data_dikecualikan = InformationDetail::with(['information_category'])
            ->whereHas('information_category', function ($q) {
                return $q->with('category')->whereHas('category', function ($q2) {
                    return $q2->where('slug', '=', 'informasi-di-kecualikan');
                });
            })
            ->get();
        return view('admin.informasi.informasi')->with([
            'data_berkala' => $data_berkala,
            'categories_serta_merta' => $categories_serta_merta,
            'categories_setiap_saat' => $categories_setiap_saat,
            'categories_dikecualikan' => $categories_dikecualikan,
            'data_serta_merta' => $data_serta_merta,
            'data_setiap_saat' => $data_setiap_saat,
            'data_dikecualikan' => $data_dikecualikan,
        ]);
    }

    public function add_information_category($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                return $this->jsonResponse('kategori tidak ditemukan...', 500);
            }
            $data = [
                'category_id' => $category->id,
                'name' => $this->postField('information_category_name')
            ];
            InformationCategory::create($data);

            $information_categories = InformationCategory::where('category_id', '=', $category->id)->get();
            return $this->jsonResponse('success', 200, $information_categories);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }

    public function periodic_information($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        if (!$category) {
            abort(404);
        }
        $category_id = $category->id;
        if ($category_id === 1) {
            if ($this->request->method() === 'POST') {
                return $this->post_public_information();
            }
            $data = PublicAgencyInformation::all();
            return view('admin.informasi.informasi-detail')->with(['data' => $data, 'slug' => $slug]);
        } else {
            if ($this->request->method() === 'POST') {
                return $this->post_information();
            }
            $data = InformationDetail::with(['information_category'])
                ->whereHas('information_category', function ($q) use ($category_id) {
                    $q->where('category_id', '=', $category_id);
                })->orderBy('year', 'DESC')
                ->get();
            $information_categories = InformationCategory::where('category_id', '=', $category_id)->get();
            return view('admin.informasi.informasi-detail-byyear')->with([
                'category' => $category,
                'data' => $data,
                'information_categories' => $information_categories
            ]);
        }
    }

    private function post_public_information()
    {
        try {
            $data_request = [
                'information' => $this->postField('information'),
            ];

            if ($this->postField('tr-konten') === 'link') {
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
                //                $validator = Validator::make($this->request->all(), [
                //                    'file' => 'max:2000'
                //                ], [
                //                    'file.max' => 'Ukuran file tidak boleh lebih dari 2Mb'
                //                ]);
                //                if ($validator->fails()) {
                //                    return redirect()->back()->withErrors($validator->errors());
                //                }
                $data_request['type'] = 1;
                $uuid_name = $this->generateImageName('file');
                if ($uuid_name !== '') {
                    $file_name = '/assets/information/' . $uuid_name;
                    $data_request['target'] = $file_name;
                    $this->uploadImage('file', $uuid_name, 'publicInformation');
                }
            }
            PublicAgencyInformation::create($data_request);
            return redirect()->back()->with('success', 'Berhasil Menambahkan Data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan server... ' . $e->getMessage());
        }
    }

    private function post_information()
    {
        try {
            $data_request = [
                'information_category_id' => $this->postField('category'),
                'year' => $this->postField('year')
            ];
            if ($this->postField('tr-konten') === 'link') {
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
                //                $validator = Validator::make($this->request->all(), [
                //                    'file' => 'max:2000'
                //                ], [
                //                    'file.max' => 'Ukuran file tidak boleh lebih dari 2Mb'
                //                ]);
                //                if ($validator->fails()) {
                //                    return redirect()->back()->withErrors($validator->errors());
                //                }
                $data_request['type'] = 1;
                $uuid_name = $this->generateImageName('file');
                if ($uuid_name !== '') {
                    $file_name = '/assets/information/' . $uuid_name;
                    $data_request['target'] = $file_name;
                    $this->uploadImage('file', $uuid_name, 'publicInformation');
                }
            }
            InformationDetail::create($data_request);
            return redirect()->back()->with('success', 'Berhasil Menambahkan Data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan server...3');
        }
    }

    public function public_information_patch()
    {
        try {
            $data = PublicAgencyInformation::findOrFail($this->postField('id'));
            $data_request = [
                'information' => $this->postField('information-edit'),
            ];
            if ($this->postField('er-konten') === 'er-link') {
                $validator = Validator::make($this->request->all(), [
                    'e-link-edit' => 'required|url'
                ], [
                    'e-link-edit.url' => 'kolom link harus berupa url website sertakan http:// atau https://'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }
                $data_request['type'] = 0;
                $data_request['target'] = $this->postField('e-link-edit');
            } else {
                //                $validator = Validator::make($this->request->all(), [
                //                    'file-edit' => 'max:2000'
                //                ], [
                //                    'file-edit.max' => 'Ukuran file tidak boleh lebih dari 2Mb'
                //                ]);
                //                if ($validator->fails()) {
                //                    return redirect()->back()->withErrors($validator->errors());
                //                }

                $data_request['type'] = 1;
                $uuid_name = $this->generateImageName('file-edit');
                if ($uuid_name !== '') {
                    $file_name = '/assets/information/' . $uuid_name;
                    $data_request['target'] = $file_name;
                    $this->uploadImage('file-edit', $uuid_name, 'publicInformation');
                }
            }
            $data->update($data_request);
            return redirect()->back()->with('success', 'Berhasil merubah data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan server...');
        }
    }

    public function information_patch()
    {
        try {
            $data = InformationDetail::findOrFail($this->postField('id'));
            $data_request = [
                'information_category_id' => $this->postField('category_edit'),
                'year' => $this->postField('year_edit'),
            ];
            if ($this->postField('er-konten') === 'er-link') {
                $validator = Validator::make($this->request->all(), [
                    'e-link-edit' => 'required|url'
                ], [
                    'e-link-edit.url' => 'kolom link harus berupa url website sertakan http:// atau https://'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->errors());
                }
                $data_request['type'] = 0;
                $data_request['target'] = $this->postField('e-link-edit');
            } else {
                //                $validator = Validator::make($this->request->all(), [
                //                    'file-edit' => 'max:2000'
                //                ], [
                //                    'file-edit.max' => 'Ukuran file tidak boleh lebih dari 2Mb'
                //                ]);
                //                if ($validator->fails()) {
                //                    return redirect()->back()->withErrors($validator->errors());
                //                }
                $data_request['type'] = 1;
                $uuid_name = $this->generateImageName('file-edit');
                if ($uuid_name !== '') {
                    $file_name = '/assets/information/' . $uuid_name;
                    $data_request['target'] = $file_name;
                    $this->uploadImage('file-edit', $uuid_name, 'publicInformation');
                }
            }
            $data->update($data_request);
            return redirect()->back()->with('success', 'Berhasil merubah data...');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi kesalahan server...');
        }
    }

    public function add_category_non_periodic()
    {
        try {

            $slug = $this->postField('slug');
            $category = Category::where('slug', '=', $slug)->first();
            if (!$category) {
                return $this->jsonResponse('kategori tidak ditemukan...', 500);
            }
            $data = [
                'category_id' => $category->id,
                'name' => $this->postField('information_category_name')
            ];
            InformationCategory::create($data);

            $information_categories = InformationCategory::where('category_id', '=', $category->id)->get();
            return $this->jsonResponse('success', 200, $information_categories);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...2', 500);
        }
    }

    public function add_non_periodic_information()
    {
        return $this->post_information();
    }

    public function delete(Request $request)
    {
        try {
            $data = PublicAgencyInformation::findOrFail($request->id);

            $data->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data' . $e], 500);
        }
    }

    public function deleteDetail(Request $request)
    {
        try {
            Log::info("REQUEST ID DELETE DETAIL : " . $request->id);
            $data = InformationDetail::findOrFail($request->id);
            $data->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data' . $e], 500);
        }
    }
}
