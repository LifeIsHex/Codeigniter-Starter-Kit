<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class jwt_helper {

	public static function generateToken($data): string
	{
		try
		{
			$CI =& get_instance();

			/*   */

			if (isset($data))
			{
				return JWT::encode($data, $CI->config->item('jwt_secret_key'), 'HS512');
			} else
			{
				return JWT::encode($CI->config->item('jwt_request_data'), $CI->config->item('jwt_secret_key'), 'HS512');
			}
		} catch (Exception $e)
		{
			header('HTTP/1.1 400 Bad Request');
			echo json_encode(array("status" => FALSE, "message" => "Bad Request: " . $e->getMessage(), "data" => NULL), JSON_PRETTY_PRINT);
			exit;
		}
	}

	public static function validateToken($jwtToken)
	{
		try
		{
			$CI =& get_instance();
			$now = new DateTimeImmutable();

			/*   */

			$token = JWT::decode($jwtToken, new Key($CI->config->item('jwt_secret_key'), 'HS512'));

			/*   */

			if ($token->nbf > $now->getTimestamp() ||
				$token->exp < $now->getTimestamp() ||
				$token->iss !== $CI->config->item('base_url') ||
				$token->iss !== $CI->config->item('jwt_domain_name')
				// $token->userName !== $CI->config->item('jwt_user_name')
			)
			{
				header('HTTP/1.1 401 Unauthorized');
				echo json_encode(array("status" => FALSE, "message" => "Unauthorized", "data" => NULL), JSON_PRETTY_PRINT);
				exit;
			}

			/*   */

			return $token;//json_encode(/*(array)*/ $token, JSON_PRETTY_PRINT);

		} catch (Exception $e)
		{
			header('HTTP/1.1 400 Bad Request');
			echo json_encode(array("status" => FALSE, "message" => "Bad request: " . $e->getMessage(), "data" => NULL), JSON_PRETTY_PRINT);
			exit;
		}
	}

	public static function validateJWT(): string
	{
		/*
		 * Note that, by default, Apache will not pass the HTTP_AUTHORIZATION header to PHP.
		 * The reason behind this is:
		 * The basic authorization header is only secure if your connection is done over HTTPS,
		 * since otherwise the credentials are sent in encoded plain text(not encrypted) over the network which is a
		 * huge security issue.
		*/
		if ( ! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches))
		{
			header('HTTP/1.1 401 Unauthorized');
			echo json_encode(array("status" => FALSE, "message" => "Token not found in the request", "data" => NULL), JSON_PRETTY_PRINT);
			exit;
		}

		/*   */

		// If $matches not available, then no JWT was extracted, and an HTTP 400 Bad Request is returned.
		$jwt = $matches[1];
		if ( ! $jwt)
		{
			header('HTTP/1.1 400 Bad Request');
			echo json_encode(array("status" => FALSE, "message" => "Bad request", "data" => NULL), JSON_PRETTY_PRINT);
			exit;
		}

		/*   */

		return $matches[1];
	}
}