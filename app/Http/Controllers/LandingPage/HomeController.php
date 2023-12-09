<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\OnlineApplication;
use App\Models\Slider;

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
        $shortHistory = $this->ShortHistory();
        $online_application = $this->online_applications();
        $slider = $this->image_slider();
        return view('beranda', ['history' => $shortHistory, 'application' => $online_application, 'slider' => $slider]);
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
