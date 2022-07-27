<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_roleuser');
        //proteksi halaman
        $this->simple_login->cek_login();
    }
    
    // Data User
    public function index()
    {
        $user = $this->m_user->listing();
        $data = array(  'title' => 'Data Pengguna',
                        'user'  => $user,
                        'isi'   => 'users/v_datauser'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('name', 'Nama Lengkap', 'required', 
                array(  'required'  => '%s harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email', 
                array(  'required'      => '%s harus diisi',
                        'valid_email'   => '%s tidak valid'));

        $valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[32](is.unique[
            users.username])', 
                array(  'required'      => '%s harus diisi',
                        'min_length'    => '%s minimal 6 karakter',
                        'max_length'    => '%s maksimal 32 karakter',
                        'is_unique'     => '%s sudah ada, Buat username baru'));

        $valid->set_rules('password', 'Password', 'required', 
                array(  'required'  => '%s harus diisi'));

        if($valid->run()===FALSE){
            $data = array(  'title' => 'Tambah Pengguna',
                            'isi'   => 'users/v_adduser'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i = $this->input;
            $data = array(  'name'              => $i->post('name'),
                            'email'             => $i->post('email'),
                            'username'          => $i->post('username'),
                            'password'          => SHA1($i->post('password')),
                            'role'              => $i->post('role')
                        );
            $this->m_user->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            redirect(base_url('user'),'refresh');   
        }
        //end database
    }

    public function edit($id_user)
    {
        $user = $this->m_user->detail($id_user);
        var_dump($user->password);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('name', 'Nama Lengkap', 'required', 
                array(  'required'  => '%s harus diisi'));

        $valid->set_rules('email', 'Email', 'required|valid_email', 
                array(  'required'      => '%s harus diisi',
                        'valid_email'   => '%s tidak valid'));

        $valid->set_rules('password', 'Password', 'required', 
                array(  'required'  => '%s harus diisi'));

        if($valid->run()===FALSE){
            $data = array(  'title' => 'Edit Pengguna',
                            'user'  => $user,
                            'isi'   => 'users/v_edituser'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i = $this->input;
            $data = array(  'id_user'           => $id_user,
                            'name'              => $i->post('name'),
                            'email'             => $i->post('email'),
                            'username'          => $i->post('username'),
                            'password'          => $user->password,
                            'role'              => $i->post('role')
                        );
            $this->m_user->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('user'),'refresh');   
        }
        //end database
    }

    public function delete($id_user){
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('user'),'refresh');  
    }

}

/* End of file User.php */
