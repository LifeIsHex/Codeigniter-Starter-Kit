<?php

use chriskacerguis\RestServer\RestController;

class MH_API_Controller extends RestController {

	public function __construct()
	{
		parent::__construct();

		/* Check Token */

		jwt_helper::validateToken(jwt_helper::validateJWT());

		/*   */

	}
}