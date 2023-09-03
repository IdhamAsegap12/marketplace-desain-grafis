<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduckController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\ManajemenProduckController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\RiwayatPembelianController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\LisensiController;

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

// Route::get('/', function () {
//     return view('home.index', [
//         'title' => 'Beranda'
//     ]);
// });

// // User
// Route::get('/desainer', [UserController::class, 'index']);
// Route::get('/desainer/detail/{user:user_name}', [UserController::class, 'detail']);

// // Produck
// Route::get('/produk', [ProduckController::class, 'index']);
// Route::get('/produk/detail/{slug}', [ProduckController::class, 'detail'])->name('produk.detail');
// Route::get('/produk/like/{id}', [ProduckController::class, 'like']);

// // Category
// Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

// // auth
// Route::get('/masuk', [AuthController::class, 'login'])->name('masuk')->middleware('guest');
// Route::post('/masuk', [AuthController::class, 'auth'])->name('masuk.auth');
// Route::get('/daftar', [AuthController::class, 'register'])->middleware('guest');
// Route::post('/daftar', [AuthController::class, 'store']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::get('/lupa-password', [AuthController::class, 'forgot'])->middleware('guest');
// Route::post('/lupa-password', [AuthController::class, 'send'])->middleware('guest');
// Route::get('/reset-password/{token}', [AuthController::class, 'reset'])->name('password.reset')->middleware('guest');
// Route::post('/reset-password', [AuthController::class, 'update'])->middleware('guest');

// // dashboard
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

// // manajemen user
// Route::resource('/manajemen-user', ManajemenUserController::class)->middleware('admin');

// // manajemen produck
// Route::resource('/manajemen-produk', ManajemenProduckController::class)->middleware('duo');
//     // Area kontributor
//     Route::post('/cek/{id}', [ManajemenProduckController::class, 'cek'])->middleware('admin');
//     Route::post('/setuju/{id}', [ManajemenProduckController::class, 'setuju'])->middleware('admin');
//     Route::post('/tolak/{id}', [ManajemenProduckController::class, 'tolak'])->middleware('admin');
//     // Area desainer
//     Route::post('/tinjau/{id}', [ManajemenProduckController::class, 'tinjau'])->middleware('admin');
//     Route::post('/disetujui/{id}', [ManajemenProduckController::class, 'disetujui'])->middleware('admin');
//     Route::post('/ditolak/{id}', [ManajemenProduckController::class, 'ditolak'])->middleware('admin');

// // upload
// Route::resource('/upload', UploadController::class)->middleware('duo');

// // profil
// Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
// Route::post('/profil/{user_name}', [ProfilController::class, 'edit'])->name('profil.edit')->middleware('auth');

// // Beli
// Route::get('/beli/{slug}', [BeliController::class, 'index'])->middleware('auth');

// // Bayar
// Route::get('/bayar/{reference}/{slug}', [BayarController::class, 'index'])->name('bayar.index')->middleware('auth');
// Route::post('/bayar', [BayarController::class, 'store'])->middleware('auth');

// // Riwayat pembelian
// Route::get('riwayat-pembelian', [RiwayatPembelianController::class, 'index'])->middleware('auth');

// // callback
// Route::post('/callback', [CallbackController::class, 'handle']);

// // Download
// Route::get('/unduh', [DownloadController::class, 'index'])->middleware('auth');
// Route::get('/unduh/{id}', [DownloadController::class, 'download'])->middleware('auth');

// // Pendapatan
// Route::get('/manajemen-pendapatan', [PendapatanController::class, 'index'])->middleware('duo');


// // Pencairan
// Route::get('/pencairan/{user_name}', [PencairanController::class, 'index'])->middleware('desainer');
// Route::post('/pencairan', [PencairanController::class, 'store']);
// Route::post('/pencairan/send/{id}', [PencairanController::class, 'send']);
// Route::post('/pencairan/confirm/{id}', [PencairanController::class, 'confirm']);
// Route::post('/pencairan/delete/{id}', [PencairanController::class, 'delete']);

// // Keranjang
// Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware('auth');
// Route::post('/tambah-keranjang/{id}', [KeranjangController::class, 'tambah'])->middleware('auth');
// Route::post('/hapus-keranjang/{id}', [KeranjangController::class, 'hapus'])->middleware('auth');

// // kontributor
// Route::get('/kontributor', [KontributorController::class, 'index'])->middleware('customer');
// Route::post('/kontributor', [KontributorController::class, 'create'])->middleware('customer');

// // syarat dan ketentuan
// Route::get('/terms-condition', function(){
//     return view('syarat-ketentuan.index', [
//         'title' => 'syarat & ketentuan'
//     ]);
// });

// // notifikasi
// Route::get('/notifikasi', [PesanController::class, 'index'])->middleware('auth');
// Route::post('/notifikasi/delete/{id}', [PesanController::class, 'delete'])->middleware('auth');


// // Lisensi
// Route::get('/download-lisensi', [LisensiController::class, 'download'])->middleware('auth');
