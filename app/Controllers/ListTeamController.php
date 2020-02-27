<?php 

	/**
	 * 
	 */
	class ListTeamController extends Controller
	{
		

		public function listteam()
		{ 	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$this->view('landing/template/header',$data);
			$this->view('landing/team/listteam');	
			$this->view('landing/template/footer');			
			// var_dump($_SERVER);die;
		}
		
		
		
	}