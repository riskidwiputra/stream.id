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
    }