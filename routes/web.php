<?php

use App\Desa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $desa = Desa::get()->first();
    return view('welcome', compact(['desa']));
})->name('welcome');

Auth::routes();

Route::middleware('auth', 'verifikasi_user')->group(function () {
    // Index
    Route::get('/home', 'HomeController@index')->name('home');
    // Surat Saya
    Route::get('/surat-saya', 'HomeController@suratSaya')->name('suratsaya');
    Route::get('/surat-saya/diterima', 'HomeController@diterima')->name('diterima');
    Route::get('/surat-saya/ditolak', 'HomeController@ditolak')->name('ditolak');
    Route::get('/surat-saya/menunggu', 'HomeController@menunggu')->name('menunggu');
    // Edit Profil
    Route::get('/edit-profil', 'User\UserController@editProfil')->name('edit.profil');
    Route::patch('/edit-profil', 'User\UserController@update')->name('update.profil');
    Route::patch('/ganti-password', 'User\UserController@gantiPassword')->name('ganti-password.profil');
    // Lengkapi Profil
    Route::get('/lengkapi-profil', 'User\UserController@lengkapiProfil')->name('lengkapi.profil');
    Route::post('/lengkapi-profil', 'User\UserController@storeLengkapi')->name('lengkapi.update');
    // Ajukan Surat
    Route::get('/skck', 'User\AjuanController@skckForm')->middleware('verifikasi_user')->name('skck.create');
    Route::get('/sktm', 'User\AjuanController@sktmForm')->name('sktm.create');
    // Route::get('/sktm', 'User\AjuanController@sktmForm')->middleware('permission:lengkap')->name('sktm.create');
    Route::get('/sku', 'User\AjuanController@skuForm')->name('sku.create');
    Route::get('/sk', 'User\AjuanController@skForm')->name('sk.create');
    Route::get('/sd', 'User\AjuanController@sdForm')->name('sd.create');
    Route::get('/sktb', 'User\AjuanController@sktbForm')->name('sktb.create');
    Route::get('/belum-menikah', 'User\AjuanController@belumMenikahForm')->name('belumMenikah.create');
    Route::get('/beda-nama', 'User\AjuanController@bedaNamaForm')->name('bedaNama.create');
    Route::get('/mohon-ktp', 'User\AjuanController@mohonKtpForm')->name('mohonKtp.create');
    // Store
    Route::post('/home', 'User\AjuanController@store')->name('store');
    // File Surat
    Route::get('/download/{ajuan:id}', 'User\DownloadController@download')->name('download');
    Route::get('/suket/{ajuan:id}', 'User\DownloadController@lihat')->name('lihat');
    // Batalkan Pengajuan
    Route::delete('/ajuan/batalkan/{ajuan:id}', 'User\AjuanController@destroy')->name('ajuan.batalkan');
});

