<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Submenu_model');
        $this->load->model('Level_model');
        $this->load->model('Aksesmenu_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Jabatan_model');

        $this->load->model('Tahunajaran_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Biaya_model');

        $this->load->model('Tema_model');
        $this->load->model('Jadwaltema_model');

        $this->load->model('Kelas_model');
        //$this->load->model('KelasSiswa_model');        
        $this->load->model('Ortuwali_model');
        $this->load->model('Siswa_model');
        $this->load->model('Sumberpemasukan_model');
        $this->load->model('Sumberpengeluaran_model');

        $this->load->model('Pemasukan_model');

        $this->load->model('Jenistagihan_model');
        $this->load->model('Biayapendaftaran_model');

        $this->load->helper('string');
        check_login();
    }

    //MASTER INDEX
    public function index()
    {

        redirect(base_url());
    }
    //MENU
    public function menu()
    {

        $data['judul'] = 'Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/menu', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_menu()
    {

        $data['judul'] = 'Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_menu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Menu_model->tambahDataMenu();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/menu');
        }
    }

    public function ubah_menu($id_menu)
    {

        $data['judul'] = 'Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['menu'] = $this->Menu_model->getMenuById($id_menu);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_menu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Menu_model->ubahDataMenu();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/menu');
        }
    }

    public function hapus_menu($id_menu)
    {

        $this->Menu_model->hapusDataMenu($id_menu);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/menu');
    }

    public function detail_menu($id_menu)
    {
        $data['judul'] = 'Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['menu'] = $this->Menu_model->getMenuById($id_menu);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_menu', $data);
        $this->load->view('templates/footer', $data);
    }

    // SUB MENU
    public function submenu()
    {

        $data['judul'] = 'Sub Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['submenu'] = $this->Submenu_model->getAllsubmenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/submenu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_submenu()
    {

        $data['judul'] = 'Sub Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['submenu'] = $this->Submenu_model->getAllsubmenu();
        $data['menu'] = $this->db->get('menu')->result_array();


        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_submenu', 'Nama Submenu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_submenu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Submenu_model->tambahDataSubmenu();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/submenu');
        }
    }

    public function ubah_submenu($id_submenu)
    {

        $data['judul'] = 'Sub Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['submenu'] = $this->Submenu_model->getSubmenuById($id_submenu);
        $data['menu'] = $this->db->get('menu')->result_array();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_submenu', 'Nama Submenu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_submenu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Submenu_model->ubahDataSubmenu();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/submenu');
        }
    }

    public function hapus_submenu($id_submenu)
    {

        $this->Submenu_model->hapusDataSubmenu($id_submenu);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/submenu');
    }

    public function detail_submenu($id_submenu)
    {
        $data['judul'] = 'Sub Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['submenu'] = $this->Submenu_model->getSubmenuById($id_submenu);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_submenu', $data);
        $this->load->view('templates/footer', $data);
    }

    //LEVEL
    public function level()
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getAllLevel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/level', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_level()
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getAllLevel();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_level', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Level_model->tambahDataLevel();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/level');
        }
    }

    public function ubah_level($id_level)
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getLevelById($id_level);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_level', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Level_model->ubahDataLevel();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/level');
        }
    }

    public function hapus_level($id_level)
    {

        $this->Level_model->hapusDataLevel($id_level);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/level');
    }

    public function detail_level($id_level)
    {
        $data['judul'] = 'Akses Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->db->get_where('level', ['id_level' => $id_level])->row_array();

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('id_level', 'Id Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/detail_level', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Aksesmenu_model->SimpanAksesMenu();
            $this->session->set_flashdata('flashdata', 'diperbaharui');
            redirect('master/level');
        }
    }
    // PENGGUNA
    public function pengguna()
    {

        $data['judul'] = 'Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpengguna'] = $this->Pengguna_model->getAllPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pengguna', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pengguna()
    {

        $data['judul'] = 'Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpengguna'] = $this->Pengguna_model->getAllPengguna();
        $data['masterlevel'] = $this->db->get('level')->result_array();
        $data['masterpegawai'] = $this->db->get('pegawai')->result_array();


        $this->form_validation->set_rules('id_level', 'Level', 'required');
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_pengguna', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengguna_model->tambahDataPengguna();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/pengguna');
        }
    }

    public function ubah_pengguna($id_pengguna)
    {

        $data['judul'] = 'Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpengguna'] = $this->Pengguna_model->getPenggunaById($id_pengguna);
        $data['masterlevel'] = $this->db->get('level')->result_array();

        $this->form_validation->set_rules('id_level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_pengguna', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengguna_model->ubahDataPengguna();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/pengguna');
        }
    }

    public function hapus_pengguna($id_pengguna)
    {

        $this->Pengguna_model->hapusDataPengguna($id_pengguna);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/pengguna');
    }

    public function detail_pengguna($id_pengguna)
    {
        $data['judul'] = 'Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpengguna'] = $this->Pengguna_model->getPenggunaById($id_pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_pengguna', $data);
        $this->load->view('templates/footer', $data);
    }

    //JABATAN
    public function jabatan()
    {

        $data['judul'] = 'Jabatan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/jabatan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_jabatan()
    {

        $data['judul'] = 'Jabatan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_jabatan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jabatan_model->tambahDataJabatan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/jabatan');
        }
    }

    public function ubah_jabatan($id_jabatan)
    {

        $data['judul'] = 'Jabatan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $masterid_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $masterid_jabatan])->row_array();

        $data['masterjabatan'] = $this->Jabatan_model->getjabatanById($id_jabatan);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_jabatan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jabatan_model->ubahDataJabatan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/jabatan');
        }
    }

    public function hapus_jabatan($id_jabatan)
    {

        $this->Jabatan_model->hapusDataJabatan($id_jabatan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/jabatan');
    }

    public function detail_jabatan($id_jabatan)
    {
        $data['judul'] = 'Jabatan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterjabatan'] = $this->Jabatan_model->getjabatanById($id_jabatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_jabatan', $data);
        $this->load->view('templates/footer', $data);
    }
    //sumberpemasukan
    public function sumberpemasukan()
    {

        $data['judul'] = 'Sumber Pemasukan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpemasukan'] = $this->Sumberpemasukan_model->getAllsumberpemasukan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/sumberpemasukan', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_sumberpemasukan()
    {

        $data['judul'] = 'Sumber Pemasukan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpemasukan'] = $this->Sumberpemasukan_model->getAllsumberpemasukan();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_sumberpemasukan', 'Nama sumberpemasukan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_sumberpemasukan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Sumberpemasukan_model->tambahDatasumberpemasukan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/sumberpemasukan');
        }
    }

    public function ubah_sumberpemasukan($id_sumberpemasukan)
    {

        $data['judul'] = 'Sumber Pemasukan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpemasukan'] = $this->Sumberpemasukan_model->getsumberpemasukanById($id_sumberpemasukan);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_sumberpemasukan', 'Nama sumberpemasukan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_sumberpemasukan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Sumberpemasukan_model->ubahDatasumberpemasukan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/sumberpemasukan');
        }
    }

    public function hapus_sumberpemasukan($id_sumberpemasukan)
    {

        $this->Sumberpemasukan_model->hapusDatasumberpemasukan($id_sumberpemasukan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/sumberpemasukan');
    }

    public function detail_sumberpemasukan($id_sumberpemasukan)
    {
        $data['judul'] = 'Sumber Pemasukan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpemasukan'] = $this->Sumberpemasukan_model->getsumberpemasukanById($id_sumberpemasukan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_sumberpemasukan', $data);
        $this->load->view('templates/footer', $data);
    }
    //sumberpengeluaran
    public function sumberpengeluaran()
    {

        $data['judul'] = 'Sumber Pengeluaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpengeluaran'] = $this->Sumberpengeluaran_model->getAllsumberpengeluaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/sumberpengeluaran', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_sumberpengeluaran()
    {

        $data['judul'] = 'Sumber Pengeluaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpengeluaran'] = $this->Sumberpengeluaran_model->getAllsumberpengeluaran();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_sumberpengeluaran', 'Nama sumberpengeluaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_sumberpengeluaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Sumberpengeluaran_model->tambahDatasumberpengeluaran();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/sumberpengeluaran');
        }
    }

    public function ubah_sumberpengeluaran($id_sumberpengeluaran)
    {

        $data['judul'] = 'Sumber Pengeluaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpengeluaran'] = $this->Sumberpengeluaran_model->getsumberpengeluaranById($id_sumberpengeluaran);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_sumberpengeluaran', 'Nama sumberpengeluaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_sumberpengeluaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Sumberpengeluaran_model->ubahDatasumberpengeluaran();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/sumberpengeluaran');
        }
    }

    public function hapus_sumberpengeluaran($id_sumberpengeluaran)
    {

        $this->Sumberpengeluaran_model->hapusDatasumberpengeluaran($id_sumberpengeluaran);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/sumberpengeluaran');
    }

    public function detail_sumberpengeluaran($id_sumberpengeluaran)
    {
        $data['judul'] = 'Sumber Pengeluaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['sumberpengeluaran'] = $this->Sumberpengeluaran_model->getsumberpengeluaranById($id_sumberpengeluaran);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_sumberpengeluaran', $data);
        $this->load->view('templates/footer', $data);
    }
    //matapelajaran
    public function matapelajaran()
    {

        $data['judul'] = 'Mata Pelajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['matapelajaran'] = $this->Matapelajaran_model->getAllmatapelajaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/matapelajaran', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_matapelajaran()
    {

        $data['judul'] = 'Mata Pelajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['matapelajaran'] = $this->Matapelajaran_model->getAllmatapelajaran();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_matapelajaran', 'Nama matapelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_matapelajaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Matapelajaran_model->tambahDatamatapelajaran();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/matapelajaran');
        }
    }

    public function ubah_matapelajaran($id_matapelajaran)
    {

        $data['judul'] = 'Mata Pelajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_matapelajaran', 'Nama matapelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_matapelajaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Matapelajaran_model->ubahDatamatapelajaran();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/matapelajaran');
        }
    }

    public function hapus_matapelajaran($id_matapelajaran)
    {

        $this->Matapelajaran_model->hapusDatamatapelajaran($id_matapelajaran);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/matapelajaran');
    }

    public function detail_matapelajaran($id_matapelajaran)
    {
        $data['judul'] = 'Mata Pelajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_matapelajaran', $data);
        $this->load->view('templates/footer', $data);
    }

    //biaya
    public function biaya()
    {

        $data['judul'] = 'Biaya Les';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['biaya'] = $this->Biaya_model->getAllbiaya();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/biaya', $data);
        $this->load->view('templates/footer', $data);
    }
    public function ubah_biaya($id_biaya)
    {

        $data['judul'] = 'Biaya';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['biaya'] = $this->Biaya_model->getbiayaById($id_biaya);

        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_biaya', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Biaya_model->ubahDatabiaya($id_biaya);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/biaya');
        }
    }

    //kelas
    public function kelas()
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kelas'] = $this->Kelas_model->getAllkelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/kelas', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_kelas()
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kelas'] = $this->Kelas_model->getAllkelas();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_kelas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelas_model->tambahDatakelas();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/kelas');
        }
    }

    public function ubah_kelas($id_kelas)
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kelas'] = $this->Kelas_model->getkelasById($id_kelas);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_kelas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelas_model->ubahDatakelas();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/kelas');
        }
    }

    public function hapus_kelas($id_kelas)
    {

        $this->Kelas_model->hapusDatakelas($id_kelas);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/kelas');
    }

    public function detail_kelas($id_kelas)
    {
        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kelas'] = $this->Kelas_model->getkelasById($id_kelas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_kelas', $data);
        $this->load->view('templates/footer', $data);
    }

    //siswa
    public function siswa()
    {

        $data['judul'] = 'Siswa';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['siswa'] = $this->Siswa_model->getAllsiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/siswa', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_siswa()
    {

        $data['judul'] = 'Siswa';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['siswa'] = $this->Siswa_model->getAllsiswa();

        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_siswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Siswa_model->tambahDatasiswa();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/siswa');
        }
    }

    public function ubah_siswa($id_siswa)
    {

        $data['judul'] = 'Siswa';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);

        $this->form_validation->set_rules('id_siswa', 'siswa', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_siswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Siswa_model->ubahDatasiswa($id_siswa);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/siswa');
        }
    }

    public function hapus_siswa($id_siswa)
    {

        $this->Siswa_model->hapusDatasiswa($id_siswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/siswa');
    }

    public function detail_siswa($id_siswa)
    {
        $data['judul'] = 'Siswa';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_siswa', $data);
        $this->load->view('templates/footer', $data);
    }

    // tahunajaran
    public function tahunajaran()
    {

        $data['judul'] = 'Tahun Ajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['tahunajaran'] = $this->Tahunajaran_model->getAlltahunajaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/tahunajaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_tahunajaran()
    {

        $data['judul'] = 'Tahun Ajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['tahunajaran'] = $this->Tahunajaran_model->getAlltahunajaran();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_tahunajaran', 'Nama Tahun Ajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_tahunajaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Tahunajaran_model->tambahDatatahunajaran();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/tahunajaran');
        }
    }

    public function ubah_tahunajaran($id_tahunajaran)
    {

        $data['judul'] = 'Tahun Ajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['tahunajaran'] = $this->Tahunajaran_model->gettahunajaranById($id_tahunajaran);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_tahunajaran', 'Nama Tahun Ajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_tahunajaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Tahunajaran_model->ubahDatatahunajaran();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/tahunajaran');
        }
    }

    public function hapus_tahunajaran($id_tahunajaran)
    {

        $this->Tahunajaran_model->hapusDatatahunajaran($id_tahunajaran);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/tahunajaran');
    }

    public function detail_tahunajaran($id_tahunajaran)
    {
        $data['judul'] = 'Tahun Ajaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['tahunajaran'] = $this->Tahunajaran_model->gettahunajaranById($id_tahunajaran);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_tahunajaran', $data);
        $this->load->view('templates/footer', $data);
    }
    // kalenderpendidikan
    public function kalenderpendidikan()
    {

        $data['judul'] = 'Kalender Pendidikan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kalenderpendidikan'] = $this->Kalenderpendidikan_model->getAllkalenderpendidikan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/kalenderpendidikan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_kalenderpendidikan()
    {

        $data['judul'] = 'Kalender Pendidikan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kalenderpendidikan'] = $this->Kalenderpendidikan_model->getAllkalenderpendidikan();

        $this->form_validation->set_rules('dari_tanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampai_tanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_kalenderpendidikan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kalenderpendidikan_model->tambahDatakalenderpendidikan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/kalenderpendidikan');
        }
    }

    public function ubah_kalenderpendidikan($id_kalenderpendidikan)
    {

        $data['judul'] = 'Kalender Pendidikan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kalenderpendidikan'] = $this->Kalenderpendidikan_model->getkalenderpendidikanById($id_kalenderpendidikan);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_kalenderpendidikan', 'Nama Tahun Ajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_kalenderpendidikan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kalenderpendidikan_model->ubahDatakalenderpendidikan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/kalenderpendidikan');
        }
    }

    public function hapus_kalenderpendidikan($id_kalenderpendidikan)
    {

        $this->Kalenderpendidikan_model->hapusDatakalenderpendidikan($id_kalenderpendidikan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/kalenderpendidikan');
    }

    public function detail_kalenderpendidikan($id_kalenderpendidikan)
    {
        $data['judul'] = 'Kalender Pendidikan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['kalenderpendidikan'] = $this->Kalenderpendidikan_model->getkalenderpendidikanById($id_kalenderpendidikan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_kalenderpendidikan', $data);
        $this->load->view('templates/footer', $data);
    }
    //PEGAWAI
    public function pegawai()
    {

        $data['judul'] = 'Pegawai';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpegawai'] = $this->Pegawai_model->getAllPegawai();
        $data['masterjabatan'] = $this->db->get('jabatan')->result_array();
        $data['mastergolpangkat'] = $this->db->get('golpangkat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pegawai', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_pegawai()
    {

        $data['judul'] = 'Pegawai';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpegawai'] = $this->Pegawai_model->getAllPegawai();
        $data['masterjabatan'] = $this->db->get('jabatan')->result_array();
        $data['mastergolpangkat'] = $this->db->get('golpangkat')->result_array();

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_pegawai', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '3000';
            $config['upload_path'] = './assets/dist/img/';
            //ijazah
            if (!empty($_FILES['ijazah'])) {
                $uploadijazah = $_FILES['ijazah']['name'];
                $acak = random_string('alnum', 16);
                $file_ijazah  = $acak . "." . pathinfo($uploadijazah, PATHINFO_EXTENSION);
                if ($uploadijazah) {
                    $config['file_name'] = $file_ijazah;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('ijazah');
                    $data_ijazah = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload ijazah!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //ktp
            if (!empty($_FILES['ktp'])) {

                $uploadktp = $_FILES['ktp']['name'];
                $acak = random_string('alnum', 16);
                $file_ktp  = $acak . "." . pathinfo($uploadktp, PATHINFO_EXTENSION);
                if ($uploadktp) {
                    $config['file_name'] = $file_ktp;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('ktp');
                    $data_ktp = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload ktp!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //kk
            if (!empty($_FILES['kk'])) {

                $uploadkk = $_FILES['kk']['name'];
                $acak = random_string('alnum', 16);
                $file_kk  = $acak . "." . pathinfo($uploadkk, PATHINFO_EXTENSION);
                if ($uploadkk) {
                    $config['file_name'] = $file_kk;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('kk');
                    $data_kk = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload kk!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //foto
            if (!empty($_FILES['foto'])) {

                $uploadfoto = $_FILES['foto']['name'];
                $acak = random_string('alnum', 16);
                $file_foto  = $acak . "." . pathinfo($uploadfoto, PATHINFO_EXTENSION);
                if ($uploadfoto) {
                    $config['file_name'] = $file_foto;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('foto');
                    $data_foto = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            if ((!empty($_FILES['ijazah'])) and (!empty($_FILES['ktp'])) and (!empty($_FILES['kk'])) and (!empty($_FILES['foto']))) {
                $file_ijazah = $data_ijazah['file_name'];
                $file_ktp = $data_ktp['file_name'];
                $file_kk = $data_kk['file_name'];
                $file_foto = $data_foto['file_name'];
                $this->Pegawai_model->tambahDataPegawai($file_ijazah, $file_ktp, $file_kk, $file_foto);
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('master/pegawai');
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    public function ubah_pegawai($id_pegawai)
    {

        $data['judul'] = 'Pegawai';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_masterpegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_masterpegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpegawai'] = $this->Pegawai_model->getPegawaiById($id_pegawai);
        $data['masterjabatan'] = $this->db->get('jabatan')->result_array();
        $data['mastergolpangkat'] = $this->db->get('golpangkat')->result_array();

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_pegawai', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '3000';
            $config['upload_path'] = './assets/dist/img/';
            //ijazah
            if (!empty($_FILES['ijazah'])) {
                $uploadijazah = $_FILES['ijazah']['name'];
                $acak = random_string('alnum', 16);
                $file_ijazah  = $acak . "." . pathinfo($uploadijazah, PATHINFO_EXTENSION);
                if ($uploadijazah) {
                    $config['file_name'] = $file_ijazah;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('ijazah');
                    $data = $this->upload->data();
                    $file_baru = $data['file_name'];
                    $this->Pegawai_model->ubahDataPegawaiIjazah($file_baru);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload ijazah!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //ktp
            if (!empty($_FILES['ktp'])) {

                $uploadktp = $_FILES['ktp']['name'];
                $acak = random_string('alnum', 16);
                $file_ktp  = $acak . "." . pathinfo($uploadktp, PATHINFO_EXTENSION);
                if ($uploadktp) {
                    $config['file_name'] = $file_ktp;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('ktp');
                    $data = $this->upload->data();
                    $file_baru = $data['file_name'];
                    $this->Pegawai_model->ubahDataPegawaiktp($file_baru);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload ktp!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //kk
            if (!empty($_FILES['kk'])) {

                $uploadkk = $_FILES['kk']['name'];
                $acak = random_string('alnum', 16);
                $file_kk  = $acak . "." . pathinfo($uploadkk, PATHINFO_EXTENSION);
                if ($uploadkk) {
                    $config['file_name'] = $file_kk;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('kk');
                    $data = $this->upload->data();
                    $file_baru = $data['file_name'];
                    $this->Pegawai_model->ubahDataPegawaikk($file_baru);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload kk!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //foto
            if (!empty($_FILES['foto'])) {

                $uploadfoto = $_FILES['foto']['name'];
                $acak = random_string('alnum', 16);
                $file_foto  = $acak . "." . pathinfo($uploadfoto, PATHINFO_EXTENSION);
                if ($uploadfoto) {
                    $config['file_name'] = $file_foto;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('foto');
                    $data = $this->upload->data();
                    $file_baru = $data['file_name'];
                    $this->Pegawai_model->ubahDataPegawaifoto($file_baru);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            $this->Pegawai_model->ubahDataPegawai();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/pegawai');
        }
    }

    public function hapus_pegawai($id_pegawai)
    {

        $this->Pegawai_model->hapusDataPegawai($id_pegawai);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/pegawai');
    }

    public function detail_pegawai($id_pegawai)
    {
        $data['judul'] = 'Pegawai';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_masterpegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_masterpegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['masterpegawai'] = $this->Pegawai_model->getPegawaiById($id_pegawai);
        $data['masterjabatan'] = $this->db->get('jabatan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_pegawai', $data);
        $this->load->view('templates/footer', $data);
    }
    //jenistagihan
    public function jenistagihan()
    {

        $data['judul'] = 'Jenis Tagihan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['jenistagihan'] = $this->db->get_where('jenistagihan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/jenistagihan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_jenistagihan()
    {
        $data['judul'] = 'Jenis Tagihan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $this->form_validation->set_rules('nama_jenistagihan', 'Nama Jenis Tagihan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_jenistagihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jenistagihan_model->tambahDatajenistagihan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/jenistagihan');
        }
    }
    public function ubah_jenistagihan($id_jenistagihan)
    {
        $data['judul'] = 'Jenis Tagihan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['jenistagihan'] = $this->db->get_where('jenistagihan', ['id_jenistagihan' => $id_jenistagihan])->row_array();

        $this->form_validation->set_rules('id_jenistagihan', 'Biaya Pendaftaran', 'required');
        $this->form_validation->set_rules('nama_jenistagihan', 'Nama Jenis Tagihan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_jenistagihan', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Jenistagihan_model->ubahDatajenistagihan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/jenistagihan');
        }
    }

    //jenistagihan
    public function detail_jenistagihan($id_jenistagihan)
    {

        $data['judul'] = 'Jenis Tagihan';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['jenistagihan'] = $this->db->get_where('jenistagihan', ['id_jenistagihan' => $id_jenistagihan])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_jenistagihan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus_jenistagihan($id_jenistagihan)
    {
        $this->Jenistagihan_model->hapusDatajenistagihan($id_jenistagihan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/jenistagihan');
    }

    //biayapendaftaran
    public function biayapendaftaran()
    {

        $data['judul'] = 'Biaya Pendaftaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['biayapendaftaran'] = $this->db->get_where('biayapendaftaran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/biayapendaftaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_biayapendaftaran()
    {
        $data['judul'] = 'Biaya Pendaftaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Pendaftaran', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_biayapendaftaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Biayapendaftaran_model->tambahDatabiayapendaftaran();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/biayapendaftaran');
        }
    }
    public function ubah_biayapendaftaran($id_biayapendaftaran)
    {
        $data['judul'] = 'Biaya Pendaftaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['biayapendaftaran'] = $this->db->get_where('biayapendaftaran', ['id_biayapendaftaran' => $id_biayapendaftaran])->row_array();

        $this->form_validation->set_rules('id_biayapendaftaran', 'Biaya Pendaftaran', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Pendaftaran', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_biayapendaftaran', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Biayapendaftaran_model->ubahDatabiayapendaftaran();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/biayapendaftaran');
        }
    }

    //biayapendaftaran
    public function detail_biayapendaftaran($id_biayapendaftaran)
    {

        $data['judul'] = 'Biaya Pendaftaran';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['biayapendaftaran'] = $this->db->get_where('biayapendaftaran', ['id_biayapendaftaran' => $id_biayapendaftaran])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_biayapendaftaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus_biayapendaftaran($id_biayapendaftaran)
    {
        $this->Biayapendaftaran_model->hapusDatabiayapendaftaran($id_biayapendaftaran);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/biayapendaftaran');
    }
}
