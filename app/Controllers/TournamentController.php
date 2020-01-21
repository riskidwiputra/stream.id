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
		public function matchs($id)
		{ 	
			$data['populared']	= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared']	= $this->db->resultSet();
			$data['tournament'] = $this->db->table('tournament')->where('url', $id);
			$id_group2 = $data['tournament']['id_group'];
			$data['group']	= $this->db->query("SELECT * FROM tournament_group WHERE id_group = '$id_group2'");
			$data['group']	= $this->db->resultSet();
			var_dump($data['group']);
			
			$this->view('landing/template/header');
            $this->view('landing/games/tournament/matchs', $data);
			$this->view('landing/template/footer' , $data);			
        }
    }