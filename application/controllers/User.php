<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


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
        $data = array(
            'title' => 'Data Pengguna',
            'user'  => $user,
            'isi'   => 'users/v_datauser'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function add()
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
                'title' => 'Tambah Pengguna',
                'isi'   => 'users/v_adduser'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
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
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');
            redirect(base_url('user'), 'refresh');
        }
        //end database
    }

    public function edit($id_user)
    {
        $user = $this->m_user->detail($id_user);
        //var_dump($user->password);

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

        if ($valid->run()) {
            // cek jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {
                var_dump('tes run');
                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']  = '2400'; // dalam kb
                $config['max_width']  = '2024';
                $config['max_height']  = '2024';

                // $this->load->library('upload', $config);
                $this->upload->initialize($config);
                // $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) { //gambar adalah name dari tag upload yg ada di tambah.php
                    // end validasi
                    var_dump($this->upload->display_errors());
                    $data = array(
                        'title' => 'Edit Pengguna',
                        'user'  => $user,
                        'error' => $this->upload->display_errors(),
                        'isi'   => 'users/v_edituser'
                    );
                    $this->load->view('template/v_wrapper', $data, FALSE);

                    //masuk database
                } else {
                    var_dump('tes upload');
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //create thumbnail image
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
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
                    //slug produk
                    //$slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                    $data = array(
                        'id_user'           => $id_user,
                        'name'              => $i->post('name'),
                        'email'             => $i->post('email'),
                        'username'          => $i->post('username'),
                        'password'          => $user->password,
                        'role'              => $i->post('role'),
                        'niknip'              => $i->post('niknip'),
                        'nohp'              => $i->post('nohp'),
                        'jabatan'              => $i->post('jabatan'),
                        'alamat'              => $i->post('alamat'),
                        //disimpan nama filenya
                        'gambar'            => $upload_gambar['upload_data']['file_name']

                    );
                    $this->m_user->edit($data);
                    $this->session->set_flashdata('sukses', 'Data Telah Diedit');
                    if (uri_string() == 'user/edit/' . $id_user) {
                        redirect(base_url('user/edit/' . $id_user), 'refresh');
                    } else {
                        redirect(base_url('user'), 'refresh');
                    }
                }
            } else {
                //edit produk tanpa ganti gambar
                $i = $this->input;
                //slug produk
                // $slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_user'           => $id_user,
                    'name'              => $i->post('name'),
                    'email'             => $i->post('email'),
                    'username'          => $i->post('username'),
                    'password'          => $user->password,
                    'role'              => $i->post('role'),
                    'niknip'              => $i->post('niknip'),
                    'nohp'              => $i->post('nohp'),
                    'jabatan'              => $i->post('jabatan'),
                    'alamat'              => $i->post('alamat'),
                );
                $this->m_user->edit($data);
                $this->session->set_flashdata('sukses', 'Data Telah Diedit');
                if (uri_string() == 'user/edit/' . $id_user) {
                    redirect(base_url('user/edit/' . $id_user), 'refresh');
                } else {
                    redirect(base_url('user'), 'refresh');
                }
            }
        }
        //end database
        $data = array(
            'title' => 'Edit Pengguna',
            'user'  => $user,
            'isi'   => 'users/v_edituser'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);


        // asli
        // if ($valid->run() === FALSE) {
        //     $data = array(
        //         'title' => 'Edit Pengguna',
        //         'user'  => $user,
        //         'isi'   => 'users/v_edituser'
        //     );
        //     $this->load->view('template/v_wrapper', $data, FALSE);
        //     //masuk database
        // } else {
        //     $i = $this->input;
        //     $data = array(
        //         'id_user'           => $id_user,
        //         'name'              => $i->post('name'),
        //         'email'             => $i->post('email'),
        //         'username'          => $i->post('username'),
        //         'password'          => $user->password,
        //         'role'              => $i->post('role')
        //     );
        //     $this->m_user->edit($data);
        //     $this->session->set_flashdata('sukses', 'Data Telah Diedit');
        //     if (uri_string() == 'user/edit/' . $id_user) {
        //         redirect(base_url('user/edit/' . $id_user), 'refresh');
        //     } else {
        //         redirect(base_url('user'), 'refresh');
        //     }
        //     //redirect(base_url('user'),'refresh');   
        // }
        // //end database
    }

    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('user'), 'refresh');
    }

    public function profil($id_user)
    {
        $user = $this->m_user->detail($id_user);
        $data = array(
            'title' => 'Profile Anda',
            'user'  => $user,
            'isi'   => 'users/v_profil'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }
}

/* End of file User.php */
