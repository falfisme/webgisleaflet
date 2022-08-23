<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_user');
        $this->load->model('m_usaha');
        $this->load->model('m_roleuser');
    }

    public function index()
    {
        // ambil data total
        $total = $this->m_produk->total_produk();
        // paginasi start
        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/index/';
        $config['total_rows']         = $total->total;
        $config['use_page_numbers']    = TRUE;
        $config['per_page']         = 10;
        $config['uri_segment']         = 3;
        $config['num_links']         = 5;
        $config['full_tag_open']     = '<ul class="pagination">';
        $config['full_tag_close']     = '</ul>';
        $config['first_link']         = 'First';
        $config['first_tag_open']    = '<li>';
        $config['first_tag_close']     = '</li';
        $config['last_link']         = 'Last';
        $config['last_tag_open']     = '<li class="disabled"><li class="active"></li><a href="#">';
        $config['last_tag_close']     = '<span class="sr-only"></span></a></li></li>';
        $config['next_link']         = '&gt;';
        $config['next_tag_open']     = '<div>';
        $config['next_tag_close']     = '</div>';
        $config['prev_link']         = '&lt;';
        $config['prev_tag_open']     = '<div>';
        $config['prev_tag_close']     = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']     = '</b>';
        $config['first_url']        = base_url() . '/produk/';
        $this->pagination->initialize($config);
        // Ambil data produk
        $produk = '';
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        if (isset($_POST['cari'])) {
            $produk = $this->m_produk->produksearch($config['per_page'], $page, $_POST['keyword']);
        } else if (isset($_POST['kategori'])) {
            $kategori = $_POST['kategori'];
            $kecamatan = $_POST['kecamatan'];
            if ($kecamatan == 'semua' && $kategori == 'semua') {
                $produk = $this->m_produk->produk($config['per_page'], $page);
            } else if ($kategori == 'semua') {
                $produk = $this->m_produk->filterkec($kecamatan);
            } else if ($kecamatan == 'semua') {
                // var_dump('test3');
                $produk = $this->m_produk->filterkat($kategori);
            } else if ($kecamatan != 'semua' && $kategori != 'semua') {
                // var_dump('test4');
                $produk = $this->m_produk->filterkatkec($kategori, $kecamatan);
            }
        } else {
            $produk = $this->m_produk->produk($config['per_page'], $page);
        }

        // var_dump($produk);

        // paginasi end

        $data = array(
            'title'             => 'Produk Unggulan',
            'pagin'                => $this->pagination->create_links(),
            'produk'            => $produk,
            //'keyword'           =>  $this->input->get('keyword'),
            'isi'                 => 'frontpage/produk/list'
        );

        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
    }

    public function detail($id_produk)
    {
        $produk         = $this->m_produk->detail($id_produk);
        $gambar            = $this->m_produk->gambar($id_produk);
        $produk_related    = $this->m_produk->home();
        $usaha          = $this->m_usaha->detail($produk->id_usaha);


        $data = array(
            'title'             => $produk->nama_produk,
            'produk'            => $produk,
            'usaha'             => $usaha,
            'isi'                 => 'frontpage/produk/detail',
            'produk_related'    => $produk_related,
            'gambar'            => $gambar
        );

        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
    }

    public function listproduk()
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $produk = $this->m_produk->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'List Produk Pelaku Usaha Jakarta Barat',
            'produk'  => $produk,
            'user'    => $user,
            'isi'     => 'produk/v_listproduk'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    // untuk pelaku usaha
    public function listproduks($id_user)
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $produk = $this->m_produk->detailtiga($id_user);
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'Produk Saya',
            'produk'  => $produk,
            'user'    => $user,
            'isi'   => 'produk/v_listproduk'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }


    public function tambahproduk()
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $usaha = $this->m_usaha->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'List Produk Pelaku Usaha Jakarta Barat',
            'usaha'  => $usaha,
            'user'    => $user,
            'isi'   => 'produk/v_tambahbaruproduk'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambahproduks($id_user)
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $usaha = $this->m_usaha->detailtiga($id_user);
        $data = array(
            'title' => 'List Usaha Saya',
            'usaha'  => $usaha,
            'isi'   => 'produk/v_tambahbaruproduks'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambahprodukform($id_user)
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $user = $this->m_user->detail($id_user);
        $data = array(
            'title' => 'Tambah produk: ' . $user->name,
            'id_user'    => $id_user,
            'isi'   => 'produk/v_addproduk'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function listing()
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $produk = $this->m_produk->get_all_data();
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'List Pelaku produk Jakarta Barat',
            'produk'  => $produk,
            'user'    => $user,
            'isi'   => 'produk/v_listproduk'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function tambah($id_user, $id_usaha)
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        //var_dump($_SESSION);

        $user = $this->m_user->detail($id_user);
        $usaha = $this->m_usaha->detail($id_usaha);
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array('required'  => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Tambah produk: ' . $usaha->nama_usaha,
                'user' => $user,
                'usaha' => $usaha,
                'isi'   => 'produk/v_addproduk'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
            //masuk database
        } else {
            $i = $this->input;
            $data = array(
                'id_user'                   => $i->post('id_user'),
                'id_usaha'                  => $i->post('id_usaha'),
                'nama_produk'               => $i->post('nama_produk'),
                'deskripsi_produk'          => $i->post('deskripsi_produk'),
                'status_produk'             => $i->post('status_produk'),
                'cta'                       => $i->post('cta'),
                'verif'                     => $i->post('verif'),
                'harga'                     => $i->post('harga'),
                'promo'                     => $i->post('promo')
            );
            $this->m_produk->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah');



            if ($_SESSION['role'] == '2') {
                redirect(base_url('produk/listproduks/' . $_SESSION['id_user']), 'refresh');
            } else {
                redirect(base_url('produk/listproduk'), 'refresh');
            }
        }
        //end database
    }

    public function edit($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $produk = $this->m_produk->detail($id_produk);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array('required'  => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title' => 'Edit produk',
                'produk'  => $produk,
                'isi'   => 'produk/v_editproduk'
            );
            $this->load->view('template/v_wrapper', $data, FALSE);
            //masuk database
        } else {
            $i              = $this->input;
            //$roleuser  = url_title($this->input->post('role_name'), 'dash', TRUE);
            $data = array(
                'id_user'                   => $i->post('id_user'),
                'id_produk'                 => $id_produk,
                'id_usaha'                  => $i->post('id_usaha'),
                'nama_produk'               => $i->post('nama_produk'),
                'deskripsi_produk'          => $i->post('deskripsi_produk'),
                'status_produk'             => $i->post('status_produk'),
                'foto'                      => $i->post('foto'),
                'cta'                       => $i->post('cta'),
                'harga'                     => $i->post('harga'),
                'promo'                     => $i->post('promo')
            );
            $this->m_produk->edit($data);
            $this->session->set_flashdata('sukses', 'Data <b>' . $i->post('nama_produk') . '</b> Telah Diedit');
            if ($_SESSION['role'] == '2') {
                redirect(base_url('produk/listproduks/' . $_SESSION['id_user']), 'refresh');
            } else {
                redirect(base_url('produk/listproduk'), 'refresh');
            }
            //redirect(base_url('produk/listproduk'),'refresh');   
        }
        //end database
    }

    public function delete($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array('id_produk' => $id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        if ($_SESSION['role'] == '2') {
            redirect(base_url('produk/listproduks/' . $_SESSION['id_user']), 'refresh');
        } else {
            redirect(base_url('produk/listproduk'), 'refresh');
        }
        //redirect(base_url('produk/listproduk'),'refresh');  
    }


    // gambar produk
    public function gambar($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $produk = $this->m_produk->detail($id_produk);
        $gambar = $this->m_produk->gambar($id_produk);
        //var_dump($gambar);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_gambar',
            'Judul/Nama Gambar',
            'required',
            array('required'  => '%s harus diisi')
        );

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2400'; // dalam kb
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';

            //$this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) { //gambar adalah name dari tag upload yg ada di tambah.php
                // end validasi

                $data = array(
                    'title'     => 'Tambah Gambar Produk: ' . $produk->nama_produk,
                    'produk'    => $produk,
                    'gambar'    => $gambar,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'produk/v_gambar'
                );
                $this->load->view('template/v_wrapper', $data, FALSE);

                //masuk database
            } else {
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

                $data = array(
                    'id_produk'         => $id_produk,
                    'judul_gambar'      => $i->post('judul_gambar'),
                    //disimpan nama filenya
                    'gambar'            => $upload_gambar['upload_data']['file_name']
                );
                $this->m_produk->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Gambar Telah Ditambahkan');
                redirect(base_url('produk/gambar/' . $id_produk), 'refresh');
            }
        }
        //end database
        $data = array(
            'title'       => 'Tambah Gambar Produk: ' . $produk->nama_produk,
            'produk'      => $produk,
            'gambar'      => $gambar,
            'isi'         => 'produk/v_gambar'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function delete_gambar($id_produk, $id_gambar)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        // Proses hapus gambar
        $gambar = $this->m_produk->detail_gambar($id_gambar);
        unlink('./assets/upload/image/' . $gambar->gambar);
        unlink('./assets/upload/image/thumbs/' . $gambar->gambar);
        //end proses hapus
        $data = array('id_gambar' => $id_gambar);
        $this->m_produk->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Gambar Telah Dihapus');
        redirect(base_url('produk/gambar/' . $id_produk), 'refresh');
    }


    // Verifikasi
    public function verifikasi()
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $belum_verif = $this->m_produk->belum_verif();
        $verified = $this->m_produk->verified();

        $data = array(
            'title' => 'Kelola Verifikasi Produk',
            'produk'  => $belum_verif,
            'verified' => $verified,
            'isi'   => 'produk/v_verifikasi'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function verifyes($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_produk'                 => $id_produk,
            'verif'                     => '1',
            'status_produk'             => 'Publish'
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('sukses', 'Data Telah Diverifikasi');
        redirect(base_url('produk/verifikasi'), 'refresh');
    }

    public function verifno($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_produk'                 => $id_produk,
            'verif'                     => '0',
            'status_produk'             => 'Draft'
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('sukses', 'Data Telah Di Hapus Dari Verifikasi');
        redirect(base_url('produk/verifikasi'), 'refresh');
    }
}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */