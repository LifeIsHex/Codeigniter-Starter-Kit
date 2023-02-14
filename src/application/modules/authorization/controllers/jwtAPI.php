<?php

use Firebase\JWT\JWT;

class jwtAPI extends MH_Rest_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		/*   */
	}

	public function index_post()
	{
		/*   */
	}

	public function index_put()
	{
		/*   */
	}

	public function index_delete($id)
	{
		/*   */
	}

	/**
	 * @OA\Get(
	 *     path="/authorization/jwtAPI/generate",
	 *     tags={"Authorization (JWT)"},
	 *     deprecated=false,
	 *     summary="Generate JWT Token.",
	 *     description="Generate JWT Token for your Rest API requests.",
	 *     operationId="",
	 *     @OA\Parameter(name="userName",in="query",required=false,@OA\Schema(type="string")),
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\Response(response="400", description="Bad Request"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 * *     @OA\Property(property="token", type="string")
	 *        )
	 *     ),
	 * )
	 */
	// 200,400,404
	public function generate_get()
	{
		try
		{
			$inputData = array(
				'iss' => $this->get('domainName', TRUE) ?? "http://localhost:8064/", // no need for now!
				'userName' => $this->get('userName', TRUE) ?? "userName",
			);

			$date = new DateTimeImmutable();
			JWT::$leeway = 60;
			$expire_at = $date->modify('+30 minutes')->getTimestamp() + JWT::$leeway; // Add 30 minutes + 60 seconds
			$request_data = [
				'iat' => $date->getTimestamp(),         // Issued at: time when the token was generated
				'iss' => $inputData["iss"],             // Issuer
				'nbf' => $date->getTimestamp(),         // Not before
				'exp' => $expire_at,                    // Expire
				'userName' => $inputData["userName"],   // User name
			];

			/*   */

			$output['token'] = jwt_helper::generateToken($request_data);

			if ($output['token'] !== '')
			{
				$output = array("status" => TRUE, "message" => "A new token is Successfully generated", "data" => $output['token']);
			} else
			{
				$output = array("status" => FALSE, "message" => "The token generation is failed", "data" => "Error!");
			}
			$this->set_response($output, 200);
		} catch (Exception $e)
		{
			$result['message'] = $e->getMessage();
			$this->set_response($result, 400);
		}
	}

	/**
	 * @OA\Post(
	 *     path="/authorization/jwtAPI/decode",
	 *     tags={"Authorization (JWT)"},
	 *     deprecated=false,
	 *     summary="Decode JWT Token. (note: post bearer token with the header)",
	 *     description="Decoder for JWT Token.",
	 *     operationId="",
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\Response(response="400", description="Bad Request"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 * *     @OA\Property(property="data", type="string")
	 *        )
	 *     ),
	 *     security={{"bearerAuth": {}}}
	 * )
	 */
	// 200,400,401,404
	public function decode_post()
	{
		/* With Bearer Implementation */

		$decodedToken = jwt_helper::validateToken(jwt_helper::validateJWT());

		if (isset($decodedToken))
		{
			$output = array("status" => TRUE, "message" => "The request was successfully decoded", "data" => $decodedToken);
			$this->set_response($output, 200);
		} else
		{
			$output = array("status" => FALSE, "message" => "Failed to decode the request", "data" => $decodedToken /*NULL*/);
			$this->set_response($output, 401);
		}

		/* With Header Implementation */
		/*
		$headers = $this->input->request_headers();
		if (array_key_exists('Authorization', $headers) && ! empty($headers['Authorization']))
		{
			$decodedToken = JWT_helper::validateToken($headers['Authorization']);
			if (isset($decodedToken))
			{
				$this->set_response($decodedToken, 200);
				return;
			}
		}
		$this->set_response("Unauthorized!", 401);
		*/
	}
}
