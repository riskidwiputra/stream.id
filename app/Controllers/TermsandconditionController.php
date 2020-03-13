<?php 

	/**
	 * 
	 */
	class TermsandconditionController extends Controller
	{
		

		public function Termsandcondition()
		{ 
			$this->view('landing/template/header');
			$this->view('landing/termsandcondition');	
			$this->view('landing/template/footer');			
		}
		
    }
    ?>