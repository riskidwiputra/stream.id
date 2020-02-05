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
            $kota           = $this->ctr->post('kabupaten'); 
            $no_hp          = $this->ctr->post('nomor_hp'); 
            $tangal_lahir   = $tanggal ."-". $bulan. "-". $tahun ;
            
            // Gambar Ktp 
            $gambar         = $_FILES['gambar_ktp']['name'];
            $source         = $_FILES['gambar_ktp']['tmp_name'];

            $folder         = paths('path_portal_Users'); 
            $folder2        = paths('path_home_Users');
        
            $ekstensiGambarValid = ['jpg','jpeg','png'];
            $ekstensiGambar = explode('.', $gambar);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
                Flasher::setFlashSweet('Gagal','format gambar anda tidak mendukung !','error'); 
            return false;
            }
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            //  menggabungkan foto yang tadinya dipecah
            //  Memindahkan foto
            move_uploaded_file($source, $folder.$namaFileBaru);
            copy($folder.$namaFileBaru, $folder2.$namaFileBaru);

            // Foto diri

            $gambar2        = $_FILES['foto']['name'];
            $source2        = $_FILES['foto']['tmp_name'];

            $ekstensiGambarValid2 = ['jpg','jpeg','png'];
            $ekstensiGambar2 = explode('.', $gambar2);
            $ekstensiGambar2 = strtolower(end($ekstensiGambar2));
            
            if ( !in_array($ekstensiGambar2, $ekstensiGambarValid2)) {
                Flasher::setFlashSweet('Gagal','format gambar anda tidak mendukung !','error'); 
            return false;
            }
            $namaFileBaru2 = uniqid();
            $namaFileBaru2 .= '.';
            $namaFileBaru2 .= $ekstensiGambar;
            //  menggabungkan foto yang tadinya dipecah
            //  Memindahkan foto
            move_uploaded_file($source2, $folder.$namaFileBaru2);
            copy($folder.$namaFileBaru2, $folder2.$namaFileBaru2);
            
            $id_ktp         = $this->ctr->post('id_ktp'); 
            $username_game  = $this->ctr->post('username_game'); 
            
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
                
                            if ($this->db->table('users')->countRows($select) > 0) {
                                Flasher::setFlash('<b>Email</b> Anda telah digunakan!', 'danger');
                                return false;
                            }else{
                    
                            // //     $dataSend = [
							// // 		'hash' 		=> $hash,
							// // 		'email' 	=> $email
                            // //     ];
                                $data = [
                                    'user_id'       => $buatkode,
                                    'username'      => $username,
                                    'password'      => $passHash,
                                    'jenis_kelamin' => $jenis_kelamin,
                                    'email'         => $email,
                                    'tgl_lahir'     => $tangal_lahir,
                                    'alamat'        => $alamat,
                                    'provinsi'      => $provinsi,
                                    'kota'          => $kota,
                                    'nomor_hp'      => $no_hp,
                                    'status'        => "guest"
                                ];
                                $dataDocs = [
                                    'user_id'       => $buatkode,
                                    'id_card'       => $namaFileBaru,
                                    'image'         => $namaFileBaru2,
                                    'id_number'     => $id_ktp,
                                    'username_game' => $username_game
                                ];
                
                                $this->db->table('users')->insert($data);
                                $this->db->table('users_docs')->insert($dataDocs);
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