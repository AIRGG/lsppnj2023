<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Laporan\LaporanBarangController;
use App\Http\Controllers\Laporan\LaporanTransaksiController;
use App\Http\Controllers\Laporan\LaporanHistoryController;
use App\Http\Controllers\ManagePendaftaranController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\Master\GedungController;
use App\Http\Controllers\Master\GudangController;
use App\Http\Controllers\Master\BlokController;
use App\Http\Controllers\Master\LokasiController;
use App\Http\Controllers\Master\JurusanController;
use App\Http\Controllers\Master\ProdiController;
use App\Http\Controllers\Master\KelasController;
use App\Http\Controllers\Master\MahasiswaController;
use App\Http\Controllers\TestingLoginController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\PaketPraktekController;
use App\Http\Controllers\Master\UserprofileController;
use App\Http\Controllers\Transaksi\MovingController;
use App\Http\Controllers\Transaksi\PermintaanController;
use App\Http\Controllers\Transaksi\StokController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('daftar', [LandingController::class, 'daftar'])->name('landing.daftar');
Route::get('proses/daftar', [LandingController::class, 'prosesDaftar'])->name('landing.proses.daftar');
Route::post('proses/login', [LandingController::class, 'prosesLogin'])->name('landing.proses.login');
Route::get('proses/logout', [LandingController::class, 'prosesLogout'])->name('landing.proses.logout');

Route::get('get-data/provinsi', [LandingController::class, 'dataProvinsi'])->name('landing.get-data.provinsi');
Route::get('get-data/kabkot', [LandingController::class, 'dataKabkot'])->name('landing.get-data.kabkot');
Route::get('get-data/kecamatan', [LandingController::class, 'dataKecamatan'])->name('landing.get-data.kecataman');


Route::group(['prefix' => 'dashboard', 'middleware' => ['ceklogin:1']], function () {
    Route::get('admin', [LandingController::class, 'dashboardAdmin'])->name('dashboard.admin');

    Route::get('manage-user/index', [ManageUserController::class, 'userShow'])->name('manage.user.index');
    Route::get('manage-user/create', [ManageUserController::class, 'userShowCreate'])->name('manage.user.create');
    Route::get('manage-user/edit', [ManageUserController::class, 'userShowEdit'])->name('manage.user.edit');
    Route::get('manage-user/detail', [ManageUserController::class, 'userShowDetail'])->name('manage.user.detail');
    Route::post('manage-user/proses-add', [ManageUserController::class, 'userProsesAdd'])->name('manage.user.proses-add');
    Route::post('manage-user/proses-edit', [ManageUserController::class, 'userProsesEdit'])->name('manage.user.proses-edit');
    Route::get('manage-user/proses-delete', [ManageUserController::class, 'userProsesDelete'])->name('manage.user.proses-delete');

    Route::get('manage-pendaftaran/index', [ManagePendaftaranController::class, 'pendaftaranShow'])->name('manage.pendaftaran.index');
    Route::get('manage-pendaftaran/create', [ManagePendaftaranController::class, 'pendaftaranShowCreate'])->name('manage.pendaftaran.create');
    Route::get('manage-pendaftaran/edit', [ManagePendaftaranController::class, 'pendaftaranShowEdit'])->name('manage.pendaftaran.edit');
    Route::get('manage-pendaftaran/detail', [ManagePendaftaranController::class, 'pendaftaranShowDetail'])->name('manage.pendaftaran.detail');
    Route::post('manage-pendaftaran/proses-add', [ManagePendaftaranController::class, 'pendaftaranProsesAdd'])->name('manage.pendaftaran.proses-add');
    Route::post('manage-pendaftaran/proses-edit', [ManagePendaftaranController::class, 'pendaftaranProsesEdit'])->name('manage.pendaftaran.proses-edit');
    Route::get('manage-pendaftaran/proses-delete', [ManagePendaftaranController::class, 'pendaftaranProsesDelete'])->name('manage.pendaftaran.proses-delete');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['ceklogin:2']], function () {
    Route::get('user', [LandingController::class, 'dashboardUser'])->name('dashboard.user');

    Route::get('mahasiswa/create', [UserController::class, 'mahasiswaDaftarShowCreate'])->name('mahasiswa.user.create');
    Route::get('mahasiswa/edit', [UserController::class, 'mahasiswaDaftarShowEdit'])->name('mahasiswa.user.edit');
    Route::post('mahasiswa/proses-add', [UserController::class, 'mahasiswaDaftarProsesAdd'])->name('mahasiswa.user.proses-add');
    Route::post('mahasiswa/proses-edit', [UserController::class, 'mahasiswaDaftarProsesEdit'])->name('mahasiswa.user.proses-edit');
    Route::get('mahasiswa/proses-delete', [UserController::class, 'mahasiswaDaftarProsesDelete'])->name('mahasiswa.user.proses-delete');
});


