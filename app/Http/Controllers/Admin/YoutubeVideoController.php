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

                return "<div class='actionButtonContainer'>
                                <a href='" . route('customize.youtube.form', ['q' => $data->id]) . "' data-modal-toggle='modalEdit'
                                    class='editbutton'>Ubah</a>
                                    <a href='#' id='deleteData' data-id='" . $id . "' data-modal-toggle='modalEdit'
                                    class='deletebutton'>Hapus</a>
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
        $url = $field['url'];
        if (preg_match('/(?:youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/', $url, $matches)) {
            $videoId = $matches[1];
            $embedUrl = "https://www.youtube.com/embed/" . $videoId;



            if ($data) {
                // update record lama
                $data->update([
                    'url' => $embedUrl
                ]);
                $message = 'merubah';
            } else {
                // create record baru
                $data = YoutubeVideo::create([
                    'url' => $embedUrl
                ]);
                $message = 'menambah';
            }

            return redirect()->back()->with('success', "berhasil $message data...");
        }
    }

    public function destroy(YoutubeVideo $youtube)
    {
        try {
            $youtube->delete();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
