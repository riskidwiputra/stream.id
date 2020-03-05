<?php 

	/**
	 * 
	 */
	class TeamController extends Controller
	{
		

		public function list()
		{ 	
			$records_per_page = 15;
			$start_record = 0;
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
			$data['content'] = $this->db->query('SELECT * FROM team ORDER BY created_at DESC '."LIMIT $start_record,$records_per_page");
			$data['content'] = $this->db->resultSet();

			// paging start 
			$page_no = 1;
			$data['content_count'] = $this->db->table('team')->all();
			$data['content_count'] = $this->db->rowCount();
			$data['page_no'] = (int)$page_no;
			$data['records_per_page'] = $records_per_page;


 			$this->view('landing/template/header',$data);
			$this->view('landing/team/listteam', $data);	
			$this->view('landing/template/footer');		 
		}

		public function page($page, $page_no)
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

			//paging
			$query_list = 'SELECT * FROM team ORDER BY created_at DESC';
			$records_per_page = 15;
			$starting_position = 0;
			if($page_no > 0) {
				$starting_position = ($page_no-1) * $records_per_page;
			}
			$new_query = $query_list." LIMIT $starting_position, $records_per_page";

			$data['content'] = $this->db->query($new_query);
			$data['content'] = $this->db->resultSet();
			
			//paging
			$data['content_count'] = $this->db->table('team')->all();
			$data['content_count'] = $this->db->rowCount();
			$data['page_no'] = (int)$page_no;
			$data['records_per_page'] = $records_per_page;
 			
 			//secure
 			if ($page_no == 0 OR $page != 'page' OR $page > $data['content_count']) {
 				redirect('/team');
 			}
 			// endsecure
 			
 			$this->view('landing/template/header',$data);
			$this->view('landing/team/paging', $data);	
			$this->view('landing/template/footer');		 
		}
		
		
		public function createteam()
		{ 
			$users = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$users = $this->db->single();  
			if (empty($this->post('team_name')) || empty($this->post('game')) || empty($this->post('team_description')) || empty($this->post('venue')) || empty($_FILES['logo']['name'])) {
				echo json_encode([
					'status' => false,
					'message'	=> 'Form cannot be empty'
				]);				
			} else if ($users['status'] != 'player') {
				echo json_encode([
					'status' => false,
					'message'	=> 'Please verify KTP/KK!!'
				]);
			} else {
				$this->model('Team_Model')->create(); 
			}
		}

		public function join($id_team)
		{
			$users = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$users = $this->db->single();  
			if ($id_team == '') {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			} else if ($users['status'] != 'player') {
				echo json_encode([
					'status' => false,
					'message'	=> 'Please verify KTP/KK!!'
				]);
			} else {
				$this->model('Team_Model')->join($id_team);
			}
		}

		public function accept($id_req)
		{
			if ($id_req == '') {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			} else {
				$this->model('Team_Model')->accept($id_req);
			}
		}

		public function declined($id_req)
		{
			if ($id_req == '') {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			} else {
				$this->model('Team_Model')->declined($id_req);
			}
		}

		public function list_users($id_team)
		{ 
			$team = $this->db->table('team')->where('team_id', $this->post('team'));
			$game = $this->db->table('game_list')->where('id_game_list', $team['game_id']);
			$data = $this->post('search');
			$query = $this->db->query('
				SELECT * FROM identity_ingame  
				WHERE game_id = "'.$game_id.'" 
				OR username_ingame LIKE "%'.$data.'%"
				ORDER BY username_ingame ASC
			');
			$query = $this->db->resultSet();

			foreach($query as $q) { 
				$result[] = [
					'id'		=> $q['id'],
					'id_game'	=> $q['id_ingame'],
					'username_game' 	=> $q['username_ingame'] 
				];
			}  

			echo json_encode($result);
		}

		public function invite($id_team)
		{
			if (empty($this->post('data'))) {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'Input cannot be empty!!'
				]);
			} else {
				$this->model('Team_Model')->invite($id_team, $this->post('data'));
			}
		}
		
	}