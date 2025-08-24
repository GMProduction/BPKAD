<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\HomeSetting;
use App\Models\OnlineApplication;
use App\Models\Slider;
use App\Models\Visit;
use App\Models\YoutubeVideo;
use Illuminate\Support\Facades\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers\LandingPage
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (!session()->has('visited_home')) {
            Visit::create([
                'page' => 'home',
                'ip_address' => Request::ip(),
            ]);

            session(['visited_home' => true]);
        }

        // Statistik kunjungan


        $shortHistory = $this->ShortHistory();
        $online_application = $this->online_applications();
        $slider = $this->image_slider();
        $articles = $this->articles();
        $firstarticle = $this->firstarticle();
        $youtube = YoutubeVideo::get();
        return view('beranda', ['history' => $shortHistory, 'application' => $online_application, 'slider' => $slider, 'articles' => $articles, 'firstarticle' => $firstarticle, 'youtube' => $youtube,]);
    }

    /**
     * @return mixed
     */
    public function image_slider()
    {
        return Slider::select(['image'])->get();
    }


    /**
     * @return HomeSetting[]|\Illuminate\Database\Eloquent\Collection
     */
    public function ShortHistory()
    {
        return HomeSetting::first();
    }

    public function online_applications()
    {
        return OnlineApplication::all();
    }
    public function articles()
    {
        return Article::orderBy('created_at', 'desc')
            ->skip(1)
            ->take(6)
            ->get();
    }

    public function firstarticle()
    {
        return Article::orderBy('created_at', 'desc')
            ->first();
    }


    public function post_aspiration()
    {
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'image' => 'file',
        ]);
    }
}
