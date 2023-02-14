<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

/*
Hook Points
The following is a list of available hook points.

[pre_system] Called very early during system execution. Only the benchmark and hooks class have been loaded at this point. No routing or other processes have happened.
[pre_controller] Called immediately prior to any of your controllers being called. All base classes, routing, and security checks have been done.
[post_controller_constructor] Called immediately after your controller is instantiated, but prior to any method calls happening.
[post_controller] Called immediately after your controller is fully executed.
[display_override] Overrides the _display() method, used to send the finalized page to the web browser at the end of system execution. This permits you to use your own display methodology. Note that you will need to reference the CI super object with $this->CI =& get_instance() and then the finalized data will be available by calling $this->CI->output->get_output().
[cache_override] Enables you to call your own method instead of the _display_cache() method in the Output Library. This permits you to use your own cache display mechanism.
[post_system] Called after the final rendered page is sent to the browser, at the end of system execution after the finalized data is sent to the browser.
*/

//$hook['pre_system'][] = array(
//	'class' => 'SwaggerHook',
//	'function' => 'loadSwagger',
//	'filename' => 'SwaggerHook.php',
//	'filepath' => 'hooks',
//	'params' => array()
//);

//$hook['pre_system'][] = array(
//	'class' => '',
//	'function' => 'classAutoloader',
//	'filename' => 'autoload.php',
//	'filepath' => 'hooks',
//	'params' => array()
//);

$hook['pre_system'][] = array(
	'class' => 'WhoopsHook',
	'function' => 'loadWhoops',
	'filename' => 'WhoopsHook.php',
	'filepath' => 'hooks',
	'params' => array()
);

//$hook['pre_system'][] = [
//	'class' => 'App_Autoloader',
//	'function' => 'register',
//	'filename' => 'App_Autoloader.php',
//	'filepath' => 'hooks',
//	'params' => [],
//];

//$hook['post_controller_constructor'] = array(
//	'class' => 'LanguageLoader',
//	'function' => 'initialize',
//	'filename' => 'LanguageLoader.php',
//	'filepath' => 'hooks',
//	'params' => array()
//);