<?php 

	/**
	 * 
	 */
	class HomeController extends Controller
	{
		

		public function index()
		{ 
			$data['title'] = 'Stream';
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_detail
				ON users.user_id = users_detail.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet(); 
			$this->view('landing/template/header', $data);
			$this->view('landing/home');	
			$this->view('landing/template/footer' , $data);			
		}
		
		public function Error()
		{	
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['title'] = '404 Stream';
			$this->view('landing/template/header', $data);
			$this->view('landing/404/error');	
			$this->view('landing/template/footer' , $data);	
		}
		
		
	}