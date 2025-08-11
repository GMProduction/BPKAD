<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Visit;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $todayVisitors = Visit::whereDate('created_at', today())->count();
            $yesterday = Visit::whereDate('created_at', today()->subDay())->count();
            $thisMonth = Visit::whereMonth('created_at', today()->month)->count();
            $totalVisitors = Visit::count();




            $view->with([
                'totalVisitors' => $totalVisitors,
                'todayVisitors' => $todayVisitors,
                'yesterdayVisitors' => $yesterday,
                'thisMonthVisitors' => $thisMonth,
            ]);
        });
    }

    public function register()
    {
        //
    }
}
