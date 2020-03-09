<?php 

	/**
	 * 
	 */
	class AboutsController extends Controller
	{
		

		public function contact()
		{ 
			$data['content'] = $this->model('About_Model')->selectcontact();
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
			$this->view('landing/about/contact',$data);	
			$this->view('landing/template/footer', $data);			
		}
		public function faqs()
		{	
			$data['content'] = $this->model('About_Model')->selectFaq();
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
			$this->view('landing/about/faqs',$data);	
			$this->view('landing/template/footer' , $data);	
		}
		public function sponsors()
		{ 
			$data['content'] = $this->model('About_Model')->selectSponsor();
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
			$this->view('landing/about/sponsors',$data);	
			$this->view('landing/template/footer' , $data);			
		}
		public function gallery()
		{	
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
			$this->view('landing/about/gallery');	
			$this->view('landing/template/footer' , $data);	
		}
		public function videos()
		{ 
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
			$this->view('landing/about/videos');	
			$this->view('landing/template/footer' , $data);			
		}
		public function marchandise()
		{	
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
			$this->view('landing/about/marchandise');	
			$this->view('landing/template/footer' , $data);	
		}
		
		
	}