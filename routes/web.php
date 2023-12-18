<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

        Route::prefix('patients')->group(function(){
            
            Route::get('create', [PatientController::class, 'create'])->name('patients_create');

        });
    });

    // Route ADMIN untuk sidebar di halaman admin
    // Resepsionis
    Route::get('/resepsionis', [DashboardController::class, 'resepsionis']);
    // dokter
    Route::get('/dokter', [DashboardController::class, 'dokter']);
    // apoteker
    Route::get('/apoteker', [DashboardController::class, 'apoteker']);

    

