<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_usaha');
		
	}
	
	public function index()
	{
		$this->simple_login->cek_login();
		$data = array(
			'title' => 'Admin Dashboard',
			'isi'	=> 'v_home'
		 );
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