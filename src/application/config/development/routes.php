<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'logs'; // logs
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| URI ROUTING WITH VERSION
| -------------------------------------------------------------------------
| To use version in API set
|
|	$route['versioning'] = TRUE;
|
| Default it is
|
|	$route['versioning'] = FALSE;
|
| This will make your routing like my_version/my-controller/my_method.
|
| Examples:	v1/Auth/login
*/
$route['versioning'] = FALSE; /* Check "Core/MY_Router.php" */

/*
| -------------------------------------------------------------------------
| Hidden Controller
| -------------------------------------------------------------------------
| To remove controller name from url add your method name in this array

|	$route['bypass_methods'] = ['method1','method2'];
|
| Set Controller name where your method exist
|
|   $route['hidden_controller'] = 'YourController';
|
| This will change your routing version/method ==> version/YourController/method.
|
| Examples:	v1/method ==> v1/YourController/method
*/
$route['bypass_methods'] = [];
$route['hidden_controller'] = '';
