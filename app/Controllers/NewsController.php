<?php 

	/**
	 * 
	 */
	class NewsController extends Controller
	{
		public function __construct()
		{
			parent::__construct();

		}
		
		public function Index()
		{ 
			$data['newest'] 		= $this->db->query("SELECT * FROM news_game ORDER by id_news_game DESC LIMIT 5 ");
			$data['newest'] 		= $this->db->resultSet();
			$data['popular'] 		= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 5 ");
			$data['popular'] 		= $this->db->resultSet();
			$data['populared'] 		= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] 		= $this->db->resultSet();
			$data['commented'] 		= $this->db->query("SELECT * FROM news_game ORDER by komentar DESC LIMIT 5 ");
			$data['commented'] 		= $this->db->resultSet();
			$jumlahData 			= $this->db->query("SELECT COUNT(*) AS jumlah FROM news_game");
			$jumlahData 			= $this->db->single();
			$limit					= 6;
			$data['jumlahHalaman'] 	= ceil($jumlahData['jumlah'] / $limit);
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['content'] 		= $this->model('News_Model')->select();
			$this->view('landing/template/header', $data);
			$this->view('news/news', $data);	
			$this->view('landing/template/footer', $data);			
		}
		public function Pagination($id)
		{
			$data['content'] 		= $this->model('News_Model')->selectpagination($id);
			$data['newest'] 		= $this->db->query("SELECT * FROM news_game ORDER by id_news_game DESC LIMIT 5 ");
			$data['newest'] 		= $this->db->resultSet();
			$data['popular'] 		= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 5 ");
			$data['popular'] 		= $this->db->resultSet();
			$data['populared'] 		= $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] 		= $this->db->resultSet();
			$data['commented'] 		= $this->db->query("SELECT * FROM news_game ORDER by komentar DESC LIMIT 5 ");
			$data['commented'] 		= $this->db->resultSet();
			$jumlahData 			= $this->db->query("SELECT COUNT(*) AS jumlah FROM news_game");
			$jumlahData 			= $this->db->single();
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			// batas news yang ingin di tampilkan 
			$limit					= 6;
			// mengambil angka page 
			$data['page']			= $id; 
			// membuat jumlah link number sebelum dan sesudah page yang aktif
			$jumlah_number 			= 2;
			$data['jumlahHalaman'] 	= ceil($jumlahData['jumlah'] / $limit);
			$data['start_number']	= ($data['page'] > $jumlah_number)? $data['page'] - $jumlah_number : 1;
			$data['end_number']		= ($data['page'] < ($data['jumlahHalaman'] - $jumlah_number))? $data['page'] + $jumlah_number :$data['jumlahHalaman'];

			$this->view('landing/template/header', $data);
			$this->view('news/news', $data);	
			$this->view('landing/template/footer', $data);
		}

		public function SingleNews($id)
		{ 	
			$data['single'] = $this->db->table('news_game')->where('url', $id);
			$data['single'] = $this->db->single();	
			$data['comment'] = $this->db->table('komentar')->countRows('id_news_game', $data['single']['id_news_game']);
			$data['newest'] = $this->db->query("SELECT * FROM news_game ORDER by id_news_game DESC LIMIT 5 ");
			$data['newest'] = $this->db->resultSet();
			$data['popular'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 5 ");
			$data['popular'] = $this->db->resultSet();
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['commented'] = $this->db->query("SELECT * FROM news_game ORDER by komentar DESC LIMIT 5 ");
			$data['commented'] = $this->db->resultSet();
			$data['content'] = $this->db->table('news_game')->where('id_news_game', $data['single']['id_news_game']);
			$data['content'] = $this->db->single();
			$data['users'] = $this->db->query('
				SELECT * FROM users 
				JOIN users_docs
				ON users.user_id = users_docs.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$data['users']	= $this->db->single();  
			$data['game-list'] = $this->db->table('game_list')->all();
			$data['game-list']	= $this->db->resultSet();
			$this->view('landing/template/header', $data);
			$this->view('singleNews/singleNews' ,$data);	
			$this->view('landing/template/footer', $data);			
		}

		public function GetNews($id)
		{
			$this->model('News_Model')->getData($id);
			echo json_encode(true);
		}
		public function AddKomen($url)
		{
			$data['single'] = $this->db->table('news_game')->where('url', $url);
			$data['single'] = $this->db->single();
			
			$id_news = $data['single']['id_news_game'];
			$this->model('News_Model')->addkomen($id_news);
			
		}

		public function GetKomen($id)
		{
			$data['single'] = $this->db->table('news_game')->where('url', $id);
			$data['single'] = $this->db->single();
			$id_news = $data['single']['id_news_game'];
			echo $this->model('News_Model')->getkomen($id_news);
		}
		public function LoadMore($id)
		{
			$data['single'] = $this->db->table('news_game')->where('url', $id);
			$data['single'] = $this->db->single();
			$id_news = $data['single']['id_news_game'];
			echo $this->model('News_Model')->getloadmore($id_news);
		}
		
	}