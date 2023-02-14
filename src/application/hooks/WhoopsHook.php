<?php

// namespace WhoopsHook;

use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class WhoopsHook {

	public function loadWhoops()
	{
		/*
			Whoops\Handler\CallbackHandler - Wraps regular closures as handlers
			Whoops\Handler\JsonResponseHandler - Formats errors and exceptions as a JSON payload
			Whoops\Handler\PrettyPageHandler - Outputs a detailed, fancy error page
		*/
		switch (ENVIRONMENT)
		{
			case 'testing':
			case 'development':
			{
				$whoops = new Run;
				$whoops->allowQuit(FALSE);
				$whoops->writeToOutput(TRUE);
				$whoops->pushHandler(new PrettyPageHandler());
				$whoops->register();
				// $e = new RuntimeException("Oh Error test!");
				// $html = $whoops->handleException($e);
				/*   */
				break;
			}
			case 'production':
			{
				$whoops = new Run;
				$whoops->allowQuit(FALSE);
				$whoops->writeToOutput(TRUE);
				$whoops->pushHandler(new JsonResponseHandler());
				$whoops->register();
				// $e = new RuntimeException("Oh Error test!");
				// $html = $whoops->handleException($e);
				/*   */
				break;
			}
			default:
				header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
				echo 'The application environment is not set correctly.';
				exit(1); // EXIT_ERROR
		}
	}
}