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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route pendaftaran
Route::get('/list-siswa', [App\Http\Controllers\PendaftaranController::class, 'index']);
Route::get('/status/{id}', [App\Http\Controllers\PendaftaranController::class, 'status'])->name('status');
Route::get('/daftar-siswa', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('daftar');
Route::post('/tambah-siswa', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('tambah.siswa');


//admin
Route::resource('/admins', App\Http\Controllers\AdminController::class);

// Untuk Payment 
Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index']);
Route::get('/createPayment', [App\Http\Controllers\PaymentController::class, 'createPayment']);
Route::post('/insertTagihans', [App\Http\Controllers\PaymentController::class, 'insertTagihans']);
Route::get('/tagihan', [App\Http\Controllers\PaymentController::class, 'tagihan']);
Route::post('/insertPembayaran', [App\Http\Controllers\PaymentController::class, 'insertPembayaran']);

//untuk ubah password
Route::get('account/password', [App\Http\Controllers\Account\PasswordController::class, 'edit'])->name('password.edit');
Route::patch('account/password', [App\Http\Controllers\Account\PasswordController::class, 'update'])->name('password.edit');

//untuk siswa
Route::resource('/siswas', App\Http\Controllers\SiswaController::class);
Route::get('/dashboard.siswa', [App\Http\Controllers\SiswaController::class, 'dashboard'])->name('siswa');
//laporan pembayaran
Route::resource('/laporans', App\Http\Controllers\LaporanController::class);