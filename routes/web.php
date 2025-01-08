<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\hubungiController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UmatController;
use App\Http\Controllers\doaController;
use App\Http\Controllers\pastorController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\LogoutController;
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
Route::get('/dashboard', [LandingController::class, 'Dashboard'])->name('dashboard')->middleware('auth');
Route::get('/profile/visiMisi', [ProfileController::class, 'visiMisi'])->name('visiMisi');
Route::get('/profile/sejarah', [ProfileController::class, 'sejarah'])->name('sejarah');
Route::get('/profile/doa', [ProfileController::class, 'doa'])->name('doa');
Route::get('/profile/fasilitas', [ProfileController::class, 'fasilitas'])->name('fasilitas');
Route::get('/profile/pastor', [ProfileController::class, 'pastor'])->name('pastor');
Route::get('/profile/kegiatan', [ProfileController::class, 'kegiatan'])->name('kegiatan');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail'])->name('jadwal');
Route::get('/artikel', [LandingController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [LandingController::class, 'artikeldetail'])->name('artikel');
Route::get('/layanan', [LandingController::class, 'layanan'])->name('layanan');
Route::post('/request', [RequestController::class, 'storeRequest'])->name('request');
Route::get('/hubungi', [hubungiController::class, 'hubungi'])->name('hubungi');

Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'umatIndex'])->name('umat.login');
    Route::post('/login', [LoginController::class, 'umatLogin'])->name('umat.login');
    Route::get('/register', [RegisterController::class, 'umatIndex'])->name('umat.register');
    Route::post('/register', [RegisterController::class, 'umatRegister'])->name('umat.register');
});

Route::prefix('admin')
    ->middleware(['guest:admin'])
    ->group(function () {
        Route::get('/login', [LoginController::class, 'adminIndex'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'adminLogin']);
    });

