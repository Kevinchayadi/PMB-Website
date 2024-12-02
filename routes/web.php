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
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UmatController;
use App\Http\Controllers\doaController;
use App\Http\Controllers\pastorController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\kegiatanController;
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
Route::get('/dashboard', [LandingController::class, 'Dashboard'])->name('dashboard');
Route::get('/profile/visiMisi', [profileController::class, 'visiMisi'])->name('visiMisi');
Route::get('/profile/sejarah', [profileController::class, 'sejarah'])->name('sejarah');
Route::get('/profile/doa', [profileController::class, 'doa'])->name('doa');
Route::get('/profile/fasilitas', [profileController::class, 'fasilitas'])->name('fasilitas');
Route::get('/profile/pastor', [profileController::class, 'pastor'])->name('pastor');
Route::get('/profile/kegiatan', [profileController::class, 'kegiatan'])->name('kegiatan');
Route::get('/jadwal', [LandingController::class, 'jadwal'])->name('jadwal');
Route::get('/jadwal/{slug}', [LandingController::class, 'jadwalDetail'])->name('jadwal');
Route::get('/artikel', [LandingController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [LandingController::class, 'artikeldetail'])->name('artikel');
Route::get('/layanan', [LandingController::class, 'layanan'])->name('layanan');
Route::get('/hubungi', [hubungiController::class, 'hubungi'])->name('hubungi');

Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [LoginController::class, 'umatIndex'])->name('umat.login');
    Route::post('/login', [LoginController::class, 'umatLogin'])->name('umat.login');
    Route::get('/register', [RegisterController::class, 'umatIndex'])->name('umat.register');
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

        Route::get('/kegiatan', [kegiatanController::class, 'kegiatanIndex'])->name('admin.kegiatan');
        Route::get('/add-kegiatan', [kegiatanController::class, 'addKegiatan'])->name('admin.addKegiatanForm');
        Route::post('/add-kegiatan', [kegiatanController::class, 'storekegiatan'])->name('admin.addKegiatan');
        Route::get('/edit-kegiatan/{slug}', [kegiatanController::class, 'updateKegiatan'])->name('admin.updateKegiatanForm');
        Route::put('/edit-kegiatan/{slug}', [kegiatanController::class,'updatedKegiatan'])->name('admin.updateKegiatan');
        Route::delete('/delete-kegiatan/{slug}', [kegiatanController::class, 'deleteKegiatan'])->name('admin.deleteKegiatan');

        Route::get('/scheduledEvent', [TransaksiController::class, 'index'])->name('admin.transaksi');
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

        Route::get('/Request-Pending', [RequestController::class,'pendingListRequest'])->name('admin.request.pending');
        Route::get('/Request-Processed', [RequestController::class,'processListRequest'])->name('admin.update.Misa');
        Route::get('/Request-Accepted', [RequestController::class,'acceptedListRequest'])->name('admin.update.Misa');
        Route::get('/Request-detail/{id}', [RequestController::class,'pendingListRequest'])->name('admin.update.Misa');

        Route::get('/highlight', [UmatController::class, 'highlight'])->name('admin.highlight');

    });

Route::middleware('auth:web')->group(function () {});
