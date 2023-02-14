<?php
/**
 * PROJECT NAME
 * Version: 1.0.0.0
 * Author: Mahdi Hezaveh
 * Copyright: 2022 Mahdi Hezaveh
 *
 * Email: mahdi.hezavehei@gmail.com
 * URL: https://asapit.ca
 * License: MIT License (https://opensource.org/licenses/MIT)
 *
 * Date: 02-Oct-2022
 * Time: 10:38 PM
 *
 * Description:
 *
 *
 */

//require APPPATH . "third_party/jwt/vendor/autoload.php";

use Firebase\JWT\JWT;

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * You can add a leeway to account for when there is a clock skew times between
 * the signing and verifying servers. It is recommended that this leeway should
 * not be bigger than a few minutes.
 *
 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
*/
JWT::$leeway = 60;

/*   */

$secret_Key = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
$date = new DateTimeImmutable();

/*   */

$expire_at = $date->modify('+30 minutes')->getTimestamp() + JWT::$leeway; // Add 30 minutes + 60 seconds
$domainName = "http://localhost:8064/";     // $config['base_url']
$username = "username";                     // Retrieved from filtered POST data TODO: [***hezaveh***] set Username

/*   */

$request_data = [
	'iat' => $date->getTimestamp(),         // Issued at: time when the token was generated
	'iss' => $domainName,                   // Issuer
	'nbf' => $date->getTimestamp(),         // Not before
	'exp' => $expire_at,                    // Expire
	'userName' => $username,                // User name
];

/*   */

$config['jwt_request_data'] = $request_data;
$config['jwt_secret_key'] = $secret_Key;
$config['jwt_domain_name'] = $domainName;
$config['jwt_user_name'] = $username;



