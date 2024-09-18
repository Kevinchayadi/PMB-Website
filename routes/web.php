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
Route::get('/home', [LandingController::class, 'home'])->name('home');
Route::get('/profile/profile', [LandingController::class, 'profile'])->name('profile');
Route::get('/profile/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('profile/doa', [LandingController::class, 'doa'])->name('doa');
Route::get('profile/fasilitas', [LandingController::class, 'fasilitas'])->name('fasilitas');
Route::get('profile/pastor', [LandingController::class, 'pastor'])->name('pastor');
Route::get('profile/kegiatan', [LandingController::class, 'kegiatan'])->name('kegiatan');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail']);

Route::get('/login', [LandingController::class, 'jadwalDetail']);
Route::get('/register', [LandingController::class, 'jadwalDetail']);

