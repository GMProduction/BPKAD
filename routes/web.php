<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get', 'post'], '/auth', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'aspirasi'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\AspirationController::class, 'index'])->name('aspiration');
    });

    Route::group(['prefix' => 'kustomisasi-beranda'], function () {
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\CustomizeController::class, 'home'])->name('customize.home');
    });

    Route::group(['prefix' => 'kustomisasi-profil'], function (){
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\CustomizeController::class, 'profile'])->name('customize.profile');
    });
});

Route::get('/', function () {
    return view('beranda');
});

Route::get('/visimisi', function () {
    return view('visimisi');
});

Route::get('/struktur', function () {
    return view('struktur');
});

Route::get('/sekretariat', function () {
    return view('sekretariat');
});

Route::get('/anggaran', function () {
    return view('anggaran');
});

Route::get('/perbendaharaan-dan-akuntansi', function () {
    return view('perbendaharaan');
});

Route::get('/aset', function () {
    return view('aset');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/info-berkala', function () {
    return view('info-berkala');
});

Route::get('/info-sertamerta', function () {
    return view('info-sertamerta');
});

Route::get('/info-setiapsaat', function () {
    return view('info-setiapsaat');
});

Route::get('/info-dikecualikan', function () {
    return view('info-dikecualikan');
});

Route::get('/informasi', function () {
    return view('informasi');
});

// LOGIN

//Route::get('/login', function () {
//    return view('auth.login');
//});

//ADMIN

//Route::get('/admin', function () {
//    return view('admin/base');
//});

//Route::get('/admin/aspirasi', function () {
//    return view('admin/aspirasi/aspirasi');
//});
//
//Route::get('/admin/aspirasi/detail', function () {
//    return view('admin/aspirasi/aspirasi-detail');
//});

//Route::get('/admin/customize_beranda', function () {
//    return view('admin/customize/customize_beranda');
//});

//Route::get('/admin/customize_profil', function () {
//    return view('admin/customize/customize_profil');
//});
//
//Route::get('/admin/customize_bidang', function () {
//    return view('admin/customize/customize_bidang');
//});

Route::get('/admin/informasi', function () {
    return view('admin/informasi/informasi');
});

Route::get('/admin/informasi/detail', function () {
    return view('admin/informasi/informasi-detail');
});

Route::get('/admin/informasi/detailbyyear', function () {
    return view('admin/informasi/informasi-detail-byyear');
});

Route::get('/admin/artikel', function () {
    return view('admin/artikel/artikel');
});

Route::get('/admin/artikel-form', function () {
    return view('admin/artikel/artikel-form');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});
