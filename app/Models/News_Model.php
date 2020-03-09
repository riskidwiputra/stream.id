<?php 

	class News_Model extends Model
	{ 
	    public function select()
		{	
			 $this->db->table('news_game')->query("SELECT * FROM news_game  ORDER BY created_at DESC LIMIT 0, 6");

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
			$users = $this->db->query('
				SELECT * FROM users 
				JOIN users_detail
				ON users.user_id = users_detail.user_id
				JOIN balance_users
				ON users.user_id = balance_users.users_id
				WHERE users.user_id = "'.Session::get("users").'"
			');
			$users = $this->db->single(); 
			$parent_komentar_id = $_POST['komentar_id'];
			$komentar = $_POST['komen'];
			$nama_pengirim = $users['username'];
			$email_pengirim = $users['email'];

			$this->db->query("INSERT INTO komentar (komentar_id, parent_komentar_id, komentar, 	nama_pengirim, email_pengirim, id_news_game) VALUES ('','$parent_komentar_id', '$komentar', '$nama_pengirim','$email_pengirim','$id_news')");
			if ($this->db->execute() >= 0) {

				$komentar_news = $this->db->table('komentar')->countRows('id_news_game', $id_news);
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
			$output='';
			// $parent_komentar = $this->db->table('komentar')->query("SELECT * FROM komentar WHERE id_news_game = '$id_news' AND parent_komentar_id > 0");
			// $parent_komentar = $this->db->execute();
			// $parent_komentar = $this->db->resultSet();
			// // $parent_komentar = $this->db->rowCount();
			// foreach ($parent_komentar as $row2 ) {
			// 	echo $row2['parent_komentar_id'];
			// }
			
			
			// // $tampil = $this->db->query("SELECT * FROM komentar WHERE parent_komentar_id = '0' AND id_news_game = '$id_news' ORDER BY komentar_id DESC");
			// // $tampil = $this->db->resultSet();
			// // var_dump($tampil);
			$data= mysqli_query($this->db->connection(), "SELECT * FROM komentar WHERE parent_komentar_id = '0' AND id_news_game = '$id_news' ORDER BY komentar_id DESC LIMIT 0,5");
			while ($row = mysqli_fetch_array($data)) {
				
					$output .= '
			<div class="comments__inner">
                <header class="comment__header">
                    <div class="comment__author">
                        <figure class="comment__author-avatar comment__author-avatar--md">
							<img src="'.BASEURL.'/public/assets/images/samples/avatar-2.jpg" alt="">
							<div class="baris" id="'.$row['komentar_id'].'">
							</div>
                        </figure>
                    </div>
                </header>
                <div class="comment__inner-wrap">
                    <div class="comment__author-info">
                        <h5 class="comment__author-name">'.$row["nama_pengirim"].'</h5>
                        <time class="comment__post-date" datetime="2017-08-23">'.date('d M Y H:i', strtotime($row["date"])).'</time>
                    </div>
                    <div class="comment__body">
					'.$row["komentar"].'
                    </div>
                    <div class="comment__reply" style="font-size:12px;">
						<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["komentar_id"].'">Reply</a>
						|
						
						<a href="javascript:void(0);" class="comment__reply-link reply">Lihat Balasan (0)  </a>
					
				</div>
				</div>
            </div>
            ';
			$output .= $this->ambil_reply($row["komentar_id"], $id_news);
			}
			return $output;
		}
		public function getloadmore($id_news)
		{
			if ($_POST['urut'])
				{
				
					$komentar = $_POST['urut'];
					$output='';
					$data= mysqli_query($this->db->connection(), "SELECT * FROM komentar WHERE parent_komentar_id = '0' AND id_news_game = '$id_news' AND komentar_id < '$komentar'  ORDER BY komentar_id DESC LIMIT 5");
					while ($row = mysqli_fetch_array($data)) {
						// $query_reply      = mysqli_query($this->db->connection(), "SELECT * FROM komentar WHERE parent_komentar_id ='$komentar_id' AND id_news_game = '$id_news'");
						// $count_reply      = mysqli_num_rows($query_reply);

						$output .= '
						<div class="comments__inner"> 
							<header class="comment__header">
								<div class="comment__author">
									<figure class="comment__author-avatar comment__author-avatar--md">
										<img src="'.BASEURL.'/public/assets/images/samples/avatar-2.jpg" alt="">
										<div class="baris" id="'.$row['komentar_id'].'">
											<div class="loadmore">
											</div>
										</div>
									</figure>
								</div>
							</header>
							<div class="comment__inner-wrap">
								<div class="comment__author-info">
									<h5 class="comment__author-name">'.$row["nama_pengirim"].'</h5>
									<time class="comment__post-date" datetime="2017-08-23">'.date('d M Y H:i', strtotime($row["date"])).'</time>
								</div>
								<div class="comment__body">
									'.$row["komentar"].'
								</div>
								<div class="comment__reply" style="font-size:12px;">
									<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["komentar_id"].'">Reply</a>
										|
									<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["komentar_id"].'">Lihat Balasan (0)  </a>
								</div>
							</div>
						</div>
						';
						$output .= $this->ambil_reply($row["komentar_id"], $id_news);						
					}
					return $output;
				}
		}
		function ambil_reply($komentar_id, $id_news)
			{
			$output      ='';
			  $query      = mysqli_query($this->db->connection(), "SELECT * FROM komentar WHERE parent_komentar_id ='$komentar_id' AND id_news_game = '$id_news'");
				$count      = mysqli_num_rows($query);

			if($count > 0){
				while ($row =  mysqli_fetch_assoc($query)) {

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
										<h5 class="comment__author-name">'.$row["nama_pengirim"].'</h5>
										<time class="comment__post-date" datetime="2017-08-23">'.date('d M Y H:i', strtotime($row["date"])).'</time>
									</div>
									<div class="comment__body">
										'.$row["komentar"].'
									</div> 
								</div>
							</div>
						</li>
					</ul>
					';

					$output .= $this->ambil_reply($row["komentar_id"], $id_news);
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