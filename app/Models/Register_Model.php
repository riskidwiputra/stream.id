<?php 

class Register_Model extends Model
{ 

    public function insert($data)
    { 
        $hash			= filter_var(str_replace('/' , '', base64_encode(md5(uniqid()).sha1(uniqid()))), FILTER_SANITIZE_URL);

        $buatkode       = uniqid();
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
        $id_ktp         = $this->ctr->post('id_ktp');
        $id             = rand(1,999999999);
        $tanggal_lahir   = $tanggal ."-". $bulan. "-". $tahun ;

        // var_dump($_FILES);die;   
        $id_card = '';
        $image = '';

        if (!empty($_FILES['gambar_ktp']['name']) OR !empty($_FILES['foto']['name'])) {
            $folder         = paths('backup_path').paths('backup_users').$buatkode.'/'; 
            mkdir($folder);         
        }
        // Gambar Ktp 
        if (!empty($_FILES['gambar_ktp']['name'])) {
            $gambar         = $_FILES['gambar_ktp']['name'];
            $source         = $_FILES['gambar_ktp']['tmp_name']; 

            $ekstensiGambarValid = ['jpg','jpeg','png'];
            $ekstensiGambar = explode('.', $gambar);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
                $dataFalse = [
                    'username'  => $username,
                    'email'     => $email,
                    'jenis_kelamin' => $jenis_kelamin,
                    'birth'     => $tanggal_lahir,
                    'address'   => $alamat,
                    'phone'     => $no_hp,
                    'id_number' => $this->ctr->post('id_ktp')
                ];
                Session::set('FalseRegister', $dataFalse);
                Flasher::setFlash('Image format not supported !', 'danger');
                return false;
            }
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            //  menggabungkan foto yang tadinya dipecah
            //  Memindahkan foto
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
        }   
            // // Foto diri
        if (!empty($_FILES['foto']['name'])) {
            $gambar2        = $_FILES['foto']['name'];
            $source2        = $_FILES['foto']['tmp_name']; 

            $ekstensiGambarValid2 = ['jpg','jpeg','png'];
            $ekstensiGambar2 = explode('.', $gambar2);
            $ekstensiGambar2 = strtolower(end($ekstensiGambar2));

            if ( !in_array($ekstensiGambar2, $ekstensiGambarValid2)) {
                $dataFalse = [
                    'username'  => $username,
                    'email'     => $email,
                    'jenis_kelamin' => $jenis_kelamin,
                    'birth'     => $tanggal_lahir,
                    'address'   => $alamat,
                    'phone'     => $no_hp,
                    'id_number' => $this->ctr->post('id_ktp')
                ];
                Session::set('FalseRegister', $dataFalse);
                Flasher::setFlash('Image format not supported !', 'danger'); 
                return false;
            }
            $namaFileBaru2 = uniqid();
            $namaFileBaru2 .= '.';
            $namaFileBaru2 .= $ekstensiGambar;
            //  menggabungkan foto yang tadinya dipecah
            //  Memindahkan foto
            $uploadGambar  = move_uploaded_file($source2, $folder.$namaFileBaru2);
            $uploadGambar2 = copy($folder.$namaFileBaru2, $folder2.$namaFileBaru2);

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

        $passHash = password_hash($rePassword, PASSWORD_DEFAULT);
        if (strlen($password) >= 8) { 
 
            $preg1 = preg_match("@[a-z]@", $password);
            $preg2 = preg_match("@[A-Z]@", $password);
            $preg3 = preg_match("@[0-9]@", $password);
 
            if($preg1 == false OR $preg2 == false AND $preg3 == false){
                $dataFalse = [
                    'username'  => $username,
                    'email'     => $email,
                    'jenis_kelamin' => $jenis_kelamin,
                    'birth'     => $tanggal_lahir,
                    'address'   => $alamat,
                    'phone'     => $no_hp,
                    'id_number' => $this->ctr->post('id_ktp')
                ];
                Session::set('FalseRegister', $dataFalse);
                Flasher::setFlash('<b>Password</b> must be a combination of a letters and numbers!', 'danger');
                return false;
            } else {

                if (password_verify($password, $passHash) == true) {
                    $select = [
                        'email' => $email
                    ]; 

                    if ($this->db->table('users')->countRows($select) > 0) {
                        $dataFalse = [
                            'username'  => $username,
                            'email'     => $email,
                            'jenis_kelamin' => $jenis_kelamin,
                            'birth'     => $tanggal_lahir,
                            'address'   => $alamat,
                            'phone'     => $no_hp,
                            'id_number' => $this->ctr->post('id_ktp')
                        ];
                        Session::set('FalseRegister', $dataFalse);
                        Flasher::setFlash('<b>Email</b> is already registered!', 'danger');
                        return false;
                    }else{
                        $select = [
                            'username' => $username
                        ];  
                        // var_dump($this->db->table('users')->countRows($select));die;

                        if ($this->db->table('users')->countRows($select) > 0) {
                            $dataFalse = [
                                'username'  => $username,
                                'email'     => $email,
                                'jenis_kelamin' => $jenis_kelamin,
                                'birth'     => $tanggal_lahir,
                                'address'   => $alamat,
                                'phone'     => $no_hp,
                                'id_number' => $this->ctr->post('id_ktp')
                            ];
                            Session::set('FalseRegister', $dataFalse);
                            Flasher::setFlash('<b>Username</b> is already registered!', 'danger');
                            return false;
                        }else{
                            $data = [
                                'user_id'       => $buatkode,
                                'username'      => $username,
                                'password'      => $passHash,
                                'jenis_kelamin' => $jenis_kelamin,
                                'email'         => $email,
                                'tgl_lahir'     => $tanggal_lahir,
                                'alamat'        => $alamat,
                                'provinsi'      => $provinsi,
                                'kota'          => $kota,
                                'nomor_hp'      => $no_hp,
                                'status'        => 'guest',
                                // 'is_verified'   => 0,
                                'created_at'    => date('Y-m-d H:i:s')
                            ];

                            $dataDocs = [
                                'user_id'       => $buatkode,
                                'id_card'       => $id_card,
                                'id_card_number'    => $id_ktp,
                                'image'         => $image
                            ];
                            $dataBalance = [
                                'users_id'  => $buatkode,
                                'balance'   => 0
                            ];  

                            $dataAuthenticate = [
                                'users_id' => $buatkode,
                                'authenticate'  => ''
                            ];

                            $dataGame = [
                                'users_id' => $buatkode,
                                'game_id'  => ''
                            ]; 

                            $dataVerify = [
                                'email' => $email,
                                'token'  => $hash
                            ];

                            $dataToken = [
                                'users_id'  => $buatkode,
                                'token'     => $hash        
                            ];
                            Session::set('token', $dataToken);
                            $this->ctr->sendMail('verify', $dataVerify);

                            if (Session::check('FalseRegister')) {
                                Session::unset('FalseRegister');
                            }
                            // die;
                            // var_dump($dataDocs);
                            // die;
                            $this->db->table('users')->insert($data);
                            $this->db->table('users_detail')->insert($dataDocs);
                            $this->db->table('balance_users')->insert($dataBalance);
                            $this->db->table('authenticate')->insert($dataAuthenticate);
                            $this->db->table('users_game')->insert($dataGame);
                            $this->db->table('token')->insert($dataToken);
                            return true;
                        } 
                    }


                } else {
                    $dataFalse = [
                        'username'  => $username,
                        'email'     => $email,
                        'jenis_kelamin' => $jenis_kelamin,
                        'birth'     => $tanggal_lahir,
                        'address'   => $alamat,
                        'phone'     => $no_hp,
                        'id_number' => $this->ctr->post('id_ktp')
                    ];
                    Session::set('FalseRegister', $dataFalse);
                    Flasher::setFlash('<b>Password confirmation</b> must be the same', 'danger');
                    return false;  
                }
            }
        } else {
            $dataFalse = [
                'username'  => $username,
                'email'     => $email,
                'jenis_kelamin' => $jenis_kelamin,
                'birth'     => $tanggal_lahir,
                'address'   => $alamat,
                'phone'     => $no_hp,
                'id_number' => $this->ctr->post('id_ktp')
            ];
            Session::set('FalseRegister', $dataFalse); 
            Flasher::setFlash('<b>Password </b> must be a least 8 digit !', 'danger');
            return false;
        }
    }
}