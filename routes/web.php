<?php

use App\Http\Controllers\LandingController;
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

Route::redirect('/', 'home');
Route::get('/home', [LandingController::class, 'home']);
Route::get('/profile-pmb', [LandingController::class, 'profile']);
Route::get('/sejarah', [LandingController::class, 'home']);
Route::get('/doa', [LandingController::class, 'home']);
Route::get('/fasilitas', [LandingController::class, 'home']);
Route::get('/pastor', [LandingController::class, 'pastor']);
Route::get('/kegiatan', [LandingController::class, 'kegiatan']);
Route::get('/jadwal', [LandingController::class, 'jadwal']);
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail']);

Route::get('/login', [LandingController::class, 'jadwalDetail']);
Route::get('/register', [LandingController::class, 'jadwalDetail']);

