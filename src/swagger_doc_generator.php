<?php

require __DIR__ . "/application/third_party/swagger-ui/vendor/autoload.php";

/*
	$openapi = \OpenApi\Generator::scan(['/application/controllers/']);
	$openapi = \OpenApi\Generator::scan($_SERVER['DOCUMENT_ROOT'].'/application/controllers/');
*/

/*
	$exclude = ['tests'];
	$pattern = '*.php';
	$openapi = \OpenApi\Generator::scan(\OpenApi\Util::finder(__DIR__, $exclude, $pattern));
	// same as
	$openapi = \OpenApi\scan(__DIR__, ['exclude' => $exclude, 'pattern' => $pattern]);
*/

/*
	$openapi = \OpenApi\Generator::scan(['./application/modules/authorization/', './application/modules/validator/']);
    $openapi = (new \OpenApi\Generator())->generate(['./application/modules/authorization/']);
*/

$openapi = \OpenApi\Generator::scan(['./application/modules/swagger/config/', './application/modules/authorization/', './application/modules/validator/']);

// sample
// $openapi = (new \OpenApi\Generator())->generate(['./application/modules/swagger/sample/']);

header('Content-Type: application/json');

echo $openapi->toJSON();
