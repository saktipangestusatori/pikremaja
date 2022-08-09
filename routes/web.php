<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataKonselorController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KonselingController;
use App\Http\Controllers\Admin\LaporanAdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\LaporanKonselingController as AdminLaporanKonselingController;
use App\Http\Controllers\Admin\ManagementUsers;
use App\Http\Controllers\Admin\OrangTuaController;;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Konselor\DashboardKonselorController;
use App\Http\Controllers\Konselor\KonselingRemajaController as KonselorKonselingRemajaController;
use App\Http\Controllers\Konselor\LaporanKonselingController as KonselorLaporanKonselingController;
use App\Http\Controllers\Ortu\CategoryController as OrtuCategoryController;
use App\Http\Controllers\Ortu\ContentController;
use App\Http\Controllers\Ortu\DashboardController as OrtuDashboardController;
use App\Http\Controllers\Remaja\DashboardController as RemajaDashboardController;
use App\Http\Controllers\Remaja\InformasiRemajaController;
use App\Http\Controllers\Remaja\KonselingRemajaController;
use App\Http\Controllers\Remaja\LaporanKonselingController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard-admin', [DashboardController::class, 'index']);
    Route::post('/management-user/ganti-password/{id}', [ManagementUsers::class, 'gantiPassword'])
                ->name('management-users.ganti-password');
    Route::post('/data-admin/ganti-password/{id}', [DataAdminController::class, 'gantiPassword'])
                ->name('data-admin.ganti-password');
    Route::resource('/management-users', ManagementUsers::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/konseling-admin', KonselingController::class);
    Route::resource('/laporan-admin', LaporanAdminController::class);
    Route::resource('/data-admin', DataAdminController::class);
    Route::resource('/data-konselor', DataKonselorController::class);
    Route::resource('/anak', AnakController::class);
    Route::resource('/orang-tua', OrangTuaController::class);
    Route::resource('/guru', GuruController::class);
   
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard-remaja', [RemajaDashboardController::class, 'index']);
    Route::resource('/informasi-remaja', InformasiRemajaController::class);
    Route::resource('/konseling', KonselingRemajaController::class);
    Route::resource('/laporan', LaporanKonselingController::class);
    Route::get('/content-guru/{category}', [GuruDashboardController::class, 'category'])->name('content-guru.category');
    Route::get('/content-guru/{category}/{id}', [GuruDashboardController::class, 'content'])->name('content-guru.id');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard-konselor', [DashboardKonselorController::class, 'index']);
      Route::post('/data-konselor/ganti-password/{id}', [DataKonselorController::class, 'gantiPassword'])
                ->name('data-konselor.ganti-password');
    Route::resource('/konseling-konselor', KonselorKonselingRemajaController::class);
    Route::resource('/laporan-konselor', KonselorLaporanKonselingController::class);
    Route::get('/content-orang-tua-anak/{slug}', [ContentController::class, 'index'])->name('ortu-anak.slug');
    Route::get('/content-orang-tua-anak/{slug}/{category}', [ContentController::class, 'category'])->name('ortu-anak.category');
    Route::get('/content-orang-tua-anak/{slug}/{category}/{id}', [ContentController::class, 'content'])->name('ortu-anak.id');
});