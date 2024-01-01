<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Models\DetailTransaction;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Tour;
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
    $tour_id = DetailTransaction::select('tour_id')->groupBy('tour_id')->orderBy('tour_id', 'desc')->paginate(10);
    $tour = Tour::whereIn('id', $tour_id->pluck('tour_id'))->orderBy('id', 'desc')->paginate(10);
    $tours = Tour::with(['typeTour', 'user', 'costTour'])->with('costTour.passenger')->paginate(10);
    $sumenep = Tour::where('district', 'Sumenep')->count();
    $pamekasan = Tour::where('district', 'Pamekasan')->count();
    $sampang = Tour::where('district', 'Sampang')->count();
    $bangkalan = Tour::where('district', 'Bangkalan')->count();
    $data = [
        'sumenep' => $sumenep,
        'pamekasan' => $pamekasan,
        'sampang' => $sampang,
        'bangkalan' => $bangkalan
    ];
    return view('home.index', compact('tour', 'tours', 'data'));
})->name('home');

Route::get('/about', function () {
    $team = Team::orderBy('id', 'desc')->paginate(10);
    $testimonial = Testimonial::orderBy('id', 'desc')->paginate(10);
    return view('about.index', compact('team', 'testimonial'));
})->name('about');

Route::group(['prefix' => 'destination'], function () {
    Route::get('/', [DestinationController::class, 'destinasi_landing'])->name('destination');
    Route::get('/detail/{id}', [DestinationController::class, 'showDetail'])->name('detail destination');
    Route::post('/send-mail', [DestinationController::class, 'sendMail'])->name('send mail');
});

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');



Route::get('/login/admin', function () {
    return view('authentication.login');
})->name('login');

Route::get('/logout/admin', [AuthenticationController::class, 'logout'])->name('logout');

Route::post('/login/admin', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'pemesanan'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('Pemesanan');
        Route::get('/detail/{id}', [OrderController::class, 'show'])->name('Detail Pemesanan');
        Route::get('/delete/{id}', [OrderController::class, 'destroy'])->name('Hapus Pemesanan');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('Edit Pemesanan');
        Route::get('/update/data/{id}', [OrderController::class, 'getDataEdit'])->name('Get Data Pemesanan');
        Route::get('/data', [OrderController::class, 'getData'])->name('Data Pemesanan');
        Route::post('/add-cart', [OrderController::class, 'store'])->name('Tambah Order');
        Route::post('/update-cart/${id}', [OrderController::class, 'changeOrder'])->name('Ganti Order');
        Route::get('/tambah', [OrderController::class, 'create'])->name('Tambah Pemesanan');
    });
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
        Route::post('/store', [EmployeController::class, 'store'])->name('Simpan Karyawan');
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/about', [SettingController::class, 'about'])->name('Team');
        Route::get('/team/delete/{id}', [SettingController::class, 'destroy'])->name('Hapus Team');
        Route::post('/store', [SettingController::class, 'store'])->name('Simpan Team');

        Route::get('/testimonial', [SettingController::class, 'testimonial'])->name('Testimonial');
        Route::get('/testimonial/delete/{id}', [SettingController::class, 'destroyTestimonial'])->name('Hapus Testimonial');
        Route::post('/store/testimonial', [SettingController::class, 'storeTestimonial'])->name('Simpan Testimonial');
    });
});




