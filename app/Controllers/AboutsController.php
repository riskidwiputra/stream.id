<?php 

	/**
	 * 
	 */
	class AboutsController extends Controller
	{
		

		public function contact()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/contact');	
			$this->view('landing/template/footer' , $data);			
		}
		public function faqs()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/faqs');	
			$this->view('landing/template/footer' , $data);	
		}
		public function sponsors()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/sponsors');	
			$this->view('landing/template/footer' , $data);			
		}
		public function gallery()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/gallery');	
			$this->view('landing/template/footer' , $data);	
		}
		public function videos()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/videos');	
			$this->view('landing/template/footer' , $data);			
		}
		public function marchandise()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/about/marchandise');	
			$this->view('landing/template/footer' , $data);	
		}
		
		
	}