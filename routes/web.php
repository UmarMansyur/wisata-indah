<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\GalleryController;
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

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/destination', function () {
    return view('destination.index');
})->name('destination');

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', function () {
        return view('authentication.login');
    })->name('login');

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::get('/pemesanan', function () {
        return view('admin.order.index');
    })->name('pemesanan');
    Route::group(['prefix' => 'pariwisata'], function () {
        Route::get('/', [DestinationController::class, 'index'])->name('Pariwisata');
        Route::get('/tambah', [DestinationController::class, 'create'])->name('Tambah Pariwisata');
        Route::post('/store', [DestinationController::class, 'store'])->name('Simpan Pariwisata');
        Route::get('/data', [DestinationController::class, 'getData'])->name('Data Pariwisata');
        Route::get('/{id}', [DestinationController::class, 'edit'])->name('Edit Pariwisata');
        Route::post('/update/{id}', [DestinationController::class, 'update'])->name('Update Pariwisata');
        Route::get('/delete/{id}', [DestinationController::class, 'destroy'])->name('Hapus Pariwisata');
    });

    Route::group(['prefix' => 'galeri'], function () {
        Route::get('/delete/{id}', [GalleryController::class, 'destroy'])->name('Hapus Galeri');
    });

    Route::group(['prefix'  => 'karyawan'], function() {
        Route::get('/', [EmployeController::class, 'index'])->name('Karyawan');
        Route::get('/delete/{id}', [EmployeController::class, 'destroy'])->name('Hapus Karyawan');
    });
});




