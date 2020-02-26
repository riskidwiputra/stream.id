<?php 

	/**
	 * 
	 */
	class AccountController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}

		public function account()
		{ 	
			if(Session::check('users') == true ){ 
				$id = session::get('users');
				$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
				$data['populared'] = $this->db->resultSet();
				$data['content']   = $this->model('Account_Model')->select($id);
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
				$this->view('landing/template/header', $data);
				$this->view('landing/account/account', $data);	
				$this->view('landing/template/footer' , $data);		
			}else{
				redirect('/login');
				exit;
			}		
		}

		public function my_game()
		{ 	
			if(Session::check('users') == true ){ 
				$id = session::get('users');
				$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
				$data['populared'] = $this->db->resultSet();
				$data['content']   = $this->model('Account_Model')->select($id);
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
				$data['content'] = $this->db->table('users_game')->where('users_id', Session::get('users'));  
				$data['content']['game_id'] = explode(',', $data['content']['game_id']); 
				array_pop($data['content']['game_id']);  
				$this->view('landing/template/header', $data);
				$this->view('landing/account/my-game', $data);	
				$this->view('landing/template/footer' , $data);		
			}else{
				redirect('/login');
				exit;
			}		
		}

		public function Provinsi()
		{
			$sql = "SELECT * FROM provinsi";
			$query =  mysqli_query($this->db->connection(), $sql);
			$data = array();
			while($row = $query->fetch_array(MYSQLI_ASSOC)){

				$data[] = array("id_prov" => $row['id_prov'], "nama" => $row['nama']);
			}

			echo json_encode($data);
		}
		public function Kabupaten($id_prov)
		{
			$sql = "SELECT * FROM kabupaten WHERE `id_prov` = '$id_prov'";
			$query = mysqli_query($this->db->connection(), $sql);
			$data = array();
			while($row = $query->fetch_array(MYSQLI_ASSOC)){
				$data[] = array("id_kab" => $row['id_kab'], "nama" => $row['nama']);
			}
			echo json_encode($data);
		}
		public function Update($id){
			if ( $this->model('Account_Model')->update($id) ) {
				Flasher::setFlash('Data berhasil diupdate' ,'success'); 
				redirect('/account');
				exit;
			} else { 
				redirect('/account');
				exit;
			}   
			
		}
	}