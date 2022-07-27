<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usaha extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('usaha');
        return $this->db->get()->result();
    }

    // detail role user
    public function detail($id_usaha)
    {
        $this->db->select('*');
        $this->db->from('usaha');
        $this->db->where('id_usaha', $id_usaha);
        $this->db->order_by('id_usaha', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // detail 2
    public function detaildua($id_user)
    {
        $this->db->select('*');
        $this->db->from('usaha');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // tambah data
    public function tambah($data)
    {
        $this->db->insert('usaha', $data);
    }

    //edit data
    public function edit($data)
    {
        $this->db->where('id_usaha', $data['id_usaha']);
        $this->db->update('usaha', $data);
    }

    //delete data
    public function delete($data)
    {
        $this->db->where('id_usaha', $data['id_usaha']);
        $this->db->delete('usaha', $data);
    }

    //filter map
     public function map($kategori, $kecamatan)
     {
         $this->db->select('*');
         $this->db->from('usaha');
         $this->db->where('jenis_usaha', $kategori);
         $this->db->where('kecamatan', $kecamatan);
         $this->db->order_by('id_usaha', 'desc');
         return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
     }
     public function map_kat($kategori)
     {
         $this->db->select('*');
         $this->db->from('usaha');
         $this->db->where('jenis_usaha', $kategori);
         $this->db->order_by('id_usaha', 'desc');
         return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
     }
     public function map_kec($kecamatan)
     {
         $this->db->select('*');
         $this->db->from('usaha');
         $this->db->where('kecamatan', $kecamatan);
         $this->db->order_by('id_usaha', 'desc');
         return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
     }
}

/* End of file M_usaha.php */
