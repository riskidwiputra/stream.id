<?php 

	/**
	 * 
	 */
	class GamesController extends Controller
	{

		public function __construct()
		{
			parent::__construct();

			if (Session::check('users') == true) {
				$this->Users = $this->db->query('
					SELECT * FROM users 
					JOIN users_docs
					ON users.user_id = users_docs.user_id
					JOIN balance_users
					ON users.user_id = balance_users.users_id
					WHERE users.user_id = "'.Session::get("users").'"
					');
				$this->Users = $this->db->single();  
			} else {
				$this->Users = '';
			}
		}
		

		public function select($url)
		{  
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet(); 
			$data['users']	= $this->Users;  
			$data['content'] = $this->db->table('game_list')->where('url', $url); 
			// var_dump($data['content']);die;
			$data['users_game'] = $this->db->table('users_game')->where('users_id', Session::get('users'));
			$data['users_game'] = explode(',', $data['users_game']['game_id']);  
   	 		if ($data['content'] == false) {
   	 			redirect('/');
   	 		}
   	 		// var_dump($data['users_game']);die;
			$this->view('landing/template/header', $data);
			$this->view('landing/games/view', $data);	
			$this->view('landing/template/footer' , $data);			
		} 

		public function addGame($id_game)
		{
			$game = $this->db->table('users_game')->where('users_id', Session::get('users'));
			if (empty($game['game_id'])) {
				$game_id2 = $id_game;
			} else {
				$game_id2 = $game['game_id'].','.$id_game;
			}
			$dataGame = [
				'game_id' => $game_id2
			];
			$whereGame = [
				'users_id' => Session::get('users')
			];
			$dataInGame = [
				'id'		=> uniqid(),
				'users_id'	=> Session::get('users'),
				'game_id'	=> $id_game
			];
			$this->db->table('identity_ingame')->insert($dataInGame);
			$this->db->table('users_game')->update($dataGame, $whereGame);
		}

		public function update_identity($id_game)
		{  
			if (empty($this->post('id')) OR empty($this->post('username'))) {
				echo json_encode([
					'status' => false,
					'message' => 'Input cannot be empty!!'
				]);
			} else {
				$dataGame = [
					'id_ingame'	=> $this->post('id'),
					'username_ingame'	=> $this->post('username')
				];
				$whereGame = [
					'users_id'	=> Session::get('users'),
					'game_id'	=> $id_game
				];
				$checkGame = $this->db->table('identity_ingame')->update($dataGame, $whereGame);	
				echo json_encode(['status' => true]);			
			}
			// print_r($checkGame);
		}
		
	}