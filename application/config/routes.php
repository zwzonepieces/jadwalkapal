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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'ControllerList';
$route['404_override'] = 'ControllerLogin/not_found';
$route['translate_uri_dashes'] = FALSE;
$route['dash'] = 'staf/ControllerDash';

//login admin
$route['login'] = 'admin/ControllerLogin';
$route['login/auth'] = 'admin/ControllerLogin/login';
$route['login/logout'] = 'admin/ControllerLogin/logout';

//asal kapal
$route['pelabuhan'] = 'admin/ControllerPelabuhan';
$route['pelabuhan/simpan'] = 'admin/ControllerPelabuhan/simpan';
$route['pelabuhan/ubah'] = 'admin/ControllerPelabuhan/ubah';
$route['pelabuhan/hapus/(:any)'] = 'admin/ControllerPelabuhan/hapus/$1';

//tujuan kapal
$route['tujuan'] = 'admin/ControllerTujuan';
$route['tujuan/simpan'] = 'admin/ControllerTujuan/simpan';
$route['tujuan/ubah'] = 'admin/ControllerTujuan/ubah';
$route['tujuan/hapus/(:any)'] = 'admin/ControllerTujuan/hapus/$1';

//kapal
$route['kapal'] = 'admin/ControllerKapal';
$route['kapal/simpan'] = 'admin/ControllerKapal/simpan';
$route['kapal/ubah'] = 'admin/ControllerKapal/ubah';
$route['kapal/hapus/(:any)'] = 'admin/ControllerKapal/hapus/$1';


//kedatangan kapal
$route['jadwal'] = 'admin/ControllerDatang';
$route['jadwal/simpan'] = 'admin/ControllerDatang/simpan';
$route['jadwal/detail'] = 'admin/ControllerDatang/detail';
$route['jadwal/ubah'] = 'admin/ControllerDatang/ubah';
$route['jadwal/hapus/(:any)'] = 'admin/ControllerDatang/hapus/$1';

//keberangkatan
$route['berangkat'] = 'admin/ControllerBerangkat';
$route['berangkat/simpan'] = 'admin/ControllerBerangkat/simpan';
$route['berangkat/ubah'] = 'admin/ControllerBerangkat/ubah';
$route['berangkat/hapus/(:any)'] = 'admin/ControllerBerangkat/hapus/$1';

//controller staf
$route['staf'] = 'admin/ControllerStaf';
$route['staf/simpan'] = 'admin/ControllerStaf/simpan';
$route['staf/ubah'] = 'admin/ControllerStaf/ubah';
$route['staf/hapus/(:any)'] = 'admin/ControllerStaf/hapus/$1';

//laporan
$route['laporan'] = 'admin/ControllerLaporan';
$route['laporan/cetak'] = 'admin/ControllerLaporan/cetak';
$route['laporan/index'] = 'admin/ControllerLaporan/index';

//laporandetail
$route['laporandetail'] = 'admin/ControllerLaporan/index2';
$route['laporandetail/cetak'] = 'admin/ControllerLaporan/cetak2';

//staf jadwal datang
$route['s_datang'] = 'staf/ControllerSdatang';
$route['s_datang/simpan'] = 'staf/ControllerSdatang/simpan';
$route['s_datang/ubah'] = 'staf/ControllerSdatang/ubah';
$route['s_datang/hapus/(:any)'] = 'staf/ControllerSdatang/hapus/$1';

//staf jadwal keberangkatan
$route['s_berangkat'] = 'staf/ControllerSberangkat';
$route['s_berangkat/simpan'] = 'staf/ControllerSberangkat/simpan';
$route['s_berangkat/ubah'] = 'staf/ControllerSberangkat/ubah1';
$route['s_berangkat/hapus/(:any)'] = 'staf/ControllerSberangkat/hapus/$1';

//laporan staf
$route['s_laporan'] = 'staf/ControllerSlaporan';
$route['s_laporan/cetak'] = 'staf/ControllerSlaporan/cetak';
$route['s_laporan/index'] = 'staf/ControllerSlaporan/index';

//laporandetail
$route['s_laporandetail'] = 'staf/ControllerSLaporan/index2';
$route['s_laporandetail/cetak'] = 'staf/ControllerSLaporan/cetak2';
//user
$route['user'] = 'ControllerUser';
$route['user/ubah'] = 'ControllerUser/ubah';

//user
$route['userstaf'] = 'staf/ControllerSUser';
$route['userstaf/ubah'] = 'staf/ControllerSUser/ubah';

$route['edatang'] = 'Edatang';
$route['edit/simpan'] = 'Edatang/simpan';

//dashboard
$route['dashboard'] = 'ControllerDashboard';

//list
$route['daftarjadwal'] = 'ControllerList/daftarjadwal';

