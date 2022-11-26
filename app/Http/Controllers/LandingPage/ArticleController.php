<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index(){

        return view('artikel');
    }

    public function article($type)
    {
        try {
            $skip = request('skip') ?? 0;
            $article = Article::where('is_highline', $type)->orderBy('created_at','DESC')->skip($skip)->take(8)->get();

            return $article;
        } catch (\ErrorException $e) {
            return [];
        }
    }
    public function count_article($type)
    {
        try {
            $article = Article::where('is_highline', $type)->count('*');
            $count = ceil( $article / 8);

            return $count;
        } catch (\ErrorException $e) {
            return 0;
        }
    }

    public function detail($slug){
        $article = Article::where('slug',$slug)->firstOrFail();

        return view('artikel-detail', ['article' => $article]);
    }

}
