<?php 

	/**
	 * 
	 */
	class LeaderboardController extends Controller
	{
		

		public function Leaderboard()
		{ 
			$this->view('landing/template/header');
			$this->view('landing/games/tournament/leaderboard');	
			$this->view('landing/template/footer');			
		}
		
    }
    ?>