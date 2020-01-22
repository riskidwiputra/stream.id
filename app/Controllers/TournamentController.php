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
			$id_tournament = $data['tournament']['id_tournament'];
			$data['group']	= $this->db->query("SELECT * FROM tournament_group WHERE id_group = '$id_group2'");
			$data['group']	= $this->db->resultSet();
			
			$data['round32'] = $this->db->table('tournament_round32')->query(
				"SELECT
					team_1.nama_team AS team_1,
					team_2.nama_team AS team_2,
					team_1.logo_team AS logo_1,
					team_2.logo_team AS logo_2,
					team_1.nama_kota AS nama_kota_1,
					team_2.nama_kota AS nama_kota_2,

					tournament_round32.team1,
					tournament_round32.team2,
					tournament_round32.id_round32,
					tournament_round32.winner
	
				FROM tournament_round32
				JOIN tournament_group AS team_1 ON tournament_round32.team1=team_1.id_team
				JOIN tournament_group AS team_2 ON tournament_round32.team2=team_2.id_team
				WHERE id_tournament = '$id_tournament'
				-- JOIN tournament_group AS team_3 ON tournament_round32.winner=team_3.id_team
				");
			$data['round32'] = $this->db->resultSet();
			$data['round16'] = $this->db->table('tournament_round16')->whereAll('id_tournament', $id_tournament);
			$this->view('landing/template/header');
            $this->view('landing/games/tournament/matchs', $data);
			$this->view('landing/template/footer' , $data);			
        }
    }