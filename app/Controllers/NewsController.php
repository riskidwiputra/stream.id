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
			$data['newest'] = $this->db->query("SELECT * FROM news_game ORDER by id_news_game DESC LIMIT 5 ");
			$data['newest'] = $this->db->resultSet();
			$data['popular'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 5 ");
			$data['popular'] = $this->db->resultSet();
			$data['populared'] = $this->db->query("SELECT * FROM news_game ORDER by views DESC LIMIT 2 ");
			$data['populared'] = $this->db->resultSet();
			$data['commented'] = $this->db->query("SELECT * FROM news_game ORDER by komentar DESC LIMIT 5 ");
			$data['commented'] = $this->db->resultSet();
			$data['content'] = $this->model('News_Model')->select();
			$this->view('landing/template/header');
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
			$this->view('landing/template/header');
			$this->view('SingleNews/SingleNews' ,$data);	
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
		
	}