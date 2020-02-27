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
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['content']	= $this->model('Tournament_Model')->selectAll();
			
			$this->view('landing/template/header', $data);
			$this->view('landing/games/tournament/tournament', $data);
			$this->view('landing/template/footer' , $data);			
		}
		public function matchs($id)
		{ 	
			if(Session::check('users') == true ){ 
				$data['populared']	= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
				$data['populared']	= $this->db->resultSet();
				$data['tournament'] = $this->db->table('tournament')->where('url', $id);
				$data['users'] = $this->db->query('
					SELECT * FROM users 
					JOIN users_docs
					ON users.user_id = users_docs.user_id
					JOIN balance_users
					ON users.user_id = balance_users.users_id
					WHERE users.user_id = "'.Session::get("users").'"
					');
				$data['users']	= $this->db->single();  
				$data['game-list'] = $this->db->table('game_list')->all();
				$data['game-list']	= $this->db->resultSet();
				$url_tournament 	= $data['tournament']['url'];
				$id_group2 			= $data['tournament']['id_group'];
				$id_tournament 		= $data['tournament']['id_tournament'];

				$data['group']	= $this->db->query("SELECT * FROM tournament_group WHERE id_group = '$id_group2'");
				$data['group']	= $this->db->resultSet();

				$data['round32'] = $this->db->query(
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
					tournament_round32.winner,
					tournament_round32.date

					FROM tournament_round32
					JOIN tournament_group AS team_1 ON tournament_round32.team1=team_1.id_team
					JOIN tournament_group AS team_2 ON tournament_round32.team2=team_2.id_team
					WHERE id_tournament = '$id_tournament'
					");
				$data['round32'] = $this->db->resultSet();

				$data['round16'] = $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2, 
					C.id_team AS id_team1,
					D.id_team AS id_team2,
					
					tournament_round16.team1,
					tournament_round16.team2,
					tournament_round16.winner,
					tournament_round16.date
					FROM tournament_round16
					JOIN tournament_round32 AS A ON tournament_round16.team1=A.id_round32
					JOIN tournament_round32 AS B ON tournament_round16.team2=B.id_round32
					JOIN tournament_group AS C ON A.winner=C.id_team
					JOIN tournament_group AS D ON B.winner=D.id_team
					WHERE tournament_round16.id_tournament = '$id_tournament'
					");
				$data['round16'] = $this->db->resultSet();

				$data['round16_1']	= $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,

					tournament_round16.team1,
					tournament_round16.team2,
					tournament_round16.winner,
					tournament_round16.date
					FROM tournament_round16
					INNER JOIN tournament_group AS C ON tournament_round16.team1=C.id_team
					INNER JOIN tournament_group AS D ON tournament_round16.team2=D.id_team
					WHERE tournament_round16.id_tournament = '$id_tournament'
					");
				$data['round16_1'] = $this->db->resultSet();

			// $data['round16_empty'] = $this->db->table('tournament_round16')->whereAll('id_tournament', $id_tournament);
				$data['qtf'] = $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,
					C.id_team AS id_team1,
					D.id_team AS id_team2,
					tournament_quarter_finals.winner,
					tournament_quarter_finals.date
					FROM tournament_quarter_finals
					INNER JOIN tournament_round16 AS A ON tournament_quarter_finals.team1=A.id_round16
					INNER JOIN tournament_round16 AS B ON tournament_quarter_finals.team2=B.id_round16
					INNER JOIN tournament_group AS C ON A.winner=C.id_team
					INNER JOIN tournament_group AS D ON B.winner=D.id_team
					WHERE tournament_quarter_finals.id_tournament = '$id_tournament'
					");
				$data['qtf'] = $this->db->resultSet();
				$data['qtf_1']	= $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,
					tournament_quarter_finals.team1,
					tournament_quarter_finals.team2,
					tournament_quarter_finals.winner,
					tournament_quarter_finals.date
					FROM tournament_quarter_finals
					INNER JOIN tournament_group AS C ON tournament_quarter_finals.team1=C.id_team
					INNER JOIN tournament_group AS D ON tournament_quarter_finals.team2=D.id_team
					WHERE tournament_quarter_finals.id_tournament = '$id_tournament'
					"
				);
				$data['qtf_1'] =  $this->db->resultSet();



				$data['smf'] = $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,
					C.id_team AS id_team1,
					D.id_team AS id_team2,
					tournament_semi_finals.winner,
					tournament_semi_finals.date
					FROM tournament_semi_finals
					INNER JOIN tournament_quarter_finals AS A ON tournament_semi_finals.team1=A.id_quarter_finals
					INNER JOIN tournament_quarter_finals AS B ON tournament_semi_finals.team2=B.id_quarter_finals
					INNER JOIN tournament_group AS C ON A.winner=C.id_team
					INNER JOIN tournament_group AS D ON B.winner=D.id_team
					WHERE tournament_semi_finals.id_tournament = '$id_tournament'
					");
				$data['smf'] = $this->db->resultSet();
				$data['smf_1']	= $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,
					tournament_semi_finals.team1,
					tournament_semi_finals.team2,
					tournament_semi_finals.winner,
					tournament_semi_finals.date
					FROM tournament_semi_finals
					INNER JOIN tournament_group AS C ON tournament_semi_finals.team1=C.id_team
					INNER JOIN tournament_group AS D ON tournament_semi_finals.team2=D.id_team
					WHERE tournament_semi_finals.id_tournament = '$id_tournament'
					");
				$data['smf_1'] = $this->db->resultSet();
				$data['final'] = $this->db->query(
					"SELECT
					C.nama_team AS team_1,
					D.nama_team AS team_2,
					C.logo_team AS logo_1,
					D.logo_team AS logo_2,
					C.nama_kota AS nama_kota_1,
					D.nama_kota AS nama_kota_2,
					C.id_team AS id_team1,
					D.id_team AS id_team2,
					tournament_final.winner,
					tournament_final.date
					FROM tournament_final
					INNER JOIN tournament_semi_finals AS A ON tournament_final.team1=A.id_semi_finals
					INNER JOIN tournament_semi_finals AS B ON tournament_final.team2=B.id_semi_finals
					INNER JOIN tournament_group AS C ON A.winner=C.id_team
					INNER JOIN tournament_group AS D ON B.winner=D.id_team
					WHERE tournament_final.id_tournament = '$id_tournament'
					");
				$data['final'] = $this->db->resultSet();
				
				$this->view('landing/template/header', $data);
				if ($id != $url_tournament) {
					$this->view('landing/404/error');	
				}else{
					$this->view('landing/games/tournament/matchs', $data);
				}
				$this->view('landing/template/footer', $data);			
			}else{
				redirect('/login');
				exit;
			}    
			
		}
	}