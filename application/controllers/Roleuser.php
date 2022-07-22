<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Roleuser extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_roleuser');
        // proteksi halaman
        $this->simple_login->cek_login();
    }
    
    // Data Role User
    public function index()
    {
        $roleusers = $this->m_roleuser->listing();
        $data = array(  'title' => 'Data Role User',
                        'roleusers'  => $roleusers,
                        'isi'   => 'roleuser/v_roleuser'
                    );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambah()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('role_name', 'Nama Role User', 'required|is_unique[roleusers.role_name]', 
                array(  'required'  => '%s harus diisi',
                        'is_unique' => '%s sudah ada. Buat Role Baru!'));

        
        if($valid->run()===FALSE){
            $data = array(  'title' => 'Tambah Role User',
                            'isi'   => 'roleuser/v_addroleuser'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i = $this->input;
            $data = array( 
                            'role_name'     => $i->post('role_name')
                        );
            $this->m_roleuser->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            redirect(base_url('roleuser'),'refresh');   
        }
        //end database
    }

    public function edit($id_roleuser)
    {
        $roleuser = $this->m_roleuser->detail($id_roleuser);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('role_name', 'Nama Role User', 'required', 
                array(  'required'  => '%s harus diisi'));

        if($valid->run()===FALSE){
            $data = array(  'title' => 'Edit Role User',
                            'roleuser'  => $roleuser,
                            'isi'   => 'roleuser/v_editroleuser'
                        );
            $this->load->view('template/v_wrapper', $data, FALSE);
        //masuk database
        }else {
            $i              = $this->input;
            //$roleuser  = url_title($this->input->post('role_name'), 'dash', TRUE);
            $data = array( 
                'id_roleuser'           => $id_roleuser,
                'role_name'         => $i->post('role_name')  
            );
            $this->m_roleuser->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit');
            redirect(base_url('roleuser'),'refresh');   
        }
        //end database
    }

    public function delete($id_roleuser){
        $data = array('id_roleuser' => $id_roleuser);
        $this->m_roleuser->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('roleuser'),'refresh');  
    }

}

/* End of file Roleuser.php */
