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

}
?>