<?php 

	/**
	 * 
	 */
	class TeamController extends Controller
	{
		

		public function list()
		{ 	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
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
			$data['content'] = $this->db->query('SELECT * FROM team ORDER BY created_at DESC');
			$data['content'] = $this->db->resultSet();
 			$this->view('landing/template/header',$data);
			$this->view('landing/team/listteam', $data);	
			$this->view('landing/template/footer');		 
		}
		
		
		public function createteam()
		{ 
			if (empty($this->post('team_name')) || empty($this->post('game')) || empty($this->post('team_description')) || empty($this->post('venue')) || empty($_FILES['logo']['name'])) {
				echo json_encode([
					'status' => false,
					'message'	=> 'Form cannot be empty'
				]);				
			} else {
				$this->model('Team_Model')->create(); 
			}
		}

		public function join($id_team)
		{
			if ($id_team == '') {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			} else {
				$this->model('Team_Model')->join($id_team);
			}
		}
		
	}