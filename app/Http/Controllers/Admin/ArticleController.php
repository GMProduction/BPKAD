<?php

namespace App\Http\Controllers\Admin;

use App\Helper\CustomController;
use App\Models\Article;
use Illuminate\Support\Arr;

class ArticleController extends CustomController
{
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
            'is_highline' => 'required',
            'type_article' => 'required',
        ]);
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

        $article = Article::find(request('id'));
        if ($article){
            $article->update($field);
        }else{
            Article::create($field);
        }
        return redirect()->back()->with('success', 'berhasil merubah data...');
    }

}
