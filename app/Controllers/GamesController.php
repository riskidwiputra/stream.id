<?php 

	/**
	 * 
	 */
	class GamesController extends Controller
	{
		

		public function dota()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			
			$this->view('landing/template/header');
			$this->view('landing/games/dota');	
			$this->view('landing/template/footer' , $data);			
		}
		public function mobile_legend()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
		
			$this->view('landing/template/header');
			$this->view('landing/games/mobile-legend');	
			$this->view('landing/template/footer' , $data);	
        }
        public function pubg()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
		
			$this->view('landing/template/header');
			$this->view('landing/games/pubg');	
			$this->view('landing/template/footer' , $data);	
		}
		
		
		
	}