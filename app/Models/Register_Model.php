<?php 

class Register_Model extends Model
{ 

    public function insert($data)
    { 
        $hash			= filter_var(str_replace('/' , '', base64_encode(md5(rand(0,999999999)).sha1(rand(0,999999999)))), FILTER_SANITIZE_URL);
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
        $id             = rand(1,999999999);
        $tanggal_lahir   = $tanggal ."-". $bulan. "-". $tahun ;

        // $username = 'akuganteng ';
        // var_dump($username);
        // // $a1 = preg_match("@[ ]@", $username);
        // $a2 = preg_match("@[A-Z]@", $username);
        // $a3 = preg_match("@[0-9]@", $username);

        // // var_dump($password);
        // // var_dump($a1);
        // var_dump($a2);
        // var_dump($a3);
        // die;

        // Gambar Ktp 
        if (!empty($_FILES['gambar_ktp']['name'])) {
            $gambar         = $_FILES['gambar_ktp']['name'];
            $source         = $_FILES['gambar_ktp']['tmp_name'];

            $folder         = paths('path_portal_Users'); 
            $folder2        = paths('path_home_Users');

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
            $uploadKtp = move_uploaded_file($source, $folder.$namaFileBaru);
            $uploadKtp2 = copy($folder.$namaFileBaru, $folder2.$namaFileBaru);

            if ($uploadKtp && $uploadKtp2 == false ) {
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
                Flasher::setFlash('system error Please contact the administrator', 'danger');
                return false;
            }
        }else{
            $namaFileBaru = "";
        }   
            // // Foto diri
        if (!empty($_FILES['foto']['name'])) {
            $gambar2        = $_FILES['foto']['name'];
            $source2        = $_FILES['foto']['tmp_name'];

            $folder         = paths('path_portal_Users'); 
            $folder2        = paths('path_home_Users');

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

            if ($uploadGambar && $uploadGambar2 == false ) {
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
                Flasher::setFlash('system error Please contact the administrator', 'danger');
                return false;
            }
        }else{
            $namaFileBaru2 = "";
        }

        $id_ktp         = $this->ctr->post('id_ktp'); 
        $username_game  = $this->ctr->post('username_game'); 

        $passHash = password_hash($rePassword, PASSWORD_DEFAULT);
        if (strlen($password) >= 8) { 
 
            $preg1 = preg_match("@[a-z]@", $password);
            $preg2 = preg_match("@[A-Z]@", $password);
            $preg3 = preg_match("@[0-9]@", $password);

            // $password = ' asdfasdf';
            // var_dump($password);
            // var_dump($preg1);
            // var_dump($preg2);
            // var_dump($preg3);
            
            // var_dump($password);
            // var_dump($preg1 == false OR $preg2 == false);
            // var_dump($preg3 == false);
            // var_dump($preg1 == false OR $preg2 == false AND $preg3 == false);
            // die;
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
            }else{

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
                            'status'        => "guest",
                            'is_verified'   => 1,
                            'created_at'    => date('Y-m-d H:i:s')
                        ];

                        $dataDocs = [
                            'user_id'       => $buatkode,
                            'id_card'       => $namaFileBaru2,
                            'image'         => $namaFileBaru,
                            'id_number'     => $id_ktp,
                            'username_game' => $username_game,
                            'id'            => $id
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

                        Session::unset('FalseRegister');
                        $this->db->table('users')->insert($data);
                        $this->db->table('users_docs')->insert($dataDocs);
                        $this->db->table('balance_users')->insert($dataBalance);
                        $this->db->table('authenticate')->insert($dataAuthenticate);
                        $this->db->table('users_game')->insert($dataGame);
                        return $this->db->rowCount();
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