<?php 

	/**
	 * 
	 */
	class AccountController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}

		public function account()
		{ 
			$id = session::get('users');
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['content']   = $this->model('Account_Model')->select($id);
			$this->view('landing/template/header');
			$this->view('landing/account/account', $data);	
			$this->view('landing/template/footer' , $data);			
		}

		public function Provinsi()
        {
            $sql = "SELECT * FROM provinsi";
            $query =  mysqli_query($this->db->connection(), $sql);
            $data = array();
            while($row = $query->fetch_array(MYSQLI_ASSOC)){

            $data[] = array("id_prov" => $row['id_prov'], "nama" => $row['nama']);
            }

            echo json_encode($data);
		}
		public function Kabupaten($id_prov)
        {
            $sql = "SELECT * FROM kabupaten WHERE `id_prov` = '$id_prov'";
            $query = mysqli_query($this->db->connection(), $sql);
            $data = array();
            while($row = $query->fetch_array(MYSQLI_ASSOC)){
            $data[] = array("id_kab" => $row['id_kab'], "nama" => $row['nama']);
            }
            echo json_encode($data);
        }
    }