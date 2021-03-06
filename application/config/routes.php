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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['books'] = 'books/index';
$route['book/(:any)'] = 'books/book/$1';
$route['book/(:any)'] = 'books/filter/$1';

$route['login/index'] = 'login/index';
$route['login/(:any)'] = 'login/index/$1';
$route['login'] = 'login/index';

$route['register/index'] = 'register/index';
$route['register'] = 'register/index';

$route['logout/logout'] = 'login/logout';

$route['teacher/index'] = '/teacher/index';
$route['teacher'] = '/teacher/index';
$route['teacher/books/add'] = '/teacher/add/';
$route['teacher/books/add/(:any)'] = '/teacher/add/$1';
$route['teacher/books/edit'] = '/teacher/editBook/';
$route['teacher/books/edit/(:num)'] = '/teacher/editBook/$1';
$route['teacher/books/delete'] = '/teacher/deleteBook/';
$route['teacher/books/delete/(:num)'] = '/teacher/deleteBook/$1';

$route['admin'] = '/admin/index';
$route['admin/index'] = '/admin/';
$route['admin/(:any)'] = '/admin/';

$route['students'] = 'student/';