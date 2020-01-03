<?php

	class Session {  

		public function __construct()
		{
			session_start();
		}

		public static function set($session, $data)
		{ 
			$_SESSION[$session] = $data; 
			return true;
		}

		public static function get($session)
		{
			return $_SESSION[$session];
		}

		public static function unset($session = null)
		{ 
			if (is_null($session)) {
				session_unset();
			} else {
				unset($_SESSION[$session]);
			}
		}

		public static function check($session)
		{
			if (empty($_SESSION[$session]) || is_null($_SESSION[$session])) {
				return false;
			} else {
				return true;
			}
		}  

	}