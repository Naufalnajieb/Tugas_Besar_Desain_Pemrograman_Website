<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\pengembaliancontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\transactioncontroller;
use App\Http\Controllers\ulasancontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route Bagian Awal
Route::get('/', [BarangController::class, 'show_public']);

//Route Setelah Login Masuk Ke Dashboard 
Route::get('/dashboard', [BarangController::class, 'show'
])->middleware(['auth', 'verified'])->name('dashboard');

//Route untuk bagian edit, update, dan delete Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

//Route bagian Booking barang
Route::get('/list_Booking', [BarangController::class, 'show_list'])->name('list_Booking');

//Route bagian Booking dan checkout barang
Route::get('/Booking/{indeks}', [BarangController::class, 'show_booking'])->name('booking');
Route::post('/Checkout', [BookingController::class, 'procces'])->name('procces');
Route::post('/Checkout_list/', [BookingController::class, 'checkout'])->name('checkout');
Route::get('/Checkout/success/{sql}', [BookingController::class, 'success'])->name('success');
Route::get('/Checkout/failed/{sql}', [BookingController::class, 'failed'])->name('failed');

//Route Bagian List Transaksi
Route::get('/Transaction', [transactioncontroller::class, 'index'])->name('transactions');

//Route bagian pengembalian dan Denda Barang
Route::get('/Pengembalian', [pengembaliancontroller::class, 'index'])->name('pengembalian');
Route::post('/Checkout_pengembalian', [pengembaliancontroller::class, 'procces'])->name('procces_denda');
Route::post('/Checkout_list_pengembalian/', [pengembaliancontroller::class, 'checkout'])->name('checkout_denda');
Route::get('/Checkout/success_pengembalian/{sql}', [pengembaliancontroller::class, 'success'])->name('success_denda');

//Route Melihat Record Transaksi
Route::get('/Record_Semua', [transactioncontroller::class, 'show_public'])->name('RecordS'); //Record Semua
Route::get('/Record_10', [transactioncontroller::class, 'show_10'])->name('Record10'); //Record 10 besar

//Route Melihat Ulasan
Route::get('/Ulasan', [ulasancontroller::class, 'index'])->name('ulasan'); //Ulasan
Route::post('/Ulasan_tampil', [ulasancontroller::class, 'stored'])->name('stored'); //Memasukkan value ulasan
Route::get('/Ulasan_Page', [ulasancontroller::class, 'show'])->name('tampilkan'); //Menmapilkan Ulasan di halaman header

//Route Melihat About US
Route::get('/About_Us', function(){
    return view('aboutus');
});
