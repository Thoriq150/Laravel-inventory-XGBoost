<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    DashboardController,
    CategoryController,
    SupplierController,
    ProductController,
    StockController,
    TransaksiKeluarController,
    ReportController,
    UserController,
    TransaksiMasukController,
    SettingController,
    PrediksiController
};

use App\Http\Controllers\Customer\{
    TransaksiMasukController as CustomerTransaksiMasukController,
    DashboardController as CustomerDashboardController,
    TransaksiKeluarController as CustomerTransaksiKeluarController,
    SettingController as CustomerSettingController,
    ReportController as CustomerReportController,
    PrediksiController as CustomerPrediksiController
};

use App\Http\Controllers\{
    LandingController,
    ProductController as LandingProductController,
    CategoryController as LandingCategoryController
};

use App\Services\GeminiService;
/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::get('/', LandingController::class)->name('landing');

Route::controller(LandingCategoryController::class)
    ->as('category.')
    ->group(function () {

        Route::get('/category', 'index')->name('index');

        Route::get('/category/{slug}', 'show')->name('show');
    });

Route::controller(LandingProductController::class)
    ->as('product.')
    ->group(function () {

        Route::get('/product', 'index')->name('index');

        Route::get('/product/{slug}', 'show')->name('show');
    });

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'role:Admin|Super Admin']
], function () {

    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */

    Route::resource('/category', CategoryController::class)
        ->except('show', 'create', 'edit');

    Route::resource('/supplier', SupplierController::class)
        ->except('show', 'create', 'edit');

    Route::resource('/product', ProductController::class)
        ->except('show');

    Route::resource('/stock', StockController::class)
        ->only('index', 'update');

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/transaksi-masuk',
        TransaksiMasukController::class
    );

    Route::controller(TransaksiKeluarController::class)
    ->group(function () {

        Route::get(
            '/transaksi-keluar',
            'index'
        )->name('transaksi-keluar.index');
    });
    Route::controller(PrediksiController::class)->group(function () {

        Route::get('/prediksi', 'index')
            ->name('prediksi');

        Route::post('/prediksi/generate', 'generate')
            ->name('prediksi.generate');

    });

    Route::controller(ReportController::class)
    ->group(function () {

        Route::get(
            '/report',
            'index'
        )->name('report.index');
    });
    /*
    |--------------------------------------------------------------------------
    | USER & SETTING
    |--------------------------------------------------------------------------
    */

    Route::resource('/user', UserController::class);

    Route::controller(SettingController::class)
        ->group(function () {

            Route::get(
                '/setting',
                'index'
            )->name('setting.index');

            Route::put(
                '/setting/update/{user}',
                'update'
            )->name('setting.update');
        });
});


Route::get('/generate-barang', function () {

    $prompt = "halo";

    $gemini = new GeminiService();

    $result = $gemini->generate($prompt);

    dd($result);

});

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'customer',
    'as' => 'customer.',
    'middleware' => ['auth']
], function () {

    Route::get(
        '/dashboard',
        CustomerDashboardController::class
    )->name('dashboard');

    Route::resource(
        '/transaksi-masuk',
        CustomerTransaksiMasukController::class
    );

 Route::resource(
    '/transaksi-keluar',
    CustomerTransaksiKeluarController::class
);
    Route::resource(
        '/report',
        CustomerReportController::class
    );

     Route::controller(CustomerPrediksiController::class)
    ->group(function () {

        Route::get(
            '/prediksi',
            'index'
        )->name('prediksi');

    });

    Route::controller(CustomerSettingController::class)
        ->group(function () {

            Route::get(
                '/setting',
                'index'
            )->name('setting.index');

            Route::put(
                '/setting/update/{user}',
                'update'
            )->name('setting.update');
        });
});