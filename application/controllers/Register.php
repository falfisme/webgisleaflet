<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_roleuser');
    }

    // Data User
    public function index()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'name',
            'Nama Lengkap',
            'required',
            array('required'  => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'      => '%s harus diisi',
                'valid_email'   => '%s tidak valid'
            )
        );

        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[6]|max_length[32](is.unique[
            users.username])',
            array(
                'required'      => '%s harus diisi',
                'min_length'    => '%s minimal 6 karakter',
                'max_length'    => '%s maksimal 32 karakter',
                'is_unique'     => '%s sudah ada, Buat username baru'
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required'  => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Registrasi Pelaku Usaha'
            );
            $this->load->view('v_register', $data, FALSE);
            //masuk database
        } else {
            $i = $this->input;
            $data = array(
                'name'              => $i->post('name'),
                'email'             => $i->post('email'),
                'username'          => $i->post('username'),
                'password'          => SHA1($i->post('password')),
                'role'              => $i->post('role')
            );
            $this->m_user->tambah($data);
            $this->session->set_flashdata('sukses', 'Registrasi Berhasil, Silahkan Masuk Di Halaman ini');
            redirect(base_url('login'), 'refresh');
        }
    }
}
