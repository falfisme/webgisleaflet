<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_carousel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('carousel');
        $this->db->group_by('carousel.id_carousel');
        $this->db->order_by('id_carousel', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function listing_kategori()
    {
        $this->db->select(  'carousel.*, 
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('carousel');
        // JOIN
        $this->db->join('users', 'users.id_user = carousel.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = carousel.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_carousel = carousel.id_carousel', 'left');
        // END JOIN
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->group_by('carousel.id_kategori');
        $this->db->order_by('id_carousel', 'desc');
        $query = $this->db->get();
        return $query->result();



    }
    //listing all carousel home
    public function home()
    {
         $this->db->select(  'carousel.*, 
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('carousel');
        // JOIN
        $this->db->join('users', 'users.id_user = carousel.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = carousel.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_carousel = carousel.id_carousel', 'left');
        // END JOIN
        $this->db->where('carousel.status_carousel', 'Publish');
        $this->db->group_by('carousel.id_carousel');
        $this->db->order_by('id_carousel', 'desc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();    
    }

    //read carousel
    public function read($slug_carousel)
    {
         $this->db->select(  'carousel.*, 
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('carousel');
        // JOIN
        $this->db->join('users', 'users.id_user = carousel.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = carousel.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_carousel = carousel.id_carousel', 'left');
        // END JOIN
        $this->db->where('carousel.status_carousel', 'Publish');
        $this->db->where('carousel.slug_carousel', $slug_carousel);
        $this->db->group_by('carousel.id_carousel');
        $this->db->order_by('id_carousel', 'desc');
        $query = $this->db->get();
        return $query->row();    
    }

    // carousel
    public function carousel($limit, $start)
    {
         $this->db->select(  'carousel.*, 
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('carousel');
        // JOIN
        $this->db->join('users', 'users.id_user = carousel.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = carousel.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_carousel = carousel.id_carousel', 'left');
        // END JOIN
        $this->db->where('carousel.status_carousel', 'Publish');
        $this->db->group_by('carousel.id_carousel');
        $this->db->order_by('id_carousel', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();    
    }

    //total carousel
    public function total_carousel()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('carousel');
        $this->db->where('status_carousel', 'Publish');
        $query = $this->db->get();
        return $query->row();
    }

    // kategori carousel
    public function kategori($id_kategori, $limit, $start)
    {
         $this->db->select(  'carousel.*, 
                            users.nama,
                            kategori.nama_kategori,
                            kategori.slug_kategori,
                            COUNT(gambar.id_gambar) AS total_gambar');
        $this->db->from('carousel'); 
        // JOIN
        $this->db->join('users', 'users.id_user = carousel.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = carousel.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_carousel = carousel.id_carousel', 'left');
        // END JOIN
        $this->db->where('carousel.status_carousel', 'Publish');
        $this->db->where('carousel.id_kategori', $id_kategori);
        $this->db->group_by('carousel.id_carousel');
        $this->db->order_by('id_carousel', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();    
    }

    //total carousel
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('carousel');
        $this->db->where('status_carousel', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->row();
    }
    // detail carousel
    public function detail($id_carousel)
    {
        $this->db->select('*');
        $this->db->from('carousel');
        $this->db->where('id_carousel', $id_carousel);
        $this->db->order_by('id_carousel', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // detail gambar carousel
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Gambar
    public function gambar($id_carousel)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_carousel', $id_carousel);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // tambah data
    public function tambah($data){
        $this->db->insert('carousel', $data);
        
    }

    // tambah gambar
    public function tambah_gambar($data){
        $this->db->insert('gambar', $data);
        
    }

    //edit data
    public function edit($data){
        $this->db->where('id_carousel', $data['id_carousel']);
        $this->db->update('carousel', $data);  
    }

    //delete data
    public function delete($data){
        $this->db->where('id_carousel', $data['id_carousel']);
        $this->db->delete('carousel', $data);  
    }

    //delete gambar
    public function delete_gambar($data){
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);  
    }
}

/* End of file carousel_model.php */
