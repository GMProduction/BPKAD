<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\YoutubeVideo;
use Yajra\DataTables\DataTables;

class YoutubeVideoController extends CustomController
{

    public function datatable()
    {
        $data = YoutubeVideo::query();

        return DataTables::of($data)->addColumn(
            'action',
            function ($data) {
                $url = $data->url;
                $id = $data->id;

                return "<div class='py-4 px-6 text-right whitespace-nowrap'>
                                <a href='".route('customize.youtube.form', ['q' => $data->id])."' data-modal-toggle='modalEdit'
                                    class='font-medium text-blue-600  button-link bg-blue-100'>Ubah</a>
                                    <a href='#' id='deleteData' data-id='".$id."' data-modal-toggle='modalEdit'
                                    class='font-medium text-red-700  button-link bg-red-100'>Hapus</a>
                            </div>";
            }
        )->make(true);
    }

    public function getYoutubeVideo()
    {
        return YoutubeVideo::all();
    }

    public function index()
    {
        return view('admin.customize.customize_youtube_video');
    }

    public function form()
    {
        $data = YoutubeVideo::find(request('q'));
        if (request()->method() == 'POST') {
            return $this->patch_data($data);
        }

        return view('admin.customize.customize_youtube_video_form')->with(['data' => $data]);
    }

    public function patch_data($data)
    {
        $field = request()->validate(
            [
                'iframe' => ["required", "regex:(<iframe|youtube.com)"],
            ],
            [
                'iframe.required' => 'iframe harus di isi',
                'iframe.regex'    => 'iframe harus mengandung iframe & youtube.com',
            ]
        );

        $field['url'] = $field['iframe'];
        if ($data) {
            $data->update($field);
            $message = 'merubah';
        } else {
            $data = new YoutubeVideo();
            $data->create($field);
            $message = 'menambah';
        }

        return redirect()->back()->with('success', "berhasil $message data...");
    }

    public function destroy(YoutubeVideo $youtube)
    {
        try {
            $youtube->delete();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...'.$e->getMessage(), 500);
        }

    }

}
