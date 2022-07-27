<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Frontpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_usaha');

	}
    // halaman utama website
    public function index()
    {
    	// $site = $this->konfigurasi_model->listing();
    	// $kategori = $this->konfigurasi_model->nav_produk();
    	$produk = $this->m_produk->home();

        $data 	= array('title' 	=> 'SIG IKM Jakbar',
						'produk' 	=> $produk,
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

}

/* End of file Home.php */

?>