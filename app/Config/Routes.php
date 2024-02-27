<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login 
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');

// logout
$routes->get('/logout', 'Login::logout');

// Admin
$routes->get('/halaman-admin', 'Admin::index',['filter'=>'otentifikasi']);

// pegawai
$routes->get('/halaman-pegawai', 'Pegawai::index',['filter'=>'otentifikasi']);
$routes->get('/list-pegawai', 'Pegawai::pegawai', ['filter'=>'otentifikasi']);
// $routes->post('/list-pegawai', 'Pegawai::pegawai');
$routes->post('pegawai/(:any)', 'Pegawai::pegawai/$1');
$routes->post('/cari-pegawai/(:num)', 'Pegawai::pegawai/$1');
$routes->get('/tambah-pegawai', 'Pegawai::tambahPegawai', ['filter'=>'otentifikasi']);
$routes->post('/tambah', 'Pegawai::simpanPegawai');
$routes->get('/edit-pegawai/(:num)', 'Pegawai::editPegawai/$1', ['filter'=>'otentifikasi']);
$routes->post('/simpan-edit/(:num)', 'Pegawai::prosesEdit/$1');
$routes->get('/hapus-pegawai/(:num)', 'Pegawai::hapus/$1');
$routes->get('/hapus-pegawai/(:num)', 'Pegawai::hapus/$1');
$routes->get('/detail-pegawai/(:num)', 'Pegawai::detail/$1');

// absensi
$routes->get('/list-absensi', 'Absensi::absensi', ['filter'=>'otentifikasi']);
$routes->get('/absen-manual', 'Absensi::absensiManual', ['filter'=>'otentifikasi']);
$routes->get('/absen-masuk', 'Absensi::absensiMasuk', ['filter'=>'otentifikasi']);
$routes->get('/absen-scan', 'Absensi::absensiScan', ['filter'=>'otentifikasi']);
$routes->post('/simpan-absensi-manual', 'Absensi::simpanAbsenManual');
$routes->post('/absen-keluar', 'Absensi::keluar');

// user
$routes->get('/list-user', 'User::user');
$routes->get('/tambah-user/(:num)', 'Pegawai::tambahUser/$1');
$routes->get('/edit-user/(:num)', 'User::editUser/$1');
$routes->post('/edit-user/(:num)', 'User::prosesEdit/$1');
$routes->get('/hapus-user/(:num)', 'User::hapus/$1');
$routes->post('/tambah-userp', 'User::simpanuser');
$routes->get('/detail-absensi/(:num)', 'Absensi::detail/$1');

//Cetak
$routes->get('/cetak', 'Cetakabsensi::printPDF');
$routes->get('/cetak/(:num)', 'Cetakabsensi::printPDF/$1');
