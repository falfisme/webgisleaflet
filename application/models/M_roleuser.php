<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_roleuser extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('roleusers');
        $this->db->order_by('id_roleuser', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // detail role user
    public function detail($id_roleuser)
    {
        $this->db->select('*');
        $this->db->from('roleusers');
        $this->db->where('id_roleuser', $id_roleuser);
        $this->db->order_by('id_roleuser', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // tambah data
    public function tambah($data){
        $this->db->insert('roleusers', $data);
        
    }

    //edit data
    public function edit($data){
        $this->db->where('id_roleuser', $data['id_roleuser']);
        $this->db->update('roleusers', $data);  
    }

    //delete data
    public function delete($data){
        $this->db->where('id_roleuser', $data['id_roleuser']);
        $this->db->delete('roleusers', $data);  
    }
}

/* End of file M_roleuser.php */
