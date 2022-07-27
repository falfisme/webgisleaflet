<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        // load data model user
        $this->CI->load->model('m_user');
        
    }

    //fungsi login 
    public function login($username, $password)
    {
        $check = $this->CI->m_user->login($username, $password);
        // Jika ada data user, maka create session login
        if ($check){
            $id_user    = $check->id_user;
            $name       = $check->name;
            $role       = $check->role;
            //create session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('name', $name);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('role', $role);
            //redirect kehalaman admin yang di proteksi
            redirect(base_url('home'),'refresh');
            
        }else{
            // kalau tidak benar/ada, suruh login lagi.
            $this->CI->session->set_flashdata('warning', 'Username atau Password salah');
            redirect(base_url('login'),'refresh');
        }
    
    }

    // fungsi cek login
    public function cek_login()
    {
        if( $this->CI->session->userdata('username') == "" ){
            $this->CI->session->set_flashdata('warning', 'Anda Belum Login');
            redirect(base_url('login'),'refresh');
        }
    }

    // fungsi log out 
    public function logout()
    {
        // membuang semua session login 
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('name');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('role');
        // setelah semua dibuang, redirect ke login
        $this->CI->session->set_flashdata('sukses', 'Anda Berhasil logout');
        redirect(base_url('login'),'refresh');
    }

    

}

/* End of file Simple_login.php */

?>