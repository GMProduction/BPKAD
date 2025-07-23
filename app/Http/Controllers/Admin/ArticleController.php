<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ArticleController extends CustomController
{
    public function datatable()
    {
        $data = Article::with('autor:id,name');

        return DataTables::of($data)->addColumn(
            'action',
            function ($data) {
                $id = $data->id;
                $name = $data->title;
                return '<div class="actionButtonContainer">
                                <a href="' . route('admin.article.form', ['q' => $data->id]) . '" data-modal-toggle="modalEdit"
                                    class="editbutton">Ubah</a>

                                    <a href="#" id="deleteData" data-id="' . $id . '" data-name="' . $name . '"
                                    class="deletebutton">Hapus</a>
                            </div>';
            }
        )->removeColumn('description')->make(true);
    }

    public function index()
    {

        return view('admin/artikel/artikel');
    }

    public function detail()
    {
        $q    = request('q');
        $data = Article::find($q);
        if (request()->method() == 'POST') {
            return $this->post_data();
        }

        return view('admin/artikel/artikel-form', ['data' => $data]);
    }

    public function post_data()
    {
        $field = request()->validate(
            [
                'title'        => 'required',
                'type_article' => 'required',
                'cover'        => 'max:2000',
                'date'         => 'required',
            ],
            [
                'title.required'        => 'Judul artikel harus di isi',
                'type_article.required' => 'tipe artikel harus di isi',
                'date.required'         => 'tanggal artikel harus di isi',
                'cover.max'             => 'Ukuran file tidak boleh lebih dari 2Mb',
            ]
        );

        Arr::set($field, 'is_highline', request('is_highline') ?? false);

        if (request('type_article') == 1) {
            request()->validate(
                [
                    'link' => 'required',
                ]
            );
            Arr::set($field, 'description', request('link'));
        } else {
            request()->validate(
                [
                    'description' => 'required',
                ]
            );
            Arr::set($field, 'description', request('description'));
        }
        $uuid_name = $this->generateImageName('cover');
        if ($uuid_name !== '') {
            $image_name     = '/assets/article/' . $uuid_name;
            $field['cover'] = $image_name;
            $this->uploadImage('cover', $uuid_name, 'articleImage');
        }

        $article = Article::find(request('q'));
        Arr::set($field, 'author_id', auth()->id());
        if ($article) {
            $slug = Str::slug(request('title') . ' ' . $article->id, '-');
            Arr::set($field, 'slug', $slug);
            $article->update($field);
            $message = 'merubah';
        } else {
            $article = Article::create($field);
            $slug    = Str::slug(request('title') . ' ' . $article->id, '-');
            $article->update(
                [
                    'slug' => $slug,
                ]
            );
            $message = 'menambah';
        }

        return redirect()->back()->with('success', "berhasil $message data...");
    }

    public function destroy(Article $article)
    {
        try {
            $this->deleteImg('Article', $article->id, $article->cover);
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('terjadi kesalahan server...' . $e->getMessage(), 500);
        }
    }
}
