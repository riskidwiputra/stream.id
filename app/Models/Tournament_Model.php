<?php 

	class Tournament_Model extends Model
	{ 
	    public function selectAll()
		{	
			$this->db->query("SELECT * FROM tournament JOIN kompetisi ON tournament.kompetisi=kompetisi.id_kompetisi"); 
            return $this->db->resultSet();
        }
    }