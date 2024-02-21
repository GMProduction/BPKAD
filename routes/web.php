<?php

use App\Http\Controllers\LandingPage\HomeController;
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

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'aspirasi'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\AspirationController::class, 'index'])->name('aspiration');
    });
    Route::group(['prefix' => 'kustomisasi-slider'], function () {
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('customize.slider');
        Route::match(['post', 'get'], '/image', [\App\Http\Controllers\Admin\SliderController::class, 'patch_image'])->name('customize.slider.image');
    });

    Route::group(['prefix' => 'kustomisasi-sejarah'], function () {
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\CustomizeController::class, 'home'])->name('customize.home');
    });

    Route::group(['prefix' => 'kustomisasi-profil'], function () {
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\CustomizeController::class, 'profile'])->name('customize.profile');
    });

    Route::group(['prefix' => 'kustomisasi-bidang'], function () {
        Route::match(['post', 'get'], '/', [\App\Http\Controllers\Admin\CustomizeController::class, 'bidang'])->name('customize.bidang');
        Route::match(['post', 'get'], '/image', [\App\Http\Controllers\Admin\CustomizeController::class, 'patch_image'])->name('customize.bidang.image');
    });

    Route::group(['prefix' => 'kustomisasi-aplikasi-online'], function () {
        Route::get('/datatable', [\App\Http\Controllers\Admin\OnlineApplicationController::class, 'datatable'])->name('customize.aplikasi.online.datatable');
        Route::get('/', [\App\Http\Controllers\Admin\OnlineApplicationController::class, 'index'])->name('customize.aplikasi.online');
        Route::match(['post', 'get'], '/form', [\App\Http\Controllers\Admin\OnlineApplicationController::class, 'form'])->name('customize.aplikasi.online.form');
        Route::post('/destroy/{apps}', [\App\Http\Controllers\Admin\OnlineApplicationController::class, 'destroy'])->name('customize.aplikasi.online.destroy');
    });

    Route::group(['prefix' => 'kustomisasi-kontak-profil'], function () {
        Route::match(['POST', 'GET'], '/', [\App\Http\Controllers\Admin\ContactProfileController::class, 'index'])->name('customize.contact.profile');
    });

    Route::group(['prefix' => 'kustomisasi-video-youtube'], function () {
        Route::get('/datatable', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'datatable'])->name('customize.youtube.datatable');
        Route::get('/', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'index'])->name('customize.youtube');
        Route::match(['GET', 'POST'], '/form', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'form'])->name('customize.youtube.form');
        Route::post('/destroy/{youtube}', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'destroy'])->name('customize.youtube.destroy');
    });

    Route::group(['prefix' => 'informasi'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\InformationController::class, 'index'])->name('admin.information.index');
        Route::match(['post', 'get'], '/{slug}/informasi-berkala', [\App\Http\Controllers\Admin\InformationController::class, 'periodic_information'])->name('admin.information.periodic');
        Route::post('/{slug}/informasi-berkala/patch', [\App\Http\Controllers\Admin\InformationController::class, 'periodic_information_patch'])->name('admin.information.periodic.patch');
        Route::post('/{id}/informasi-berkala/category', [\App\Http\Controllers\Admin\InformationController::class, 'add_information_category'])->name('admin.information.category.add');
        Route::post('/public-information/patch', [\App\Http\Controllers\Admin\InformationController::class, 'public_information_patch'])->name('admin.information.public.patch');
        Route::post('/information/patch', [\App\Http\Controllers\Admin\InformationController::class, 'information_patch'])->name('admin.information.patch');
        Route::post('/non-periodic/category', [\App\Http\Controllers\Admin\InformationController::class, 'add_category_non_periodic'])->name('admin.information.non-periodic.category');
        Route::post('/non-periodic/add', [\App\Http\Controllers\Admin\InformationController::class, 'add_non_periodic_information'])->name('admin.information.non-periodic.add');
    });

    Route::group(['prefix' => 'artikel'], function () {
        Route::get('datatable', [\App\Http\Controllers\Admin\ArticleController::class, 'datatable'])->name('admin.article.datatable');
        Route::get('', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.article');
        Route::match(['POST', 'GET'], 'artikel-form', [\App\Http\Controllers\Admin\ArticleController::class, 'detail'])->name('admin.article.form');
        Route::post('destroy/{article}', [\App\Http\Controllers\Admin\ArticleController::class, 'destroy'])->name('admin.article.destroy');
    });

    Route::group(['prefix' => 'kustomisasi-layanan'], function () {
        Route::match(['POST', 'GET'], '', [\App\Http\Controllers\Admin\CustomizeServiceController::class, 'index'])->name('customize.layanan');
        Route::get('datatable', [\App\Http\Controllers\Admin\CustomizeServiceController::class, 'dataTable'])->name('customize.layanan.datatable');
        Route::match(['POST', 'GET'],'layanan-masyarakat',[\App\Http\Controllers\Admin\PublicServiceController::class,'getData'])->name('customize.layanan.masyarakat');
        Route::post('layanan-masyarakat/data',[\App\Http\Controllers\Admin\PublicServiceController::class,'saveFile'])->name('customize.layanan.masyarakat.file');
        Route::post('layanan-masyarakat/delete',[\App\Http\Controllers\Admin\PublicServiceController::class,'deleteData'])->name('customize.layanan.masyarakat.delete');
    });
});
Route::middleware(\App\Http\Middleware\SecurityHeader::class)->group(function (){
    Route::match(['get', 'post'], '/auth', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::post('/post-aspiration', [HomeController::class, 'post_aspiration'])->name('post_aspiration');
    Route::get('/home-setting-json', [HomeController::class, 'ShortHistory'])->name('home.setting.json');
    Route::get('/visimisi', [\App\Http\Controllers\LandingPage\ProfileController::class, 'vision'])->name('visimisi');
    Route::get('/struktur', [\App\Http\Controllers\LandingPage\ProfileController::class, 'structure'])->name('structure');
    Route::get('/profile-json', [\App\Http\Controllers\LandingPage\ProfileController::class, 'json_data'])->name('profile.json');
    Route::get('/contact-profile-json', [\App\Http\Controllers\Admin\ContactProfileController::class, 'getContactProfile'])->name('contact.profile.json');
    Route::get('/youtube-video-json', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'getYoutubeVideo'])->name('youtube.video.json');
    Route::get('/image-slider', [\App\Http\Controllers\Admin\SliderController::class, 'image_slider'])->name('image.slider');

    Route::get('/sekretariat', [\App\Http\Controllers\LandingPage\SectorController::class, 'sekretariat']);
    Route::get('/anggaran', [\App\Http\Controllers\LandingPage\SectorController::class, 'anggaran']);
    Route::get('/perbendaharaan-dan-akuntansi', [\App\Http\Controllers\LandingPage\SectorController::class, 'perbendaharaan']);
    Route::get('/aset', [\App\Http\Controllers\LandingPage\SectorController::class, 'aset']);

// Route::get('/sekretariat', [\App\Http\Controllers\SectorController::class, 'secretarial'])->name('secretarial');
// Route::get('/anggaran', [\App\Http\Controllers\SectorController::class, 'budget'])->name('budget');
// Route::get('/perbendaharaan-dan-akuntansi', [\App\Http\Controllers\SectorController::class, 'financial'])->name('financial');
// Route::get('/aset', [\App\Http\Controllers\SectorController::class, 'asset'])->name('asset');

    Route::prefix('artikel')->group(function () {
        Route::get('/', [\App\Http\Controllers\LandingPage\ArticleController::class, 'index']);
        Route::get('json-data/{type}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'article'])->name('article.json');
        Route::get('count/{type}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'count_article'])->name('article.count');
        Route::get('/detail/{slug}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'detail'])->name('article.detail');
        Route::get('json-data-month', [\App\Http\Controllers\LandingPage\ArticleController::class, 'getArticleByMonth'])->name('article.json.mont');
    });


    Route::group(['prefix' => 'informasi-berkala'], function () {
        Route::get('/', [\App\Http\Controllers\InformationController::class, 'periodic_information'])->name('information.periodic');
        Route::get('/{slug}', [\App\Http\Controllers\InformationController::class, 'periodic_information_by_slug'])->name('information.periodic.by.slug');
    });

    Route::get('/informasi-serta-merta', [\App\Http\Controllers\InformationController::class, 'serta_merta_information'])->name('information.serta-merta');

    Route::get('/informasi-setiap-saat', [\App\Http\Controllers\InformationController::class, 'setiap_saat_information'])->name('information.setiap-saat');

    Route::get('/informasi-di-kecualikan', [\App\Http\Controllers\InformationController::class, 'dikecualikan_information'])->name('information.di-kecualikan');

    Route::get('/maklumat', function () {
        return view('maklumat');
    })->name('maklumat');

    Route::get('/skm', [\App\Http\Controllers\LandingPage\SkmContrller::class,'index'])->name('skm');

    Route::get('/standarpelayanan', function () {
        return view('sp');
    })->name('sp');

    Route::get('/informasipublik', function () {
        return view('informasipublik');
    })->name('information.public');

});


//Route::get('/informasi', function () {
//    return view('informasi');
//});

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

//Route::get('/admin/informasi', function () {
//    return view('admin/informasi/informasi');
//});

//Route::get('/admin/informasi/detail', function () {
//    return view('admin/informasi/informasi-detail');
//});
//
//Route::get('/admin/informasi/detailbyyear', function () {
//    return view('admin/informasi/informasi-detail-byyear');
//});


Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});
