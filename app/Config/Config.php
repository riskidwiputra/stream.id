<?php 

namespace App\Config;

class Config 
{
	public function __construct()
	{
		if (!(session_id())) session_start();
		date_default_timezone_set('Asia/Jakarta'); 
		ini_set( 'display_errors', 0 );    

		// define('DB_HOST', 'localhost');
		// define('DB_USER', 'u8127881_gaming');
		// define('DB_PASS', 'gamingstreamuniverse');
		// define('DB_NAME', 'u8127881_gaming');

		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('DB_NAME', 'stream');
 
		define('CONTROLLER', 'Home');
		define('METHOD', 'error');	
		define('__CONFIG', 'portal'); 
	}
}


new Config;
