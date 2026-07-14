<?php

use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\LandingPage\VisitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('/track-visit', [VisitController::class, 'store']);
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return "✅ Cache Laravel berhasil dibersihkan";
});

// Simpan nilai ke session
Route::get('/set-session', function () {
    Session::put('coba', '✅ Session berhasil disimpan');
    return "Session diset!";
});

Route::get('/cek-session', function () {
    return "Isi session: " . Session::get('coba', '❌ Session kosong');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/admin/kustomisasi-slider');
    })->name('dashboard');

    // Redirect /dashboard ke /admin/kustomisasi-slider
    Route::get('dashboard', function () {
        return redirect('/admin/kustomisasi-slider');
    });

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
        Route::post('/contact-profile', [\App\Http\Controllers\Admin\ContactProfileController::class, 'patch_data'])->name('customize.contact.profile.patch');
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
        Route::post('/informasi-berkala/delete', [\App\Http\Controllers\Admin\InformationController::class, 'delete'])->name('admin.information.delete');
        Route::post('/informasi-detail/delete', [\App\Http\Controllers\Admin\InformationController::class, 'deleteDetail'])->name('admin.information-detail.delete');
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

    Route::group(['prefix' => 'kustomisasi-aduan'], function () {
        Route::match(['POST', 'GET'], '/', [\App\Http\Controllers\Admin\AduanController::class, 'index'])->name('customize.aduan');
        Route::post('/change-attachment', [\App\Http\Controllers\Admin\AduanController::class, 'changeAttachment'])->name('customize.aduan.change.attachment');
        Route::post('/{id}/drop-attachment/{quarter}', [\App\Http\Controllers\Admin\AduanController::class, 'dropAttachment'])->name('customize.aduan.drop.attachment');
        Route::post('/{id}/drop-year', [\App\Http\Controllers\Admin\AduanController::class, 'dropYear'])->name('customize.aduan.drop.year');
        Route::post('/chart', [\App\Http\Controllers\Admin\AduanController::class, 'chart'])->name('customize.aduan.chart');
        Route::post('/chart/{id}/change/{field}', [\App\Http\Controllers\Admin\AduanController::class, 'changeChart'])->name('customize.aduan.chart.change');
        Route::post('/chart/{id}/drop-chart', [\App\Http\Controllers\Admin\AduanController::class, 'dropChart'])->name('customize.aduan.chart.drop');
    });

    Route::group(['prefix' => 'kustomisasi-faq'], function () {
        Route::get('datatable', [\App\Http\Controllers\Admin\FaqController::class, 'dataTable'])->name('customize.faq.datatable');
        Route::match(['POST', 'GET'], '', [\App\Http\Controllers\Admin\FaqController::class, 'index'])->name('customize.faq');
        Route::post('destroy/{faq}', [\App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('customize.faq.delete');
    });

    Route::group(['prefix' => 'kustomisasi-produkhukum'], function () {
        Route::match(['POST', 'GET'], '', [\App\Http\Controllers\Admin\ProdukHukumController::class, 'index'])->name('customize.produkhukum');
    });
    Route::group(['prefix' => 'kustomisasi-layanan'], function () {
        Route::match(['POST', 'GET'], '', [\App\Http\Controllers\Admin\CustomizeServiceController::class, 'index'])->name('customize.layanan');
        Route::get('datatable', [\App\Http\Controllers\Admin\CustomizeServiceController::class, 'dataTable'])->name('customize.layanan.datatable');
        Route::post('standar-pelayanan/delete', [\App\Http\Controllers\Admin\CustomizeServiceController::class, 'deleteData'])->name('customize.service.delete');
        Route::match(['POST', 'GET'], 'layanan-masyarakat', [\App\Http\Controllers\Admin\PublicServiceController::class, 'getData'])->name('customize.layanan.masyarakat');
        Route::post('layanan-masyarakat/data', [\App\Http\Controllers\Admin\PublicServiceController::class, 'saveFile'])->name('customize.layanan.masyarakat.file');
        Route::post('layanan-masyarakat/delete', [\App\Http\Controllers\Admin\PublicServiceController::class, 'deleteData'])->name('customize.layanan.masyarakat.delete');
    });
});

