<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function index()
    {
        $data  = $this->getArticleByMonth();
        $count = $this->count_article_all(0);

        return view('artikel')->with(['data_article' => $data,'count' => $count]);
    }

    public function article($type)
    {
        try {
            $skip    = request('skip') ?? 0;
            $month = null;
            $year = null;
            $param = request('param');
            if (request('month')){
                $split = explode('-',request('month'));
                $month = $split[1];
                $year = $split[0];
            }
            $article = Article::where('is_highline', $type)->orderBy('date', 'DESC');

            if ($month){
                $article = $article->whereMonth('date','=',$month)->whereYear('date','=',$year);
            }

            if ($param){
                $article = $article->where('title','LIKE',"%$param%")->orWhere('description','LIKE',"%$param%")->where('is_highline', $type);
            }

            $article = $article->skip($skip)->take(8)->get();

            return $article;
        } catch (\ErrorException $e) {
            return [];
        }
    }

    public function count_article($type)
    {
        try {
            $article = Article::where('is_highline', $type)->count('*');
            $count   = ceil($article / 8);

            return $count;
        } catch (\ErrorException $e) {
            return 0;
        }
    }

    public function count_article_all($type)
    {
        try {
            $param = request('param');
            $article = Article::where('is_highline', $type);
            if ($param){
                $article = $article->where('title','LIKE',"%$param%")->orWhere('description','LIKE',"%$param%")->where('is_highline', $type);
            }
            return $article->count('*');
        } catch (\ErrorException $e) {
            return 0;
        }
    }

    public function detail($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('artikel-detail', ['article' => $article]);
    }

    public function getArticleByMonth()
    {
        $param = request('param');

        $article = Article::where('is_highline', 0);
        if ($param){
            $article = $article->where('title','LIKE',"%$param%")->orWhere('description','LIKE',"%$param%")->where('is_highline', 0);
        }
        $article = $article->selectRaw('year(date) year, month(date) monthN,monthname(date) month, count(*) data')
                           ->groupBy('year', 'month', 'monthN')
                           ->orderBy('year', 'desc')
                           ->get();

        return $article;
    }

    public function getSelectMonth(){

    }

}