// -- [LOGOUT] -- \\
// Route::get('/logout/mahasiswa', function (Request $request) {
//     $landingController = new LandingController();
//     return $landingController->logout($request, 'mahasiswa');
// })->name('mahasiswa.proses-logout');
// Route::get('/logout/karyawan', function (Request $request) {
//     $landingController = new LandingController();
//     return $landingController->logout($request, 'karyawan');
// })->name('karyawan.proses-logout');
// -- (END) [LOGOUT] -- \\


// ▄▄       ▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄
// ▐░░▌     ▐░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌
// ▐░▌░▌   ▐░▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀▀▀  ▀▀▀▀█░█▀▀▀▀ ▐░█▀▀▀▀▀▀▀▀▀ ▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌
// ▐░▌▐░▌ ▐░▌▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌               ▐░▌     ▐░▌          ▐░▌       ▐░▌▐░▌       ▐░▌
// ▐░▌ ▐░▐░▌ ▐░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄▄▄      ▐░▌     ▐░█▄▄▄▄▄▄▄▄▄ ▐░▌   ▄   ▐░▌▐░█▄▄▄▄▄▄▄█░▌
// ▐░▌  ▐░▌  ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌     ▐░▌     ▐░░░░░░░░░░░▌▐░▌  ▐░▌  ▐░▌▐░░░░░░░░░░░▌
// ▐░▌   ▀   ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌ ▀▀▀▀▀▀▀▀▀█░▌     ▐░▌      ▀▀▀▀▀▀▀▀▀█░▌▐░▌ ▐░▌░▌ ▐░▌▐░█▀▀▀▀▀▀▀█░▌
// ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌          ▐░▌     ▐░▌               ▐░▌▐░▌▐░▌ ▐░▌▐░▌▐░▌       ▐░▌
// ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌ ▄▄▄▄▄▄▄▄▄█░▌ ▄▄▄▄█░█▄▄▄▄  ▄▄▄▄▄▄▄▄▄█░▌▐░▌░▌   ▐░▐░▌▐░▌       ▐░▌
// ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░▌     ▐░░▌▐░▌       ▐░▌
//  ▀         ▀  ▀         ▀  ▀         ▀  ▀         ▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀▀▀▀▀▀▀▀▀▀▀  ▀▀       ▀▀  ▀         ▀
// -- [MAHASISWA] -- \\
// Route::get('/login-mahasiswa', [LandingController::class, 'indexMahasiswa'])->name('mahasiswa.form-login');
// Route::post('/login-mahasiswa', [LandingController::class, 'loginMahasiswa'])->name('mahasiswa.proses-login');

// Route::group(['prefix' => 'mahasiswa', 'middleware' => ['ceklogin.mahasiswa']], function () {
//     Route::get('/dashboard', [LandingController::class, 'dashboardMahasiswa'])->name('mahasiswa.dashboard');
//     Route::get('/profil', [LandingController::class, 'profilMahasiswa'])->name('mahasiswa.profil');

//     // PERMINTAAN BARANG
//     Route::get('/transaksi-permintaan/index', [PermintaanController::class, 'permintaanShow'])->name('transaksi.permintaan.index');
//     Route::get('/transaksi-permintaan/create', [PermintaanController::class, 'permintaanShowCreate'])->name('transaksi.permintaan.create');
//     Route::get('/transaksi-permintaan/detail', [PermintaanController::class, 'permintaanShowDetail'])->name('transaksi.permintaan.detail');
//     Route::post('/transaksi-permintaan/proses-add', [PermintaanController::class, 'permintaanProsesAdd'])->name('transaksi.permintaan.proses-add');
// });
// // -- (END) [MAHASISWA] -- \\


