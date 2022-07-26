<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_usaha');
		$this->load->model('m_user');
		$this->load->model('m_produk');
	}

	public function index()
	{
		$this->simple_login->cek_login();
		// var_dump($_SESSION);
		$usaha = $this->m_usaha->get_all_data();
		$role = $this->m_user->detailrole(2);
		$produk = $this->m_produk->get_all_data();
		$total = $this->m_produk->total_produk();
		//var_dump($total->total);

		if ($_SESSION['role'] == 1) {

			$data = array(
				'title' => 'Admin Dashboard',
				'usaha' => $usaha,
				'role' => $role,
				'produk' => $produk,
				'belumverif' => $this->m_produk->belum_verif(),
				'total' => $total->total,
				'isi'	=> 'v_home'
			);
		} else {

			$data = array(
				'title' => 'Selamat Datang ' . $this->m_user->detail($_SESSION['id_user'])->name,
				'usaha' => $usaha,
				'role' => $role,
				'isi'	=> 'v_home'
			);
		};

		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function marker()
	{
		$data = array(
			'title' => 'Marker (Penanda Lokasi Peta)',
			'isi'	=> 'v_marker'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function usaha()
	{
		$data = array(
			'title' => 'Peta Usaha',
			'usaha' => $this->m_usaha->get_all_data(),
			'isi'	=> 'v_usaha'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function route()
	{
		$data = array(
			'title' => 'Rute',
			'isi'	=> 'v_route'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function coordinate()
	{
		$data = array(
			'title' => 'Rute',
			'isi'	=> 'v_coordinate'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function geojson()
	{
		$data = array(
			'title' => 'Wilayah Jakbar',
			'isi'	=> 'v_geojson'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */