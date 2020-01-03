<?php 

	/**
	 * 
	 */
	class HomeController extends Controller
	{
		

		public function index()
		{ 
			$data['title'] = 'Stream';
			 
			$this->view('landing/template/header', $data);
			$this->view('landing/home');	
			$this->view('landing/template/footer');			
		}
		public function error()
		{
			$data['title'] = '404 Stream';
			$this->view('landing/template/header', $data);
			$this->view('landing/404/error');	
			$this->view('landing/template/footer');	
		}
		
		
	}