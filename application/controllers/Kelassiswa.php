<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelassiswa extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Kelassiswa_model');
        $this->load->model('Jadwaltema_model');
        $this->load->model('Daftarsiswa_model');
        $this->load->model('Jadwalujian_model');
        $this->load->model('Nilaiujian_model');
        $this->load->model('Absensi_model');
        $this->load->model('Siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Penilaiansiswa_model');
        $this->load->model('Kenaikankelas_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Materi_model');

        $this->load->model('Kalenderpendidikan_model');

        $this->load->helper('string');

        check_login();
    }

    //kelassiswa
    public function index()
    {

        $data['judul'] = 'Kelas Siswa';
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

        $guru = $this->db->get_where('guru', ['id_pegawai' => $data['pegawai']['id_pegawai']])->row_array();
        $data['kelassiswa'] = $this->db->get_where('kelassiswa', ['id_guru' => $guru['id_guru']])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_kelassiswa()
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['kelassiswa'] = $this->Kelassiswa_model->getAllkelassiswa();

        $this->form_validation->set_rules('id_tahunajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_kelassiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelassiswa_model->tambahDatakelassiswa();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/index');
        }
    }

    public function ubah_kelassiswa($id_kelassiswa)
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['kelassiswa'] = $this->Kelassiswa_model->getkelassiswaById($id_kelassiswa);

        $this->form_validation->set_rules('id_tahunajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/ubah_kelassiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelassiswa_model->ubahDatakelassiswa();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('kelassiswa/index');
        }
    }

    public function hapus_kelassiswa($id_kelassiswa)
    {

        $this->Kelassiswa_model->hapusDatakelassiswa($id_kelassiswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('kelassiswa/index');
    }

    public function detail_kelassiswa($id_kelassiswa)
    {
        $data['judul'] = 'Kelas Siswa';
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

        $data['kelassiswa'] = $this->Kelassiswa_model->getkelassiswaById($id_kelassiswa);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/detail_kelassiswa', $data);
        $this->load->view('templates/footer', $data);
    }
    //jadwaltema
    public function jadwaltema($id_kelassiswa)
    {

        $data['judul'] = 'Jadwal Tema';
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

        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/jadwaltema', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_jadwaltema($id_kelassiswa)
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['jadwaltema'] = $this->Jadwaltema_model->getAlljadwaltema();
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kelassiswa', 'Kelas Siswa', 'required');
        $this->form_validation->set_rules('id_tema', 'Tema', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_jadwaltema', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jadwaltema_model->tambahDatajadwaltema();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
        }
    }
    public function hapus_jadwaltema($id_jadwaltema, $id_kelassiswa)
    {
        $this->Jadwaltema_model->hapusDatajadwaltema($id_jadwaltema);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
    }
    //daftarsiswa
    public function tambah_daftarsiswa($id_kelassiswa)
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['daftarsiswa'] = $this->Daftarsiswa_model->getAlldaftarsiswa();
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kelassiswa', 'Kelas Siswa', 'required');
        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_daftarsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Daftarsiswa_model->tambahDatadaftarsiswa();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
        }
    }
    public function hapus_daftarsiswa($id_daftarsiswa, $id_kelassiswa)
    {
        $this->Daftarsiswa_model->hapusDatadaftarsiswa($id_daftarsiswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
    }
    //jadwalujian
    public function tambah_jadwalujian($id_kelassiswa)
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['jadwalujian'] = $this->Jadwalujian_model->getAlljadwalujian();
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kelassiswa', 'Kelas Siswa', 'required');
        $this->form_validation->set_rules('id_tema', 'Tema', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_jadwalujian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jadwalujian_model->tambahDatajadwalujian();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
        }
    }
    public function hapus_jadwalujian($id_jadwalujian, $id_kelassiswa)
    {
        $this->Jadwalujian_model->hapusDatajadwalujian($id_jadwalujian);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('kelassiswa/detail_kelassiswa/' . $id_kelassiswa);
    }
    //nilaiujian
    public function nilaiujian($id_jadwalujian, $id_kelassiswa)
    {

        $data['judul'] = 'Nilai Ujian';
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

        $data['nilaiujian'] = $this->db->get_where('nilaiujian', ['id_jadwalujian' => $id_jadwalujian])->result_array();
        $data['id_jadwalujian'] = $id_jadwalujian;
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_nilaiujian', 'Nilai Ujian', 'required');
        $this->form_validation->set_rules('nilaipengetahuan', 'Nilai', 'required');
        $this->form_validation->set_rules('nilaiketerampilan', 'Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/nilaiujian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Nilaiujian_model->UbahDatanilaiujian();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('kelassiswa/nilaiujian/' . $id_jadwalujian . '/' . $id_kelassiswa);
        }
    }
    //absensi
    public function tambah_absensi($id_siswa, $id_kelassiswa)
    {

        $data['judul'] = 'Kelas Siswa';
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

        $data['kelassiswa'] = $this->Kelassiswa_model->getkelassiswaById($id_kelassiswa);
        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kalenderpendidikan', 'Kalender Pendidikan', 'required');
        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_absensi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Absensi_model->tambahDataabsensi();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/absnesi/' . $id_siswa . '/' . $id_kelassiswa);
        }
    }


    //absensi
    public function absensi($id_siswa, $id_kelassiswa)
    {

        $data['judul'] = 'Absensi Siswa';
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

        $data['id_siswa'] = $id_siswa;
        $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kalenderpendidikan', 'Kalender Pendidikan', 'required');
        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/absensi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_kalenderpendidikan = $this->input->post('id_kalenderpendidikan');
            $id_siswa = $this->input->post('id_siswa');
            $absensi = $this->db->get_where('absensi', [
                'id_kalenderpendidikan' => $id_kalenderpendidikan,
                'id_siswa' => $id_siswa,
            ])->num_rows();
            if ($absensi > 0) {
                $absensi = $this->db->get_where('absensi', [
                    'id_kalenderpendidikan' => $id_kalenderpendidikan,
                    'id_siswa' => $id_siswa,
                ])->row_array();
                $id_absensi = $absensi['id_absensi'];
                $this->Absensi_model->UbahDataabsensi($id_absensi);
                $this->session->set_flashdata('flashdata', 'diubah');
            } else {
                $this->Absensi_model->tambahDataabsensi();
                $this->session->set_flashdata('flashdata', 'ditambahkan');
            }
            redirect('kelassiswa/absensi/' . $id_siswa . '/' . $id_kelassiswa);
        }
    }
    //kenaikankelas
    public function kenaikankelas()
    {

        $data['judul'] = 'Kenaikan Kelas';
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

        $data['kenaikankelas'] = $this->db->get('kenaikankelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/kenaikankelas', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_kenaikankelas()
    {

        $data['judul'] = 'Kenaikan Kelas';
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

        $data['kenaikankelas'] = $this->Kenaikankelas_model->getAllkenaikankelas();

        $this->form_validation->set_rules('id_siswa', 'Kelas Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_kenaikankelas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kenaikankelas_model->tambahDatakenaikankelas();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('kelassiswa/kenaikankelas');
        }
    }
    public function ubah_kenaikankelas($id_kenaikankelas)
    {

        $data['judul'] = 'Kenaikan Kelas';
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

        $data['kenaikankelas'] = $this->Kenaikankelas_model->getkenaikankelasById($id_kenaikankelas);

        $this->form_validation->set_rules('id_siswa', 'Kelas Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/ubah_kenaikankelas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kenaikankelas_model->ubahDatakenaikankelas();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('kelassiswa/kenaikankelas');
        }
    }

    public function hapus_kenaikankelas($id_kenaikankelas)
    {

        $this->Kenaikankelas_model->hapusDatakenaikankelas($id_kenaikankelas);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('kelassiswa/kenaikankelas');
    }

    public function detail_kenaikankelas($id_kenaikankelas)
    {
        $data['judul'] = 'Kenaikan Kelas';
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

        $data['kenaikankelas'] = $this->Kenaikankelas_model->getkenaikankelasById($id_kenaikankelas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/detail_kenaikankelas', $data);
        $this->load->view('templates/footer', $data);
    }
    //siswaabsen
    public function siswaabsen()
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
        $this->load->view('kelassiswa/siswaabsen', $data);
        $this->load->view('templates/footer', $data);
    }
    //materi
    public function materi()
    {

        $data['judul'] = 'Materi';
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

        $data['materi'] = $this->db->get_where('materi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/materi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_materi()
    {
        $data['judul'] = 'Materi';
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

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('link', 'Link Video Materi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/tambah_materi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '30000';
            $config['upload_path'] = './files/';
            //file
            if (!empty($_FILES['file'])) {
                $uploadfile = $_FILES['file']['name'];
                $acak = random_string('alnum', 16);
                $file_baru  = $acak . "." . pathinfo($uploadfile, PATHINFO_EXTENSION);
                if ($uploadfile) {
                    $config['file_name'] = $file_baru;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('file');
                    $data_file = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload file!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            if (!empty($_FILES['file'])) {
                $file_baru = $data_file['file_name'];
                $this->Materi_model->tambahDatamateri($file_baru);
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('kelassiswa/materi');
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                echo "<script>history.go(-1);</script>";
            }
        }
    }
    public function ubah_materi($id_materi)
    {
        $data['judul'] = 'Materi';
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

        $data['materi'] = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('link', 'Link Video Materi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelassiswa/ubah_materi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '30000';
            $config['upload_path'] = './files/';
            //file
            if (!empty($_FILES['file'])) {
                $uploadfile = $_FILES['file']['name'];
                $acak = random_string('alnum', 16);
                $file_baru  = $acak . "." . pathinfo($uploadfile, PATHINFO_EXTENSION);
                if ($uploadfile) {
                    $config['file_name'] = $file_baru;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('file');
                    $data_file = $this->upload->data();
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload file!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            if (!empty($_FILES['file'])) {
                $file_baru = $data_file['file_name'];
                $file_lama = $this->input->post('file_lama');
                unlink(FCPATH . './files/' . $file_lama);
                $this->Materi_model->ubahDatamateri($file_baru);
                $this->session->set_flashdata('flashdata', 'diubah');
                redirect('kelassiswa/materi');
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    //materi
    public function detail_materi($id_materi)
    {

        $data['judul'] = 'Materi';
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

        $data['materi'] = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelassiswa/detail_materi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus_materi($id_materi)
    {
        $materi = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
        $foto_lama = $materi['file'];
        unlink(FCPATH . './files/' . $foto_lama);
        $this->Materi_model->hapusDatamateri($id_materi);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/materi');
    }
}