// // ▄    ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄         ▄  ▄▄▄▄▄▄▄▄▄▄▄  ▄▄        ▄
// // ▐░▌  ▐░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░▌       ▐░▌▐░░░░░░░░░░░▌▐░░▌      ▐░▌
// // ▐░▌ ▐░▌ ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌       ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌░▌     ▐░▌
// // ▐░▌▐░▌  ▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌▐░▌▐░▌    ▐░▌
// // ▐░▌░▌   ▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░█▄▄▄▄▄▄▄█░▌▐░▌   ▄   ▐░▌▐░█▄▄▄▄▄▄▄█░▌▐░▌ ▐░▌   ▐░▌
// // ▐░░▌    ▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░░░░░░░░░░░▌▐░▌  ▐░▌  ▐░▌▐░░░░░░░░░░░▌▐░▌  ▐░▌  ▐░▌
// // ▐░▌░▌   ▐░█▀▀▀▀▀▀▀█░▌▐░█▀▀▀▀█░█▀▀  ▀▀▀▀█░█▀▀▀▀ ▐░█▀▀▀▀▀▀▀█░▌▐░▌ ▐░▌░▌ ▐░▌▐░█▀▀▀▀▀▀▀█░▌▐░▌   ▐░▌ ▐░▌
// // ▐░▌▐░▌  ▐░▌       ▐░▌▐░▌     ▐░▌       ▐░▌     ▐░▌       ▐░▌▐░▌▐░▌ ▐░▌▐░▌▐░▌       ▐░▌▐░▌    ▐░▌▐░▌
// // ▐░▌ ▐░▌ ▐░▌       ▐░▌▐░▌      ▐░▌      ▐░▌     ▐░▌       ▐░▌▐░▌░▌   ▐░▐░▌▐░▌       ▐░▌▐░▌     ▐░▐░▌
// // ▐░▌  ▐░▌▐░▌       ▐░▌▐░▌       ▐░▌     ▐░▌     ▐░▌       ▐░▌▐░░▌     ▐░░▌▐░▌       ▐░▌▐░▌      ▐░░▌
// //  ▀    ▀  ▀         ▀  ▀         ▀       ▀       ▀         ▀  ▀▀       ▀▀  ▀         ▀  ▀        ▀▀
// // -- [KARYAWAN] -- \\
// Route::get('/login-karyawan', [LandingController::class, 'indexKaryawan'])->name('karyawan.form-login');
// Route::post('/login-karyawan', [LandingController::class, 'loginKaryawan'])->name('karyawan.proses-login');

// Route::group(['prefix' => 'karyawan', 'middleware' => ['ceklogin.karyawan']], function () {
//     Route::get('/dashboard', [LandingController::class, 'dashboardKaryawan'])->name('karyawan.dashboard');
//     Route::get('/profil', [LandingController::class, 'profilKaryawan'])->name('karyawan.profil');

//     // Gedung
//     Route::get('/master-gedung/index', [GedungController::class, 'gedungShow'])->name('master.gedung.index');
//     Route::get('/master-gedung/create', [GedungController::class, 'gedungShowCreate'])->name('master.gedung.create');
//     Route::get('/master-gedung/edit', [GedungController::class, 'gedungShowEdit'])->name('master.gedung.edit');
//     Route::get('/master-gedung/detail', [GedungController::class, 'gedungShowDetail'])->name('master.gedung.detail');
//     Route::post('/master-gedung/proses-add', [GedungController::class, 'gedungProsesAdd'])->name('master.gedung.proses-add');
//     Route::post('/master-gedung/proses-edit', [GedungController::class, 'gedungProsesEdit'])->name('master.gedung.proses-edit');
//     Route::get('/master-gedung/proses-delete', [GedungController::class, 'gedungProsesDelete'])->name('master.gedung.proses-delete');

//     // Gudang
//     Route::get('/master-gudang/index', [GudangController::class, 'gudangShow'])->name('master.gudang.index');
//     Route::get('/master-gudang/create', [GudangController::class, 'gudangShowCreate'])->name('master.gudang.create');
//     Route::get('/master-gudang/edit', [GudangController::class, 'gudangShowEdit'])->name('master.gudang.edit');
//     Route::get('/master-gudang/detail', [GudangController::class, 'gudangShowDetail'])->name('master.gudang.detail');
//     Route::post('/master-gudang/proses-add', [GudangController::class, 'gudangProsesAdd'])->name('master.gudang.proses-add');
//     Route::post('/master-gudang/proses-edit', [GudangController::class, 'gudangProsesEdit'])->name('master.gudang.proses-edit');
//     Route::get('/master-gudang/proses-delete', [GudangController::class, 'gudangProsesDelete'])->name('master.gudang.proses-delete');

