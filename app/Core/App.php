<?php

	/**
	 * 
	 */
	class App
	{	
		protected $controller = CONTROLLER;
		protected $method = METHOD;
		protected $params = [];
		public function __construct()
		{   	
			// var_dump($_GET);die;
			new Config; 
			$url = $this->parseURL(); 

			//controller
			if (file_exists('app/Controllers/' . $url[0] . 'Controller.php')) {
				$this->controller = $url[0] . 'Controller';
				unset($url[0]);  
			} 

			require_once 'app/Controllers/' . $this->controller . '.php'; 
			$this->controller = new $this->controller;

		
			// method  
			if (isset($url[1])) {
				if (method_exists($this->controller, $url[1])) {
					$this->method = $url[1];
					unset($url[1]);
				}
			}


			//params
			if (!empty($url)) {
				$this->params = array_values($url);
			} 


			//jalankan controller dan method , serta kirim params
			call_user_func_array([$this->controller, $this->method], $this->params);

		}

		public function parseURL() 
		{
				// var_dump($_GET['uri']);die;
			if (isset($_GET['uri'])) {
				$url = rtrim($_GET['uri'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url); 
				// return $url;
			}  
			// var_dump($url);die;
			return $url;
		}    

		
	}


	class Route
	{ 
		public static $controller = CONTROLLER;
		public static $method = METHOD;
		public static $params;  

		public static $get,$path,$paths,$count,$counts; 

		public static function get ($url, $controller, $params = null)
		{         
			new Config;
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
					// [0] = BASEURL
					// [1] = uri1
					// [2] = uri2
					
					self::$get = explode('/', $url);
				
					// var_dump(self::$get);die;
					if (preg_match('/{/', self::$get[2]) > 0) {
						
						$count = count(self::$path) ;  
						if ($count > 3) {
							$count = $count - 1;
						} else {
							$count = $count;
						} 
						for($i=1;$i<$count;$i++) {
							array_shift(self::$paths);
						}  
						
						// var_dump(self::$paths);die;
						self::$params = implode('/', self::$paths); 
						$url = '/' . self::$get[1];
					} else { 
						self::$paths = explode('/', $_SERVER['REQUEST_URI']);
						self::$paths = str_replace(explode('/', BASEURL), '', self::$paths);
						foreach (self::$paths as $key => $value) { 
							if (empty($value)) { 
								unset(self::$paths[$key]); 
							}
						}   
						self::$path[1] = implode('/', self::$paths); 
					}
					
				}  
				self::$path[1] = '/'.self::$path[1]; 
 
				$_SERVER['REQUEST_PATH'] = self::$path[1];  
				if (self::$path[1] == $url) { 
					$url = explode('Controller@', $controller); 

					self::$controller = $url[0]; 
					self::$method = $url[1];
					unset($url[0]);
					unset($url[1]);
				} 
				return rtrim( $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params , '/') ;
















				// self::$path = explode('/', $_SERVER['REQUEST_URI']);
				// self::$path = str_replace(explode('/', BASEURL), '', self::$path);
				
				// foreach (self::$path as $key => $value) {
					
				// 	if (empty($value)) { 
				// 		unset(self::$path[$key]); 
				// 	}
				// } 
				// self::$path = implode('/', self::$path);  
				// self::$path = explode('/', self::$path); 

				// self::$paths = self::$path;

				// self::$get = explode('/', $url); 
				

				// array_shift(self::$get);
				
				// foreach (self::$get as $get) {
				// 	// code...
				// 	if ( preg_match('/{/', $get) > 0 ) {
				// 		self::$count += 1;		
				// 	}  else {
				// 		self::$counts += 1;
				// 	} 

				// }


				// if (!is_null(self::$count) AND self::$count > 0) { 
				// 	for($i=0;$i<self::$counts;$i++) {
				// 		array_shift(self::$paths);
				// 	}  
				// 	for ($i=0; $i < self::$count ; $i++) { 
				// 		array_pop(self::$path);
				// 		array_pop(self::$get);
				// 	} 

				// 	self::$params = implode('/', self::$paths); 
					
				// } else { 
				// 	// self::$paths = implode('/', self::$paths);
				// 	self::$params = '';
				// }
				// // self::$paths = '/'.self::$paths;
				// self::$path = '/'.implode('/', self::$path);
				// self::$paths = '/'.implode('/', self::$paths);
				// self::$get = '/'.implode('/', self::$get);
				// // var_dump(self::$get);
				// // var_dump(self::$path);
				// // var_dump(self::$paths); 
				// // var_dump(self::$params);
				// // var_dump($url);
				// // die;
				// // var_dump(self::$path);
				// // var_dump(self::$get);
				// // var_dump(self::$count);
				// // var_dump(self::$counts);
				// // var_dump(self::$params);
				// // die;
				

				// $_SERVER['REQUEST_PATH'] = self::$path;  
				// // var_dump(self::$path);
				// // var_dump($url);
				// // die;
				// if (self::$get == self::$path) { 
				// 	$url = explode('Controller@', $controller); 

				// 	self::$controller = strtolower($url[0]); 
				// 	self::$method = $url[1]; 
				// 	unset($url[0]);
				// 	unset($url[1]); 
				// }  
				// // die;
				// $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params;
				// $_GET['uri'] = rtrim($_GET['uri'], '/');
				// // var_dump($_GET['uri']);die;
				// // return $_GET['uri'];
			} 
		} 

		//metode POST
		public static function post ($url, $controller, $params = null)
		{  
			new Config;
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
					// [0] = BASEURL
					// [1] = uri1
					// [2] = uri2
					
					self::$get = explode('/', $url);
				
					// var_dump(self::$get);die;
					if (preg_match('/{/', self::$get[2]) > 0) {
						
						$count = count(self::$path) ;  
						if ($count > 3) {
							$count = $count - 1;
						} else {
							$count = $count;
						} 
						for($i=1;$i<$count;$i++) {
							array_shift(self::$paths);
						}  
						
						// var_dump(self::$paths);die;
						self::$params = implode('/', self::$paths); 
						$url = '/' . self::$get[1];
					} else { 
						self::$paths = explode('/', $_SERVER['REQUEST_URI']);
						self::$paths = str_replace(explode('/', BASEURL), '', self::$paths);
						foreach (self::$paths as $key => $value) { 
							if (empty($value)) { 
								unset(self::$paths[$key]); 
							}
						}   
						self::$path[1] = implode('/', self::$paths); 
					}
					
				}  
				self::$path[1] = '/'.self::$path[1]; 
 
				$_SERVER['REQUEST_PATH'] = self::$path[1];  
				if (self::$path[1] == $url) { 
					$url = explode('Controller@', $controller); 

					self::$controller = $url[0]; 
					self::$method = $url[1];
					unset($url[0]);
					unset($url[1]);
				} 
				return rtrim( $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params , '/') ;

















				// self::$path = explode('/', $_SERVER['REQUEST_URI']);
				// self::$path = str_replace(explode('/', BASEURL), '', self::$path);
				
				// foreach (self::$path as $key => $value) {
					
				// 	if (empty($value)) { 
				// 		unset(self::$path[$key]); 
				// 	}
				// } 
				// self::$path = implode('/', self::$path);  
				// self::$path = explode('/', self::$path); 

				// self::$paths = self::$path;

				// self::$get = explode('/', $url); 
				

				// array_shift(self::$get);
				
				// foreach (self::$get as $get) {
				// 	// code...
				// 	if ( preg_match('/{/', $get) > 0 ) {
				// 		self::$count += 1;		
				// 	}  else {
				// 		self::$counts += 1;
				// 	} 

				// }


				// if (!is_null(self::$count) AND self::$count > 0) { 
				// 	for($i=0;$i<self::$counts;$i++) {
				// 		array_shift(self::$paths);
				// 	}  
				// 	for ($i=0; $i < self::$count ; $i++) { 
				// 		array_pop(self::$path);
				// 		array_pop(self::$get);
				// 	} 

				// 	self::$params = implode('/', self::$paths); 
					
				// } else { 
				// 	// self::$paths = implode('/', self::$paths);
				// 	self::$params = '';
				// }
				// // self::$paths = '/'.self::$paths;
				// self::$path = '/'.implode('/', self::$path);
				// self::$paths = '/'.implode('/', self::$paths);
				// self::$get = '/'.implode('/', self::$get);
				// // var_dump(self::$get);
				// // var_dump(self::$path);
				// // var_dump(self::$paths); 
				// // var_dump(self::$params);
				// // var_dump($url);
				// // die;
				// // var_dump(self::$path);
				// // var_dump(self::$get);
				// // var_dump(self::$count);
				// // var_dump(self::$counts);
				// // var_dump(self::$params);
				// // die;
				

				// $_SERVER['REQUEST_PATH'] = self::$path;  
				// // var_dump(self::$path);
				// // var_dump($url);
				// // die;
				// if (self::$get == self::$path) { 
				// 	$url = explode('Controller@', $controller); 

				// 	self::$controller = strtolower($url[0]); 
				// 	self::$method = $url[1]; 
				// 	// var_dump($url);
				// 	// unset($url[0]);
				// 	// unset($url[1]);
				// }  
				// // die;
				// $_GET['uri'] = self::$controller . '/' . self::$method . '/' . self::$params;
				// $_GET['uri'] = rtrim($_GET['uri'], '/');
				// // var_dump($_GET);die;
				// return $_GET['uri'];
			}
		} 
	} 


	class Config 
	{
		public function __construct()
		{ 
			if (BASEURL != 'BASEURL' || !empty(BASEURL) || !is_null(BASEURL)) {
				define('BASEURL', $this->path('base_url'));
			}

			if (PATH_CDN != 'PATH_CDN' || !empty(PATH_CDN) || !is_null(PATH_CDN)) {
				define('PATH_CDN', $this->path('path_cdn'));				
			}
		}

		public function path($name)
		{
			$this->db = new Database;  
			$path = $this->db->table(__CONFIG)->where('name', $name);
			return $path['content'];
		}
	}

	// $config = new Config;

	function redirect($url)
	{
		return header("Location:". BASEURL . $url);
	} 

	function url($path = null)
	{
		if (empty($path) || is_null($path)) { 
			return BASEURL;
		} else {
			return BASEURL.'/'.$path;
		}
	}

	function path_cdn($path)
	{
		return PATH_CDN.'/'.$path;
	}

	function asset($path)
	{
		return BASEURL.'/public/'.$path;
	}

	function path($columns)
	{
		$Config = new Config;
		$path = $Config->path($columns);
		
		return BASEURL.'/'.$path;
	}

	function paths($columns)
	{
		$Config = new Config;
		$path = $Config->path($columns);
		
		return $path;
	}
	 function data_tag($tag){
		$kalimat	= $tag;
		$pecah 		= explode(", ", $kalimat);
		sort($pecah);
		$panjang 	= count($pecah);
		for ($i=0; $i < $panjang; $i++) { 
		echo "<a href=''>". strtoupper($pecah[$i])."</a>" ;
										}
	}