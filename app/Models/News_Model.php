<?php 

	class News_Model extends Model
	{ 
	    public function select()
		{	
			$this->db->query("SELECT * FROM news_game ORDER BY created_at DESC LIMIT 0, 6");

			return $this->db->resultSet();
		
		}
		public function selectpagination($id)
		{	
			$limit			= 6;
			$limit_start 	= ($id - 1) * $limit;
			 $this->db->table('news_game')->query("SELECT * FROM news_game  ORDER BY created_at DESC LIMIT ".$limit_start.",".$limit);

			return $this->db->resultSet();
		}
		
		public function getData($id)
		{	
			$sql = $this->db->table('news_game')->where('id_news_game', $id);
			$sql = $this->db->single();

			$view = $sql['views'] + 1 ;
				$data = [
				'views' => $view
				];

			$this->db->query("UPDATE news_game SET views = '$view' WHERE id_news_game = '$id'");
			$this->db->execute();	
		}

		public function addkomen($id_news)
		{  
			$parent_komentar_id = $this->ctr->post('komentar_id');
			$komentar = $this->ctr->post('komen'); 

			$data = [
				'comment_id'	=> uniqid(),
				'reply_comment_id'	=> $parent_komentar_id,
				'news_id'		=> $id_news,
				'users_id'		=> Session::get('users'),
				'comment'		=> $komentar,
				'date'			=> date('Y-m-d H:i:s')
			];
			$insert = $this->db->table('komentar')->insert($data);
			if ($insert) {

				$komentar_news = $this->db->table('komentar')->countRows('news_id', $id_news);
				$data = [
					'komentar' => $komentar_news
				];
				$where = [
					'id_news_game' => $id_news
				];
				$this->db->table('news_game')->update($data ,$where);
				return true;
			}else{
				return false;
			}
		}

		public function getkomen($id_news)
		{
			$output = ''; 
			$data = $this->db->query("SELECT * FROM komentar 
				WHERE news_id = '".$id_news."' 
				AND reply_comment_id = 0 
				ORDER BY date DESC 
				LIMIT 0,5");
			$data = $this->db->resultSet();
			foreach ($data as $row) {
				$users = $this->db->table('users')->where('user_id', $row['users_id']);
				$reply = $this->db->query('SELECT * FROM komentar WHERE reply_comment_id = "'.$row["comment_id"].'" ');
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
				$output .= $this->ambil_reply($row["comment_id"], $id_news);
			}
			$count = [
				'news_id'	=> $id_news,
				'reply_comment_id'	=> 0
			];
			echo json_encode([
				'result' => $output,
				'count'	=> $this->db->table('komentar')->countRows($count)
			]);

		}
		public function getloadmore($id_news)
		{
			if ($_POST['urut']) {
				
				$komentar = $this->ctr->post('urut');
				$komentar = $this->db->table('komentar')->where('comment_id', $komentar);
				$output='';
				$data = $this->db->query("
					SELECT * FROM komentar 
					WHERE news_id = '".$id_news."' 
					AND reply_comment_id = 0 
					AND date < '".$komentar['date']."'
					ORDER BY date DESC 
					");
				$data = $this->db->resultSet();
				foreach ($data as $row) {
					$users = $this->db->table('users')->where('user_id', $row['users_id']);
					$reply = $this->db->query('SELECT * FROM komentar WHERE reply_comment_id = "'.$row["comment_id"].'" ');
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
						<div class="replied"></div>
					';
					$output .= $this->ambil_reply($row["comment_id"], $id_news);						
				}
				return json_encode([
					'result'	=> $output,
					'count'		=> count($data)
				]);
			}
		}


		function ambil_reply($komentar_id, $id_news)
		{
			$output	='';
			$query  = $this->db->query("SELECT * FROM komentar WHERE reply_comment_id ='$komentar_id' AND news_id = '$id_news'");
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
										<time class="comment__post-date" datetime="2017-08-23">'.date('d M Y H:i', strtotime($row["date"])).'</time>
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



		public function like($id_news)
		{
			$where = [
				'news_id'	=> $id_news,
				'users_id'	=> Session::get('users')
			];

			$news = $this->db->table('news_like')->countRows($where);

			if ($news == 0) {
				$dataNews = [
					'id'	=> uniqid(),
					'news_id'	=> $id_news,
					'users_id'	=> Session::get('users'),
					'date'		=> date('Y-m-d H:i:s')
				];

				$where = [
					'news_id'	=> $id_news
				];

				$this->db->table('news_like')->insert($dataNews);
				$count = $this->db->table('news_like')->countRows($where);
				echo json_encode([
					'status'	=> true,
					'content'	=> $count 
				]);
			} else {
				echo json_encode([
					'status'	=> false,
					'message'	=> 'System Error, Plase refresh page!'
				]);
			}
		}


	}