<?php

defined('BASEPATH') or exit('No direct script access allowed');

// load the MX_Router class
require APPPATH . "third_party/MX/Router.php";

class MY_Router extends MX_Router {

	public function __construct()
	{
		parent::__construct();

		/*   */

		/*
		$segments = $this->uri->segment_array();
		echo json_encode($segments);

		if ($this->routes['versioning'] === TRUE && ! empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 1)
		{
			$this->check_versioning_enabled($segments, 1);
		}
		*/
	}

	public function check_versioning_enabled($segments, $shift)
	{
		# Check for versioning enabled by developer or not
		/*   */

		if ($this->routes['versioning'] === TRUE && ! empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 1)
		{
			if ( ! empty($route['bypass_methods']) && in_array($segments[2 + $shift], $route['bypass_methods']))
			{
				$this->set_class($route['hidden_controller']);
				array_splice($this->uri->segments, 1, 0, $route['hidden_controller']);
				array_unshift($this->uri->segments, NULL);
				unset($this->uri->segments[0]);
				$segments = $this->uri->segments;
			} else if (isset($segments[2 + $shift]) && ! empty($segments[2 + $shift]) && $segments[2 + $shift] != "")
			{
				$this->set_class($segments[2 + $shift]);
			}

			/*   */

			$method_trailing = '_' . strtolower($segments[1]) . '_' . strtolower($_SERVER['REQUEST_METHOD']);

			/*   */

			if (isset($segments[3 + $shift]) && $segments[3 + $shift] != "" && ! $this->check_method_exist($segments[3 + $shift] . $method_trailing))
			{
				$new_method_name = "index_" . strtolower($segments[2]);
				$this->set_method($new_method_name);
			} else if (isset($segments[3 + $shift]) && ! empty($segments[3 + $shift]) && $segments[3 + $shift] != "" && preg_match("/^[0-9.,$;]+$/", $segments[3 + $shift]) != 1 && $this->check_method_exist($segments[3 + $shift] . $method_trailing))
			{

				$new_method_name = $segments[3 + $shift] . "_" . strtolower($segments[1]);
				$this->set_method($new_method_name);
				$new_segments = $this->uri->segments;
				$new_segments[3 + $shift] = $new_method_name;
				unset($new_segments[1]);
				array_unshift($new_segments, NULL);
				unset($new_segments[0]);
				$this->uri->segments = $new_segments;
				$this->uri->rsegments = $new_segments;
			} else
			{
				$new_method_name = "index_" . strtolower($segments[1]);
				$this->set_method($new_method_name);
			}
		} # Check for versioning available in URL or not

		/*   */

		elseif ($this->routes['versioning'] === TRUE && ! empty($segments) && isset($segments[1]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[1]) == 0)
		{
			$data = array(
				"status" => FALSE,
				"message" => "Seems like you have enabled api versioning but didn't implement method with versioning",
				"suggestion" => "Either you can disable versioning from config/routes.php or implement method with requested version like index_v1_" . strtolower($_SERVER['REQUEST_METHOD']),
			);
			header('HTTP/1.1 404 Method Not Found');
			echo json_encode($data, JSON_PRETTY_PRINT);
			die;
		} # Check for versioning not enable by user and available in URL

		/*   */

		elseif ($this->routes['versioning'] === FALSE && ! empty($segments) && isset($segments[2]) && preg_match("/^[vV]{1}[0-9.,$;]{1,2}+$/", $segments[2]) == 1)
		{
			$data = array(
				"status" => FALSE,
				"message" => "Seems like you have not enabled api versioning",
				"suggestion" => "You can enabled versioning from config/routes.php ",
			);
			header('HTTP/1.1 404 Method Not Found');
			echo json_encode($data, JSON_PRETTY_PRINT);
			die;
		}
	}

	function check_method_exist($method): bool
	{
		return FALSE;

		/*
		$controllerName = $this->fetch_class();
		$pageControllerPath = APPPATH . 'controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';
		if (file_exists($pageControllerPath))
		{
			$file_content = file_get_contents($pageControllerPath);
			if (strpos($file_content, $method) !== FALSE)
			{
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
		*/
	}

	public function get_cfg_folder(): string
	{
		$cfg = "";
		switch (ENVIRONMENT)
		{
			case 'testing':
			{
				$cfg = "testing/";
				break;
			}
			case 'development':
			{
				$cfg = "development/";
				break;
			}
			case 'production':
			{
				$cfg = "production/";
				break;
			}
		}

		return $cfg;
	}

}
