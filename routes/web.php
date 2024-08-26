<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaketWisataController;
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
    // count detail packet destination
    $packet_destination = DetailTransaction::select('destination_packet_id')
        ->groupBy('destination_packet_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(10)
        ->get();
    $tour = [];
   foreach ($packet_destination as $key => $value) {
      $tour= Tour::join('detail_packet_destinations', 'detail_packet_destinations.tour_id', '=', 'tours.id')
            ->where('detail_packet_destinations.packet_destination_id', $value->destination_packet_id)->get();
    }
    $tours = Tour::with(['detailTour', 'detailTour', 'detailTour.typeTour'])->orderBy('id', 'desc')->paginate(10);
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

Route::get('/paket-wisata', [PaketWisataController::class, 'index'])->name('Paket Wisata');
Route::get('/paket-wisata/{id}', [PaketWisataController::class, 'show'])->name('Detail Paket Wisata');
Route::get('/keranjang', [PaketWisataController::class, 'cart'])->name('Keranjang');
Route::post('/pesan', [PaketWisataController::class, 'checkout'])->name('Pesan');


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
Route::get('/forgot-password/admin', [AuthenticationController::class, 'forgot_password'])->name('forgot');
Route::post('/forgot-password/admin', [AuthenticationController::class, 'sendVerificationPassword'])->name('forgot');
Route::get('/reset-password/{id}', [AuthenticationController::class, 'reset_password'])->name('reset-password');
Route::post('/change-password', [AuthenticationController::class, 'update_password'])->name('reset-password');

Route::post('/login/admin', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'pemesanan'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('Pemesanan');
        Route::get('/detail/{id}', [OrderController::class, 'show'])->name('Detail Pemesanan');
        Route::get('/data', [OrderController::class, 'getData'])->name('Data Pemesanan');
        Route::get('/detail/reject/{id}', [OrderController::class, 'reject']);
        Route::get('/detail/approve/{id}', [OrderController::class, 'approve']);
        Route::get('/detail/cancel/{id}', [OrderController::class, 'cancel']);
    });

    Route::group(['prefix' => 'rute-terbaik'], function() {
        Route::get('/', [DestinationController::class, 'ruteTerbaik'])->name('Rute Terbaik');
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
    Route::group(['prefix'  => 'karyawan'], function () {
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
    Route::group(['prefix' => 'paket-pariwisata'], function () {
        Route::get('/', [PaketWisataController::class, 'adminIndex'])->name('Manajamen Paket Wisata');
        Route::get('/create', [PaketWisataController::class, 'adminTambah'])->name('Tambah Paket Wisata');
        Route::post('/store', [PaketWisataController::class, 'adminStore'])->name('Simpan Paket Wisata');
        Route::get('/data-json', [PaketWisataController::class, 'getData'])->name('Get Data Paket Wisata');
        Route::get('/{id}', [PaketWisataController::class, 'adminEdit'])->name('Edit Paket Wisata');
        Route::get('/gallery/delete/{id}', [PaketWisataController::class, 'destroyGallery'])->name('Hapus Galeri Paket Wisata');
        Route::POST('/update/data/{id}', [PaketWisataController::class, 'adminEditStore'])->name('Ubah Paket Wisata');
    });
});
