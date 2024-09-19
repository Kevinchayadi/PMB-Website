<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
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
Route::get('/profile-pmb', [LandingController::class, 'profile'])->name('companyProfile');
Route::get('/sejarah', [LandingController::class, 'home'])->name('sejarahPMB');
Route::get('/doa', [LandingController::class, 'home']);
Route::get('/fasilitas', [LandingController::class, 'home']);
Route::get('/pastor', [LandingController::class, 'pastor']);
Route::get('/kegiatan', [LandingController::class, 'kegiatan']);
Route::get('/jadwal', [LandingController::class, 'jadwal']);
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail']);


Route::middleware('guest:web')->group(function () {
    Route::get('/login', [LoginController::class, 'umatIndex'])->name('umat.login'); 
    Route::post('/login', [LoginController::class, 'umatLogin']); 
    
    Route::get('/register', [RegisterController::class, 'umatIndex'])->name('umat.register'); 
    Route::post('/register', [RegisterController::class, 'umatRegister'])->name('umat.register.submit');
});


Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [LoginController::class, 'umatIndex'])->name('admin.login'); 
    Route::post('/login', [LoginController::class, 'umatLogin']); 
    
    Route::get('/register', [RegisterController::class, 'umatIndex'])->name('admin.register'); 
    Route::post('/register', [RegisterController::class, 'umatRegister']);
});

Route::prefix('admin')->middleware('Auth:admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('admin.dashboard'); 
    Route::get('/request-manage', [DashboardController::class, 'requestIndex'])->name('admin.dashboard');
    Route::get('/request-manage/{id}', [DashboardController::class, 'requestDetail'])->name('admin.dashboard');
    Route::get('/request-manage/approve/{id}', [DashboardController::class, 'requestApprove'])->name('admin.dashboard');
    Route::get('/request-manage/reject/{id}', [DashboardController::class, 'requestReject'])->name('admin.dashboard');
    Route::get('/admin-manage', [DashboardController::class, 'adminIndex'])->name('admin.dashboard'); 
    Route::get('/admin-manage/{id}', [DashboardController::class, 'adminDetail'])->name('admin.dashboard');
    Route::get('/admin-manage/create', [DashboardController::class, 'adminCreate'])->name('admin.dashboard');
    Route::post('/admin-manage/create', [DashboardController::class, 'adminStore'])->name('admin.dashboard');
    Route::get('/admin-manage/edit/{id}', [DashboardController::class, 'adminEdit'])->name('admin.dashboard');
    Route::put('/admin-manage/edit/{id}', [DashboardController::class, 'adminUpdate'])->name('admin.dashboard');
    Route::delete('/admin-manage/delete/{id}', [DashboardController::class, 'adminDelete'])->name('admin.dashboard');
    Route::get('/role-manage', [DashboardController::class, 'roleIndex'])->name('admin.dashboard');
    Route::get('/role-manage/create', [DashboardController::class, 'roleCreate'])->name('admin.dashboard');
    Route::post('/role-manage/create', [DashboardController::class, 'roleStore'])->name('admin.dashboard');
    Route::delete('/role-manage/delete/{id}', [DashboardController::class, 'roleDelete'])->name('admin.dashboard');

    Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('admin.dashboard'); 
    Route::get('/dashboard', [DashboardController::class, 'dashboardIndex'])->name('admin.dashboard'); 
});