<?php 

	class Register_Model extends Model
	{ 

		public function insert($data)
		{
            $hash			= filter_var(str_replace('/' , '', base64_encode(md5(rand(0,999999999)).sha1(rand(0,999999999)))), FILTER_SANITIZE_URL);
            $buatkode       = $this->ctr->buatKode('member','MBR','kode_member');
            $email          = $this->ctr->post('email');
            $password       = $this->ctr->post('password');
            $rePassword     = $this->ctr->post('repassword'); 
            
            $passHash = password_hash($rePassword, PASSWORD_DEFAULT);
            if (strlen($password) >= 8) { 
                    if(!preg_match("/^[a-zA-Z0-9]*$/", $password)){
                        Flasher::setFlash('<b>Kata Sandi</b> harus berupa kombinasi huruf dan angka, dan tidak boleh menggunakan spasi ...!', 'danger');
                        return false;
                    }else{
                        if (password_verify($password, $passHash) == true) {
                            $select = [
                                'email' => $email
                            ];
                            if ($this->db->table('member')->countRows($select) > 0) {
                                Flasher::setFlash('<b>Email</b> Anda telah digunakan!', 'danger');
                                return false;
                            }else{
                            //     $dataSend = [
							// 		'hash' 		=> $hash,
							// 		'email' 	=> $email
                            //     ];
                                $data = [
                                    'kode_member' => $buatkode,
                                    'email'     => $email,
                                    'password'  => $passHash
                                ];
                                $this->db->table('member')->insert($data);
                                return $this->db->rowCount();
                            }
                
                        
                        } else {
                                Flasher::setFlash('<b>Konfirmasi Kata Sandi</b> harus sama', 'danger');
                                return false;  
                        }
                    }
            } else {
			Flasher::setFlash('<b>Kata Sandi </b> minimal harus 8 digit', 'danger');
			return false;
			}
        }
    }