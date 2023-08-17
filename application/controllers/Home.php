<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
        $this->load->model('Profil_model');

        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');

        $this->load->model('Pendaftaran_model');
        $this->load->model('Jenistagihan_model');
        $this->load->model('Tagihan_model');
        $this->load->model('Pembayaran_model');
        $this->load->helper('string');
    }

    //BERANDA
    public function index()
    {
        $data['profil'] = $this->db->get('profil')->row_array();
        $data['judul'] = $data['profil']['nama_aplikasi'];
        $data['nama_profil'] = $data['profil']['nama_profil'];
        $data['alamat'] = $data['profil']['alamat'];
        $data['telepon'] = $data['profil']['telepon'];
        $data['kodepos'] = $data['profil']['kodepos'];
        $data['email'] = $data['profil']['email'];
        $data['website'] = $data['profil']['website'];
        $data['logo'] = $data['profil']['logo'];
        $this->load->view('home/index', $data);
    }
    //pendaftaranguru
    public function pendaftaranguru()
    {
        $data['profil'] = $this->db->get('profil')->row_array();
        $data['judul'] = 'Form Pendaftaran Guru';

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth_header', $data);
            $this->load->view('home/pendaftaranguru', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->Guru_model->PendaftaranDataguru();
            $lastId = $this->db->order_by('id_guru', 'desc')->get('guru')->row_array();
            redirect('home/buktipendaftaranguru/' . $lastId['kode']);
        }
    }
    // bukti 
    public function buktipendaftaranguru($kode)
    {
        $data['judul'] = 'Bukti Pendaftaran Guru';
        $this->load->library('ciqrcode');

        $data['profil'] = $this->db->get('profil')->row_array();
        $data['guru'] = $this->db->get_where('guru', ['kode' => $kode])->row_array();
        $kode = $data['guru']['kode'];
        $tanggal = $data['guru']['tanggal'];
        $nama = $data['guru']['nama'];
        $nik = $data['guru']['nip'];

        $bahanqr = 'Pendaftaran Guru ' . $kode . ' Tgl ' . tanggal_indo($tanggal) . ' a.n ' . $nama . ' NIP ' . $nik;

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $params['data'] = $bahanqr;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'documents/' . $kode . '.png';
        $this->ciqrcode->generate($params);
        $this->load->view('home/buktipendaftaranguru', $data);
    }

    //pendaftaransiswa
    public function pendaftaransiswa()
    {
        $data['profil'] = $this->db->get('profil')->row_array();
        $data['judul'] = 'Form Pendaftaran Siswa';

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth_header', $data);
            $this->load->view('home/pendaftaransiswa', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->Siswa_model->PendaftaranDatasiswa();
            $lastId = $this->db->order_by('id_siswa', 'desc')->get('siswa')->row_array();
            redirect('home/buktipendaftaransiswa/' . $lastId['kode']);
        }
    }
    // bukti 
    public function buktipendaftaransiswa($kode)
    {
        $data['judul'] = 'Bukti Pendaftaran Siswa';
        $this->load->library('ciqrcode');

        $data['profil'] = $this->db->get('profil')->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['kode' => $kode])->row_array();
        $kode = $data['siswa']['kode'];
        $tanggal = $data['siswa']['tanggal'];
        $nama = $data['siswa']['nama'];
        $nik = $data['siswa']['nis'];

        $bahanqr = 'Pendaftaran Siswa ' . $kode . ' Tgl ' . tanggal_indo($tanggal) . ' a.n ' . $nama . ' NIS ' . $nik;

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $params['data'] = $bahanqr;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'documents/' . $kode . '.png';
        $this->ciqrcode->generate($params);
        $this->load->view('home/buktipendaftaransiswa', $data);
    }

    public function konfirmasipembayaran()
    {
        $data['profil'] = $this->db->get('profil')->row_array();
        $data['judul'] = 'Konfirmasi Pembayaran';

        $this->form_validation->set_rules('id_input', 'Input', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('home/konfirmasipembayaran', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $id_input = $this->input->post('id_input');
            if ($id_input == '1') {
                $data['kode'] = $this->input->post('kode');
                $data['pendaftaran'] = $this->db->get_where('pendaftaran', ['kode' => $data['kode']])->row_array();
                if ($data['pendaftaran']) {
                    $data['tagihan'] = $this->db->get_where('tagihan', [
                        'id_pendaftaran' => $data['pendaftaran']['id_pendaftaran'],
                        'id_status' => '1',
                    ])->row_array();
                    if ($data['tagihan']) {
                        $this->load->view('templates/auth_header', $data);
                        $this->load->view('home/konfirmasipembayaran', $data);
                        $this->load->view('templates/auth_footer', $data);
                    } else {
                        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Tagihan tidak ada atau sudah dibayar silahkan tunggu konfirmasi.</div>');
                        echo "<script>history.go(-1);</script>";
                    }
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Kode tidak ditemukan.</div>');
                    echo "<script>history.go(-1);</script>";
                }
            } else {
                $config['allowed_types'] = 'pdf|jpg|jpeg|png';
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
                    $this->Pembayaran_model->tambahDatapembayaranUmum($file_baru);
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil mengirimkan bukti pembayaran.</div>');
                    redirect('home/konfirmasipembayaran/');
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
        }
    }



    public function login()
    {

        $this->session->unset_userdata('token');
        $this->session->unset_userdata('id_level');
        if ($this->session->userdata('token')) {
            $email = $this->session->userdata('email');
            $siswa = $this->db->get_where('siswa', ['email' => $email]);
            $guru = $this->db->get_where('guru', ['email' => $email]);
            if ($siswa->num_rows() > 0) {
                redirect('siswa');
            } else if ($guru->num_rows() > 0) {
                redirect('guru');
            }
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data['profil'] = $this->db->get('profil')->row_array();
                $data['judul'] = 'Halaman Login';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('home/login', $data);
                $this->load->view('templates/auth_footer', $data);
            } else {

                //validasi sukses
                $this->_login();
            }
        }
    }
    private function _login()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
        $guru = $this->db->get_where('guru', ['email' => $email])->row_array();

        //siswa ada
        if ($siswa) {

            //periksa Password
            if (password_verify($password, $siswa['password'])) {

                $data = [
                    'token' => $siswa['token'],
                    'id_level' => '4'
                ];

                //simpan data sesi login
                $this->session->set_userdata($data);

                redirect('siswa');
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Password salah.</div>');
                redirect('home/login');
            }
        } else if ($guru) {

            //periksa Password
            if (password_verify($password, $guru['password'])) {

                $data = [
                    'token' => $guru['token'],
                    'id_level' => '3'
                ];

                //simpan data sesi login
                $this->session->set_userdata($data);

                redirect('guru');
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Password salah.</div>');
                redirect('home/login');
            }
        } else {

            //pengguna tidak ada
            $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Maaf email belum terdaftar.</div>');
            redirect('home/login');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('token');
        $this->session->unset_userdata('id_level');
        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Selamat!, anda berhasil keluar</div>');
        redirect('home');
    }
}
