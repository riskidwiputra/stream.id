<?php 

	class Tournament_Model extends Model
	{ 
	    public function selectAll()
		{	
			$this->db->query("SELECT * FROM tournament JOIN kompetisi ON tournament.kompetisi=kompetisi.id_kompetisi ORDER BY created_at DESC"); 
            return $this->db->resultSet();
        }
    }