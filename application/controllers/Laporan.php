<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Les_model');
        check_login();
    }

    //LAPORAN INDEX
    public function index()
    {

        redirect(base_url());
    }
    // siswa pendaftaran
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

        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get('siswa')->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswa', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pendaftaran
    public function cetaksiswa()
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksiswa', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/siswa');
        }
    }
    // siswa pendaftaran
    public function siswapendaftaran()
    {
        $data['judul'] = 'Siswa Pendaftaran';
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

        $data['siswa'] = $this->db->get_where('siswa', ['id_status' => '1'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('siswa', ['id_status' => '1'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswapendaftaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswapendaftaran', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pendaftaran
    public function cetaksiswapendaftaran()
    {

        $data['judul'] = 'Siswa Pendaftaran';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksiswapendaftaran', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/siswapendaftaran');
        }
    }
    // siswa diterima
    public function siswaditerima()
    {
        $data['judul'] = 'Siswa Diterima';
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

        $data['siswa'] = $this->db->get_where('siswa', ['id_status' => '2'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('siswa', ['id_status' => '2'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswaditerima', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswaditerima', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak diterima
    public function cetaksiswaditerima()
    {

        $data['judul'] = 'Siswa Diterima';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksiswaditerima', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/siswaditerima');
        }
    }
    // siswa ditolak
    public function siswaditolak()
    {
        $data['judul'] = 'Siswa Ditolak';
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

        $data['siswa'] = $this->db->get_where('siswa', ['id_status' => '3'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('siswa', ['id_status' => '3'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswaditolak', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/siswaditolak', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak ditolak
    public function cetaksiswaditolak()
    {

        $data['judul'] = 'Siswa Ditolak';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `siswa` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksiswaditolak', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/siswaditolak');
        }
    }
    // guru
    public function guru()
    {
        $data['judul'] = 'Guru';
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

        $data['guru'] = $this->db->get('guru')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get('guru')->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guru', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pendaftaran
    public function cetakguru()
    {

        $data['judul'] = 'Guru';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakguru', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/guru');
        }
    }
    // guru pendaftaran
    public function gurupendaftaran()
    {
        $data['judul'] = 'Guru Pendaftaran';
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

        $data['guru'] = $this->db->get_where('guru', ['id_status' => '1'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('guru', ['id_status' => '1'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/gurupendaftaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/gurupendaftaran', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pendaftaran
    public function cetakgurupendaftaran()
    {

        $data['judul'] = 'Guru Pendaftaran';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakgurupendaftaran', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/gurupendaftaran');
        }
    }
    // guru diterima
    public function guruditerima()
    {
        $data['judul'] = 'Guru Diterima';
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

        $data['guru'] = $this->db->get_where('guru', ['id_status' => '2'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('guru', ['id_status' => '2'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guruditerima', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guruditerima', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak diterima
    public function cetakguruditerima()
    {

        $data['judul'] = 'Guru Diterima';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakguruditerima', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/guruditerima');
        }
    }
    // guru ditolak
    public function guruditolak()
    {
        $data['judul'] = 'Guru Ditolak';
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

        $data['guru'] = $this->db->get_where('guru', ['id_status' => '3'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('guru', ['id_status' => '3'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guruditolak', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/guruditolak', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak ditolak
    public function cetakguruditolak()
    {

        $data['judul'] = 'Guru Ditolak';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `guru` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakguruditolak', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/guruditolak');
        }
    }
    // pembayaran
    public function pembayaran()
    {
        $data['judul'] = 'Pembayaran';
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

        $data['pembayaran'] = $this->db->get('pembayaran')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get('pembayaran')->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaran', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pembayaran
    public function cetakpembayaran()
    {

        $data['judul'] = 'Pembayaran';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpembayaran', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pembayaran');
        }
    }
    // pembayaran
    public function pembayaranbelum()
    {
        $data['judul'] = 'Pembayaran Belum';
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

        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_status' => '1'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('pembayaran', ['id_status' => '1'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranbelum', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranbelum', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pembayaran
    public function cetakpembayaranbelum()
    {

        $data['judul'] = 'Pembayaran Belum';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='1' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpembayaranbelum', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pembayaranbelum');
        }
    }
    // pembayaran
    public function pembayaranmenunggu()
    {
        $data['judul'] = 'Pembayaran Menunggu Konfirmasi';
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

        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_status' => '2'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('pembayaran', ['id_status' => '2'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranmenunggu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranmenunggu', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pembayaran
    public function cetakpembayaranmenunggu()
    {

        $data['judul'] = 'Pembayaran Menunggu Konfirmasi';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='2' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpembayaranmenunggu', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pembayaranmenunggu');
        }
    }
    // pembayaran
    public function pembayaranselesai()
    {
        $data['judul'] = 'Pembayaran Selesai';
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

        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_status' => '3'])->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('pembayaran', ['id_status' => '3'])->result_array();

        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranselesai', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['periode'] = $this->input->post('periode', true);
            $split = explode(' - ', $data['periode']);

            #check make sure have 2 elements in array
            $count = count($split);
            if ($count <> 2) {
                #invalid data
            }

            $dariTanggal = $split[0];
            $sampaiTanggal = $split[1];
            $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
            $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

            if ($data['periode'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/pembayaranselesai', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak pembayaran
    public function cetakpembayaranselesai()
    {

        $data['judul'] = 'Pembayaran Selesai';
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

        $data['periode'] = $this->input->post('periode', true);
        $split = explode(' - ', $data['periode']);

        #check make sure have 2 elements in array
        $count = count($split);
        if ($count <> 2) {
            #invalid data
        }

        $dariTanggal = $split[0];
        $sampaiTanggal = $split[1];
        $data['dariTanggal'] = date('Y-m-d', strtotime($dariTanggal));
        $data['sampaiTanggal'] = date('Y-m-d', strtotime($sampaiTanggal));

        $data['filter'] = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_status`='3' AND `tanggal` BETWEEN '" . $data['dariTanggal'] . "' AND '" . $data['sampaiTanggal'] . "' ORDER BY tanggal ASC")->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $this->form_validation->set_rules('periode', 'Periode', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpembayaranselesai', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pembayaran');
        }
    }
    // les
    public function les()
    {
        $data['judul'] = 'Les';
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

        $data['kelasguru'] = $this->db->get_where('kelasguru')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('kelasguru')->result_array();

        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/les', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_guru'] = $this->input->post('id_guru', true);
            if ($data['id_guru'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `kelasguru` ORDER BY id_guru ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `kelasguru` WHERE id_guru='" . $data['id_guru'] . "' ORDER BY id_guru ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/les', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // cetak les
    public function cetakles()
    {

        $data['judul'] = 'Les';
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

        $data['id_guru'] = $this->input->post('id_guru', true);
        if ($data['id_guru'] == 'Semua') {
            $data['filter'] = $this->db->query("SELECT * FROM `kelasguru` ORDER BY id_guru ASC")->result_array();
        } else {
            $data['filter'] = $this->db->query("SELECT * FROM `kelasguru` WHERE id_guru='" . $data['id_guru'] . "' ORDER BY id_guru ASC")->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakles', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/les');
        }
    }

    // soalganda
    public function soalganda()
    {
        $data['judul'] = 'Soal Pilihan Ganda';
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

        $data['les'] = $this->db->get_where('les')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('les')->result_array();

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/soalganda', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_matapelajaran'] = $this->input->post('id_matapelajaran', true);
            if ($data['id_matapelajaran'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `les` ORDER BY id_matapelajaran ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `les` WHERE id_matapelajaran='" . $data['id_matapelajaran'] . "' ORDER BY id_matapelajaran ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/soalganda', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // cetak soalganda
    public function cetaksoalganda()
    {

        $data['judul'] = 'Soal Pilihan Ganda';
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

        $data['id_matapelajaran'] = $this->input->post('id_matapelajaran', true);
        if ($data['id_matapelajaran'] == 'Semua') {
            $data['filter'] = $this->db->query("SELECT * FROM `les` ORDER BY id_matapelajaran ASC")->result_array();
        } else {
            $data['filter'] = $this->db->query("SELECT * FROM `les` WHERE id_matapelajaran='" . $data['id_matapelajaran'] . "' ORDER BY id_matapelajaran ASC")->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksoalganda', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/soalganda');
        }
    }

    // soalisian
    public function soalisian()
    {
        $data['judul'] = 'Soal Isian';
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

        $data['les'] = $this->db->get_where('les')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();
        $data['filter'] = $this->db->get_where('les')->result_array();

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/soalisian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_matapelajaran'] = $this->input->post('id_matapelajaran', true);
            if ($data['id_matapelajaran'] == 'Semua') {
                $data['filter'] = $this->db->query("SELECT * FROM `les` ORDER BY id_matapelajaran ASC")->result_array();
            } else {
                $data['filter'] = $this->db->query("SELECT * FROM `les` WHERE id_matapelajaran='" . $data['id_matapelajaran'] . "' ORDER BY id_matapelajaran ASC")->result_array();
            }

            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/soalisian', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // cetak soalisian
    public function cetaksoalisian()
    {

        $data['judul'] = 'Soal Isian';
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

        $data['id_matapelajaran'] = $this->input->post('id_matapelajaran', true);
        if ($data['id_matapelajaran'] == 'Semua') {
            $data['filter'] = $this->db->query("SELECT * FROM `les` ORDER BY id_matapelajaran ASC")->result_array();
        } else {
            $data['filter'] = $this->db->query("SELECT * FROM `les` WHERE id_matapelajaran='" . $data['id_matapelajaran'] . "' ORDER BY id_matapelajaran ASC")->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksoalisian', $data);
            $this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/soalisian');
        }
    }
}
