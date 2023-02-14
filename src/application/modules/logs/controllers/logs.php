<?php
/**
 * PROJECT NAME
 * Version:
 * Author: Mahdi Hezaveh
 * Copyright: 2022 Mahdi Hezaveh
 *
 * Email: mahdi.hezavehei@gmail.com
 * URL: https://asapit.ca
 * License: MIT License (https://opensource.org/licenses/MIT)
 *
 * Date: 28-Sep-2022
 * Time: 7:10 PM
 *
 * Description:
 *
 *
 */


//use CILogViewer\CILogViewer;

defined('BASEPATH') or exit('No direct script access allowed');

class logs extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// http://localhost:8064/logs?rt=5000
		/*
		$CILogs = new \CILogViewer\CILogViewer(APPPATH . "logs/");
		echo $CILogs->showLogs();
		return;
		*/

		$this->load->library('CILogViewer');

		// Todo: [*** hezaveh ***] add environment if ....
		$CILogs = new CILogViewer(); //CILogViewer( /* $this->config->item('log_path') */);
		echo $CILogs->showLogs();
		// return;
	}
}