//     // Blok
//     Route::get('/master-blok/index', [BlokController::class, 'blokShow'])->name('master.blok.index');
//     Route::get('/master-blok/create', [BlokController::class, 'blokShowCreate'])->name('master.blok.create');
//     Route::get('/master-blok/edit', [BlokController::class, 'blokShowEdit'])->name('master.blok.edit');
//     Route::get('/master-blok/detail', [BlokController::class, 'blokShowDetail'])->name('master.blok.detail');
//     Route::post('/master-blok/proses-add', [BlokController::class, 'blokProsesAdd'])->name('master.blok.proses-add');
//     Route::post('/master-blok/proses-edit', [BlokController::class, 'blokProsesEdit'])->name('master.blok.proses-edit');
//     Route::get('/master-blok/proses-delete', [BlokController::class, 'blokProsesDelete'])->name('master.blok.proses-delete');

//     // Lokasi
//     Route::get('/master-lokasi/index', [LokasiController::class, 'lokasiShow'])->name('master.lokasi.index');
//     Route::get('/master-lokasi/create', [LokasiController::class, 'lokasiShowCreate'])->name('master.lokasi.create');
//     Route::get('/master-lokasi/edit', [LokasiController::class, 'lokasiShowEdit'])->name('master.lokasi.edit');
//     Route::get('/master-lokasi/detail', [LokasiController::class, 'lokasiShowDetail'])->name('master.lokasi.detail');
//     Route::post('/master-lokasi/proses-add', [LokasiController::class, 'lokasiProsesAdd'])->name('master.lokasi.proses-add');
//     Route::post('/master-lokasi/proses-edit', [LokasiController::class, 'lokasiProsesEdit'])->name('master.lokasi.proses-edit');
//     Route::get('/master-lokasi/proses-delete', [LokasiController::class, 'lokasiProsesDelete'])->name('master.lokasi.proses-delete');

//     // Jurusan
//     Route::get('/master-jurusan/index', [JurusanController::class, 'jurusanShow'])->name('master.jurusan.index');
//     Route::get('/master-jurusan/create', [JurusanController::class, 'jurusanShowCreate'])->name('master.jurusan.create');
//     Route::get('/master-jurusan/edit', [JurusanController::class, 'jurusanShowEdit'])->name('master.jurusan.edit');
//     Route::get('/master-jurusan/detail', [JurusanController::class, 'jurusanShowDetail'])->name('master.jurusan.detail');
//     Route::post('/master-jurusan/proses-add', [JurusanController::class, 'jurusanProsesAdd'])->name('master.jurusan.proses-add');
//     Route::post('/master-jurusan/proses-edit', [JurusanController::class, 'jurusanProsesEdit'])->name('master.jurusan.proses-edit');
//     Route::get('/master-jurusan/proses-delete', [JurusanController::class, 'jurusanProsesDelete'])->name('master.jurusan.proses-delete');

//     // Prodi
//     Route::get('/master-prodi/index', [ProdiController::class, 'prodiShow'])->name('master.prodi.index');
//     Route::get('/master-prodi/create', [ProdiController::class, 'prodiShowCreate'])->name('master.prodi.create');
//     Route::get('/master-prodi/edit', [ProdiController::class, 'prodiShowEdit'])->name('master.prodi.edit');
//     Route::get('/master-prodi/detail', [ProdiController::class, 'prodiShowDetail'])->name('master.prodi.detail');
//     Route::post('/master-prodi/proses-add', [ProdiController::class, 'prodiProsesAdd'])->name('master.prodi.proses-add');
//     Route::post('/master-prodi/proses-edit', [ProdiController::class, 'prodiProsesEdit'])->name('master.prodi.proses-edit');
//     Route::get('/master-prodi/proses-delete', [ProdiController::class, 'prodiProsesDelete'])->name('master.prodi.proses-delete');

