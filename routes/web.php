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
Route::middleware('guest')->group(function(){

    Route::get('/login', [AuthController::class, 'login_page'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('submit_login');
        

});
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    
        
// Route menampilkan dashboard admin setelah login
Route::middleware('connected')->group(function(){
    
    //these routes are only displayed when the user is logged in

    // Dashboard Admin
    Route::get('/', [AuthController::class, 'index'])->name('dashboard');

    // Create Pasien
    Route::prefix('patients')->group(function(){
            
        Route::get('/create', [PatientController::class, 'create'])->name('patients_create');

    });
        
});

// Route ADMIN untuk sidebar di halaman admin
Route::group(['prefix' => 'admin'], function() {
    // Resepsionis
    Route::get('/resepsionis', [DashboardController::class, 'resepsionis']);
    // Dashboard Admin Tambah Resepsionis
    Route::get('/tambahResepsionis', [AdminController::class, 'createResepsionis']);
    // dokter
    Route::get('/dokter', [DashboardController::class, 'dokter']);
    // Dashboard Admin Tambah Dokter
    Route::get('/tambahDokter', [AdminController::class, 'createDokter']);
    // apoteker
    Route::get('/apoteker', [DashboardController::class, 'apoteker']);
    // Dashboard Admin Tambah Apoteker
    Route::get('/tambahApoteker', [AdminController::class, 'createApoteker']);

});

// Route Resepsionis
Route::group(['prefix' => 'resepsionis'], function() {
    Route::get('/dataPasien', [ReceptionistController::class, 'dataPasien']);
    Route::get('/editDataPasien', [ReceptionistController::class, 'editDataPasien']);

});


// Route Dokter
Route::group(['prefix' => 'dokter'], function() {
    Route::get('/rekam-medis', [DokterController::class, 'getRekamMedis']);
    Route::get('/dataResep', [DokterController::class, 'dataResep']);

});

// Route Apoteker
Route::group(['prefix' => 'apoteker'], function() {
    Route::get('/dataObat', [ApotekerController::class, 'dataObat']);

});




