<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ShowDashboard;
use App\Http\Middleware\EnsureGrantedToAccessMobilTangki;
use App\Http\Controllers\Checklist\HarianChecklistController;
use App\Http\Controllers\Checklist\BulananChecklistController;
use App\Http\Controllers\Checklist\MingguanChecklistController;
use App\Http\Controllers\MobilTangki\Search as SearchMobilTangki;
use App\Http\Controllers\MobilTangki\RequestAccess as RequestAccessMobilTangki;

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
Route::view('/', 'front_page')->name('front_page');
Route::prefix('/mobil-tangki')->name('mobil_tangki.')->group(function ()
{
    Route::get('/search', SearchMobilTangki::class)->name('search');
    Route::post('/request-access', RequestAccessMobilTangki::class)->name('request_access');
});
Route::prefix('/checklist')->name('checklist.')->middleware(EnsureGrantedToAccessMobilTangki::class)->group(function ()
{
    Route::view('/', 'checklist.options')->name('options');
    Route::prefix('/harian')->name('harian.')->group(function ()
    {
        Route::get('/create', [HarianChecklistController::class, 'create'])->name('create');
        Route::post('/', [HarianChecklistController::class, 'store'])->name('store');
    });
    Route::name('mingguan.')->prefix('/mingguan')->group(function ()
    {
        Route::get('/create', [MingguanChecklistController::class, 'create'])->name('create');
        Route::post('/', [MingguanChecklistController::class, 'store'])->name('store');
    });
    Route::name('bulanan.')->prefix('/bulanan')->group(function ()
    {
        Route::get('/create', [BulananChecklistController::class, 'create'])->name('create');
        Route::post('/', [BulananChecklistController::class, 'store'])->name('store');
    });
});
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function ()
{
    Route::get('/', ShowDashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
