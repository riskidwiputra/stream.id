<?php 

	/**
	 * 
	 */
	class AboutsController extends Controller
	{

		public function __construct()
		{
			parent::__construct();

			if (Session::check('users')) {
				$this->Users = $this->db->query('
					SELECT * FROM users 
					JOIN users_detail
					ON users.user_id = users_detail.user_id
					JOIN balance_users
					ON users.user_id = balance_users.users_id
					WHERE users.user_id = "'.Session::get("users").'"
					');
				$this->Users = $this->db->single(); 
			} else {
				$this->Users = '';
			}
		}
		

		public function contact()
		{ 
			$data['content'] = $this->model('About_Model')->selectcontact();
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['users'] = $this->Users;  
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
			$data['users'] = $this->Users;  
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
			$data['users'] = $this->Users;  
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
			$data['users'] = $this->Users;  
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$data['content'] = $this->model('About_Model')->gallery(); 
			$this->view('landing/template/header', $data);
			$this->view('landing/about/gallery', $data);	
			$this->view('landing/template/footer' , $data);	
		}
		public function videos()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['users'] = $this->Users;  
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
			$data['users'] = $this->Users;  
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$this->view('landing/template/header', $data);
			$this->view('landing/about/marchandise');	
			$this->view('landing/template/footer' , $data);	
		}
		
		public function likeGallery($id)
		{
			$gallery = $this->db->table('gallery')->where('gallery_id', $id);
			$like = [
				'gallery_id' => $id,
				'users_id'	 => Session::get('users')
			];
			$like = $this->db->table('gallery_like')->countRows($like);

			if ($gallery == false OR $like > 0) {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			} elseif(Session::check('users') == false) {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'Login is Required!'
				]);
			} else {
				$this->model('About_Model')->likeGallery($id);
			}
		}
	}