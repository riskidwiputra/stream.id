<?php 

	/**
	 * 
	 */
	class TournamentController extends Controller
	{
		

		public function tournament()
		{ 
			$data['populared']	= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared']	= $this->db->resultSet();
			$data['content']	= $this->model('Tournament_Model')->selectAll();
			$this->view('landing/template/header');
            $this->view('landing/games/tournament/tournament', $data);
			$this->view('landing/template/footer' , $data);			
        }
    }