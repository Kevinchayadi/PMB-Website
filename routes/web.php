<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\hubungiController;
use App\Http\Controllers\layananController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/profile/profile', [profileController::class, 'profile'])->name('profile');
Route::get('/profile/sejarah', [profileController::class, 'sejarah'])->name('sejarah');
Route::get('/profile/doa', [profileController::class, 'doa'])->name('doa');
Route::get('/profile/fasilitas', [profileController::class, 'fasilitas'])->name('fasilitas');
Route::get('/profile/pastor', [profileController::class, 'pastor'])->name('pastor');
Route::get('/profile/kegiatan', [profileController::class, 'kegiatan'])->name('kegiatan');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail'])->name('jadwal');
Route::get('/artikel', [LandingController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [LandingController::class, 'artikeldetail'])->name('artikel');
Route::get('/layanan', [layananController::class, 'layanan'])->name('layanan');
Route::get('/hubungi', [hubungiController::class, 'hubungi'])->name('hubungi');

Route::middleware('guest:web')->group(function () {
    Route::get('/login', [LoginController::class, 'umatIndex'])->name('umat.login');
    Route::get('/register', [RegisterController::class, 'umatIndex'])->name('umat.register');
});

Route::prefix('admin')
    //Comment dlu bang
    // ->middleware('guest:admin')
    ->group(function () {
        Route::get('/login', [LoginController::class, 'adminIndex'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'adminLogin']);
    });

Route::prefix('admin')
    ->middleware('Auth:admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/register', [RegisterController::class, 'adminIndex'])->name('admin.register');
        
        Route::get('/admin-list', [AdminController::class, 'index'])->name('admin.admin-list');
        Route::get('/add-admin', [AdminController::class, 'addAdmin'])->name('admin.addForm');
        Route::post('/add-admin', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
        Route::get('/admin-detail/{slug}', [AdminController::class, 'detailAdmin'])->name('admin.detailAdmin');
        Route::put('/admin-detail/{slug}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
        Route::delete('/remove-admin/{slug}', [AdminController::class, 'removeAdmin'])->name('admin.remove');
        Route::get('/removed-admin-list', [AdminController::class, 'adminRemoved'])->name('admin.removedList');
        Route::get('/restore/{slug}', [AdminController::class, 'restore'])->name('admin.restored');



        Route::get('/acara', [AcaraController::class, 'acaraIndex'])->name('admin.acara');
        Route::get('/add-acara', [AcaraController::class, 'addAcara'])->name('admin.addAcaraForm');
        Route::post('/add-acara', [AcaraController::class, 'storeAcara'])->name('admin.addAcara');
        Route::get('/edit-acara/{slug}', [AcaraController::class,'updateAcara'])->name('admin.updateAcaraForm');
        Route::put('/edit-acara/{slug}', [AcaraController::class,'updatedAcara'])->name('admin.updateAcara');
        Route::delete('/delete-acara/{slug}', [AcaraController::class, 'deleteAcara'])->name('admin.deleteAcara');



        Route::get('/transactions', [TransaksiController::class, 'index'])->name('admin.transaksi');
        Route::get('/add-misa', [TransaksiController::class,'addMisa'])->name('admin.Add.Misa');
        Route::get('/add-sakramen-baptis', [TransaksiController::class,'addSakramenBaptis'])->name('admin.Add.SakramenBaptis');
        Route::get('/add-sakramen-Tobat',[TransaksiController::class,'addSakramenTobat'])->name('admin.add.SakramenTobat');
        Route::get('/add-komuni-pertama',[TransaksiController::class,'addKomuniPertama'])->name('admin.add.KomuniPertama');
        Route::get('/add-krisma',[TransaksiController::class,'addKrisma'])->name('admin.add.Krisma');
        Route::get('/add-pernikahan',[TransaksiController::class,'addPernikahan'])->name('admin.add.Pernikahan');
        Route::get('/add-pengurapan-sakit',[TransaksiController::class,'addPengurapan'])->name('admin.add.Pengurapan');

        Route::post('/add-misa', [TransaksiController::class,'storeMisa'])->name('admin.store.Misa');
        Route::post('/add-sakramen-baptis', [TransaksiController::class,'storeSakramenBaptis'])->name('admin.store.SakramenBaptis');
        Route::post('/add-sakramen-Tobat',[TransaksiController::class,'storeSakramenTobat'])->name('admin.store.SakramenTobat');
        Route::post('/add-komuni-pertama',[TransaksiController::class,'storeKomuniPertama'])->name('admin.store.KomuniPertama');
        Route::post('/add-krisma',[TransaksiController::class,'storeKrisma'])->name('admin.store.Krisma');
        Route::post('/add-pernikahan',[TransaksiController::class,'storePernikahan'])->name('admin.store.Pernikahan');
        Route::post('/add-pengurapan-sakit',[TransaksiController::class,'storePengurapan'])->name('admin.store.Pengurapan');

        Route::get('/update-misa/{slug}', [TransaksiController::class,'updateMisa'])->name('admin.update.Misa');
        Route::get('/update-sakramen-baptis/{slug}', [TransaksiController::class,'updateSakramenBaptis'])->name('admin.update.SakramenBaptis');
        Route::get('/update-sakramen-Tobat/{slug}', [TransaksiController::class,'updateSakramenTobat'])->name('admin.update.SakramenTobat');
        Route::get('/update-komuni-pertama/{slug}', [TransaksiController::class,'updateKomuniPertama'])->name('admin.update.KomuniPertama');
        Route::get('/update-krisma/{slug}', [TransaksiController::class,'updateKrisma'])->name('admin.update.Krisma');
        Route::get('/update-pernikahan/{slug}', [TransaksiController::class,'updatePernikahan'])->name('admin.update.Pernikahan');
        Route::get('/update-pengurapan-sakit/{slug}', [TransaksiController::class,'updatePengurapan'])->name('admin.update.Pengurapan');

        Route::put('/update-misa/{slug}', [TransaksiController::class,'updatedMisa'])->name('admin.updated.Misa');
        Route::put('/update-sakramen-baptis/{slug}', [TransaksiController::class,'updatedSakramenBaptis'])->name('admin.updated.SakramenBaptis');
        Route::put('/update-sakramen-Tobat/{slug}', [TransaksiController::class,'updatedSakramenTobat'])->name('admin.updated.SakramenTobat');
        Route::put('/update-komuni-pertama/{slug}', [TransaksiController::class,'updatedKomuniPertama'])->name('admin.updated.KomuniPertama');
        Route::put('/update-krisma/{slug}', [TransaksiController::class,'updatedKrisma'])->name('admin.updated.Krisma');
        Route::put('/update-pernikahan/{slug}', [TransaksiController::class,'updatedPernikahan'])->name('admin.updated.Pernikahan');
        Route::put('/update-pengurapan-sakit/{slug}', [TransaksiController::class,'updatedPengurapan'])->name('admin.updated.Pengurapan');

    
    });

Route::middleware('auth:web')->group(function () {});
