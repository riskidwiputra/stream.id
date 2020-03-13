<?php 

class About_Model extends Model
{ 
    public function selectcontact()
    {
        $this->db->table('contact')->all();
        return $this->db->resultSet();
    }

    public function selectFaq()
    {
        $this->db->table('faqs')->all();
        return $this->db->resultSet();
    }

    public function selectSponsor()
    {
        $this->db->table('sponsors')->all();
        return $this->db->resultSet();
    }

    public function gallery()
    {
        $this->db->query('SELECT * FROM gallery ORDER BY position ASC');
        return $this->db->resultSet();
    }

    public function videos()
    {
        $this->db->table('videos')->all();
        return $this->db->resultSet();
    }

    public function likeGallery($id)
    {
        $likeGallery = $this->db->table('gallery_like')->countRows('gallery_id', $id);
        $data = [
            'id'    => uniqid(),
            'gallery_id' => $id,
            'users_id'  => Session::get('users'),
            'date'      => date('Y-m-d H:i:s')
        ];

        $this->db->table('gallery_like')->insert($data);
        echo json_encode([
            'status'    => true,
            'content'   => $likeGallery+1
        ]);
    }
} 