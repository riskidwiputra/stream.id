<?php 

	/**
	 * 
	 */
	class ShopController extends Controller
	{
		

		public function Shopping()
		{ 
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$this->view('landing/template/header');
			$this->view('landing/shop/shop');	
			$this->view('landing/template/footer' , $data);			
        }
    }