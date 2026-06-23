<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']='auth';
$route['login/proses']='auth/login';
$route['logout']='auth/logout';
$route['registrasi'] = 'auth/registrasi';
$route['dashboard'] = 'admin/dashboard';
$route['kategori-produk'] = 'admin/kategori';
$route['kategori-produk/tambah'] = 'admin/kategori/store';
$route['kategori-produk/update'] = 'admin/kategori/update';
$route['kategori-produk/delete/(:num)'] = 'admin/kategori/delete/$1';
$route['data-produk'] = 'admin/produk';
$route['data-produk/update'] = 'admin/produk/update';
$route['data-pelanggan'] = 'admin/pelanggan';
$route['data-sales'] = 'admin/sales';
$route['data-order'] = 'admin/order';
$route['laporan'] = 'admin/laporan';
$route['sales'] = 'admin/sales';
$route['sales/tambah'] = 'admin/sales/simpan';
$route['sales/update'] = 'admin/sales/update';
$route['sales/delete/(:num)'] = 'admin/sales/delete/$1';
$route['laporan-penjualan'] = 'admin/laporan_penjualan';
$route['laporan-penjualan/excel'] = 'admin/laporan_penjualan/export_excel';
$route['laporan-penjualan/pdf'] = 'admin/laporan_penjualan/export_pdf';
$route['admin/laporan-stok'] = 'admin/laporan_stok';
$route['laporan-stok/excel'] = 'admin/laporan_stok/export_excel';
$route['laporan-stok/pdf'] = 'admin/laporan_stok/export_pdf';
$route['sales/detail-order/(:num)'] = 'sales/order/detail_order/$1';
$route['admin/detail-order/(:num)'] = 'admin/order/detail_order/$1';
$route['sales/cetak-nota/(:num)'] = 'sales/order/cetak_nota/$1';
$route['admin/cetak-nota/(:num)'] = 'admin/order/cetak_nota/$1';
$route['admin/order/kirim_notifikasi/(:num)'] = 'admin/order/kirim_notifikasi/$1';