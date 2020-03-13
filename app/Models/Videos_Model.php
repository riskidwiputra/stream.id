<?php 


class Videos_Model extends Model
{
	public function watch($url)
	{
		$videos = $this->db->table('videos')->where('url', $url);
		if (Session::check('users')) {
			$dataViews = [
				'videos_id'	=> $videos['videos_id'],
				'users_id'  => Session::get('users'),
				'device'	=> Detect::deviceType(),
				'ip' 		=> Detect::ip(),
				'os'		=> Detect::os() 
			]; 
		} else {
			$dataViews = [
				'videos_id'	=> $videos['videos_id'],
				'users_id'  => '',
				'device'	=> Detect::deviceType(),
				'ip' 		=> Detect::ip(),
				'os'		=> Detect::os() 
			]; 
		}
		// var_dump($dataViews);die;
		$viewsCheck = $this->db->table('video_viewer')->countRows($dataViews);
		// var_dump($viewsCheck);
		// var_dump($videos);
		// die;

		if ($viewsCheck < 1) {
			$dataViews1 = [
				'time'	=> date('Y-m-d H:i:s')
			];
			$dataViews2 = [
				'view_id'	=> uniqid()
			]; 
			$dataViews = array_merge($dataViews, $dataViews1);
			$dataViews = array_merge($dataViews2, $dataViews);
			// var_dump($dataViews);die;
			$dataVideos = [
				'view'	=> $videos['view']+1 
			];
			$where = [
				'url'	=> $url
			];
			$this->db->table('video_viewer')->insert($dataViews);
			$this->db->table('videos')->update($dataVideos, $where);
			// var_dump($dataViews);die;
		}
		// die;
	}

	public function like($id)
	{
		$like0 = [ 
			'videos_id'	=> $id,
			'users_id'	=> Session::get('users') 
		];
		$like = $this->db->table('likes_video')->where($like0);
		$countLike = $this->db->rowCount();
		$countLikes = [
			'videos_id'	=> $id,
			'likes'	=> 1
		];
		$countLikes = $this->db->table('likes_video')->countRows($countLikes);
		$countDisLike = [
			'videos_id'	=> $id,
			'dislike'	=> 1
		];
		$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);

