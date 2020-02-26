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
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['content'] = $this->db->table('game_list')->where('url', $url); 
			$data['users_game'] = $this->db->table('users_game')->where('users_id', Session::get('users'));
			$data['users_game'] = explode(',', $data['users_game']['game_id']);  
   	 		// var_dump($data['users_game']);die;
			$this->view('landing/template/header', $data);
			$this->view('landing/games/view', $data);	
			$this->view('landing/template/footer' , $data);			
		} 

		public function addGame($id_game)
		{
			$game = $this->db->table('users_game')->where('users_id', Session::get('users'));
			$dataGame = [
				'game_id' => $game['game_id'].$id_game.','
			];
			$whereGame = [
				'users_id' => Session::get('users')
			];
			$this->db->table('users_game')->update($dataGame, $whereGame);
		}
		
	}