<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usahadetail extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_usaha');
		$this->load->model('m_produk');

		$this->load->model('m_user');
		$this->load->model('m_roleuser');
		
	}
	
	public function index()
	{
		$usaha = $this->m_usaha->detail($id_usaha);
        $data = array(  'title' => $usaha->nama_usaha,
                        'usaha'  => $usaha,
                        'isi'   => 'usaha/v_listusaha'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
	}

    public function profil($id_usaha)
	{
		$usaha = $this->m_usaha->detail($id_usaha);
        // var_dump($usaha);
        $produk = $this->m_produk->detailtiga($usaha->id_user);
        // var_dump($produk);
        $data = array(  'title' => $usaha->nama_usaha,
                        'usaha'  => $usaha,
                        'produk' => $produk,
                        'isi'   => 'frontpage/usaha/list'
                    );
        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
	}


}

/* End of file Usaha.php */
/* Location: ./application/controllers/Usaha.php */