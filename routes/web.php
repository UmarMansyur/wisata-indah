<?php

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

    Route::get('/pariwisata/tambah', function () {
        return view('admin.destination.create');
    })->name('Tambah Pariwisata');

});




