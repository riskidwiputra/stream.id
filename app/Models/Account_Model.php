<?php 

class Account_Model extends Model
{ 
	public function select($id)
	{	
		$this->db->query("SELECT
			  * ,provinsi.nama AS nama_p FROM users
			JOIN users_detail ON users.user_id = users_detail.user_id
			JOIN provinsi ON users.provinsi = provinsi.id_prov
			JOIN kabupaten ON users.kota = kabupaten.id_kab
			WHERE users.user_id = '$id'");
		return $this->db->single();
	} 

	public function update($id)
	{

		$username          	= $this->ctr->post('account-username');
		$jenis_kelamin     	= $this->ctr->post('jenis_kelamin'); 
		$tanggal        	= $this->ctr->post('tanggal'); 
		$bulan          	= $this->ctr->post('bulan'); 
		$tahun          	= $this->ctr->post('tahun');
		$tangal_lahir   	= $tanggal ."-". $bulan. "-". $tahun ; 
		$alamat          	= $this->ctr->post('alamat'); 
		$id_number			= $this->ctr->post('id_number'); 
		$no_hp				= $this->ctr->post('no_hp'); 
		$id_card_number		= $this->ctr->post('id_card_number'); 			

		$sql = $this->db->table('users_detail')->where('user_id', $id);
		$id_card = $sql['id_card'];
		$image = $sql['image'];
		$id_status = null;

		if (!empty($_FILES['gambar_ktp']['name']) OR !empty($_FILES['foto']['name'])) {
			$folder         = paths('backup_path').paths('backup_users').$id.'/'; 
			mkdir($folder);			
		}
		
		if (!empty($_FILES['gambar_ktp']['name'])) {
			
			$foto         = $_FILES['gambar_ktp']['name'];
			$source         = $_FILES['gambar_ktp']['tmp_name']; 

			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.', $foto);
			$ekstensiGambar = strtolower(end($ekstensiGambar));

			if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
				Flasher::setFlash('Image format is not supported !', 'danger');
				return false;
			}
			$namaFileBaru = uniqid();
			$namaFileBaru .= '.';
			$namaFileBaru .= $ekstensiGambar; 

			if ($sql['id_card'] != '') {
				$namaFileBaru = $id_card;
			}

			if ($_FILES['gambar_ktp']['size'] > 500000) {
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
			} else {
				move_uploaded_file($source, $folder.$namaFileBaru);
			}
			
			$id_card = $namaFileBaru;
			$id_status = 2;
		}
		
		// Foto diri
		if (!empty($_FILES['foto']['name'])) { 
			$gambar2        = $_FILES['foto']['name'];
			$source2        = $_FILES['foto']['tmp_name'];

			$ekstensiGambarValid2 = ['jpg','jpeg','png'];
			$ekstensiGambar2 = explode('.', $gambar2);
			$ekstensiGambar2 = strtolower(end($ekstensiGambar2));

			if ( !in_array($ekstensiGambar2, $ekstensiGambarValid2)) {
				Flasher::setFlash('Image format is not supported !','error'); 
				return false;
			}
			$namaFileBaru2 = uniqid();
			$namaFileBaru2 .= '.';
			$namaFileBaru2 .= $ekstensiGambar2;
			//  menggabungkan foto yang tadinya dipecah
			//  Memindahkan foto

			if ($sql['image'] != '') {
				$namaFileBaru2 = $image;
			}

			if ($_FILES['foto']['size'] > 500000) {
				list($width, $height) = getimagesize($source2);

				if($ekstensiGambar2 == 'png'){
					$new_image = imagecreatefrompng($source2);
				}

				if($ekstensiGambar2 == 'jpg' || $ekstensiGambar2 == 'jpeg')  {  
					$new_image = imagecreatefromjpeg($source2);  
				}

				$new_width=500;
				$new_height = ($height/$width)*500;
				$tmp_image = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagejpeg($tmp_image, $folder.$namaFileBaru2, 100);
				imagedestroy($new_image);
				imagedestroy($tmp_image);
			} else {
				move_uploaded_file($source2, $folder.$namaFileBaru2);
			}

			$image = $namaFileBaru2;

		} 
		// var_dump($_POST);die;

		$data = [
			'username'		=> $username,
			'jenis_kelamin'	=> $jenis_kelamin, 
			'tgl_lahir'		=> $tangal_lahir,
			'alamat'		=> $alamat,
			'nomor_hp'		=> $no_hp,
			'updated_at'	=> date('Y-m-d H:i:s')
		];
		$dataDocs = [
			'id_card'		=> $id_card,
			'id_card_number'	=> $id_card_number,
			'image'			=> $image, 
			'id_status'		=> $id_status
		];
		$where = [
			'user_id'		=> $id
		]; 

		$this->db->table('users')->update($data ,$where);
		$this->db->table('users_detail')->update($dataDocs ,$where);
		return true;				
	}

	public function change_password()
	{
		$current 	= $this->ctr->post('current-password');
		$new 		= $this->ctr->post('new-password');
		$confirm = $this->ctr->post('confirm-password');
		$users = $this->db->table('users')->where('user_id', Session::get('users')); 

		if (strlen($new) >= 8) {
			if (md5($new) == md5($confirm)) {
				if (password_verify($current ,password_hash($new, PASSWORD_DEFAULT))) {
					Flasher::setFlashLogin('The new password cannot be the same as the current password!!', 'danger');
					return false;
				} else {

					if (password_verify($current, $users['password'])) {
						$preg1 = preg_match("@[a-z]@", $new);
						$preg2 = preg_match("@[A-Z]@", $new);
						$preg3 = preg_match("@[0-9]@", $new);
 
						if($preg1 == false OR $preg2 == false AND $preg3 == false){
							Flasher::setFlashLogin('<b>Password</b> must be a combination of a letters and numbers!!', 'danger');
							return false;
						} else { 
							$data = [
								'password' => password_hash( $new, PASSWORD_DEFAULT)
							];
							$where = [
								'user_id'	=> Session::get('users')
							];
							$this->db->table('users')->update($data ,$where);
							return true;
						}
					} else {
						Flasher::setFlashLogin('Current password is incorrect!!', 'danger');
						return false;
					}

				}
			} else {
				Flasher::setFlashLogin('The confirmation password must be the same!!', 'danger');
				return false;
			}
		} else {
			Flasher::setFlashLogin('New password must be at least 8 digits long!!', 'danger');
			return false;
		}
	}
}
