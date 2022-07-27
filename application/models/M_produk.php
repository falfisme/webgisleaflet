<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }

    // detail role user
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // detail 2
    public function detaildua($id_user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function home()
    {
         $this->db->select(  'produk.*, 
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('produk');
        // JOIN
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        // END JOIN
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();    
    }

    // tambah data
    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    //edit data
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //delete data
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }

    // gambar
     public function gambar($id_produk)
     {
         $this->db->select('*');
         $this->db->from('gambar');
         $this->db->where('id_produk', $id_produk);
         $this->db->order_by('id_gambar', 'desc');
         $query = $this->db->get();
         return $query->result();
     }

     // tambah gambar
    public function tambah_gambar($data){
        $this->db->insert('gambar', $data);
        
    } //delete gambar
    public function delete_gambar($data){
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);  
    }

    // detail gambar produk
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // detail gambar produk
    public function detail_gambar_satu($id_produk)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_gambar', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }
 
}

/* End of file M_produk.php */