//     // Kelas
//     Route::get('/master-kelas/index', [KelasController::class, 'kelasShow'])->name('master.kelas.index');
//     Route::get('/master-kelas/create', [KelasController::class, 'kelasShowCreate'])->name('master.kelas.create');
//     Route::get('/master-kelas/edit', [KelasController::class, 'kelasShowEdit'])->name('master.kelas.edit');
//     Route::get('/master-kelas/detail', [KelasController::class, 'kelasShowDetail'])->name('master.kelas.detail');
//     Route::post('/master-kelas/proses-add', [KelasController::class, 'kelasProsesAdd'])->name('master.kelas.proses-add');
//     Route::post('/master-kelas/proses-edit', [KelasController::class, 'kelasProsesEdit'])->name('master.kelas.proses-edit');
//     Route::get('/master-kelas/proses-delete', [KelasController::class, 'kelasProsesDelete'])->name('master.kelas.proses-delete');

//     // Mahasiswa
//     Route::get('/master-mahasiswa/index', [MahasiswaController::class, 'mahasiswaShow'])->name('master.mahasiswa.index');
//     Route::get('/master-mahasiswa/create', [MahasiswaController::class, 'mahasiswaShowCreate'])->name('master.mahasiswa.create');
//     Route::get('/master-mahasiswa/edit', [MahasiswaController::class, 'mahasiswaShowEdit'])->name('master.mahasiswa.edit');
//     Route::get('/master-mahasiswa/detail', [MahasiswaController::class, 'mahasiswaShowDetail'])->name('master.mahasiswa.detail');
//     Route::post('/master-mahasiswa/proses-add', [MahasiswaController::class, 'mahasiswaProsesAdd'])->name('master.mahasiswa.proses-add');
//     Route::post('/master-mahasiswa/proses-edit', [MahasiswaController::class, 'mahasiswaProsesEdit'])->name('master.mahasiswa.proses-edit');
//     Route::get('/master-mahasiswa/proses-delete', [MahasiswaController::class, 'mahasiswaProsesDelete'])->name('master.mahasiswa.proses-delete');

//     // Barang
//     Route::get('/master-barang/index', [BarangController::class, 'barangShow'])->name('master.barang.index');
//     Route::get('/master-barang/create', [BarangController::class, 'barangShowCreate'])->name('master.barang.create');
//     Route::get('/master-barang/edit', [BarangController::class, 'barangShowEdit'])->name('master.barang.edit');
//     Route::get('/master-barang/detail', [BarangController::class, 'barangShowDetail'])->name('master.barang.detail');
//     Route::post('/master-barang/proses-add', [BarangController::class, 'barangProsesAdd'])->name('master.barang.proses-add');
//     Route::post('/master-barang/proses-edit', [BarangController::class, 'barangProsesEdit'])->name('master.barang.proses-edit');
//     Route::get('/master-barang/proses-delete', [BarangController::class, 'barangProsesDelete'])->name('master.barang.proses-delete');

//     // Profil Pengguna
//     Route::get('/master-userprofile/index', [UserprofileController::class, 'userprofileShow'])->name('master.userprofile.index');
//     Route::get('/master-userprofile/create', [UserprofileController::class, 'userprofileShowCreate'])->name('master.userprofile.create');
//     Route::get('/master-userprofile/edit', [UserprofileController::class, 'userprofileShowEdit'])->name('master.userprofile.edit');
//     Route::get('/master-userprofile/detail', [UserprofileController::class, 'userprofileShowDetail'])->name('master.userprofile.detail');
//     Route::post('/master-userprofile/proses-add', [UserprofileController::class, 'userprofileProsesAdd'])->name('master.userprofile.proses-add');
//     Route::post('/master-userprofile/proses-edit', [UserprofileController::class, 'userprofileProsesEdit'])->name('master.userprofile.proses-edit');
//     Route::get('/master-userprofile/proses-delete', [UserprofileController::class, 'userprofileProsesDelete'])->name('master.userprofile.proses-delete');

//     // Paket Praktek
//     Route::get('/master-paket-praktek/index', [PaketPraktekController::class, 'paketPraktekShow'])->name('master.paket-praktek.index');
//     Route::get('/master-paket-praktek/create', [PaketPraktekController::class, 'paketPraktekShowCreate'])->name('master.paket-praktek.create');
//     Route::get('/master-paket-praktek/edit', [PaketPraktekController::class, 'paketPraktekShowEdit'])->name('master.paket-praktek.edit');
//     Route::get('/master-paket-praktek/detail', [PaketPraktekController::class, 'paketPraktekShowDetail'])->name('master.paket-praktek.detail');
//     Route::post('/master-paket-praktek/proses-add', [PaketPraktekController::class, 'paketPraktekProsesAdd'])->name('master.paket-praktek.proses-add');
//     Route::post('/master-paket-praktek/proses-edit', [PaketPraktekController::class, 'paketPraktekProsesEdit'])->name('master.paket-praktek.proses-edit');
//     Route::get('/master-paket-praktek/proses-delete', [PaketPraktekController::class, 'paketPraktekProsesDelete'])->name('master.paket-praktek.proses-delete');

