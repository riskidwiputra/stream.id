<?php 

	class Register_Model extends Model
	{ 

		public function insert($data)
		{
            $hash			= filter_var(str_replace('/' , '', base64_encode(md5(rand(0,999999999)).sha1(rand(0,999999999)))), FILTER_SANITIZE_URL);
            $buatkode       = $this->ctr->buatKode('user','USER','user_id');
            $username       = $this->ctr->post('username');
            $email          = $this->ctr->post('email');
            $password       = $this->ctr->post('password');
            $rePassword     = $this->ctr->post('repassword'); 
            $jenis_kelamin  = $this->ctr->post('jenis_kelamin'); 
            $tanggal        = $this->ctr->post('tanggal'); 
            $bulan          = $this->ctr->post('bulan'); 
            $tahun          = $this->ctr->post('tahun'); 
            $alamat         = $this->ctr->post('alamat'); 
            $provinsi       = $this->ctr->post('provinsi'); 
            $kota           = $this->ctr->post('kota'); 
            $no_hp          = $this->ctr->post('nomor'); 
            $tangal_lahir   = $tanggal ."-". $bulan. "-". $tahun ;
            
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
                            if ($this->db->table('user')->countRows($select) > 0) {
                                Flasher::setFlash('<b>Email</b> Anda telah digunakan!', 'danger');
                                return false;
                            }else{
                            //     $dataSend = [
							// 		'hash' 		=> $hash,
							// 		'email' 	=> $email
                            //     ];
                                $data = [
                                    'user_id'       => $buatkode,
                                    'username'      => $username,
                                    'password'      => $passHash,
                                    'email'         => $email,
                                    'tgl_lahir'     => $tangal_lahir,
                                    'alamat'        => $alamat,
                                    'provinsi'      => $provinsi,
                                    'kota'          => $kota,
                                    'nomor_hp'      => $no_hp,
                                    'status'        => "guest"
                                ];
                                $this->db->table('user')->insert($data);
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