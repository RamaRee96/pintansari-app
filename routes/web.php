<?php

use App\Http\Controllers\AuthController;
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



//Route::group(function(){
    
    //});
    
    Route::get('/login', [AuthController::class, 'login_page'])->name('login');
    
    Route::post('/login', [AuthController::class, 'login'])->name('submit_login');    
    
    Route::middleware('auth')->group(function(){
    
        //these routes are only displayed when the user is logged in

        Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    });