//     // TRANSAKSI
//     // STOK IN
//     Route::get('/transaksi-barang-stok-in/index', [StokController::class, 'stokInShow'])->name('transaksi.stok.in.index');
//     Route::get('/transaksi-barang-stok-in/create', [StokController::class, 'stokInShowCreate'])->name('transaksi.stok.in.create');
//     Route::get('/transaksi-barang-stok-in/detail', [StokController::class, 'stokInShowDetail'])->name('transaksi.stok.in.detail');
//     Route::post('/transaksi-barang-stok-in/proses-add', [StokController::class, 'stokInProsesAdd'])->name('transaksi.stok.in.proses-add');

//     // STOK OUT
//     Route::get('/transaksi-barang-stok-out/index', [StokController::class, 'stokOutShow'])->name('transaksi.stok.out.index');
//     Route::get('/transaksi-barang-stok-out/create', [StokController::class, 'stokOutShowCreate'])->name('transaksi.stok.out.create');
//     Route::get('/transaksi-barang-stok-out/detail', [StokController::class, 'stokOutShowDetail'])->name('transaksi.stok.out.detail');
//     Route::post('/transaksi-barang-stok-out/proses-add', [StokController::class, 'stokOutProsesAdd'])->name('transaksi.stok.out.proses-add');

//     // MOVING
//     Route::get('/transaksi-barang-moving/index', [MovingController::class, 'movingShow'])->name('transaksi.moving.index');
//     Route::get('/transaksi-barang-moving/create', [MovingController::class, 'movingShowCreate'])->name('transaksi.moving.create');
//     Route::get('/transaksi-barang-moving/detail', [MovingController::class, 'movingShowDetail'])->name('transaksi.moving.detail');
//     Route::post('/transaksi-barang-moving/proses-add', [MovingController::class, 'movingProsesAdd'])->name('transaksi.moving.proses-add');

//     // TERIMA PERMINTAAN
//     Route::get('/transaksi-permintaan-terima/index', [PermintaanController::class, 'permintaanTerimaShow'])->name('transaksi.permintaan.terima.index');
//     Route::get('/transaksi-permintaan-terima/verifikasi', [PermintaanController::class, 'permintaanTerimaVerifikasiShow'])->name('transaksi.permintaan.terima.verifikasi');
//     Route::post('/transaksi-permintaan-terima/proses-verifikasi', [PermintaanController::class, 'permintaanTerimaProsesVerifikasi'])->name('transaksi.permintaan.terima.proses-verifikasi');

//     // LAPORAN
//     Route::get('/laporan-barang/index', [LaporanBarangController::class, 'laporanBarangShow'])->name('laporan.barang.index');
//     Route::get('/laporan-transaksi/index', [LaporanTransaksiController::class, 'laporanTransaksiShow'])->name('laporan.transaksi.index');
//     Route::get('/laporan-history/index', [LaporanHistoryController::class, 'laporanHistoryShow'])->name('laporan.history.index');

//     // Route::get('/transaksi-barang-stok-in/create', [StokController::class, 'barangShowCreate'])->name('master.barang.create');
//     // Route::get('/master-deletbarang/edit', [BarangController::class, 'barangShowEdit'])->name('master.barang.edit');
//     // Route::get('/master-barang/detail', [BarangController::class, 'barangShowDetail'])->name('master.barang.detail');
//     // Route::post('/master-mahasiswa/proses-add', [BarangController::class, 'barangProsesAdd'])->name('master.barang.proses-add');
//     // Route::post('/master-mahasiswa/proses-edit', [BarangController::class, 'barangProsesEdit'])->name('master.barang.proses-edit');
//     // Route::post('/master-mahasiswa/proses-delete', [BarangController::class, 'barangProsesDelete'])->name('master.barang.proses-delete');
// });
