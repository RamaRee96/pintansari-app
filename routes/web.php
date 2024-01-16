<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReceptionistController;
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


// Route untuk autentifikasi admin login
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login_page'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('submit_login');
        

});
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    

// Route menampilkan dashboard admin setelah login
Route::middleware(['connected', 'auth'])->group(function () {
    
    //these routes are only displayed when the user is logged in

    // Dashboard Admin
    Route::get('/', [AuthController::class, 'index'])->name('dashboard');

    // Create Pasien
    Route::prefix('patients')->group(function () {
        
        Route::get('/create', [PatientController::class, 'create'])->name('patients_create');
        Route::post('/create', [PatientController::class, 'store'])->name('patients_store');

    });

});

// Route ADMIN untuk sidebar di halaman admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Resepsionis
    Route::get('/resepsionis', [DashboardController::class, 'resepsionis']);
    // Dashboard Admin Tambah Resepsionis
    Route::get('/tambahResepsionis', [AdminController::class, 'createResepsionis']);
    Route::post('/tambahResepsionis', [AdminController::class, 'storeResepsionis'])->name('store_resepsionis');
    // dokter
    Route::get('/dokter', [DashboardController::class, 'dokter']);
    // Dashboard Admin Tambah Dokter
    Route::get('/tambahDokter', [AdminController::class, 'createDokter']);
    Route::post('/tambahDokter', [AdminController::class, 'storeDokter'])->name('store_dokter');
    // apoteker
    Route::get('/apoteker', [DashboardController::class, 'apoteker']);
    // Dashboard Admin Tambah Apoteker
    Route::get('/tambahApoteker', [AdminController::class, 'createApoteker']);
    Route::post('/tambahApoteker', [AdminController::class, 'storeApoteker'])->name('store_apoteker');

});

// Route Resepsionis
Route::group(['prefix' => 'resepsionis', 'middleware' => 'auth'], function () {
    Route::get('/dataPasien', [ReceptionistController::class, 'dataPasien']);
    Route::get('/editDataPasien', [ReceptionistController::class, 'editDataPasien']);
    Route::get('/rekam-medis', [ReceptionistController::class, 'rekamMedis']);
    Route::get('/rekam-medis/create', [ReceptionistController::class, 'createRekamMedis']);

});


// Route Dokter
Route::group(['prefix' => 'dokter', 'middleware' => 'auth'], function () {
    Route::get('/rekam-medis', [DokterController::class, 'getRekamMedis']);
    Route::get('/rekam-medis/{id}', [DokterController::class, 'showRekamMedis']);
    Route::post('/rekam-medis/{id}', [DokterController::class, 'updateRekamMedis'])->name("updateRekamMedisDokter");
    Route::get('/dataResep', [DokterController::class, 'dataResep']);

});

// Route Apoteker
Route::group(['prefix' => 'apoteker', 'middleware' => 'auth'], function () {
    Route::get('/dataObat', [ApotekerController::class, 'dataObat']);
    Route::get('/tambah-obat', [ApotekerController::class, 'tambahObat']);
    Route::post('/tambah-obat', [ApotekerController::class, 'createObat'])->name('createObat');
    Route::get('/edit-obat/{id}', [ApotekerController::class, 'editObat']);
    Route::post('/edit-obat/{id}', [ApotekerController::class, 'updateObat'])->name('updateObat');
    Route::post('/hapus-obat/{id}', [ApotekerController::class, 'deleteObat'])->name('deleteObat');

    Route::get('/pasien-sudah-diperiksa', [ApotekerController::class, 'pasienSudahDiperiksa']);
    Route::get('/edit-rekam-medis/{id}', [ApotekerController::class, 'editRekamMedis']);
    Route::post('/edit-rekam-medis/{id}', [ApotekerController::class, 'updateRekamMedis'])->name('updateRekamMedisApoteker');

});
