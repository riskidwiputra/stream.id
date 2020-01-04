<?php 

	/**
	 * 
	 */
	class AccountController extends Controller
	{
		

		public function account()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/account/account');	
			$this->view('landing/template/footer' , $data);			
        }
    }