Route::middleware(\App\Http\Middleware\SecurityHeader::class)->group(function () {
    Route::match(['get', 'post'], '/auth', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

    Route::get('/', [HomeController::class, 'index'])->name('beranda');

    Route::group(['prefix' => 'profil'], function () {
        Route::get('/visimisi', [\App\Http\Controllers\LandingPage\ProfileController::class, 'vision'])->name('visimisi');
        Route::get('/motto', [\App\Http\Controllers\LandingPage\ProfileController::class, 'motto'])->name('motto');
        Route::get('/struktur', [\App\Http\Controllers\LandingPage\ProfileController::class, 'structure'])->name('structure');
        Route::get('/sk-pengelola-website', [\App\Http\Controllers\LandingPage\SKPengelolaWebsiteController::class, 'index'])->name('skpengelolawebsite');
    });

    Route::group(['prefix' => 'layanan'], function () {
        Route::get('/skm', [\App\Http\Controllers\LandingPage\SkmContrller::class, 'index'])->name('skm');
        Route::get('/maklumat', function () {
            return view('maklumat');
        })->name('maklumat');
        Route::get('/standarpelayanan', function () {
            return view('sp');
        })->name('sp');
        Route::get('/informasi-layanan', [\App\Http\Controllers\LandingPage\InfoLayananController::class, 'index'])->name('informasilayanan');
    });

    Route::group(['prefix' => 'aduan'], function () {
        Route::get('/skaduan', [\App\Http\Controllers\LandingPage\SkAduanController::class, 'index'])->name('skaduan');
        Route::get('/grafikaduan', [\App\Http\Controllers\LandingPage\GrafikAduanContrller::class, 'index'])->name('grafikaduan');
    });

    Route::group(['prefix' => 'bidang'], function () {
        Route::get('/sekretariat', [\App\Http\Controllers\LandingPage\SectorController::class, 'sekretariat'])->name('sekretariat');
        Route::get('/anggaran', [\App\Http\Controllers\LandingPage\SectorController::class, 'anggaran'])->name('anggaran');
        Route::get('/perbendaharaan-dan-akuntansi', [\App\Http\Controllers\LandingPage\SectorController::class, 'perbendaharaan'])->name('perbendaharaan');
        Route::get('/aset', [\App\Http\Controllers\LandingPage\SectorController::class, 'aset'])->name('aset');
        Route::get('/uptd', [\App\Http\Controllers\LandingPage\SectorController::class, 'uptd'])->name('uptd');
    });

    Route::group(['prefix' => 'ppid'], function () {
        Route::get('/informasi-serta-merta', [\App\Http\Controllers\InformationController::class, 'serta_merta_information'])->name('information.serta-merta');
        Route::get('/informasi-setiap-saat', [\App\Http\Controllers\InformationController::class, 'setiap_saat_information'])->name('information.setiap-saat');
        Route::get('/informasi-di-kecualikan', [\App\Http\Controllers\InformationController::class, 'dikecualikan_information'])->name('information.di-kecualikan');
        Route::get('/informasi-dasarhukumppid', [\App\Http\Controllers\InformationController::class, 'dasarhukumPPID'])->name('information.dasarhukumppid');
        Route::get('/informasipublik', function () {
            return view('informasipublik');
        })->name('information.public');
        Route::group(['prefix' => 'informasi-berkala'], function () {
            Route::get('/', [\App\Http\Controllers\InformationController::class, 'periodic_information'])->name('information.periodic');
            Route::get('/{slug}', [\App\Http\Controllers\InformationController::class, 'periodic_information_by_slug'])->name('information.periodic.by.slug');
        });
    });

    Route::post('/post-aspiration', [HomeController::class, 'post_aspiration'])->name('post_aspiration');
    Route::get('/home-setting-json', [HomeController::class, 'ShortHistory'])->name('home.setting.json');

    Route::get('/profile-json', [\App\Http\Controllers\LandingPage\ProfileController::class, 'json_data'])->name('profile.json');
    Route::get('/contact-profile-json', [\App\Http\Controllers\Admin\ContactProfileController::class, 'getContactProfile'])->name('contact.profile.json');
    Route::get('/youtube-video-json', [\App\Http\Controllers\Admin\YoutubeVideoController::class, 'getYoutubeVideo'])->name('youtube.video.json');
    Route::get('/image-slider', [\App\Http\Controllers\Admin\SliderController::class, 'image_slider'])->name('image.slider');


    Route::get('/maklumat_data', [\App\Http\Controllers\LandingPage\ProfileController::class, 'maklumat_data'])->name('maklumat.json');

    Route::prefix('artikel')->group(function () {
        Route::get('/', [\App\Http\Controllers\LandingPage\ArticleController::class, 'index']);
        Route::get('json-data/{type}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'article'])->name('article.json');
        Route::get('count/{type}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'count_article'])->name('article.count');
        Route::get('/detail/{slug}', [\App\Http\Controllers\LandingPage\ArticleController::class, 'detail'])->name('article.detail');
        Route::get('json-data-month', [\App\Http\Controllers\LandingPage\ArticleController::class, 'getArticleByMonth'])->name('article.json.mont');
        Route::get('/load-more-articles', [\App\Http\Controllers\LandingPage\ArticleController::class, 'loadMoreArticles'])->name('articles.load_more');
    });



    Route::get('/faq', [\App\Http\Controllers\LandingPage\FaqController::class, 'index'])->name('faq');

    Route::prefix('produk-hukum')->group(function () {
        Route::get('/produkhukumperda', [\App\Http\Controllers\LandingPage\ProdukHukumController::class, 'regionPage'])->name('produkhukumperda');
        Route::get('/produkhukumperwali', [\App\Http\Controllers\LandingPage\ProdukHukumController::class, 'mayorPage'])->name('produkhukumperwali');
        Route::delete('/perda/delete/{id}', [\App\Http\Controllers\LandingPage\ProdukHukumController::class, 'destroyPerda']);
        Route::delete('/perwali/delete/{id}', [\App\Http\Controllers\LandingPage\ProdukHukumController::class, 'destroyPerwali']);
    });
});
