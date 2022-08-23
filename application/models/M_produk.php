<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function getalldata()
    {
        $this->db->select('*');
        $this->db->from('usaha');
        $this->db->join('produk', 'produk.id_usaha = usaha.id_usaha', 'inner');
        $this->db->order_by('bazar', 'desc');
        $query = $this->db->get();
        return $query->result();
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

    // detail 3 : mengumpulkan produk berdasarkan id user
    public function detailtiga($id_user)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function home()
    {
        $this->db->select('produk.*, 
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
    public function tambah_gambar($data)
    {
        $this->db->insert('gambar', $data);
    } //delete gambar
    public function delete_gambar($data)
    {
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

    //total produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    }

    // produk
    public function produk($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function produksearch($limit, $start, $keyword)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('deskripsi_produk', $keyword);
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //filter kategori dan kecamatan
    public function filterkatkec($kategori, $kecamatan)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('usaha', 'usaha.id_usaha = produk.id_usaha', 'inner');
        $this->db->where('jenis_usaha', $kategori);
        $this->db->where('kecamatan', $kecamatan);
        // $this->db->order_by('id_usaha', 'desc');
        return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
    }

    public function filterkat($kategori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('usaha', 'usaha.id_usaha = produk.id_usaha', 'inner');
        $this->db->where('jenis_usaha', $kategori);
        // $this->db->order_by('id_usaha', 'desc');
        return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
    }

    public function filterkec($kecamatan)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('usaha', 'usaha.id_usaha = produk.id_usaha', 'inner');
        $this->db->where('kecamatan', $kecamatan);
        // $this->db->order_by('id_usaha', 'desc');
        return $this->db->get()->result();
        //  $query = $this->db->get();
        //  return $query->row();
    }

    //total foto produk
    public function total_foto_produk($id_produk)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get();
        return $query->row();
    }

    ///////////////////
    // BAZAR

    // detail bazar
    public function detailbazar($id_bazar)
    {
        $this->db->select('*');
        $this->db->from('bazar');
        $this->db->where('id_bazar', $id_bazar);
        $query = $this->db->get();
        return $query->row();
    }

    //edit data
    public function edit_konfigurasi_bazar($data)
    {
        $id_bazar = 1;
        $this->db->where('id_bazar', $id_bazar);
        $this->db->update('bazar', $data);
    }

    // produk bazar
    public function produkbazar($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk.status_produk', 'Publish');
        $this->db->where('produk.bazar', '1');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    //total produk bazar
    public function total_produkbazar()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('produk.bazar', '1');
        $query = $this->db->get();
        return $query->row();
    }


    public function belum_verif()
    {
        $this->db->select('*');
        $this->db->from('usaha');
        $this->db->join('produk', 'produk.id_usaha = usaha.id_usaha', 'inner');
        $this->db->where('verif', '0');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function verified()
    {
        $this->db->select('*');
        $this->db->from('usaha');
        $this->db->join('produk', 'produk.id_usaha = usaha.id_usaha', 'inner');
        $this->db->where('verif', '1');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('deskripsi_produk', $keyword);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
}

/* End of file M_produk.php */
