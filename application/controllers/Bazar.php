<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bazar extends CI_Controller
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
        $total = $this->m_produk->total_produkbazar();
        $bazar = $this->m_produk->detailbazar(1);
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
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $produk = $this->m_produk->produkbazar($config['per_page'], $page);
        // paginasi end


        $data = array(
            'title'             => 'Bazar SIG IKM Jakbar',
            'pagin'                => $this->pagination->create_links(),
            'bazar'             => $bazar,
            'produk'            => $produk,
            'isi'                 => 'frontpage/produk/bazar'
        );

        $this->load->view('frontpage/layout/wrapper', $data, FALSE);
    }

    public function listbazar()
    {
        // proteksi halaman
        $this->simple_login->cek_login();
        $produk = $this->m_produk->getalldata();
        $user = $this->m_user->listing();
        $bazar = $this->m_produk->detailbazar(1);
        $data = array(
            'title' => 'Kelola Produk Bazar',
            'produk'  => $produk,
            'user'    => $user,
            'bazar'  => $bazar,
            'isi'   => 'bazar/v_listbazar'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);
    }


    public function tambahbazar($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_produk'                 => $id_produk,
            'bazar'                     => '1'
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('sukses', 'Data Telah Ditambahkan Ke Bazar');
        redirect(base_url('bazar/listbazar'), 'refresh');
    }

    public function hapusdaribazar($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_produk'                 => $id_produk,
            'bazar'                     => '0'
        );
        $this->m_produk->edit($data);
        $this->session->set_flashdata('sukses', 'Data Telah Di Hapus Dari Bazar');
        redirect(base_url('bazar/listbazar'), 'refresh');
    }

    public function bazarnyala()
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_bazar'                 => '1',
            'status'                     => '1'
        );
        $this->m_produk->edit_konfigurasi_bazar($data);
        $this->session->set_flashdata('sukses', 'Bazar Hidup');
        redirect(base_url('bazar/listbazar'), 'refresh');
    }

    public function bazarmati()
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array(
            'id_bazar'                 => '1',
            'status'                     => '0'
        );
        $this->m_produk->edit_konfigurasi_bazar($data);
        $this->session->set_flashdata('sukses', 'Bazar Mati');
        redirect(base_url('bazar/listbazar'), 'refresh');
    }

    public function konfigurasi()
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $bazar = $this->m_produk->detailbazar(1);
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bazar',
            'Nama Bazar',
            'required',
            array('required'  => '%s harus diisi')
        );

        if ($valid->run()) {
            // cek jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['max_size']  = '2400'; // dalam kb
                // $config['max_width']  = '2024';
                // $config['max_height']  = '2024';

                $this->upload->initialize($config);
                //$this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) { //gambar adalah name dari tag upload yg ada di tambah.php
                    // end validasi

                    $data = array(
                        'title'     => 'Konfigurasi Bazar',
                        'bazar'     => $bazar,
                        'isi'       => 'bazar/v_editkonfigurasibazar',
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'bazar/v_editkonfigurasibazar'
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
                    // $config['width']            = 250;
                    // $config['height']           = 250;
                    $config['thumb_marker']     = "";

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //end thumbnail

                    $i = $this->input;
                    $data = array(
                        'nama_bazar'                    => $i->post('nama_bazar'),
                        'deskripsi_bazar'               => $i->post('deskripsi_bazar'),
                        'tanggal_mulai'                 => $i->post('tanggal_mulai'),
                        'tanggal_berakhir'              => $i->post('tanggal_berakhir'),
                        'status'              => $i->post('status'),

                        //disimpan nama filenya
                        'gambar'            => $upload_gambar['upload_data']['file_name'],
                    );
                    $this->m_produk->edit_konfigurasi_bazar($data);
                    $this->session->set_flashdata('sukses', 'Data Telah diupdate');
                    redirect(base_url('bazar/konfigurasi'), 'refresh');
                }
            } else {
                //edit produk tanpa ganti gambar
                $i = $this->input;
                $data = array(
                    'nama_bazar'                    => $i->post('nama_bazar'),
                    'deskripsi_bazar'               => $i->post('deskripsi_bazar'),
                    'tanggal_mulai'                 => $i->post('tanggal_mulai'),
                    'tanggal_berakhir'              => $i->post('tanggal_berakhir'),
                    'status'              => $i->post('status'),

                    //disimpan nama filenya
                    // 'logo'            => $upload_gambar['upload_data']['file_name'],                          
                );
                $this->m_produk->edit_konfigurasi_bazar($data);
                $this->session->set_flashdata('sukses', 'Data Telah diupdate');;
                redirect(base_url('bazar/konfigurasi'), 'refresh');
            }
        }
        //end database
        $data = array(
            'title' => 'Konfigurasi Bazar',
            'bazar' => $bazar,
            'isi'   => 'bazar/v_editkonfigurasibazar'
        );
        $this->load->view('template/v_wrapper', $data, FALSE);

        // if($valid->run()===FALSE){
        //     $data = array(  'title' => 'Konfigurasi Bazar',
        //                     'bazar' => $bazar,
        //                     'isi'   => 'bazar/v_editkonfigurasibazar'
        //                 );
        //     $this->load->view('template/v_wrapper', $data, FALSE);
        // //masuk database
        // }else {
        //     $i              = $this->input;
        //     $data = array( 
        //         'nama_bazar'                    => $i->post('nama_bazar'),  
        //         'deskripsi_bazar'               => $i->post('deskripsi_bazar'),  
        //         'tanggal_mulai'                 => $i->post('tanggal_mulai'),  
        //         'tanggal_berakhir'              => $i->post('tanggal_berakhir'),  
        //         'gambar'                        => $i->post('gambar') 
        //     );
        //     $this->m_produk->edit_konfigurasi_bazar($data);
        //     $this->session->set_flashdata('sukses', 'Data Telah Diedit');
        //     redirect(base_url('bazar/konfigurasi'),'refresh');   
        // }
        //end database
    }

    public function delete($id_produk)
    {
        // proteksi halaman
        $this->simple_login->cek_login();

        $data = array('id_produk' => $id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus');
        redirect(base_url('produk/listproduk'), 'refresh');
    }
}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */