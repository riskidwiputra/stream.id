<?php 

	class Account_Model extends Model
	{ 
        public function select($id)
		{	
			$this->db->query("SELECT
			  * ,provinsi.nama AS nama_p FROM users
			JOIN users_docs ON users.user_id = users_docs.user_id
			JOIN provinsi ON users.provinsi = provinsi.id_prov
			JOIN kabupaten ON users.kota = kabupaten.id_kab
			WHERE users.user_id = '$id'");
			return $this->db->single();
		}
		public function update($id){
			
            $username          	= $this->ctr->post('account-username');
            $jenis_kelamin     	= $this->ctr->post('jenis_kelamin');
			$email       		= $this->ctr->post('account-email');
            $tanggal        	= $this->ctr->post('tanggal'); 
            $bulan          	= $this->ctr->post('bulan'); 
			$tahun          	= $this->ctr->post('tahun');
			$tangal_lahir   	= $tanggal ."-". $bulan. "-". $tahun ; 
			$alamat          	= $this->ctr->post('alamat'); 
			$id_number			= $this->ctr->post('id_number'); 
			$no_hp				= $this->ctr->post('no_hp'); 
			$username_game		= $this->ctr->post('username_game'); 

		
			
			
			if (!empty($_FILES['gambar_ktp']['name'])) {
			
				$foto         = $_FILES['gambar_ktp']['name'];
				$source         = $_FILES['gambar_ktp']['tmp_name'];

				$folder         = paths('path_portal_Users'); 
				$folder2        = paths('path_home_Users');
		
				$ekstensiGambarValid = ['jpg','jpeg','png'];
				$ekstensiGambar = explode('.', $foto);
				$ekstensiGambar = strtolower(end($ekstensiGambar));
	
				if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
					Flasher::setFlash('Format foto anda tidak mendukung !', 'danger');
				return false;
				}
				$namaFileBaru = uniqid();
				$namaFileBaru .= '.';
				$namaFileBaru .= $ekstensiGambar;
				//  menggabungkan foto yang tadinya dipecah
				//  Memindahkan foto
				$uploadKtp = move_uploaded_file($source, $folder.$namaFileBaru);
				$uploadKtp2 = copy($folder.$namaFileBaru, $folder2.$namaFileBaru);
				
				if ($uploadKtp || $uploadKtp2 == true ) {
					$where = [
						'user_id'	=> $id
					];
					$sql = $this->db->table('users_docs')->selectWhere($where);
					if (!empty($sql['id_card'])) 
					{
					unlink( paths('path_portal_Users').$sql['id_card'] );
					unlink( paths('path_home_Users').$sql['id_card'] );
					}
					
				}
	
				if ($uploadKtp && $uploadKtp2 == false ) {
					Flasher::setFlash('system error Please contact the administrator', 'danger');
					return false;
				}
				}else{
					$where = [
						'user_id'	=> $id
					];
					$sql = $this->db->table('users_docs')->selectWhere($where);
					$namaFileBaru = $sql['id_card'];
					
				}   
				 // // Foto diri
				if (!empty($_FILES['foto']['name'])) {
					
					$folder         = paths('path_portal_Users'); 
					$folder2        = paths('path_home_Users');
					
					$gambar2        = $_FILES['foto']['name'];
					$source2        = $_FILES['foto']['tmp_name'];
					
					
					$ekstensiGambarValid2 = ['jpg','jpeg','png'];
					$ekstensiGambar2 = explode('.', $gambar2);
					$ekstensiGambar2 = strtolower(end($ekstensiGambar2));
					
					if ( !in_array($ekstensiGambar2, $ekstensiGambarValid2)) {
						Flasher::setFlashSweet('Gagal','format foto anda tidak mendukung !','error'); 
					return false;
					}
					$namaFileBaru2 = uniqid();
					$namaFileBaru2 .= '.';
					$namaFileBaru2 .= $ekstensiGambar2;
					//  menggabungkan foto yang tadinya dipecah
					//  Memindahkan foto
					$uploadGambar  = move_uploaded_file($source2, $folder.$namaFileBaru2);
					$uploadGambar2 = copy($folder.$namaFileBaru2, $folder2.$namaFileBaru2);

					if ($uploadGambar || $uploadGambar2 == true ) {
						$where = [
							'user_id'	=> $id
						];
						$sql = $this->db->table('users_docs')->selectWhere($where);
						if (!empty($sql['image'])) {
						unlink( paths('path_portal_Users').$sql['image'] );
						unlink( paths('path_home_Users').$sql['image'] );
						}
					
					}else{
						Flasher::setFlash('Gambar Gagal Di upload', 'danger');
						return false;
					}
		
					if ($uploadGambar && $uploadGambar2 == false ) {
						Flasher::setFlash('system error Please contact the administrator', 'danger');
						return false;
					}
				}else{
					$where = [
						'user_id'	=> $id
					];
					$sql = $this->db->table('users_docs')->selectWhere($where);
					$namaFileBaru2 = $sql['image'];
					
				}
				
				$data = [
					'username'		=> $username,
					'jenis_kelamin'	=> $jenis_kelamin,
					'email'			=> $email,
					'tgl_lahir'		=> $tangal_lahir,
					'alamat'		=> $alamat,
					'nomor_hp'		=> $no_hp,
					'updated_at'	=> date('Y-m-d H:i:s')
				];
				$dataDocs = [
					'id_card'		=> $namaFileBaru,
					'image'			=> $namaFileBaru2,
					'id_number'		=> $id_number,
					'username_game'	=> $username_game
				];
				$where = [
					'user_id'		=> $id
				];
				
				$this->db->table('users')->update($data ,$where);
				$this->db->table('users_docs')->update($dataDocs ,$where);
				return $this->db->rowCount();				
		}
    }