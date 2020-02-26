<?php 

	/**
	 * 
	 */
	class ListTeamController extends Controller
	{
		

		public function listteam()
		{ 
			$this->view('landing/template/header');
			$this->view('landing/team/listteam');	
			$this->view('landing/template/footer');			
			// var_dump($_SERVER);die;
		}
		
		
		
	}