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

Route::get('/', function () {
    return view('beranda');
});

Route::get('/profile', function () {
    return view('profile');
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


//ADMIN

Route::get('/admin', function () {
    return view('admin/base');
});

Route::get('/admin/aspirasi', function () {
    return view('admin/aspirasi');
});
