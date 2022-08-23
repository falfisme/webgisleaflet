<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_usaha');
		$this->load->model('m_frontpage');


	}
    // halaman utama website
    public function index()
    {
    	// $site = $this->konfigurasi_model->listing();
    	// $kategori = $this->konfigurasi_model->nav_produk();
    	$produk = $this->m_produk->home();
		$carousel = $this->m_frontpage->gambar();

        $data 	= array('title' 	=> 'SIG IKM Jakbar',
						'produk' 	=> $produk,
						'carousel'  => $carousel,
                      	'isi'  		=> 'frontpage/home/list');
        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
        
    }

	public function maps()
    {
    	$map = '';
    	// $kategori = $this->konfigurasi_model->nav_produk();
    	// $produk = $this->produk_model->home();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// collect value of input field
			$kategori = $_POST['kategori'];
			$kecamatan = $_POST['kecamatan'];
			if ( $kecamatan == 'semua' && $kategori == 'semua'){
				$map = $this->m_usaha->get_all_data();
			}else if ($kategori == 'semua') {
				$map = $this->m_usaha->map_kec($kecamatan);
			} else if ($kecamatan == 'semua') {
				// var_dump('test3');
				$map = $this->m_usaha->map_kat($kategori);
			}else if ( $kecamatan != 'semua' && $kategori != 'semua'){
				// var_dump('test4');
				$map = $this->m_usaha->map($kategori, $kecamatan);
			}
		}else{
			$map = $this->m_usaha->get_all_data();
		}

        $data 	= array('title' 	=> 'Maps SIG IKM Jakbar',
						'usaha'     => $this->m_usaha->get_all_data(),
                      	'isi'  		=> 'frontpage/maps/list',
						'map'		=> $map
						);
						
        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
        
    }

	 // gambar produk
	 public function carousel(){
        // proteksi halaman
		$this->simple_login->cek_login();

        $gambar = $this->m_frontpage->gambar();
        //var_dump($gambar);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('text_tengah', 'Judul Carousel', 'required', 
                array(  'required'  => '%s harus diisi'));
        
        if($valid->run()){
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size']  = '2400'; // dalam kb
            // $config['max_width']  = '2024';
            // $config['max_height']  = '2024';
            
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            
        if ( ! $this->upload->do_upload('gambar')){ //gambar adalah name dari tag upload yg ada di tambah.php
        // end validasi
        
        $data = array(  'title'     => 'Tambah Carousel',
                        'gambar'    => $gambar,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'frontpage/setting/v_gambar'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
            
        //masuk database
        }else {
            $upload_gambar = array('upload_data' => $this->upload->data());
            
            //create thumbnail image
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            // // lokasi folder thumbnail
            // $config['new_image']        = './assets/upload/image/thumbs/';
            // $config['create_thumb']     = TRUE;
            // $config['maintain_ratio']   = TRUE;
            // $config['width']            = 250;
            // $config['height']           = 250;
            // $config['thumb_marker']     = "";

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end thumbnail

            $i = $this->input;

            $data = array(  'text_atas'      => $i->post('text_atas'),
							'text_tengah'      => $i->post('text_tengah'),
							'text_button'      => $i->post('text_button'),
							'link'      => $i->post('link'),			
                            //disimpan nama filenya
                            'gambar'            => $upload_gambar['upload_data']['file_name']
                        );
            $this->m_frontpage->tambah_gambar($data);
            $this->session->set_flashdata('sukses', 'Gambar Telah Ditambahkan');
            redirect(base_url('frontpage/carousel'),'refresh');   
        }}
        //end database
        $data = array(      'title'       => 'Tambah Carousel',
                            'gambar'      => $gambar,
                            'isi'         => 'frontpage/setting/v_gambar'
        ); 
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

	public function delete_carousel($id_carousel){
        // proteksi halaman
		$this->simple_login->cek_login();
        
        // Proses hapus gambar
        $gambar = $this->m_frontpage->detail_gambar($id_carousel);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        //end proses hapus
        $data = array('id_carousel' => $id_carousel);
        $this->m_frontpage->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar Telah Dihapus');
        redirect(base_url('frontpage/carousel'),'refresh');  
    }

}

/* End of file Home.php */

?>