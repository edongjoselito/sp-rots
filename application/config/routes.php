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
$route['default_controller'] = 'pages/view';

$route['member_add'] = 'pages/member_add';
$route['member'] = 'pages/member';
$route['profile/(:any)'] = 'pages/profile/$1';
$route['edit_prof/(:any)'] = 'pages/edit_prof/$1';
$route['prof_delete/(:any)'] = 'pages/prof_delete/$1';


$route['ordinances'] = 'pages/ordinances';
$route['ordinance_add'] = 'pages/ordinance_add';
$route['ordinance_upload'] = 'pages/ordinance_upload';
$route['ordinance_delete/(:any)'] = 'pages/ordinance_delete/$1';
$route['ordinance_edit/(:any)'] = 'pages/ordinance_edit/$1';
$route['or_del_admin/(:any)'] = 'pages/or_del_admin/$1';
$route['res_by_admin/(:any)'] = 'pages/res_by_admin/$1';

$route['set/(:any)'] = 'pages/set/$1';
$route['set'] = 'pages/set';
$route['set_add'] = 'pages/set_add';
$route['set_edit/(:any)'] = 'pages/set_edit/$1';
$route['set_delete/(:any)'] = 'pages/set_delete/$1';



$route['com'] = 'pages/com';
$route['com_add'] = 'pages/com_add';
$route['com_edit/(:any)'] = 'pages/com_edit/$1';
$route['com_delete/(:any)'] = 'pages/com_delete/$1';


$route['office'] = 'pages/office';
$route['office_add'] = 'pages/office_add';
$route['office_edit/(:any)'] = 'pages/office_edit/$1';
$route['office_delete/(:any)'] = 'pages/office_delete/$1';


$route['polparty'] = 'pages/polparty';
$route['polparty_add'] = 'pages/polparty_add';
$route['polparty_edit/(:any)'] = 'pages/polparty_edit/$1';
$route['polparty_delete/(:any)'] = 'pages/polparty_delete/$1';


$route['res'] = 'pages/res';
$route['res_add'] = 'pages/res_add';
$route['res_edit/(:any)'] = 'pages/res_edit/$1';
$route['res_delete/(:any)'] = 'pages/res_delete/$1';
$route['update_res_file'] = 'pages/update_res_file';
$route['res_restore_admin/(:any)'] = 'pages/res_restore_admin/$1';
$route['res_del_admin/(:any)'] = 'pages/res_del_admin/$1';

//REPORTS//
$route['resauthor'] = 'pages/resauthor';
$route['res_year_report'] = 'pages/res_year_report';
$route['or_year_report'] = 'pages/or_year_report';
$route['orauthor'] = 'pages/orauthor';
$route['res_author'] = 'pages/res_author';
$route['res_reports/(:any)'] = 'pages/res_reports/$1';
$route['or_reports/(:any)'] = 'pages/or_reports/$1';
$route['res_result'] = 'pages/res_result';
$route['or_result'] = 'pages/or_result';



$route['vm_upload'] = 'upload/vm_upload';
$route['upload_file'] = 'upload/upload_file';

$route['upload'] = 'pages/upload';
$route['upload_file'] = 'pages/upload_file';


$route['termmembers_add'] = 'pages/termmembers_add';
$route['termmembers_add/(:any)'] = 'pages/termmembers_add/$1';

$route['termmembers'] = 'pages/termmembers';
$route['termmembers_delete/(:any)'] = 'pages/termmembers_delete/$1';


$route['document'] = 'pages/document';
$route['doc_add'] = 'pages/doc_add';
$route['doc_edit/(:any)'] = 'pages/doc_edit/$1';
$route['doc_delete/(:any)'] = 'pages/doc_delete/$1';
$route['doc_file'] = 'pages/doc_file';
$route['doc_process'] = 'pages/doc_process';
$route['doc/(:any)'] = 'pages/doc/$1';


$route['term'] = 'pages/term';
$route['term_add'] = 'pages/term_add';
$route['term_delete/(:any)'] = 'pages/term_delete/$1';
$route['term_edit/(:any)'] = 'pages/term_edit/$1';

$route['cat'] = 'pages/cat';
$route['cat_add'] = 'pages/cat_add';
$route['cat_edit/(:any)'] = 'pages/cat_edit/$1';
$route['cat_delete/(:any)'] = 'pages/cat_delete/$1';


$route['user'] = 'pages/user';

$route['user_add'] = 'pages/user_add';
$route['users_edit/(:any)'] = 'pages/users_edit/$1';
$route['user_delete/(:any)'] = 'pages/user_delete/$1';
$route['user_profile/(:any)'] = 'pages/user_profile/$1';

$route['log_in'] = 'pages/log_in';
$route['logout'] = 'pages/logout';

$route['lock'] = 'pages/lock';
$route['lock_user_screen'] = 'pages/lock_user_screen';
$route['upload_user_image'] = 'pages/upload_user_image';
$route['change_username'] = 'pages/change_username';
$route['change_password'] = 'pages/change_password';
$route['profile'] = 'pages/profile';
$route['upload_member_profile/(:any)'] = 'pages/upload_member_profile/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
