<?php 

	/**
	 * 
	 */
	class AuthController extends Controller
	{
		

		public function Login()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/account/login');	
			$this->view('landing/template/footer' , $data);			
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
    }