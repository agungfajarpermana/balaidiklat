<?php

Route::get('/', function () {
    return redirect('/diklat');
});

Route::group(['middleware' => 'admin'], function(){
  Route::post('/diklat/pelaksana-rbpmd-submit-form', 'PelaksanaController@submitFormRbpmd')->name('rbpmd.submit');
  Route::post('diklat/pelaksana-rbpmd-notif', 'PelaksanaController@notifikasiRBPMD')->name('rbpmd.notif');

  Route::post('diklat/pelaksana-rppmd-notif', 'PelaksanaController@notifikasiRPPMD')->name('rppmd.notif');
  Route::post('/diklat/pelaksana-rppmd-tampil-metode', 'PelaksanaController@indexTampilMetodeRppmd')->name('rppmd.showmetode');
  Route::post('/diklat/pelaksana-rppmd/create-fasilitas', 'PelaksanaController@createFasilitasRppmd')->name('rppmd.create.fasilitas');
  Route::post('/diklat/pelaksana-rppmd/create-fasilitas-pendahuluan', 'PelaksanaController@createFasilitasPendahuluanRppmd')->name('rppmd.create.fasilitas.penda');
  Route::post('/diklat/pelaksana-rppmd/create-fasilitas-penutup', 'PelaksanaController@createFasilitasPenutupRppmd')->name('rppmd.create.fasilitas.penutup');
  Route::post('/diklat/pelaksana-rppmd/create-peserta', 'PelaksanaController@createPesertaRppmd')->name('rppmd.create.peserta');
  Route::post('/diklat/pelaksana-rppmd/create-peserta-pendahuluan', 'PelaksanaController@createPesertaPendahuluanRppmd')->name('rppmd.create.peserta.penda');
  Route::post('/diklat/pelaksana-rppmd/create-peserta-penutup', 'PelaksanaController@createPesertaPenutupRppmd')->name('rppmd.create.peserta.penutup');
  Route::post('/diklat/pelaksana-rppmd/create-metode-pendahuluan', 'PelaksanaController@createMetodePendahuluanRppmd')->name('rppmd.create.metode.penda');
  Route::post('/diklat/pelaksana-rppmd/create-metode-penutup', 'PelaksanaController@createMetodePenutupRppmd')->name('rppmd.create.metode.penutup');
  Route::post('/diklat/pelaksana-rppmd/create-lain-metode', 'PelaksanaController@createLainMetodeRppmd')->name('rppmd.create.lainmetode');
  Route::post('/diklat/pelaksana-rppmd/create-media-pendahuluan', 'PelaksanaController@createMediaPendahuluanRppmd')->name('rppmd.create.media.penda');
  Route::post('/diklat/pelaksana-rppmd/create-media-penutup', 'PelaksanaController@createMediaPenutupRppmd')->name('rppmd.create.media.penutup');
  Route::post('/diklat/pelaksana-rppmd/create-lain-media', 'PelaksanaController@createLainMediaRppmd')->name('rppmd.create.lainmedia');
  Route::post('/diklat/pelaksana-rppmd/delete-fasilitas', 'PelaksanaController@deleteFasilitasRppmd')->name('rppmd.delete.fasilitas');
  Route::post('/diklat/pelaksana-rppmd/delete-fasilitas-pendahuluan', 'PelaksanaController@deleteFasilitasPendahuluanRppmd')->name('rppmd.delete.fasilitas.penda');
  Route::post('/diklat/pelaksana-rppmd/delete-fasilitas-penutup', 'PelaksanaController@deleteFasilitasPenutupRppmd')->name('rppmd.delete.fasilitas.penutup');
  Route::post('/diklat/pelaksana-rppmd/delete-peserta', 'PelaksanaController@deletePesertaRppmd')->name('rppmd.delete.peserta');
  Route::post('/diklat/pelaksana-rppmd/delete-peserta-pendahuluan', 'PelaksanaController@deletePesertaPendahuluanRppmd')->name('rppmd.delete.peserta.penda');
  Route::post('/diklat/pelaksana-rppmd/delete-peserta-penutup', 'PelaksanaController@deletePesertaPenutupRppmd')->name('rppmd.delete.peserta.penutup');
  Route::post('/diklat/pelaksana-rppmd/delete-lain-metode', 'PelaksanaController@deleteLainMetodeRppmd')->name('rppmd.delete.lainmetode');
  Route::post('/diklat/pelaksana-rppmd/delete-metode-pendahuluan', 'PelaksanaController@deleteMetodePendahuluanRppmd')->name('rppmd.delete.metode.penda');
  Route::post('/diklat/pelaksana-rppmd/delete-metode-penutup', 'PelaksanaController@deleteMetodePenutupRppmd')->name('rppmd.delete.metode.penutup');
  Route::post('/diklat/pelaksana-rppmd/delete-lain-media', 'PelaksanaController@deleteLainMediaRppmd')->name('rppmd.delete.lainmedia');
  Route::post('/diklat/pelaksana-rppmd/delete-media-pendahuluan', 'PelaksanaController@deleteMediaPendahuluanRppmd')->name('rppmd.delete.media.penda');
  Route::post('/diklat/pelaksana-rppmd/delete-media-penutup', 'PelaksanaController@deleteMediaPenutupRppmd')->name('rppmd.delete.media.penutup');
  Route::post('/diklat/submit-form', 'PelaksanaController@submitFormPelaksana');
  Route::get('/diklat/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware'=>'owner'], function(){
  Route::get('/diklat/modul-pembelajaran-owner', 'ModulPembelajaranController@indexOwner')->name('modul.show.owner');
  Route::get('/diklat/change-username', 'DashboardController@changeuser')->name('change.user.owner');
  Route::get('/diklat/change-username-all', 'DashboardController@getuser')->name('change.user.get');
  Route::get('/diklat/change-password', 'DashboardController@changepass')->name('change.pass.owner');
  Route::get('/diklat/modul-pembelajaran-tampil-owner', 'ModulPembelajaranController@showmodulowner')->name('fetch.modul.owner');
  Route::post('/diklat/change-user-create', 'DashboardController@createuser')->name('change.user.create');
  Route::post('/diklat/change-pass-create', 'DashboardController@createpass')->name('change.pass.create');
  Route::post('/diklat/modul-pembelajaran-search-owner', 'ModulPembelajaranController@searchModulOwner')->name('search.modul.owner');
  Route::get('/diklat/logout-owner', 'DashboardController@logoutowner')->name('logout.owner');
});

Route::get('/diklat', 'HomeController@index')->name('diklat.home');
Route::get('/diklat/print-pdf-rbpmd/{id}', 'PelaksanaController@printPdfRbpmd')->name('print.rbpmd');
Route::get('/diklat/print-pdf-rppmd/{id}', 'PelaksanaController@printPdfRppmd')->name('print.rppmd');
Route::get('/diklat/pelaksana-rppmd', 'PelaksanaController@indexRppmd')->name('rppmd.showdata');
Route::get('/diklat/pelaksana-rppmd/{id}', 'PelaksanaController@tampilRppmd')->name('rppmd.detail');
Route::post('/diklat/pelaksana-rppmd-tampil-metode', 'PelaksanaController@indexTampilMetodeRppmd')->name('rppmd.showmetode');
Route::post('/diklat/pelaksana-rppmd-tampil-media', 'PelaksanaController@indexTampilMediaRppmd')->name('rppmd.showmedia');
Route::post('/diklat/pelaksana-rppmd-tampil-fasilitas-pendahuluan', 'PelaksanaController@indexTampilFasilitasPendahuluanRppmd');
Route::post('/diklat/pelaksana-rppmd-tampil-fasilitas', 'PelaksanaController@indexTampilFasilitasRppmd')->name('rppmd.showfasilitas');
Route::post('/diklat/pelaksana-rppmd-tampil-peserta', 'PelaksanaController@indexTampilPesertaRppmd')->name('rppmd.showpeserta');

Route::get('/diklat/pelaksana-rbpmd', 'PelaksanaController@indexRbpmd')->name('rbpmd.home');
Route::get('/diklat/pelaksana-rbpmd/{id}', 'PelaksanaController@tampilRbpmd')->name('rbpmd.detail');
Route::get('/diklat/duplicate-rbpmd/{id}', 'PelaksanaController@duplicate')->name('duplicate.show');
Route::post('/diklat/duplicate-rbpmd-submit', 'PelaksanaController@duplicatesubmit')->name('duplicate.submit');
Route::post('/diklat/pelaksana-rbpmd-tampil-sub-materi', 'PelaksanaController@tampilSubMateriRbpmd')->name('rbpmd.submateri');
Route::post('/diklat/pelaksana-rbpmd-tampil-metode', 'PelaksanaController@tampilMetodeRbpmd')->name('rbpmd.metode');
Route::post('/diklat/pelaksana-rbpmd-tampil-media', 'PelaksanaController@tampilMediaRbpmd')->name('rbpmd.media');

Route::get('/diklat/home', 'DiklatController@index')->name('rbpmd.next');
Route::post('/diklat/nama-pelatihan', 'DiklatController@storeMataPelatihan')->name('diklat.nama.pelatihan');
Route::post('/diklat/mata-pelatihan', 'DiklatController@storeAlokasiWaktu')->name('diklat.mata.pelatihan');
Route::post('/diklat/submit-form-RBPMD', 'DiklatController@createSubmitFormRbpmd')->name('diklat.rbpmd.submit');

Route::get('/diklat/submit-form', 'DiklatController@indexFormRbpmd2')->name('diklat.rbpmd2.form');
// Route::post('/diklat/submit-form-array-metode', 'DiklatController@arrayMetodeFormRbpmd2')->name('diklat.rbpmd2.submit.metode');
// Route::post('/diklat/submit-form-array-media', 'DiklatController@arrayMediaFormRbpmd2')->name('diklat.rbpmd2.submit.media');
// Route::post('/diklat/submit-form-array-sub-materi', 'DiklatController@arraySubMateriFormRbpmd2')->name('diklat.rbpmd2.submit.submateri');
// Route::post('/diklat/submit-form-array-sub-materi-delete', 'DiklatController@arraySubMateriDeleteFormRbpmd2')->name('diklat.rbpmd2.submateri.delete');
// Route::post('/diklat/submit-form-array-delete-metode', 'DiklatController@arrayDeleteMetodeFormRbpmd2')->name('diklat.rbpmd2.metode.delete');
// Route::post('/diklat/submit-form-array-delete-media', 'DiklatController@arrayDeleteMediaFormRbpmd2')->name('diklat.rbpmd2.media.delete');
Route::post('/diklat/submit-form-RBPMD-2', 'DiklatController@createSubmitFormRbpmd2')->name('diklat.rbpmd2.create.submit');
Route::get('/diklat/submit-form-store', 'DiklatController@storeFormRbpmd');

Route::get('/diklat/rencana-pembelajaran', 'RencanaPembelajaranController@index')->name('rp.next');
Route::get('/diklat/duplicate-rppmd/{id}', 'RencanaPembelajaranController@duplicate')->name('rppmd.duplicate.show');
Route::post('/diklat/duplicate-rppmd-create', 'RencanaPembelajaranController@duplicateCreate')->name('rppmd.duplicate.create');
Route::post('/diklat/duplicate-submit-form', 'RencanaPembelajaranController@duplicateSubmitForm')->name('rppmd.pelaksana.submit');
Route::post('/diklat/rencana-pembelajaran-store-nama', 'RencanaPembelajaranController@storeRencanaPembelajaranNama')->name('rppmd.store.namapelatihan');
Route::post('/diklat/rencana-pembelajaran-store-mata', 'RencanaPembelajaranController@storeRencanaPembelajaranMata')->name('rppmd.store.matapelatihan');
Route::post('/diklat/rencana-pembelajaran-create-rp', 'RencanaPembelajaranController@sesiRencanaPembelajaran')->name('rppmd.create.next');
Route::post('/diklat/rencana-pembelajaran-validasi-nip', 'RencanaPembelajaranController@ValidasiNip')->name('rppmd.validasi');

Route::get('/diklat/rencana-pembelajaran-lanjut', 'RencanaPembelajaranController@indexLanjut')->name('rppmd.form.lanjut');
Route::post('/diklat/rencana-pembelajaran-tampil-metode', 'RencanaPembelajaranController@indexTampilMetode')->name('rppmd.metode');
Route::post('/diklat/rencana-pembelajaran-tampil-media', 'RencanaPembelajaranController@indexTampilMedia')->name('rppmd.media');
Route::post('/diklat/rencana-pembelajaran-create-rp-lanjut', 'RencanaPembelajaranController@sesiRencanaPembelajaranLanjut')->name('rppmd.next');

Route::get('/diklat/rencana-pembelajaran-lanjut-1', 'RencanaPembelajaranController@indexLanjut1')->name('rppmd.submit.next');
Route::post('/diklat/rencana-pembelajaran-lanjut-1-sub-materi', 'RencanaPembelajaranController@subMateriRencanaPembelajaranLanjut1')->name('rppmd.form.sub.materi');
Route::post('/diklat/rencana-pembelajaran-lanjut-1-status', 'RencanaPembelajaranController@statusRencanaPembelajaranLanjut1')->name('rppmd.lanjut.create');

Route::get('/diklat/modul-pembelajaran', 'ModulPembelajaranController@index')->name('modul.show');
Route::get('/diklat/modul-pembelajaran-tampil', 'ModulPembelajaranController@showmodulall')->name('fetch.modul');
Route::get('/diklat/download/{id}', 'ModulPembelajaranController@downloadFile')->name('download');
Route::post('/diklat/modul-pembelajaran-upload', 'ModulPembelajaranController@uploadFile')->name('modul.upload');
Route::post('/diklat/modul-pembelajaran-delete', 'ModulPembelajaranController@deleteFile')->name('delete.modul');
Route::post('/diklat/modul-pembelajaran-search', 'ModulPembelajaranController@searchModul')->name('search.modul');

Route::get('/diklat/login', 'LoginController@index');
Route::post('/diklat/login-masuk', 'LoginController@login')->name('login.submit');
