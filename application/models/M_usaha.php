<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_usaha extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('usaha');
        return $this->db->get()->result();        
    }

}

/* End of file M_usaha.php */


