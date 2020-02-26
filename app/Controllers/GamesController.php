<?php 

	/**
	 * 
	 */
	class GamesController extends Controller
	{
		

		public function select($url)
		{  
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$data['content'] = $this->db->table('game_list')->where('url', $url); 
			$this->view('landing/template/header', $data);
			$this->view('landing/games/view', $data);	
			$this->view('landing/template/footer' , $data);			
		}
		// public function mobile_legend()
		// {	
		// 	$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
		// 	$data['populared'] = $this->db->resultSet();
		
		// 	$this->view('landing/template/header');
		// 	$this->view('landing/games/mobile-legend');	
		// 	$this->view('landing/template/footer' , $data);	
  //       }
  //       public function pubg()
		// {	
		// 	$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
		// 	$data['populared'] = $this->db->resultSet();
		
		// 	$this->view('landing/template/header');
		// 	$this->view('landing/games/pubg');	
		// 	$this->view('landing/template/footer' , $data);	
		// }
		
		
		
	}