Route::group(['middleware' => ['can:setingumum', 'verifikasi_user']], function () {
    // dashboard
    Route::get('/dashboard-adm', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/persurat/{surat:jenis}', 'Admin\AntrianController@persurat')->name('admin.persurat');
    // Kelola User
    Route::get('/user', 'Admin\PendudukController@index')->name('user.index');
    Route::get('/user/{user:id}', 'Admin\PendudukController@show')->name('user.show');
    Route::patch('/user/{user:id}', 'Admin\PendudukController@update')->name('user.update');
    Route::delete('/user/{user:id}', 'Admin\PendudukController@destroy')->name('user.delete');
    // Arsip
    Route::get('/arsip', 'Admin\ArsipController@index')->name('arsip.index');
    Route::get('/adm-dwnld/{a:id}', 'Admin\ArsipController@download')->name('adm.download');
    Route::get('/adm-suket/{a:id}', 'Admin\ArsipController@lihat')->name('adm.lihat');
    // Daftar Pengajuan
    Route::get('/riwayat-pengajuan', 'Admin\RiwayatController@index')->name('riwayat.index');
    // Verifikasi User
    Route::patch('/verifikasi-user/{user:id}', 'Admin\PendudukController@verifikasi')->name('user.verifikasi');
    Route::patch('/nonAktifkan-user/{user:id}', 'Admin\PendudukController@nonAktifkan')->name('user.nonaktifkan');
    // Reset Password
    Route::patch('/reset-password/{user:id}', 'Admin\PendudukController@resetPassword')->name('admin.reset.password');
});

Route::group(['middleware' => ['role:superadmin', 'verifikasi_user']], function () {
    // Antrian Surat
    Route::get('/antrian', 'Admin\AntrianController@index')->name('antrian.index');
    Route::get('/antrian/{surat:id}', 'Admin\AntrianController@show')->name('antrian.show');
    Route::get('/antrian/{surat:id}/acc', 'Admin\AntrianController@edit')->name('antrian.edit');
    Route::patch('/antrian/{surat:id}/acc', 'Admin\AntrianController@update')->name('antrian.update');
    Route::patch('/antrian/{surat:id}/acc/sk', 'Admin\AntrianController@updateSK')->name('antrian.update.sk');
    Route::patch('/antrian/{surat:id}/acc/sku', 'Admin\AntrianController@updateSKU')->name('antrian.update.sku');
    Route::patch('/antrian/{surat:id}/acc/sktm', 'Admin\AntrianController@updateSKTM')->name('antrian.update.sktm');
    Route::patch('/antrian/{surat:id}/acc/skck', 'Admin\AntrianController@updateSKCK')->name('antrian.update.skck');
    Route::patch('/antrian/{surat:id}/acc/sd', 'Admin\AntrianController@updateSD')->name('antrian.update.sd');
    Route::patch('/antrian/{surat:id}/acc/belumMenikah', 'Admin\AntrianController@updateBelumMenikah')->name('antrian.update.belum-menikah');
    Route::patch('/antrian/{surat:id}/acc/sktb', 'Admin\AntrianController@updateSktb')->name('antrian.update.sktb');
    Route::patch('/antrian/{surat:id}/acc/beda-nama', 'Admin\AntrianController@updateBedaNama')->name('antrian.update.beda-nama');
    Route::patch('/antrian/{surat:id}/acc/mohon-ktp', 'Admin\AntrianController@updateMohonKtp')->name('antrian.update.mohon-ktp');
    Route::post('/tolak/{ajuan:id}', 'Admin\AntrianController@tolak')->name('antrian.tolak');
    // Kelola Surat (Dashboard Surat)
    Route::get('/surat', 'Admin\SuratController@index')->name('surat.index');
    // Kelola Keperluan
    Route::post('/keperluan', 'Admin\KeperluanController@store')->name('keperluan.store');
    Route::patch('/keperluan/{keperluan:id}/update', 'Admin\KeperluanController@update')->name('keperluan.update');
    Route::delete('/keperluan/{keperluan:id}/delete', 'Admin\KeperluanController@destroy')->name('keperluan.delete');
    // Kelola Pesan Penolakan
    Route::post('pesan-penolakan', 'Admin\PesanPenolakanController@store')->name('pesan-penolakan.store');
    Route::patch('pesan-penolakan/{pesan_penolakan:id}/update', 'Admin\PesanPenolakanController@update')->name('pesan-penolakan.update');
    Route::delete('pesan-penolakan/{pesan_penolakan:id}/delete', 'Admin\PesanPenolakanController@destroy')->name('pesan-penolakan.delete');
    // Kelola Admin
    Route::get('/admin', 'Super\AdminController@index')->name('admin.index');
    Route::get('/admin/{admin:id}', 'Super\AdminController@show')->name('admin.show');
    Route::get('/admin-tambah', 'Super\AdminController@create')->name('admin.create');
    Route::delete('/admin/{admin:id}', 'Super\AdminController@destroy')->name('admin.delete');
    Route::post('/admin/{admin:id}', 'Super\AdminController@store')->name('admin.store');
    // Kelola Super Admin
    Route::get('/super-admin/{spr:id}', 'Super\SuperAdminController@show')->name('super-admin.show');
    Route::get('/super-admin-tambah', 'Super\SuperAdminController@create')->name('super-admin.create');
    Route::post('/super-admin/{spr:id}', 'Super\SuperAdminController@store')->name('super-admin.store');
    Route::delete('/super-admin/to-admin/{spr:id}', 'Super\SuperAdminController@toAdmin')->name('super-admin.toAdmin');
    Route::delete('/super-admin/to-user/{spr:id}', 'Super\SuperAdminController@toUser')->name('super-admin.toUser');
    // Kelola Kades
    Route::get('/kades', 'Super\KadesController@index')->name('kades.index');
    Route::post('/kades', 'Super\KadesController@store')->name('kades.store');
    Route::post('/aktifkan-kades/{k:id}', 'Super\KadesController@aktifkan')->name('kades.aktifkan');
    Route::get('/kades/{k:id}/edit', 'Super\KadesController@edit')->name('kades.edit');
    Route::patch('/kades/{k:id}', 'Super\KadesController@update')->name('kades.update');
    Route::patch('/fotokades/{k:id}', 'Super\KadesController@foto')->name('kades.foto');
    Route::delete('/kades/{k:id}', 'Super\KadesController@destroy')->name('kades.delete');
    // Kelola Desa
    Route::get('/desa', 'Super\DesaController@index')->name('desa.index');
    Route::post('/desa/store', 'Super\DesaController@store')->name('desa.store');
    Route::patch('/desa/edit', 'Super\DesaController@update')->name('desa.update');
    Route::patch('/logo-desa/{desa:id}', 'Super\DesaController@logo')->name('desa.logo');
    // Kelola RT dan RW
    Route::get('/rt-rw', 'Super\RwController@index')->name('rt-rw.index');
    Route::get('/rw/edit/{t:id}', 'Super\RwController@edit')->name('rw.edit');
    Route::get('/rt/edit/{t:id}', 'Super\RtController@edit')->name('rt.edit');
    Route::patch('/rt/update-ketua/{t:id}', 'Super\RtController@updateKetua')->name('rt.update-ketua');
    Route::patch('/rw/update-ketua/{rw:id}', 'Super\RwController@updateKetua')->name('rw.update-ketua');
    Route::patch('/rw/update-no/{rw:id}', 'Super\RwController@updateNo')->name('rw.update-no');
    Route::patch('/rt/update-no/{rt:id}', 'Super\RtController@updateNo')->name('rt.update-no');
    Route::get('/rw/ganti/{rw:id}', 'Super\RwController@ganti')->name('rw.ganti');
    Route::get('/rt/ganti/{rt:id}', 'Super\RtController@ganti')->name('rt.ganti');
    Route::patch('/rw/ganti-ketua/{rw:id}', 'Super\RwController@gantiKetua')->name('rw.ganti-ketua');
    Route::patch('/rt/ganti-ketua/{rt:id}', 'Super\RtController@gantiKetua')->name('rt.ganti-ketua');
    Route::delete('/rt/delete/{t:id}', 'Super\RtController@destroy')->name('rt.delete');
    Route::delete('/rw/delete/{t:id}', 'Super\RwController@destroy')->name('rw.delete');
    Route::post('/rw', 'Super\RwController@store')->name('rw.store');
    Route::post('/rt/{rw_id}', 'Super\RtController@store')->name('rt.store');
    // laporan Excel
    Route::get('/arsip-laporan', 'Admin\ArsipController@laporan')->name('arsip.laporan');
});
