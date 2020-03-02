<?php


class Team_Model extends Model 
{


	public function create()
	{ 
		$gambar         = $_FILES['logo']['name'];
		$source         = $_FILES['logo']['tmp_name'];

		$folder        = paths('path_home_TeamLogo');
		$folder2       = paths('path_portal_TeamLogo'); 

		$ekstensiGambarValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $gambar);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo json_encode([
				'status' => false,
				'message' => 'Image Format is not supported!'
			]);
		} else {
			$checkC = [
				'game_id' => $this->ctr->post('game'),
				'leader_id'	=> Session::get('users')
			];
			$checkC = $this->db->table('team')->countRows($checkC);
			//cek kaptain di game yang sama 
			if ($checkC == 0) { 
				$c = false;
				$team_player2 = $this->db->query('SELECT * FROM team_player WHERE player_id LIKE "%'.Session::get('users').'%" OR substitute_id LIKE "%'.Session::get('users').'%" ');
				$team_player2 = $this->db->resultSet();
				// cek terdaftar di team lain dengan game yang sama 
				if ($team_player2 == false) { 
					$checkIdentity = [
						'users_id'	=> Session::get('users'),
						'game_id'	=> $this->ctr->post('game')
					];
					$checkIdentity = $this->db->table('identity_ingame')->where($checkIdentity);

					if ($checkIdentity == false OR empty($checkIdentity['id_ingame']) OR empty($checkIdentity['username_ingame'])) {
						echo json_encode([
							'status'	=> false,
							'message'	=> 'Please filled ID and username in this game. Go to <a href="'.url('my-game').'">MY GAME</a>'
						]);
					} else {
						$namaFileBaru = uniqid();
						$namaFileBaru .= '.';
						$namaFileBaru .= $ekstensiGambar; 

						list($width, $height) = getimagesize($source);

						if($ekstensiGambar == 'png'){
							$new_image = imagecreatefrompng($source);
						}

						if($ekstensiGambar == 'jpg' || $ekstensiGambar == 'jpeg')  {  
							$new_image = imagecreatefromjpeg($source);  
						}

						$new_width=700;
						$new_height = ($height/$width)*700;
						$tmp_image = imagecreatetruecolor($new_width, $new_height);
						imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagejpeg($tmp_image, $folder.$namaFileBaru, 100);
						imagedestroy($new_image);
						imagedestroy($tmp_image);
						copy($folder.$namaFileBaru, $folder2.$namaFileBaru);
						$logo = $namaFileBaru;
						$uniq = uniqid();
						$dataTeam = [
							'team_id'	=> $uniq,
							'game_id'	=> $this->ctr->post('game'),
							'leader_id'	=> Session::get('users'),
							'team_name'	=> $this->ctr->post('team_name'),
							'team_description'	=> $this->ctr->post('team_description'),
							'team_logo'	=> $logo,
							'venue'		=> $this->ctr->post('venue'),
							'created_at'	=> date('Y-m-d H:i:s')
						];
						$dataPlayer = [
							'team_id'	=> $uniq,
							'player_id'	=> Session::get('users')
						];
						$this->db->table('team')->insert($dataTeam);
						$this->db->table('team_player')->insert($dataPlayer);
						echo json_encode([
							'status'	=> true
						]);
					}
				} else {
					// cek udah punya team dengan game yang sama
					foreach ($team_player2 as $aa) {
						$game2 = $this->db->table('team')->where('team_id', $aa['team_id']);  
						if ($game2['game_id'] == $this->ctr->post('game')) {
							//jika punya
							$c = false;
							echo json_encode([
								'status' => false,
								'message' => 'The user already have a team in this game!!'
							]);  
							break;
						} else {
							$c = true; 
						}
					}
					if ($c == true) {
						// jika gak punya 
						$namaFileBaru = uniqid();
						$namaFileBaru .= '.';
						$namaFileBaru .= $ekstensiGambar; 

						list($width, $height) = getimagesize($source);

						if($ekstensiGambar == 'png'){
							$new_image = imagecreatefrompng($source);
						}

						if($ekstensiGambar == 'jpg' || $ekstensiGambar == 'jpeg')  {  
							$new_image = imagecreatefromjpeg($source);  
						}

						$new_width=700;
						$new_height = ($height/$width)*700;
						$tmp_image = imagecreatetruecolor($new_width, $new_height);
						imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagejpeg($tmp_image, $folder.$namaFileBaru, 100);
						imagedestroy($new_image);
						imagedestroy($tmp_image);
						copy($folder.$namaFileBaru, $folder2.$namaFileBaru);
						$logo = $namaFileBaru;
						$uniq = uniqid();
						$dataTeam = [
							'team_id'	=> $uniq,
							'game_id'	=> $this->ctr->post('game'),
							'leader_id'	=> Session::get('users'),
							'team_name'	=> $this->ctr->post('team_name'),
							'team_description'	=> $this->ctr->post('team_description'),
							'team_logo'	=> $logo,
							'venue'		=> $this->ctr->post('venue'),
							'created_at'	=> date('Y-m-d H:i:s')
						];
						$dataPlayer = [
							'team_id'	=> $uniq,
							'player_id'	=> Session::get('users')
						];
						$this->db->table('team')->insert($dataTeam);
						$this->db->table('team_player')->insert($dataPlayer);
						echo json_encode([
							'status'	=> true
						]);
					}
				}
				die;
				

			} else {
				echo json_encode([
					'status' => false,
					'message' => 'You cannot create more than one team in one game'
				]);
			}
		}
	}

	public function join ($id_team)
	{
		$team = $this->db->table('team')->where('team_id', $id_team);
		$team_player = $this->db->table('team_player')->where('team_id', $id_team);
		$game = $this->db->table('game_list')->where('id_game_list', $team['game_id']);
		// cek dijebol class join padahal belom login data id salah
		// echo json_encode(['status' => true]);
		// die;
		if (Session::check('users') == false OR $team == false) {
			echo json_encode([
				'status' => false,
				'message' => 'System Error, Please refersh page!!'
			]);
		} else {
			$team_player0 = explode(',', $team_player['player_id']);
			$team_player1 = explode(',', $team_player['substitute_id']); 
			if ($team_player1[0] == '') {
				$team_player1 = [];
			} 

			//cek jika dijebol class join padahal udah penuh
			if (count($team_player0)+count($team_player1) == $game['player_on_team']+$game['substitute_player']) {
				echo json_encode([
					'status' => false,
					'message' => 'Team is Full!!'
				]);
			} else {
				//dijebol padahal sudah join  
				if (in_array(Session::get('users'), $team_player0) OR in_array(Session::get('users'), $team_player1)) {
					echo json_encode([
						'status' => false,
						'message' => 'You have joined this team'
					]);
				} else { 

					// cek pernah request join 
					$request_join = [
						'team_id'	=> $id_team,
						'users_id'	=> Session::get('users'),
						'status'	=> 1
					];
					$request_join = $this->db->table('team_request')->where($request_join);


					// jika gak pernah request join atau request_join udah di tolak
					if ($request_join == false) {
						// cek udah punya team dengan game yang sama
						$c = false;
						$team_player2 = $this->db->query('SELECT * FROM team_player WHERE player_id LIKE "%'.Session::get('users').'%" OR substitute_id LIKE "%'.Session::get('users').'%" ');
						$team_player2 = $this->db->resultSet();
						if ($team_player2 == false) { 
						// cek identity di game
							$checkIdentity = [
								'users_id'	=> Session::get('users'),
								'game_id'	=> $team['game_id']
							];
							$checkIdentity = $this->db->table('identity_ingame')->where($checkIdentity);

							if ($checkIdentity == false OR empty($checkIdentity['id_ingame']) OR empty($checkIdentity['username_ingame'])) {
								echo json_encode([
									'status'	=> false,
									'message'	=> 'Please filled ID and username in this game. Go to <a href="'.url('my-game').'">MY GAME</a>'
								]);
							} else {
							// jika team inti sudah penuh
								if (count($team_player0) == $game['player_on_team'] AND count($team_player1) == 0) {
								// maka harus masuk di bagian cadangan
									$dataTeamPlayer = [
										'substitute_id'	=> Session::get('users')
									];
								} else { 
								// jika tim inti masih ada slot 
								// maka dia masuk dibagian pemain inti
								// $dataTeamPlayer = [
								// 	'player_id'	=> $team_player['player_id'].','.Session::get('users')
								// ]; 
								}
							// $whereTeamPlayer = [
							// 	'team_id'	=> $id_team
							// ];
							// $this->db->table('team_player')->update($dataTeamPlayer ,$whereTeamPlayer);

								$dataRequest = [
									'request_id'	=> uniqid(),
									'team_id'		=> $id_team,
									'users_id'		=> Session::get('users'),
									'status'		=> 1,
									'created_at'	=> date('Y-m-d H:i:s')
								];
								$this->db->table('team_request')->insert($dataRequest);
								echo json_encode([
									'status'=>true
								]);
							}
						} else {
							// cek udah punya team dengan game yang sama
							foreach ($team_player2 as $aa) {
								$game2 = $this->db->table('team')->where('team_id', $aa['team_id']); 
								if ($game2['game_id'] == $game['id_game_list']) {
									$c = false;
									echo json_encode([
										'status' => false,
										'message' => 'You already have a team in this game!!'
									]);  
									break;
								} else {
									$c = true; 
								}
							}
							if ($c == true) {
							// jika team inti sudah penuh
								if (count($team_player0) == $game['player_on_team']) {
								// maka harus masuk di bagian cadangan
									$dataTeamPlayer = [
										'substitute_id'	=> Session::get('users')
									];
								} else { 
								// jika tim inti masih ada slot 
								// maka dia masuk dibagian pemain inti
									$dataTeamPlayer = [
										'player_id'	=> $team_player['player_id'].','.Session::get('users')
									]; 
								}
								$whereTeamPlayer = [
									'team_id'	=> $id_team
								];
							// $this->db->table('team_player')->update($dataTeamPlayer ,$whereTeamPlayer);
								$dataRequest = [
									'request_id'	=> uniqid(),
									'team_id'		=> $id_team,
									'users_id'		=> Session::get('users'),
									'status'		=> 1,
									'created_at'	=> date('Y-m-d H:i:s')
								];
								$this->db->table('team_request')->insert($dataRequest);
								echo json_encode([
									'status'=>true
								]); 
							} 
						} 
					} else {
						echo json_encode([
							'status'	=> false,
							'message'	=> 'Waiting for your request join to accept'
 						]);
					} 
				} 
			} 
		}
	}

	public function accept($id_req) 
	{
		$request = $this->db->table('team_request')->where('request_id', $id_req);

		// jika request palsu / jebol 
		if ($request == false) {
			echo json_encode([
				'status'	=> false,
				'message' 	=> 'System Error, Plase refresh page!'
			]);
		} else {

			if ($request['status'] != 1) {
				echo json_encode([
					'status'	=> false,
					'message' 	=> 'System Error, Plase refresh page!'
				]);
			} else {
				$team = $this->db->table('team')->where('team_id', $request['team_id']);
				$game = $this->db->table('game_list')->where('id_game_list', $team['game_id']);
				$team_player = $this->db->table('team_player')->where('team_id', $request['team_id']);
				$team_player0 = explode(',', $team_player['player_id']);
				$team_player1 = explode(',', $team_player['substitute_id']); 
				if ($team_player1[0] == '') {
					$team_player1 = [];
				} 

				// cek udah punya team dengan game yang sama
				$c = false;
				$team_player2 = $this->db->query('SELECT * FROM team_player WHERE player_id LIKE "%'.$request["users_id"].'%" OR substitute_id LIKE "%'.$request["users_id"].'%" ');
				$team_player2 = $this->db->resultSet();
				if ($team_player2 == false) { 
					//jika team sudah penuh
					if ($game['player_on_team']+$game['substitute_player'] == count($team_player0)+count($team_player1)) {
						echo json_encode([
							'status'	=> false,
							'message' 	=> 'Team is Full!'
						]);
					} else {
						// jika masih tidak ada slot di inti 
						// maka masukkan ke cadangan
						if ($game['player_on_team'] == count($team_player0) AND $count($team_player1) == 0) {
							$dataTeamPlayer = [
								'substitute_id'	=> $request['users_id']
							];
						} else { //jika 
							$dataTeamPlayer = [
								'player_id'	=> $team_player['player_id'].','.$request['users_id']
							];
						}
						$whereTeamPlayer = [
							'team_id'	=> $request['team_id']
						];
						$dataReq = [
							'status'	=> 2
						];
						$whereReq = [
							'request_id'	=> $id_req
						];
						$this->db->table('team_request')->update($dataReq, $whereReq);
						$this->db->table('team_player')->update($dataTeamPlayer ,$whereTeamPlayer);
						echo json_encode([
							'status'	=> true
						]);
					}
				} else { 
					// cek udah punya team dengan game yang sama
					foreach ($team_player2 as $aa) {
						$game2 = $this->db->table('team')->where('team_id', $aa['team_id']); 
						if ($game2['game_id'] == $game['id_game_list']) {
							$c = false;
							echo json_encode([
								'status' => false,
								'message' => 'The user already have a team in this game!!'
							]);  
							break;
						} else {
							$c = true; 
						}
					}
					if ($c == true) {
						//jika team sudah penuh
						if ($game['player_on_team']+$game['substitute_player'] == count($team_player0)+count($team_player1)) {
							echo json_encode([
								'status'	=> false,
								'message' 	=> 'Team is Full!'
							]);
						} else {
							// jika masih tidak ada slot di inti 
							// maka masukkan ke cadangan
							if ($game['player_on_team'] == count($team_player0) AND $count($team_player1) == 0) {
								$dataTeamPlayer = [
									'substitute_id'	=> $request['users_id']
								];
							} else { //jika 
								$dataTeamPlayer = [
									'player_id'	=> $team_player['player_id'].','.$request['users_id']
								];
							}
							$whereTeamPlayer = [
								'team_id'	=> $request['team_id']
							];
							$dataReq = [
								'status'	=> 2
							];
							$whereReq = [
								'request_id'	=> $id_req
							];
							$this->db->table('team_request')->update($dataReq, $whereReq);
							$this->db->table('team_player')->update($dataTeamPlayer ,$whereTeamPlayer);
							echo json_encode([
								'status'	=> true
							]);
						}
					}  
				}  
			}
		}
	}

	public function declined($id_req)
	{
		$dataReq = [
			'status'	=> 0
		];
		$whereReq = [
			'request_id'	=> $id_req
		];
		$this->db->table('team_request')->update($dataReq, $whereReq); 
		echo json_encode([
			'status'	=> true
		]);
	}

	public function invite($id_team, $id_identity)
	{
		$identity = $this->db->table('identity_ingame')->where('id', $id_identity);
		$team = $this->db->table('team')->where('team_id', $id_team);
		$team_player = $this->db->table('team_player')->where('team_id', $id_team);
		$team_player0 = explode(',', $team_player['player_id']);
		$team_player1 = explode(',', $team_player['substitute_id']);
		$game = $this->db->table('game_list')->where('id_game_list', $team['game_id']);
		echo json_encode([
			'status'	=> false,
			'message'	=> $game
		]);
	}

}