<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TahunAjaranController;
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

Route::get('/',function()
{
   return redirect('/login'); 
});

Route::get('login',[AuthController::class,'loginPage'])->name('login');
Route::post('login',[AuthController::class,'loginCheck']);
Route::get('logout',[AuthController::class,'logout']);

Route::middleware(['auth'])->group(function () {
    // route standard
   Route::group(['prefix'=>'admin','middleware'=>'Role:admin'],function () {
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/dashboard', DashboardController::class);  
    Route::resource('/kelas', KelasController::class);
    Route::resource('/jurusan', JurusanController::class);
    Route::resource('/guru', GuruController::class);
    Route::resource('/rekap', RekapController::class);
    Route::resource('/tahun_ajaran', TahunAjaranController::class);
    Route::resource('/laporan', LaporanController::class);

   });

    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/rekap', RekapController::class);
    Route::resource('/laporan', LaporanController::class);

   

    // route import data
    Route::post('/import/siswa',[ImportController::class,'siswaImport']);
    Route::post('/import/jurusan',[ImportController::class,'jurusanImport']);
    Route::post('/import/kelas',[ImportController::class,'kelasImport']);
    Route::post('/import/guru',[ImportController::class,'guruImport']);

    // route export data View
    Route::get('/export/guru',[ExportController::class,'guruExport']);
    Route::get('/export/siswa',[ExportController::class,'siswaExport']);
    Route::get('/export/jurusan',[ExportController::class,'jurusanExport']);
    Route::get('/export/kelas',[ExportController::class,'kelasExport']);
    Route::get('/export/rekap',[ExportController::class,'rekapView']);

    // route export data download
    Route::post('/export/guru/post',[ExportController::class,'guruExport']);
    Route::post('/export/siswa/post',[ExportController::class,'siswaExport']);
    Route::post('/export/jurusan/post',[ExportController::class,'jurusanExport']);
    Route::post('/export/kelas/post',[ExportController::class,'kelasExport']);
    Route::post('/export/rekap/post',[ExportController::class,'rekapExport']);


});

