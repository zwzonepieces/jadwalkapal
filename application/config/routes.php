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

//login
$route['login'] = 'ControllerLogin';
$route['login/auth'] = 'ControllerLogin/login';
$route['login/logout'] = 'ControllerLogin/logout';

//pelabuhan
$route['pelabuhan'] = 'ControllerPelabuhan';
$route['pelabuhan/simpan'] = 'ControllerPelabuhan/simpan';
$route['pelabuhan/ubah'] = 'ControllerPelabuhan/ubah';
$route['pelabuhan/hapus/(:any)'] = 'ControllerPelabuhan/hapus/$1';

//kapal
$route['kapal'] = 'ControllerKapal';
$route['kapal/simpan'] = 'ControllerKapal/simpan';
$route['kapal/ubah'] = 'ControllerKapal/ubah';
$route['kapal/hapus/(:any)'] = 'ControllerKapal/hapus/$1';

//jadwal
$route['jadwal'] = 'ControllerJadwal';
$route['jadwal/simpan'] = 'ControllerJadwal/simpan';
$route['jadwal/ubah'] = 'ControllerJadwal/ubah';
$route['jadwal/hapus/(:any)'] = 'ControllerJadwal/hapus/$1';

//laoran
$route['laporan'] = 'ControllerLaporan';

//dashboard
$route['dashboard'] = 'ControllerDashboard';


//user
$route['user'] = 'ControllerUser';
$route['user/ubah'] = 'ControllerUser/ubah';

//list
$route['daftarjadwal'] = 'ControllerList/daftarjadwal';


