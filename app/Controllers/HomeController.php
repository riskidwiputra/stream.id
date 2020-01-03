<?php 

	/**
	 * 
	 */
	class HomeController extends Controller
	{
		

		public function index()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['title'] = 'Stream';
			$this->view('landing/template/header', $data);
			$this->view('landing/home');	
			$this->view('landing/template/footer' , $data);			
		}
		public function error()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['title'] = '404 Stream';
			$this->view('landing/template/header', $data);
			$this->view('landing/404/error');	
			$this->view('landing/template/footer' , $data);	
		}
		
		
	}