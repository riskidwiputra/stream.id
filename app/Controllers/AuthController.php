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
			$this->view('landing/template/header');
			$this->view('landing/account/login');	
			$this->view('landing/template/footer' , $data);		
			}	
		}

		public function Login()
		{   
			
			if ($this->model('Login_Model')->login($_POST) > 0) { 
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
			$this->view('landing/template/header');
			$this->view('landing/account/registrasi');	
			$this->view('landing/template/footer' , $data);
			}	
		}

		public function Register()
        { 
            if ( $this->model('Register_Model')->insert($_POST) ) {
                Flasher::setFlash('Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.' ,'success'); 
                redirect('/login');
                exit;
            } else { 
                redirect('/login');
                exit;
			}   
		
		}
		public function Logout()
		{
			Session::unset();
			redirect('/');
		}
    }