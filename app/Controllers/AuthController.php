<?php 

	/**
	 * 
	 */
	class AuthController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function IndexLogin()
		{ 
			if(Session::check('users') == true ){ 
				redirect('/account');
				exit;
			}else{   
				$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
				$data['populared'] = $this->db->resultSet();
				$data['game-list'] = $this->db->table('game_list')->all();
				$data['game-list']	= $this->db->resultSet();
				
				$data['FalseRegister'] = [
					'username'	=> '',
					'email'		=> '',
					'jenis_kelamin'	=> '',
					'birth'		=> '',
					'address'	=> '',
					'phone'		=> '',
					'id_number'	=> ''
				];
				$this->view('landing/template/header', $data);
				$this->view('landing/account/login', $data);	
				$this->view('landing/template/footer' , $data);	
				// $dataVerify = [
				// 	'email' => 'mramadhan687@gmail.com',
				// 	'token'  => 'adwawdaawd71271732812'
				// ];
				// $this->view('email/verify', $dataVerify);
			}	
		}

		public function Login()
		{   
			
			if ($this->model('Login_Model')->login($_POST) == true) { 
				redirect('/account');	
				exit;
			}else{ 
				redirect('/login');
				exit;
			}    
		} 
		public function IndexRegistrasi()
		{   
			if(Session::check('users') == true ){ 
				redirect('/account');
				exit;
			}else{
				$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
				$data['populared'] = $this->db->resultSet();
				$data['game-list'] = $this->db->table('game_list')->all();
				$data['game-list']	= $this->db->resultSet();
				if (Session::check('FalseRegister') != false) {
					$data['FalseRegister'] = Session::get('FalseRegister');
				} else {
					$data['FalseRegister'] = [
						'username'	=> '',
						'email'		=> '',
						'jenis_kelamin'	=> '',
						'birth'		=> '',
						'address'	=> '',
						'phone'		=> '',
						'id_number'	=> ''
					];
				}
				// var_dump($data['FalseRegister']);die;
				$this->view('landing/template/header', $data);
				$this->view('landing/account/login', $data);	
				$this->view('landing/template/footer' , $data);
			}	
		}

		public function Register()
		{ 
			if ( $this->model('Register_Model')->insert($_POST) == true ) {
				Flasher::setFlash('Your account has been successfully created . Please verify email by clicking the activation link that has been send to your email.' ,'success'); 
				redirect('/register');
				exit;
			} else { 
				redirect('/register');
				exit;
			}   

		}
		public function Logout()
		{
			Session::unset();
			redirect('/');
		}

		public function Verify($email , $hash) {
			if ($this->model('Auth_Model')->verify($email, $hash) > 0) {
				redirect('/login');
			} else {
				redirect('/login'); 
			} 
		}
	}