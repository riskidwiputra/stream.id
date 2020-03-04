<?php 

	class Login_Model extends Model
	{ 
    
        public function login()
		{   
            
			$email = $this->ctr->post('email');
			$password = $this->ctr->post('password');
		
            
			if (empty($email) || empty($password)) {
				Flasher::setFlashLogin('<b>Form</b> must be filled', 'danger');
				return false;
			} else { 
				
				$where = [
					'email' => $email
				];
					 
				if (date('d-m-Y H:i:s') < Session::get('_login_again')) {
					Flasher::setFlashLogin('Please login in <span id="timer" style="font-weight:bold;"></span>', 'danger');
					return false;
				} else {
					
					if (Session::get('_fail_login') >= 3) {
						Session::set('_login_again', date('d-m-Y H:i:s', time() + (60*10) ));
						Session::unset('_fail_login');
						Flasher::setFlashLogin('Please login in <span id="timer" style="font-weight:bold;"></span>', 'danger');
						return false;
					} else {
						if ($this->db->table('users')->countRows($where) > 0) {
							
							$dataUsers = $this->db->query('
									SELECT * FROM users
									WHERE email = "'.$email.'" 
								');
							$dataUsers = $this->db->single();  
							
							if (password_verify($password, $dataUsers['password']) == true) {
							
								if ($dataUsers['is_verified'] == 1) { 
									
									if (Session::check('_fail_login')) {
										Session::unset('_fail_login');
									}
									if (Session::check('_login_again')) {
										Session::unset('_login_again');
									} 
									if (Session::check('FalseRegister')) {
										Session::unset('FalseRegister');
									}
									Session::set('users',$dataUsers['user_id']);  
									
									$this->save_device($dataUsers['user_id']);			
									return $this->db->rowCount(); 
								} else {
									Flasher::setFlashLogin('Your <b>email</b> has not been verified. Please verify your <b>email</b> first', 'danger');
									return false;
								}
							} else {
								Flasher::setFlashLogin('Your <b>password</b> is incorrect', 'danger');
								Session::set('_fail_login', Session::get('_fail_login')+1);
								return false;
							}
							
						} else {
                            Flasher::setFlashLogin('Your <b>account</b> has not been registered', 'danger');
							Session::set('_fail_login', Session::get('_fail_login')+1); 
							return false; 
						}	
					} 
				}
				
            }
        }
        public function save_device($access)
		{
			$dataLog = [
				'user_id' => $access,
				'time' => date('d-m-Y H:i:s'),
				'device' => Detect::deviceType(),
				'ip' => Detect::ip(),
				'os' => Detect::os(),
				'browser' => Detect::browser(),
				'brand' => Detect::brand()
			];
			
			$this->db->table('access_logs_users')->insert($dataLog); 
		}

		
    }
