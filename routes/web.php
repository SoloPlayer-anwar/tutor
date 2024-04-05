<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\OptionDinas;
use App\Http\Controllers\OptionDinasController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\SearchBerkasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('dash');
})->name('/');

Route::get('camera', function () {
    return view('camera');
})->name('camera');

Route::match(["GET", "POST"], "/register", function() {
    return redirect('/login');
})->name("register");

Auth::routes();




Route::resource('regis', RegisController::class);
Route::resource('search', SearchBerkasController::class);

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::get('btnLaporan', [UserController::class, 'btnLaporan'])->name('btnLaporan');
    Route::get('cetakPdf/{tgl_awal}/{tgl_akhir}', [UserController::class, 'cetakPdf'])->name('cetakPdf');
    Route::get('cetak_excel/{tgl_awal}/{tgl_akhir}', [UserController::class, 'cetak_excel'])->name('cetak_excel');
    Route::resource('dinas', DinasController::class);
    Route::resource('izin', IzinController::class);
    Route::resource('berkas', BerkasController::class);
    Route::resource('optiondinas', OptionDinasController::class);
});
