<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_user');
        $this->load->model('m_usaha');
		$this->load->model('m_roleuser');
		// proteksi halaman
		$this->simple_login->cek_login();
		
	}
	
	public function index()
	{
		$produk = $this->m_produk->get_all_data();
		$user = $this->m_user->listing();
        $data = array(  'title' => 'List Produk Pelaku Usaha Jakarta Barat',
                        'produk'  => $produk,
						'user'	=> $user,
                        'isi'   => 'produk/v_listproduk'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
	}


    public function tambahproduk()
	{
		$usaha = $this->m_usaha->get_all_data();
		$user = $this->m_user->listing();
        $data = array(  'title' => 'List Produk Pelaku Usaha Jakarta Barat',
                        'usaha'  => $usaha,
						'user'	=> $user,
                        'isi'   => 'produk/v_tambahbaruproduk'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
	}

    public function tambahprodukform($id_user)
	{
        $user = $this->m_user->detail($id_user);
        $data = array(  'title' => 'Tambah produk: '.$user->name,
						'id_user'	=> $id_user,
                        'isi'   => 'produk/v_addproduk'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
	}

    public function listing()
	{
		$produk = $this->m_produk->get_all_data();
		$user = $this->m_user->listing();
        $data = array(  'title' => 'List Pelaku produk Jakarta Barat',
                        'produk'  => $produk,
						'user'	=> $user,
                        'isi'   => 'produk/v_listproduk'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
	}
    
	public function tambah($id_user, $id_usaha)
    {
        $user = $this->m_user->detail($id_user);
        $usaha = $this->m_usaha->detail($id_usaha);
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama produk', 'required', 
                array(  'required'  => '%s harus diisi')); 

        
        if($valid->run()===FALSE){
            $data = array(  'title' => 'Tambah produk: '.$usaha->nama_usaha,
                            'user' => $user,
                            'usaha' => $usaha,
                            'isi'   => 'produk/v_addproduk'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i = $this->input;
            $data = array( 
                'id_user'                   => $i->post('id_user'),
                'id_usaha'                  => $i->post('id_usaha'),
                'nama_produk'               => $i->post('nama_produk'),  
                'deskripsi_produk'          => $i->post('deskripsi_produk'),  
                'foto'                      => $i->post('foto'),  
                'cta'                       => $i->post('cta'),  
                'harga'                     => $i->post('harga'),  
                'promo'                     => $i->post('promo')  
                        );
            $this->m_produk->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            redirect(base_url('produk'),'refresh');   
        }
        //end database
    }

    public function edit($id_produk)
    {
        $produk = $this->m_produk->detail($id_produk);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_produk', 'Nama produk', 'required', 
                array(  'required'  => '%s harus diisi'));

        if($valid->run()===FALSE){
            $data = array(  'title' => 'Edit produk',
                            'produk'  => $produk,
                            'isi'   => 'produk/v_editproduk'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i              = $this->input;
            //$roleuser  = url_title($this->input->post('role_name'), 'dash', TRUE);
            $data = array( 
                'id_user'                   => $i->post('id_user'),
                'id_produk'                 => $id_produk,
                'id_usaha'                  => $i->post('id_usaha'),
                'nama_produk'               => $i->post('nama_produk'),  
                'deskripsi_produk'          => $i->post('deskripsi_produk'),  
                'foto'                      => $i->post('foto'),  
                'cta'                       => $i->post('cta'),  
                'harga'                     => $i->post('harga'),  
                'promo'                     => $i->post('promo')  
            );
            $this->m_produk->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('produk'),'refresh');   
        }
        //end database
    }

    public function delete($id_produk){
        $data = array('id_produk' => $id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('produk'),'refresh');  
    }


    // gambar produk
    public function gambar($id_produk){
        $produk = $this->m_produk->detail($id_produk);
        $gambar = $this->m_produk->gambar($id_produk);
        //var_dump($gambar);

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
            
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            
        if ( ! $this->upload->do_upload('gambar')){ //gambar adalah name dari tag upload yg ada di tambah.php
        // end validasi
        
        $data = array(  'title'     => 'Tambah Gambar Produk: '.$produk->nama_produk,
                        'produk'    => $produk,
                        'gambar'    => $gambar,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'produk/v_gambar'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
            
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

            $data = array(  'id_produk'         => $id_produk,
                            'judul_gambar'      => $i->post('judul_gambar'),
                            //disimpan nama filenya
                            'gambar'            => $upload_gambar['upload_data']['file_name']
                        );
            $this->m_produk->tambah_gambar($data);
            $this->session->set_flashdata('sukses', 'Gambar Telah Ditambahkan');
            redirect(base_url('produk/gambar/'.$id_produk),'refresh');   
        }}
        //end database
        $data = array(      'title'       => 'Tambah Gambar Produk: '.$produk->nama_produk,
                            'produk'      => $produk,
                            'gambar'      => $gambar,
                            'isi'         => 'produk/v_gambar'
        ); 
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function delete_gambar($id_produk, $id_gambar){
        // Proses hapus gambar
        $gambar = $this->m_produk->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        //end proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->m_produk->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar Telah Dihapus');
        redirect(base_url('produk/gambar/'.$id_produk),'refresh');  
    }


}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */