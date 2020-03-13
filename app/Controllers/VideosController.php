<?php


class VideosController extends Controller
{

	public function __construct()
	{
		parent::__construct();

		if (Session::check('users')) {
			$this->Users = $this->db->query('
				SELECT * FROM users 
				JOIN users_detail
				ON users.user_id = users_detail.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
				');
			$this->Users = $this->db->single(); 
		} else {
			$this->Users = '';
		}
	}

	public function watch($url)
	{
		$data['content'] = $this->db->table('videos')->where('url', $url);
		$this->model('Videos_Model')->watch($url);
		if ($data['content']['label_color'] == 1) { 
			$data['label'] = '<span class="label posts__cat-label posts__cat-label--category-3">'.$data['content']['label'].'</span>'; 
		} elseif ($data['content']['label_color'] == 2) { 
			$data['label'] = '<span class="label posts__cat-label posts__cat-label--category-4">'.$data['content']['label'].'</span>'; 
		} elseif ($data['content']['label_color'] == 3) { 
			$data['label'] = '<span class="label posts__cat-label posts__cat-label--category-5">'.$data['content']['label'].'</span>'; 
		} elseif ($data['content']['label_color'] == 4) {
			$data['label'] = '<span class="label posts__cat-label posts__cat-label--category-2">'.$data['content']['label'].'</span>'; 
		} elseif ($data['content']['label_color'] == 5) {
			$data['label'] = '<span class="label posts__cat-label posts__cat-label--category-1">'.$data['content']['label'].'</span>'; 
		}
		$data['recommended'] = $this->db->query('
			SELECT * FROM videos 
			WHERE videos_id != "'.$data["content"]["videos_id"].'"  
			ORDER BY view DESC 
			LIMIT 8 
		');
		$data['recommended'] = $this->db->resultSet();
		$like = [
			'videos_id'	=> $data['content']['videos_id'],
			'likes'		=> 1
		];
		$data['like'] = $this->db->table('likes_video')->countRows($like);
		$dislike = [
			'videos_id'	=> $data['content']['videos_id'],
			'dislike'		=> 1
		];
		$data['dislike'] = $this->db->table('likes_video')->countRows($dislike);
		$like_it = [
			'videos_id'	=> $data['content']['videos_id'],
			'users_id'	=> Session::get('users')
		];
		$data['like_it'] = $this->db->table('likes_video')->where($like_it); 
		$this->view('landing/template/header', $data);
		$this->view('landing/about/watch-video', $data);
		$this->view('landing/template/footer');
	}

	public function like($id)
	{	
		$sql = $this->db->table('videos')->where('videos_id', $id);  
		if (Session::check('users') == false) {
			echo json_encode([
				'status'	=> false,
				'message'	=> 'Sign in to save your opinion'
			]);
		} elseif ($id != '' AND $sql != false) {
			$this->model('Videos_Model')->like($id);
		}
	}

	public function dislike($id)
	{	
		$sql = $this->db->table('videos')->where('videos_id', $id);  
		if (Session::check('users') == false) {
			echo json_encode([
				'status'	=> false,
				'message'	=> 'Sign in to save your opinion'
			]);
		} elseif ($id != '' AND $sql != false) {
			$this->model('Videos_Model')->dislike($id);
		}
	}

	public function GetComment($id)
	{
		$this->model('Videos_Model')->GetComment($id);
	}

	public function AddComment($id)
	{
		$this->model('Videos_Model')->AddComment($id);
	}

	public function LoadMore($id)
	{
		$this->model('Videos_Model')->LoadMore($id);
	}
}