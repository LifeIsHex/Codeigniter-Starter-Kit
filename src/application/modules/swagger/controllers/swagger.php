<?php
defined('BASEPATH') or exit('No direct script access allowed');

class swagger extends MH_HMVC_Controller {
	public function index()
	{
		$this->load->view('swagger_ui');
	}
}