<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usaha extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_usaha');
        $this->load->model('m_user');
        $this->load->model('m_roleuser');
        // proteksi halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $usaha = $this->m_usaha->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'List Pelaku Usaha Jakarta Barat',
            'usaha'  => $usaha,
            'user'    => $user,
            'isi'   => 'usaha/v_listusaha'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function listusaha($id_user)
    {
        $usaha = $this->m_usaha->detailtiga($id_user);
        $data = array(
            'title' => 'Usaha Saya',
            'usaha'  => $usaha,
            'isi'   => 'usaha/v_listusahasaya'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }


    public function usaha()
    {
        $data = array(
            'title' => 'Peta Usaha',
            'usaha' => $this->m_usaha->get_all_data(),
            'isi'    => 'v_usaha'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function coordinate()
    {
        $data = array(
            'title' => 'Rute',
            'isi'    => 'v_coordinate'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambahusaha()
    {
        $usaha = $this->m_usaha->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'Tambah Usaha Pada Akun',
            'usaha'  => $usaha,
            'user'    => $user,
            'isi'   => 'usaha/v_tambahbaruusaha'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambahusahaform($id_user)
    {
        $user = $this->m_user->detail($id_user);
        $data = array(
            'title' => 'Tambah Usaha: ' . $user->name,
            'id_user'    => $id_user,
            'isi'   => 'usaha/v_addusaha'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function listing()
    {
        $usaha = $this->m_usaha->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'List Pelaku Usaha Jakarta Barat',
            'usaha'  => $usaha,
            'user'    => $user,
            'isi'   => 'usaha/v_listusaha'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambah($id_user)
    {
        $user = $this->m_user->detail($id_user);
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_usaha',
            'Nama Usaha',
            'required|is_unique[usaha.nama_usaha]',
            array(
                'required'  => '%s harus diisi',
                'is_unique' => '%s sudah ada. Buat Nama Baru!'
            )
        );


        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Tambah Usaha: ' . $user->name,
                'user' => $user,
                'isi'   => 'usaha/v_addusaha'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
            //masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_user'                  => $id_user,
                'alamat_usaha'             => $i->post('alamat_usaha'),
                'kecamatan'                => $i->post('kecamatan'),
                'hp'                       => $i->post('hp'),
                'nama_usaha'               => $i->post('nama_usaha'),
                'jenis_usaha'              => $i->post('jenis_usaha'),
                'lat_lng'                  => $i->post('latitude') . ', ' . $i->post('longitude'),
                'link_gmaps'               => $i->post('link_gmaps'),
                'ig'                       => $i->post('ig'),
                'fb'                       => $i->post('fb'),
                'tiktok'                   => $i->post('tiktok'),
                'shopee'                   => $i->post('shopee'),
                'tokopedia'                => $i->post('tokopedia'),
                'gofood'                   => $i->post('gofood'),
                'no_izinusaha'             => $i->post('no_izinusaha'),
                'no_izinhalal'             => $i->post('no_izinhalal'),
                'no_pirt'                  => $i->post('no_pirt'),
            );
            $this->m_usaha->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            if ($_SESSION['role'] == '2') {
                redirect(base_url('usaha/listusaha/' . $_SESSION['id_user']), 'refresh');
            } else {
                redirect(base_url('usaha'), 'refresh');
            }
            //redirect(base_url('usaha'),'refresh');   
        }
        //end database
    }

    public function edit($id_usaha)
    {
        $usaha = $this->m_usaha->detail($id_usaha);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_usaha',
            'Nama Usaha',
            'required',
            array('required'  => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Edit Usaha',
                'usaha'  => $usaha,
                'isi'   => 'usaha/v_editusaha'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
            //masuk database
        } else {
            $i              = $this->input;
            //$roleuser  = url_title($this->input->post('role_name'), 'dash', TRUE);
            $data = array(
                'id_usaha'                 => $id_usaha,
                'id_user'                  => $usaha->id_user,
                'alamat_usaha'             => $i->post('alamat_usaha'),
                'kecamatan'                => $i->post('kecamatan'),
                'hp'                       => $i->post('hp'),
                'nama_usaha'               => $i->post('nama_usaha'),
                'jenis_usaha'              => $i->post('jenis_usaha'),
                'lat_lng'                  => $i->post('latitude') . ', ' . $i->post('longitude'),
                'link_gmaps'               => $i->post('link_gmaps'),
                'ig'                       => $i->post('ig'),
                'fb'                       => $i->post('fb'),
                'tiktok'                   => $i->post('tiktok'),
                'shopee'                   => $i->post('shopee'),
                'tokopedia'                => $i->post('tokopedia'),
                'gofood'                   => $i->post('gofood'),
                'no_izinusaha'             => $i->post('no_izinusaha'),
                'no_izinhalal'             => $i->post('no_izinhalal'),
                'no_pirt'                  => $i->post('no_pirt'),
            );
            $this->m_usaha->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            if ($_SESSION['role'] == '2') {
                redirect(base_url('usaha/listusaha/' . $_SESSION['id_user']), 'refresh');
            } else {
                redirect(base_url('usaha'), 'refresh');
            }
            //redirect(base_url('usaha'),'refresh');   
        }
        //end database
    }

    public function delete($id_usaha)
    {
        $data = array('id_usaha' => $id_usaha);
        $this->m_usaha->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        if ($_SESSION['role'] == '2') {
            redirect(base_url('usaha/listusaha/' . $_SESSION['id_user']), 'refresh');
        } else {
            redirect(base_url('usaha'), 'refresh');
        }
        //redirect(base_url('usaha'),'refresh');  
    }
}

/* End of file Usaha.php */
/* Location: ./application/controllers/Usaha.php */