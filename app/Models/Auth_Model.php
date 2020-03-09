<?php


class Auth_Model extends Model
{
	public function verify($email, $hash)
	{
		$data = [
			'email' => $email
		];
		// var_dump($data);die;
		$checkUser = $this->db->query('
			SELECT * FROM users 
			INNER JOIN token
			ON users.user_id = token.users_id 
			WHERE users.email = "'.$email.'"
			');
		$checkUser = $this->db->single();
		// var_dump($checkUser);die; 
		if ($checkUser == false || $checkUser['is_verified'] == 1) {
			FLasher::setFlashLogin('Link verification is used!', 'danger'); 
			return false;
		} else {
			if ($checkUser['user_id'] == Session::get('token')['users_id'] AND $checkUser['token'] == Session::get('token')['token'] AND $hash == Session::get('token')['token']) {
				$data = [
					'is_verified' => 1,
					'updated_at' => date('d-m-Y H:i:s')
				];
				$where = [
					'user_id' => $checkUser['user_id']
				];
				// var_dump($where);die;

				$this->db->table('users')->update($data, $where); 
				FLasher::setFlashLogin('<b>Email</b>has been successfully verified!', 'success'); 
				Session::unset('token');
				return true;
			} else { 
				FLasher::setFlashLogin('Link verification invalid!', 'danger'); 
				return false;
			}
		} 
	}
}