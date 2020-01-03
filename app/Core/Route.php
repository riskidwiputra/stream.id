<?php

class Route
	{ 
		public static $controller = CONTROLLER;
		public static $method = METHOD;
		public static $params;  

		public static $get;
		public static $path; 
		public static $paths; 

		public static function get ($url, $controller, $params = null)
		{         
			if ($_SERVER['REQUEST_METHOD'] == 'GET'){ 

				self::$path = explode('/', $_SERVER['REQUEST_URI']);
				self::$path = str_replace(explode('/', BASEURL), '', self::$path);
				foreach (self::$path as $key => $value) {
					if (empty($value)) { 
						unset(self::$path[$key]); 
					}
				}
				self::$path = implode('/', self::$path);
				self::$path = explode('/', self::$path);
				array_unshift(self::$path, BASEURL);
				self::$paths = self::$path; 
				if (isset(self::$path[2])) {
					for($i=1;$i<3;$i++) {
						array_shift(self::$paths);
					} 
					self::$params = implode('/', self::$paths); 
				} 
				self::$path[1] = '/'.self::$path[1]; 
				$_SERVER['REQUEST_PATH'] = self::$path[1]; 
				if (self::$path[1] == $url) { 
					$url = explode('Controller@', $controller);

					self::$controller = strtolower($url[0]); 
					self::$method = $url[1];
					unset($url[0]);
					unset($url[1]);
				} 
				return rtrim( $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params , '/') ; 
				
			} 
		} 

		public static function post ($url, $controller, $params = null)
		{  
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
				 
				self::$path = explode('/', $_SERVER['REQUEST_URI']);
				self::$path = str_replace(explode('/', BASEURL), '', self::$path);
				foreach (self::$path as $key => $value) {
					if (empty($value)) { 
						unset(self::$path[$key]); 
					}
				}
				self::$path = implode('/', self::$path);
				self::$path = explode('/', self::$path);
				array_unshift(self::$path, BASEURL);
				self::$paths = self::$path; 
				if (isset(self::$path[2])) {
					for($i=1;$i<3;$i++) {
						array_shift(self::$paths);
					} 
					self::$params = implode('/', self::$paths); 
				} 
				self::$path[1] = '/'.self::$path[1]; 
				$_SERVER['REQUEST_PATH'] = self::$path[1]; 
				if (self::$path[1] == $url) { 
					$url = explode('Controller@', $controller);

					self::$controller = strtolower($url[0]); 
					self::$method = $url[1];
					unset($url[0]);
					unset($url[1]);
				} 
				return rtrim( $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params , '/') ;

			}
		} 
	} 