		if ($countLike > 0) {
			if ($like['likes'] == 1) {
				$data = [
					'like_id'	=> $like['like_id']
				];
				$this->db->table('likes_video')->delete($data);
				$countLikes = [
					'videos_id'	=> $id,
					'likes'	=> 1
				];
				$countLikes = $this->db->table('likes_video')->countRows($countLikes);
				$countDisLike = [
					'videos_id'	=> $id,
					'dislike'	=> 1
				];
				$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
				echo json_encode([
					'status'	=> true,
					'result'	=> 1.2,
					'like'		=> $countLikes,
					'dislike'	=> $countDisLike
				]);
			} else if ($like['dislike'] == 1) {
				$data = [
					'likes'	=> 1,
					'dislike'	=> 0
				];
				$where = [
					'like_id'	=> $like['like_id']
				];
				$this->db->table('likes_video')->update($data, $where);
				$countLikes = [
					'videos_id'	=> $id,
					'likes'	=> 1
				];
				$countLikes = $this->db->table('likes_video')->countRows($countLikes);
				$countDisLike = [
					'videos_id'	=> $id,
					'dislike'	=> 1
				];
				$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
				echo json_encode([
					'status'	=> true,
					'result'	=> 1.3,
					'like'		=> $countLikes,
					'dislike'	=> $countDisLike
				]);
			}
		} else {
			$like1 = [
				'like_id'	=> uniqid()
			];
			$like2 = array_merge($like1, $like0);
			$like3 = [
				'likes'	=> 1,
				'created_at'	=> date('Y-m-d H:i:s')
			];
			$like4 = array_merge($like2, $like3);
			$this->db->table('likes_video')->insert($like4); 
			$countLikes = [
				'videos_id'	=> $id,
				'likes'	=> 1
			];
			$countLikes = $this->db->table('likes_video')->countRows($countLikes);
			$countDisLike = [
				'videos_id'	=> $id,
				'dislike'	=> 1
			];
			$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
			echo json_encode([
				'status'	=> true,
				'result' 	=> 1.1, // belum pernah like dan dislike
				'like'		=> $countLikes,
				'dislike'	=> $countDisLike
			]);			
		}
	}


	public function dislike($id)
	{
		$like0 = [ 
			'videos_id'	=> $id,
			'users_id'	=> Session::get('users') 
		];
		$like = $this->db->table('likes_video')->where($like0);
		$countDisLikes = $this->db->rowCount();
		$countLikes = [
			'videos_id'	=> $id,
			'likes'	=> 1
		];
		$countLikes = $this->db->table('likes_video')->countRows($countLikes);
		$countDisLike = [
			'videos_id'	=> $id,
			'dislike'	=> 1
		];
		$countDisLike = $this->db->table('likes_video')->countRows($countDisLike); 

		if ($countDisLikes > 0) {  
			if ($like['dislike'] == 1) {
				$data = [
					'like_id'	=> $like['like_id']
				];
				$this->db->table('likes_video')->delete($data);
				$countLikes = [
					'videos_id'	=> $id,
					'likes'	=> 1
				];
				$countLikes = $this->db->table('likes_video')->countRows($countLikes);
				$countDisLike = [
					'videos_id'	=> $id,
					'dislike'	=> 1
				];
				$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
				echo json_encode([
					'status'	=> true,
					'result'	=> 1.2,
					'like'		=> $countLikes,
					'dislike'	=> $countDisLike
				]);
			} else if ($like['likes'] == 1) {
				$data = [
					'likes'	=> 0,
					'dislike'	=> 1
				];
				$where = [
					'like_id'	=> $like['like_id']
				];
				$this->db->table('likes_video')->update($data, $where);
				$countLikes = [
					'videos_id'	=> $id,
					'likes'	=> 1
				];
				$countLikes = $this->db->table('likes_video')->countRows($countLikes);
				$countDisLike = [
					'videos_id'	=> $id,
					'dislike'	=> 1
				];
				$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
				echo json_encode([
					'status'	=> true,
					'result'	=> 1.3,
					'like'		=> $countLikes,
					'dislike'	=> $countDisLike
				]);
			}
		} else {
			// echo json_encode([$id]);die;
			$like1 = [
				'like_id'	=> uniqid()
			];
			$like2 = array_merge($like1, $like0);
			$like3 = [
				'dislike'	=> 1,
				'created_at'	=> date('Y-m-d H:i:s')
			];
			$like4 = array_merge($like2, $like3);
			// echo json_encode([$like4]);die;
			$this->db->table('likes_video')->insert($like4); 
			$countLikes = [
				'videos_id'	=> $id,
				'likes'	=> 1
			];
			$countLikes = $this->db->table('likes_video')->countRows($countLikes);
			$countDisLike = [
				'videos_id'	=> $id,
				'dislike'	=> 1
			];
			$countDisLike = $this->db->table('likes_video')->countRows($countDisLike);
			echo json_encode([
				'status'	=> true,
				'result' 	=> 1.1, // belum pernah like dan dislike
				'like'		=> $countLikes,
				'dislike'	=> $countDisLike
			]);			
		}
	}

	public function GetComment($id_video)
	{
		$output = '';  
		$data = $this->db->query("SELECT * FROM video_comment 
			WHERE videos_id = '".$id_video."' 
			AND reply_comment_id = 0 
			ORDER BY date DESC 
			LIMIT 0,5");
		$data = $this->db->resultSet();
		foreach ($data as $row) {
			$users = $this->db->table('users')->where('user_id', $row['users_id']);
			$reply = $this->db->query('SELECT * FROM video_comment WHERE reply_comment_id = "'.$row["comment_id"].'" ');
			$reply = $this->db->rowCount();
			$output .= '
			<div class="comments__inner">
				<header class="comment__header">
					<div class="comment__author">
						<figure class="comment__author-avatar comment__author-avatar--md">
							<img src="'.BASEURL.'/public/assets/images/samples/avatar-2.jpg" alt="">
							<div class="baris" id="'.$row['comment_id'].'">
							</div>
						</figure>
					</div>
				</header>
				<div class="comment__inner-wrap">
					<div class="comment__author-info">
						<h5 class="comment__author-name">'.$users["username"].'</h5>
						<time class="comment__post-date" datetime="'.date('Y-m-d', strtotime($row["date"])).'">'.date('d M Y H:i', strtotime($row["date"])).'</time>
					</div>
					<div class="comment__body">'.$row["comment"].'</div>
					<div class="comment__reply" style="font-size:12px;">
						<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["comment_id"].'">Reply</a>
						<span class="mx-1">|</span>
						<a href="javascript:void(0);" class="comment__reply-link see-reply" data-reply="'.$row["comment_id"].'">See Reply ('.$reply.')  </a>
					</div>
				</div>
			</div> 
			';
			$output .= $this->GetReply($row["comment_id"], $id_video);
		}
		$count = [
			'videos_id'	=> $id_video,
			'reply_comment_id'	=> 0
		];
		echo json_encode([
			'result' => $output,
			'count'	=> $this->db->table('video_comment')->countRows($count)
		]);
	}

	public function AddComment($id_video)
	{
		$parent_komentar_id = $this->ctr->post('komentar_id');
		$komentar = $this->ctr->post('komen'); 

		$data = [
			'comment_id'	=> uniqid(),
			'reply_comment_id'	=> $parent_komentar_id,
			'videos_id'		=> $id_video,
			'users_id'		=> Session::get('users'),
			'comment'		=> $komentar,
			'date'			=> date('Y-m-d H:i:s')
		];
		$insert = $this->db->table('video_comment')->insert($data);
		return true; 
	}

	function GetReply($comment_id, $id_video)
	{
		$output	='';
		$query  = $this->db->query("SELECT * FROM video_comment WHERE reply_comment_id ='$comment_id' AND videos_id = '$id_video'");
		$count  = $this->db->rowCount();

		if($count > 0){
			foreach ($this->db->resultSet() as $row) {
				$users = $this->db->table('users')->where('user_id', $row['users_id']);
				$output .= '
				<ul class="comments--children">
					<li class="comments__item">
						<div class="comments__inner">
							<header class="comment__header">
								<div class="comment__author">
									<figure class="comment__author-avatar comment__author-avatar--md">
										<img src="'.BASEURL.'/public/assets/images/samples/avatar-2.jpg" alt="">
									</figure>
								</div>
							</header>
							<div class="comment__inner-wrap">
								<div class="comment__author-info">
									<h5 class="comment__author-name">'.$users["username"].'</h5>
									<time class="comment__post-date" datetime="'.date('Y-m-d', strtotime($row["date"])).'">'.date('d M Y H:i', strtotime($row["date"])).'</time>
								</div>
								<div class="comment__body">'.$row["comment"].'</div> 
							</div>
						</div>
					</li>
				</ul>
				';

					// $output .= $this->ambil_reply($row["comment_id"], $id_news);
			}
		}
		return $output;
	}

	public function LoadMore($id_video)
	{
		if ($_POST['urut']) {

			$komentar = $this->ctr->post('urut');
			$komentar = $this->db->table('video_comment')->where('comment_id', $komentar);
			$output='';
			$data = $this->db->query("
				SELECT * FROM komentar 
				WHERE videos_id = '".$id_video."' 
				AND reply_comment_id = 0 
				AND date < '".$komentar['date']."'
				ORDER BY date DESC 
				");
			$data = $this->db->resultSet();
			foreach ($data as $row) {
				$users = $this->db->table('users')->where('user_id', $row['users_id']);
				$reply = $this->db->query('SELECT * FROM video_comment WHERE reply_comment_id = "'.$row["comment_id"].'" ');
				$reply = $this->db->rowCount();
				$output .= '
				<div class="comments__inner"> 
					<header class="comment__header">
						<div class="comment__author">
							<figure class="comment__author-avatar comment__author-avatar--md">
								<img src="'.BASEURL.'/public/assets/images/samples/avatar-2.jpg" alt="">
								<div class="baris" id="'.$row['comment_id'].'">
									<div class="loadmore">
									</div>
								</div>
							</figure>
						</div>
					</header>
					<div class="comment__inner-wrap">
						<div class="comment__author-info">
							<h5 class="comment__author-name">'.$users["username"].'</h5>
							<time class="comment__post-date" datetime="2017-08-23">'.date('d M Y H:i', strtotime($row["date"])).'</time>
						</div>
						<div class="comment__body">
							'.$row["comment"].'
						</div>
						<div class="comment__reply" style="font-size:12px;">
							<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["comment_id"].'">Reply</a>
							|
							<a href="javascript:void(0);" class="comment__reply-link see-reply" id="'.$row["comment_id"].'">See Reply ('.$reply.')  </a>
						</div>
					</div>
				</div> 
				';
				$output .= $this->ambil_reply($row["comment_id"], $id_video);						
			}
			return json_encode([
				'result'	=> $output,
				'count'		=> count($data)
			]);
		}
	}
}	