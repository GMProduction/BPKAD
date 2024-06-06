<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\PublicService;
use Yajra\DataTables\DataTables;
use Illuminate\Filesystem\chmod;

class FaqController extends CustomController
{

    public function datatable()
    {
        $data = Faq::query();

        return DataTables::of($data)
            ->make(true);
    }
    public function index()
    {
        if (request()->method() == 'POST') {
            return $this->postData();
        }
        return view('admin.customize.customize_faq');
    }

    public function postData()
    {

        $field = request()->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $quest = Faq::find(request('id'));

        if ($quest) {
            $quest->update($field);
        } else {
            Faq::create($field);
        }

        return 'success';
    }

    /**
     * @param Faq $youtube
     *
     * @return mixed
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
