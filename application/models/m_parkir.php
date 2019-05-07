<?php

class M_parkir extends CI_Model {

    var $tabel = 'tbl_parkir'; 

    function __construct() {
        parent::__construct();
    }

     function get_allmember() {
        $this->db->from($this->tabel);
        $query = $this->db->get(); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}

?>