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
    public function datatable(){
        $data = Article::orderBy('created_at','DESC');
        return DataTables::of($data)->addColumn('action', function ($data){
            return '<div class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="'.route('admin.article.form',['q' => $data->id]).'" data-modal-toggle="modalEdit"
                                    class="font-medium text-blue-600  button-link bg-blue-100">Ubah</a>

                                    <a href="#" data-modal-toggle="modalEdit"
                                    class="font-medium text-red-700  button-link bg-red-100">Hapus</a>
                            </div>';
        })->addColumn('tanggal', function ($data){
            return Carbon::parse($data->created_at)->isoFormat('DD MMMM YYYY');
        })->make(true);
    }

    public function index(){

        return view('admin/artikel/artikel');


    }

    public function detail(){
        $q = request('q');
        $data = Article::find($q);
        if (request()->method() == 'POST'){
            return $this->post_data();
        }
        return view('admin/artikel/artikel-form', ['data' => $data]);


    }

    public function post_data(){
       $field = request()->validate([
            'title' => 'required',
            'type_article' => 'required',
        ]);

        Arr::set($field,'is_highline', request('is_highline') ?? false);

        if (request('type_article') == 1){
            request()->validate([
                'link' => 'required'
            ]);
            Arr::set($field,'description', request('link'));
        }else{
            request()->validate([
                'description' => 'required'
            ]);
            Arr::set($field,'description', request('description'));
        }



        $uuid_name = $this->generateImageName('cover');
        if ($uuid_name !== '') {
            $image_name = '/assets/article/' . $uuid_name;
            $field['cover'] = $image_name;
            $this->uploadImage('cover', $uuid_name, 'articleImage');
        }

        $article = Article::find(request('q'));
        if ($article){
            $slug = Str::slug(request('title').' '.$article->id, '-');
            Arr::set($field,'slug', $slug);

            $article->update($field);
        }else{
            $article =  Article::create($field);
            $slug = Str::slug(request('title').' '.$article->id, '-');
            $article->update([
                'slug' => $slug
            ]);

        }
        return redirect()->back()->with('success', 'berhasil merubah data...');
    }

}