Route::prefix('admin')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin-list', [AdminController::class, 'index'])->name('admin.admin-list');
        Route::get('/add-admin', [AdminController::class, 'addAdmin'])->name('admin.addForm');
        Route::post('/add-admin', [AdminController::class, 'storeAdmin'])->name('admin.storeAdmin');
        Route::get('/admin-detail/{slug}', [AdminController::class, 'detailAdmin'])->name('admin.detailAdmin');
        Route::put('/admin-detail/{slug}', [AdminController::class, 'updateAdmin'])->name('admin.updateAdmin');
        Route::delete('/remove-admin/{slug}', [AdminController::class, 'removeAdmin'])->name('admin.remove');
        Route::get('/removed-admin-list', [AdminController::class, 'adminRemoved'])->name('admin.removedList');
        Route::get('/restore/{slug}', [AdminController::class, 'restore'])->name('admin.restored');

        Route::get('/layanan', [AcaraController::class, 'acaraIndex'])->name('admin.acara');
        Route::get('/add-layanan', [AcaraController::class, 'addAcara'])->name('admin.addAcaraForm');
        Route::post('/add-layanan', [AcaraController::class, 'storeAcara'])->name('admin.addAcara');
        Route::get('/edit-layanan/{slug}', [AcaraController::class, 'updateAcara'])->name('admin.updateAcaraForm');
        Route::put('/edit-layanan/{slug}', [AcaraController::class,'updatedAcara'])->name('admin.updateAcara');
        Route::delete('/delete-layanan/{slug}', [AcaraController::class, 'deleteAcara'])->name('admin.deleteAcara');

        Route::get('/doa', [doaController::class, 'doaIndex'])->name('admin.doa');
        Route::get('/add-doa', [doaController::class, 'addDoa'])->name('admin.addDoaForm');
        Route::post('/add-doa', [doaController::class, 'storeDoa'])->name('admin.addDoa');
        Route::get('/edit-doa/{slug}', [doaController::class, 'updateDoa'])->name('admin.updateDoaForm');
        Route::put('/edit-doa/{slug}', [doaController::class,'updatedDoa'])->name('admin.updateDoa');
        Route::delete('/delete-doa/{slug}', [doaController::class, 'deleteDoa'])->name('admin.deleteDoa');

        Route::get('/pastor', [pastorController::class, 'pastorIndex'])->name('admin.pastor');
        Route::get('/add-pastor', [pastorController::class, 'addPastor'])->name('admin.addPastorForm');
        Route::post('/add-pastor', [pastorController::class, 'storePastor'])->name('admin.addPastor');
        Route::get('/edit-pastor/{slug}', [pastorController::class, 'updatePastor'])->name('admin.updatePastorForm');
        Route::put('/edit-pastor/{slug}', [pastorController::class,'updatedPastor'])->name('admin.updatePastor');
        Route::delete('/delete-pastor/{slug}', [pastorController::class, 'deletePastor'])->name('admin.deletePastor');

        Route::get('/artikel', [artikelController::class, 'artikelIndex'])->name('admin.artikel');
        Route::get('/add-artikel', [artikelController::class, 'addArtikel'])->name('admin.addArtikelForm');
        Route::post('/add-artikel', [artikelController::class, 'storeArtikel'])->name('admin.addArtikel');
        Route::get('/edit-artikel/{slug}', [artikelController::class, 'updateArtikel'])->name('admin.updateArtikelForm');
        Route::put('/edit-artikel/{slug}', [artikelController::class,'updatedArtikel'])->name('admin.updateArtikel');
        Route::delete('/delete-artikel/{slug}', [artikelController::class, 'deleteArtikel'])->name('admin.deleteArtikel');

        Route::get('/kegiatan', [kegiatanController::class, 'kegiatanIndex'])->name('admin.kegiatan.index');
        Route::get('/add-kegiatan', [kegiatanController::class, 'addKegiatan'])->name('admin.addKegiatanForm');
        Route::post('/add-kegiatan', [kegiatanController::class, 'storekegiatan'])->name('admin.addKegiatan');
        Route::get('/edit-kegiatan/{slug}', [kegiatanController::class, 'updateKegiatan'])->name('admin.updateKegiatanForm');
        Route::put('/edit-kegiatan/{slug}', [kegiatanController::class,'updatedKegiatan'])->name('admin.updateKegiatan');
        Route::delete('/delete-kegiatan/{slug}', [kegiatanController::class, 'deleteKegiatan'])->name('admin.deleteKegiatan');

        Route::get('/scheduledEvent', [TransaksiController::class, 'index'])->name('admin.transaksi');
        Route::get('/passEvent', [TransaksiController::class, 'index2'])->name('admin.transaksiSelsai');
        Route::get('/createEvent', [TransaksiController::class, 'createTransaction'])->name('admin.create.transaksi');
        Route::post('/createEvent', [TransaksiController::class, 'storeTransaction'])->name('admin.store.transaksi');
        Route::get('/updateEvent/{id}', [TransaksiController::class, 'updateTransaction'])->name('admin.update.transaksi');
        Route::put('/updateEvent/{id}', [TransaksiController::class, 'updatedTransaction'])->name('admin.updateTransaction');
        Route::delete('/deleteEvent/{id}', [TransaksiController::class, 'deleteTransaction'])->name('admin.delete.transaksi');
        Route::get('/selesaiEvent/{id}', [TransaksiController::class, 'moveTransaction'])->name('admin.selesai.transaksi');

        Route::get('/Request-Pending', [RequestController::class,'pendingListRequest'])->name('admin.request.pending');
        Route::put('/datacomplete/{id}', [RequestController::class,'acceptedRequest'])->name('admin.request.proccess');
        Route::get('/Request-Processed', [RequestController::class,'processListRequest'])->name('admin.update.Proccessed');
        Route::get('/Request-Accepted', [RequestController::class,'acceptedListRequest'])->name('admin.update.Accepted');
        Route::get('/Request-detail/{id}', [RequestController::class,'pendingListRequest'])->name('admin.update.Misa');
        Route::put('/Request-Reject/{id}', [RequestController::class,'rejectRequest'])->name('admin.request.reject');

        Route::get('/highlight', [UmatController::class, 'highlight'])->name('admin.highlight');
        Route::post('/highlight', [UmatController::class, 'highlightupdate'])->name('admin.highlightupdate');

        Route::get('export/umat', [ExcelController::class, 'exportUmat'])->name('export.umat');
        Route::get('export/event/{status}', [ExcelController::class, 'exportEvent'])->name('export.event');
        Route::get('export/request/{status}', [ExcelController::class, 'exportRequest'])->name('export.request');
        Route::get('logout', [LogoutController::class, 'adminLogout'])->name('admin.logout');


        Route::get('/exportEventTemplate', [TransaksiController::class, 'exportTemplate'])->name('export.event.template');
        Route::post('/ImportEvent', [TransaksiController::class, 'importEvent'])->name('import.event.template');
        
        Route::get('/exportRequestTemplate', [RequestController::class, 'exportTemplate'])->name('export.Request.template');
        Route::post('/ImportRequest', [RequestController::class, 'importRequest'])->name('import.Request.template');
    });

    // use Laravel\Socialite\Facades\Socialite;
 
    Route::get('/auth/redirect', [LoginController::class, 'socialitePage']);
     
    Route::get('/Auth/google/callback', [LoginController::class, 'googleLogin']);
    Route::get('/logout', [LogoutController::class, 'userLogout'])->name('umats.logout');
Route::middleware('auth:web')->group(function () {});
