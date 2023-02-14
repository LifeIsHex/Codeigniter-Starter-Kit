<?php

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;

class email extends MH_API_Controller {

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
	 * @OA\Post(
	 *     path="/validator/email/check",
	 *     tags={"Validator"},
	 *     deprecated=false,
	 *     summary="Validation of an Email Address",
	 *     description="RFCValidation: Standard RFC-like email validation. DNSCheckValidation: Will check if there are DNS records that signal that the server accepts emails. This does not entail that the email exists.",
	 *     operationId="",
	 *     @OA\Response(response=200,description="Success",
	 *     @OA\Response(response="400", description="Bad Request"),
	 *     @OA\Response(response="401", description="Unauthorized"),
	 *     @OA\Response(response="404", description="Not Found"),
	 *     @OA\JsonContent(
	 *       @OA\Property(property="status", type="boolean"),
	 *       @OA\Property(property="message", type="string"),
	 *       @OA\Property(property="data", type="boolean")
	 *        )
	 *     ),
	 *    @OA\RequestBody(
	 *      description="Input data format",
	 *      required=true,
	 *         @OA\MediaType(
	 *            mediaType="multipart/form-data",
	 *            @OA\Schema(type="object",
	 *             @OA\Property(property="email",description="email address",type="string"),
	 *                 required={"email"}
	 *             )
	 *         )
	 *      ),
	 *     security={{"bearerAuth": {}}}
	 * )
	 */
	// 200,400,401,404
	public function check_post()
	{
		/**
		 * RFCValidation: Standard RFC-like email validation.
		 * NoRFCWarningsValidation: RFC-like validation that will fail when warnings* are found.
		 * DNSCheckValidation: Will check if there are DNS records that signal that the server accepts emails. This does not entail that the email exists.
		 * MultipleValidationWithAnd: It is a validation that operates over other validations performing a logical and (&&) over the result of each validation.
		 * MessageIDValidation: Follows RFC2822 for message-id to validate that field, that has some differences in the domain part.
		 * Your own validation: You can extend the library behaviour by implementing your own validations.
		 */
		try
		{
			$inputData = array(
				'email' => $this->post('email', TRUE),
			);

			$result = array(
				"status" => FALSE,
				"message" => "",
				"data" => NULL,
			);

			/*   */

			if ( ! $inputData['email'])
			{
				$result['message'] = "The email address is empty";
				$this->set_response($result, 400);
			}

			/*   */

			$validator = new EmailValidator();
			// $validator->isValid("example@example.com", new RFCValidation()); //true
			$multipleValidations = new MultipleValidationWithAnd([
				new RFCValidation(),
				new DNSCheckValidation()
			]);
			//ietf.org has MX records signaling a server with email capabilities
			$res = $validator->isValid($inputData['email'], $multipleValidations); //true

			/*   */

			$result['status'] = TRUE;
			$result['message'] = "The email address checked successfully";
			$result['data'] = $res;
			$this->set_response($result, 200);
		} catch (Exception $e)
		{
			$result['message'] = $e->getMessage();
			$this->set_response($result, 400);
		}
	}
}
