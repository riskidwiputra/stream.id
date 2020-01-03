<?php 

	class News_Model extends Model
	{ 
	    public function select()
		{	
			 $this->db->table('news_game')->query("SELECT * FROM news_game  ORDER BY id_news_game DESC ");

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
			$parent_komentar_id = $_POST['komentar_id'];
			$komentar = $_POST['komen'];
			$nama_pengirim = $_POST['nama_pengirim'];
			$email_pengirim = $_POST['email_pengirim'];

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
			

			// // $tampil = $this->db->query("SELECT * FROM komentar WHERE parent_komentar_id = '0' AND id_news_game = '$id_news' ORDER BY komentar_id DESC");
			// // $tampil = $this->db->resultSet();
			// // var_dump($tampil);
			$data= mysqli_query($this->db->connection(), "SELECT * FROM komentar WHERE parent_komentar_id = '0' AND id_news_game = '$id_news' ORDER BY komentar_id DESC");
			while ($row = mysqli_fetch_array($data)) {
					$output .= '
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
                        <time class="comment__post-date" datetime="2017-08-23">'.$row["date"].'</time>
                    </div>
                    <div class="comment__body">
                       '.$row["komentar"].'
                    </div>
                    <div class="comment__reply">
						<a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["komentar_id"].'">Reply</a>
					</div>
                </div>
            </div>
            ';
			 $output .= $this->ambil_reply($row["komentar_id"], $id_news);
			}
			return $output;
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
			      <time class="comment__post-date" datetime="2017-08-23">'.$row["date"].'</time>
			      </div>
			      <div class="comment__body">
			      '.$row["komentar"].'
			      </div>
			      <div class="comment__reply">
			      <a href="javascript:void(0);" class="comment__reply-link reply" id="'.$row["komentar_id"].'">Reply</a>
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


	}