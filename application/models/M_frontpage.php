<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_frontpage extends CI_Model
{


    public function gambar()
    {
        $this->db->select('*');
        $this->db->from('carousel');
        //$this->db->where('id_carousel', $id_carousel);
        $this->db->order_by('id_carousel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // tambah gambar
    public function tambah_gambar($data)
    {
        $this->db->insert('carousel', $data);
    }

    // detail gambar produk
    public function detail_gambar($id_carousel)
    {
        $this->db->select('*');
        $this->db->from('carousel');
        $this->db->where('id_carousel', $id_carousel);
        // $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_gambar($data)
    {
        $this->db->where('id_carousel', $data['id_carousel']);
        $this->db->delete('carousel', $data);
    }
}

/* End of file M_frontpage.php */
