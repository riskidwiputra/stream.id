<?php 

	/**
	 * 
	 */
	class MatchsController extends Controller
	{
		

		public function matchs()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/match/next-matchs');	
			$this->view('landing/template/footer' , $data);			
        }
    }