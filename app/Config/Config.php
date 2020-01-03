<?php 

namespace App\Config;

class Config 
{
	public function __construct()
	{
		if (!(session_id())) session_start();
		date_default_timezone_set('Asia/Jakarta'); 
		ini_set( 'display_errors', 0 );    

		//define('DB_HOST', 'localhost');
		//define('DB_USER', 'u8127881_luna');
		//define('DB_PASS', 'Lun@C0rp0t@t10n123');
		//define('DB_NAME', 'u8127881_luna');

		 define('DB_HOST', 'localhost');
		 define('DB_USER', 'root');
		 define('DB_PASS', '');
		 define('DB_NAME', 'stream');

		define('CONTROLLER', 'home');
		define('METHOD', 'error');	
		define('__CONFIG', 'portal'); 
	}
}


new Config;