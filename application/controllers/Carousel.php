<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('carousel_model');
    
        // proteksi halaman
        $this->simple_login->cek_login();
    }
    
    // Data carousel
    public function index()
    {
        $carousel = $this->carousel_model->listing();
        $data = array(  'title' => 'Data carousel',
                        'carousel'  => $carousel,
                        'isi'   => 'carousel/v_listcarousel'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function gambar($id_carousel){
        $carousel = $this->carousel_model->detail($id_carousel);
        $gambar = $this->carousel_model->gambar($id_carousel);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('judul_gambar', 'Judul/Nama Gambar', 'required', 
                array(  'required'  => '%s harus diisi'));
        
        if($valid->run()){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; // dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){ //gambar adalah name dari tag upload yg ada di tambah.php
        // end validasi
        
        $data = array(  'title'     => 'Tambah Gambar carousel: '.$carousel->nama_carousel,
                        'carousel'    => $carousel,
                        'gambar'    => $gambar,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/carousel/gambar'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        //masuk database
        }else {
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //create thumbnail image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            // lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;
            $config['height']           = 250;
            $config['thumb_marker']     = "";

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end thumbnail

            $i = $this->input;

            $data = array(  'id_carousel'         => $id_carousel,
                            'judul_gambar'      => $i->post('judul_gambar'),
                            //disimpan nama filenya
                            'gambar'            => $upload_gambar['upload_data']['file_name']
                        );
            $this->carousel_model->tambah_gambar($data);
            $this->session->set_flashdata('sukses', 'Gambar Telah Ditambahkan');
            redirect(base_url('admin/carousel/gambar/'.$id_carousel),'refresh');   
        }}
        //end database
        $data = array(      'title'       => 'Tambah Gambar carousel: '.$carousel->nama_carousel,
                            'carousel'      => $carousel,
                            'gambar'      => $gambar,
                            'isi'         => 'admin/carousel/gambar'
        ); 
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        // Ambil data kategori
        $kategori = $this->kategori_model->listing();
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_carousel', 'Nama carousel', 'required', 
                array(  'required'  => '%s harus diisi'));

        $valid->set_rules('kode_carousel', 'Kode carousel', 'required|is_unique[carousel.kode_carousel]', 
                array(  'required'  => '%s harus diisi',
                        'is_unique' => '%s sudah ada, Buat Kode carousel Baru!'));
        
        if($valid->run()){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '24000'; // dalam kb
            $config['max_width']  = '20240';
            $config['max_height']  = '20240';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){ //gambar adalah name dari tag upload yg ada di tambah.php
        // end validasi
        
        $data = array(  'title'     => 'Tambah carousel',
                        'kategori'  => $kategori,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/carousel/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        //masuk database
        }else {
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //create thumbnail image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            // lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;
            $config['height']           = 250;
            $config['thumb_marker']     = "";

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end thumbnail

            $i = $this->input;
            //slug carousel
            $slug_carousel = url_title($this->input->post('nama_carousel').'-'.$this->input->post('kode_carousel'), 'dash', TRUE);
            $data = array(  'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_carousel'       => $i->post('kode_carousel'),
                            'nama_carousel'       => $i->post('nama_carousel'),
                            'slug_carousel'       => $slug_carousel,
                            'keterangan'        => $i->post('keterangan'),
                            'keywords'           => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            //disimpan nama filenya
                            'gambar'            => $upload_gambar['upload_data']['file_name'],
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_carousel'     => $i->post('status_carousel'),
                            'tanggal_post'      => date('Y-m-d H:i:s')
                        );
            $this->carousel_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            redirect(base_url('admin/carousel'),'refresh');   
        }}
        //end database
        $data = array(      'title'       => 'Tambah carousel',
                            'kategori'    => $kategori,
                            'isi'         => 'admin/carousel/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function edit($id_carousel)
    {
        // Ambil detail carousel yang sudah dibuat di carousel model
        $carousel = $this->carousel_model->detail($id_carousel);
        // Ambil data kategori
        $kategori = $this->kategori_model->listing();

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_carousel', 'Nama carousel', 'required', 
                array(  'required'  => '%s harus diisi'));

        $valid->set_rules('kode_carousel', 'Kode carousel', 'required', 
                array(  'required'  => '%s harus diisi'));
        
        if($valid->run()){
            // cek jika gambar diganti
            if(!empty($_FILES['gambar']['name'])){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; // dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';
            
            $this->load->library('upload', $config);
            
        if ( ! $this->upload->do_upload('gambar')){ //gambar adalah name dari tag upload yg ada di tambah.php
        // end validasi
        
        $data = array(  'title'     => 'Edit carousel: '.$carousel->nama_carousel,
                        'kategori'  => $kategori,
                        'carousel'    => $carousel,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/carousel/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        //masuk database
        }else {
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //create thumbnail image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            // lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;
            $config['height']           = 250;
            $config['thumb_marker']     = "";

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end thumbnail

            $i = $this->input;
            //slug carousel
            $slug_carousel = url_title($this->input->post('nama_carousel').'-'.$this->input->post('kode_carousel'), 'dash', TRUE);
            $data = array(  'id_carousel'         => $id_carousel,
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_carousel'       => $i->post('kode_carousel'),
                            'nama_carousel'       => $i->post('nama_carousel'),
                            'slug_carousel'       => $slug_carousel,
                            'keterangan'        => $i->post('keterangan'),
                            'keywords'           => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            //disimpan nama filenya
                            'gambar'            => $upload_gambar['upload_data']['file_name'],
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_carousel'     => $i->post('status_carousel')
                           
                        );
            $this->carousel_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('admin/carousel'),'refresh');   
        }}else{
            //edit carousel tanpa ganti gambar
             $i = $this->input;
            //slug carousel
            $slug_carousel = url_title($this->input->post('nama_carousel').'-'.$this->input->post('kode_carousel'), 'dash', TRUE);
            $data = array(  'id_carousel'         => $id_carousel,
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_kategori'       => $i->post('id_kategori'),
                            'kode_carousel'       => $i->post('kode_carousel'),
                            'nama_carousel'       => $i->post('nama_carousel'),
                            'slug_carousel'       => $slug_carousel,
                            'keterangan'        => $i->post('keterangan'),
                            'keywords'           => $i->post('keywords'),
                            'harga'             => $i->post('harga'),
                            'stok'              => $i->post('stok'),
                            //GAMBAR TIDAK DIGANTI
                            //'gambar'            => $upload_gambar['upload_data']['file_name'],
                            'berat'             => $i->post('berat'),
                            'ukuran'            => $i->post('ukuran'),
                            'status_carousel'     => $i->post('status_carousel')
                           
                        );
            $this->carousel_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('admin/carousel'),'refresh');   
        }} 
        //end database
        $data = array(      'title'       => 'Edit carousel: '.$carousel->nama_carousel, 
                            'kategori'    => $kategori,
                            'carousel'      => $carousel,
                            'isi'         => 'admin/carousel/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function delete($id_carousel){
        // Proses hapus gambar
        $carousel = $this->carousel_model->detail($id_carousel);
        unlink('./assets/upload/image/'.$carousel->gambar);
        unlink('./assets/upload/image/thumbs/'.$carousel->gambar);
        //end proses hapus
        $data = array('id_carousel' => $id_carousel);
        $this->carousel_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('admin/carousel'),'refresh');  
    }

     public function delete_gambar($id_carousel, $id_gambar){
        // Proses hapus gambar
        $gambar = $this->carousel_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        //end proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->carousel_model->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar Telah Dihapus');
        redirect(base_url('admin/carousel/gambar/'.$id_carousel),'refresh');  
    }

}

/* End of file carousel.php */
