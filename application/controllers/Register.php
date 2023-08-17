<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Register extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';

        $this->load->model('Guru_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Kalenderpendidikan_model');
        $this->load->model('Tahunajaran_model');
        $this->load->model('Kelassiswa_model');
        $this->load->model('Daftarsiswa_model');
        $this->load->model('Absensi_model');
        $this->load->model('Siswa_model');

        $this->load->model('Ortuwali_model');

        $this->load->model('Pengumuman_model');
        $this->load->model('Pemasukan_model');
        $this->load->model('Pengeluaran_model');
        $this->load->model('Materi_model');

        $this->load->model('Kelas_model');
        $this->load->model('Kelasguru_model');
        $this->load->model('Matapelajaran_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Les_model');

        $this->load->model('Tagihan_model');

        $this->load->helper('string');

        check_login();
    }

    //REGISTER INDEX
    public function index()
    {

        redirect(base_url());
    }
    //Guru
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

        $data['guru'] = $this->Guru_model->getAllguru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/guru', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ubah_guru($id_guru)
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

        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $this->form_validation->set_rules('id_guru', 'Guru', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
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
            $this->load->view('register/ubah_guru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Guru_model->ubahDataguru($id_guru);
            $password = $this->input->post('password', true);
            if (!empty($password)) {
                $this->Guru_model->ubahPassword($id_guru);
            }
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/guru');
        }
    }

    public function hapus_guru($id_guru)
    {

        $this->Guru_model->hapusDataguru($id_guru);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/guru');
    }

    public function detail_guru($id_guru)
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

        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/detail_guru', $data);
        $this->load->view('templates/footer', $data);
    }

    public function terimaguru($id_guru)
    {
        $data['judul'] = 'Guru';
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

        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $emailpenerima = $data['guru']['email'];
        $isipesan = "Akun anda sudah diaktivasi dengan email : " . $emailpenerima . " password: 123456 .Login pada https://dwiananda.skripsibanjarmasin.my.id/home/login";
        //----
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'skripsibanjarmasin.my.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'notif@dwiananda.skripsibanjarmasin.my.id'; // user email
        $mail->Password = 'v+CErnb0u[B$'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('notif@dwiananda.skripsibanjarmasin.my.id', ''); // user email
        $mail->addReplyTo('notif@dwiananda.skripsibanjarmasin.my.id', ''); //user email

        // Add a recipient
        $mail->addAddress($emailpenerima); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'Notifikasi'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $isipesan; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Email tidak bisa dikirim.';
            echo 'Email error: ' . $mail->ErrorInfo;
        } else {
            $this->Guru_model->terimaguru($id_guru);
            $this->session->set_flashdata('flashdata', 'diterima dengan email terdaftar dan password 123456');
            redirect('register/detail_guru/' . $id_guru);
        }
    }
    public function tolakguru($id_guru)
    {
        $data['judul'] = 'Pendaftaran';
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

        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $this->Guru_model->tolakguru($id_guru);
        $this->session->set_flashdata('flashdata', 'ditolak');
        redirect('register/detail_guru/' . $id_guru);
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
        $this->load->view('register/siswa', $data);
        $this->load->view('templates/footer', $data);
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
        $this->form_validation->set_rules('nis', 'NIS', 'required');
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
            $this->load->view('register/ubah_siswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Siswa_model->ubahDatasiswa($id_siswa);
            $password = $this->input->post('password', true);
            if (!empty($password)) {
                $this->Siswa_model->ubahPassword($id_siswa);
            }
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/siswa');
        }
    }

    public function hapus_siswa($id_siswa)
    {

        $this->Siswa_model->hapusDatasiswa($id_siswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/siswa');
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
        $this->load->view('register/detail_siswa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function terimasiswa($id_siswa)
    {
        $data['judul'] = 'Siswa';
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

        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);

        $emailpenerima = $data['siswa']['email'];
        $isipesan = "Akun anda sudah diaktivasi dengan email : " . $emailpenerima . " password: 123456 .Login pada https://dwiananda.skripsibanjarmasin.my.id/home/login";
        //----
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'skripsibanjarmasin.my.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'notif@dwiananda.skripsibanjarmasin.my.id'; // user email
        $mail->Password = 'v+CErnb0u[B$'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('notif@dwiananda.skripsibanjarmasin.my.id', ''); // user email
        $mail->addReplyTo('notif@dwiananda.skripsibanjarmasin.my.id', ''); //user email

        // Add a recipient
        $mail->addAddress($emailpenerima); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'Notifikasi'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $isipesan; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Email tidak bisa dikirim.';
            echo 'Email error: ' . $mail->ErrorInfo;
        } else {
            $this->Siswa_model->terimasiswa($id_siswa);
            $this->session->set_flashdata('flashdata', 'diterima dengan email terdaftar dan password 123456');
            redirect('register/detail_siswa/' . $id_siswa);
        }
    }
    public function tolaksiswa($id_siswa)
    {
        $data['judul'] = 'Siswa';
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

        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);

        $this->Siswa_model->tolaksiswa($id_siswa);
        $this->session->set_flashdata('flashdata', 'ditolak');
        redirect('register/detail_siswa/' . $id_siswa);
    }

    //pembayaran
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

        $data['pembayaran'] = $this->Pembayaran_model->getAllpembayaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail_pembayaran($id_pembayaran)
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

        $data['pembayaran'] = $this->Pembayaran_model->getpembayaranById($id_pembayaran);
        $data['les'] = $this->Les_model->getlesById($data['pembayaran']['id_les']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/detail_pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasipembayaran($id_pembayaran, $id_les)
    {
        $data['judul'] = 'Pembayaran';
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

        $data['pembayaran'] = $this->Pembayaran_model->getpembayaranById($id_pembayaran);
        $data['siswa'] = $this->Siswa_model->getsiswaById($data['pembayaran']['id_siswa']);

        $emailpenerima = $data['siswa']['email'];
        $isipesan = "Pembayaran tagihan anda sudah dikonfirmasi. Silahkan Login pada https://dwiananda.skripsibanjarmasin.my.id/home/login untuk akses mata pelajaran yang telah dibayar.";
        //----
        // PHPMailer object
        $response = false;
        $mail = new PHPMailer();


        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'skripsibanjarmasin.my.id'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'notif@dwiananda.skripsibanjarmasin.my.id'; // user email
        $mail->Password = 'v+CErnb0u[B$'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('notif@dwiananda.skripsibanjarmasin.my.id', ''); // user email
        $mail->addReplyTo('notif@dwiananda.skripsibanjarmasin.my.id', ''); //user email

        // Add a recipient
        $mail->addAddress($emailpenerima); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'Notifikasi'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $isipesan; // isi email
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Email tidak bisa dikirim.';
            echo 'Email error: ' . $mail->ErrorInfo;
        } else {
            $this->Pembayaran_model->konfirmasipembayaran($id_pembayaran, $id_les);
            $this->session->set_flashdata('flashdata', 'dikonfirmasi');
            redirect('register/detail_pembayaran/' . $id_pembayaran);
        }
    }

    //saldo
    public function saldo()
    {

        $data['judul'] = 'Saldo';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/saldo', $data);
        $this->load->view('templates/footer', $data);
    }

    //ortuwali
    public function ortuwali()
    {

        $data['judul'] = 'Orang Tua/Wali';
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

        $data['ortuwali'] = $this->Ortuwali_model->getAllortuwali();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/ortuwali', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_ortuwali($id_siswa)
    {

        $data['judul'] = 'Orang Tua/Wali';
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

        $data['ortuwali'] = $this->Ortuwali_model->getAllortuwali();
        $data['id_siswa'] = $id_siswa;

        $this->form_validation->set_rules('nama_ortuwali', 'Nama Ortu/Wali', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/tambah_ortuwali', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Ortuwali_model->tambahDataortuwali();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/detail_siswa/' . $id_siswa);
        }
    }

    public function ubah_ortuwali($id_ortuwali)
    {

        $data['judul'] = 'Orang Tua/Wali';
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

        $data['ortuwali'] = $this->Ortuwali_model->getortuwaliById($id_ortuwali);

        $this->form_validation->set_rules('nama_ortuwali', 'Nama Ortu/Wali', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/ubah_ortuwali', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Ortuwali_model->ubahDataortuwali();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/ortuwali');
        }
    }

    public function hapus_ortuwali($id_ortuwali, $id_siswa)
    {

        $this->Ortuwali_model->hapusDataortuwali($id_ortuwali);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/detail_siswa/' . $id_siswa);
    }

    public function detail_ortuwali($id_ortuwali)
    {
        $data['judul'] = 'Orang Tua/Wali';
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

        $data['ortuwali'] = $this->Ortuwali_model->getortuwaliById($id_ortuwali);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/detail_ortuwali', $data);
        $this->load->view('templates/footer', $data);
    }

    // CETAK ortuwali
    public function cetak_ortuwali($id_siswa)
    {

        $data['judul'] = 'Data Orang Tua/Wali';
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
        $data['ortuwali'] = $this->db->query("SELECT * FROM ortuwali WHERE id_siswa='" . $id_siswa . "'ORDER BY id_kategoriortuwali ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('templates/laporan_header', $data);
        $this->load->view('register/cetakortuwali', $data);
        $this->load->view('templates/laporan_footer', $data);
    }
    //kelassiswa
    public function kelassiswa()
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/kelassiswa', $data);
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
            $this->load->view('register/tambah_kelassiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelassiswa_model->tambahDatakelassiswa();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/kelassiswa');
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
            $this->load->view('register/ubah_kelassiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelassiswa_model->ubahDatakelassiswa();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/kelassiswa');
        }
    }

    public function hapus_kelassiswa($id_kelassiswa)
    {

        $this->Kelassiswa_model->hapusDatakelassiswa($id_kelassiswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/kelassiswa');
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
        $this->load->view('register/detail_kelassiswa', $data);
        $this->load->view('templates/footer', $data);
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

        $data['siswa'] = $this->Siswa_model->getAllsiswa();
        $data['kelassiswa'] = $this->Kelassiswa_model->getkelassiswaById($id_kelassiswa);
        $data['id_kelassiswa'] = $id_kelassiswa;

        $this->form_validation->set_rules('id_kelassiswa', 'Kelas Siswa', 'required');
        $this->form_validation->set_rules('id_siswa', 'Siswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/tambah_daftarsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Daftarsiswa_model->tambahDatadaftarsiswa();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/detail_kelassiswa/' . $id_kelassiswa);
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
            $this->load->view('register/tambah_absensi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Absensi_model->tambahDataabsensi();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/absnesi/' . $id_siswa . '/' . $id_kelassiswa);
        }
    }
    public function hapus_daftarsiswa($id_daftarsiswa, $id_kelassiswa)
    {
        $this->Daftarsiswa_model->hapusDatadaftarsiswa($id_daftarsiswa);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/detail_kelassiswa/' . $id_kelassiswa);
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
            $this->load->view('register/absensi', $data);
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
            redirect('register/absensi/' . $id_siswa . '/' . $id_kelassiswa);
        }
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
        $this->load->view('register/siswaabsen', $data);
        $this->load->view('templates/footer', $data);
    }
    // pemasukan
    public function pemasukan()
    {

        $data['judul'] = 'Pemasukan';
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

        $data['pemasukan'] = $this->Pemasukan_model->getAllpemasukan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/pemasukan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pemasukan()
    {

        $data['judul'] = 'Pemasukan';
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

        $data['pemasukan'] = $this->Pemasukan_model->getAllpemasukan();
        $data['sumberpemasukan'] = $this->db->get('sumberpemasukan')->result_array();

        $this->form_validation->set_rules('kode_pemasukan', 'Kode', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_sumberpemasukan', 'Sumber Pemasukan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/tambah_pemasukan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pemasukan_model->tambahDatapemasukan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/pemasukan');
        }
    }

    public function ubah_pemasukan($id_pemasukan)
    {

        $data['judul'] = 'Pemasukan';
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

        $data['pemasukan'] = $this->Pemasukan_model->getpemasukanById($id_pemasukan);
        $data['sumberpemasukan'] = $this->db->get('sumberpemasukan')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_sumberpemasukan', 'Sumber Pemasukan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/ubah_pemasukan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pemasukan_model->ubahDatapemasukan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/pemasukan');
        }
    }

    public function hapus_pemasukan($id_pemasukan)
    {

        $this->Pemasukan_model->hapusDatapemasukan($id_pemasukan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/pemasukan');
    }

    public function detail_pemasukan($id_pemasukan)
    {
        $data['judul'] = 'Pemasukan';
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

        $data['pemasukan'] = $this->Pemasukan_model->getpemasukanById($id_pemasukan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/detail_pemasukan', $data);
        $this->load->view('templates/footer', $data);
    }
    // pengeluaran
    public function pengeluaran()
    {

        $data['judul'] = 'Pengeluaran';
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

        $data['pengeluaran'] = $this->Pengeluaran_model->getAllpengeluaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/pengeluaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pengeluaran()
    {

        $data['judul'] = 'Pengeluaran';
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

        $data['pengeluaran'] = $this->Pengeluaran_model->getAllpengeluaran();
        $data['sumberpengeluaran'] = $this->db->get('sumberpengeluaran')->result_array();

        $this->form_validation->set_rules('kode_pengeluaran', 'Kode', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_sumberpengeluaran', 'Sumber pengeluaran', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/tambah_pengeluaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengeluaran_model->tambahDatapengeluaran();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('register/pengeluaran');
        }
    }

    public function ubah_pengeluaran($id_pengeluaran)
    {

        $data['judul'] = 'Pengeluaran';
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

        $data['pengeluaran'] = $this->Pengeluaran_model->getpengeluaranById($id_pengeluaran);
        $data['sumberpengeluaran'] = $this->db->get('sumberpengeluaran')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_sumberpengeluaran', 'Sumber pengeluaran', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('register/ubah_pengeluaran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengeluaran_model->ubahDatapengeluaran();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/pengeluaran');
        }
    }

    public function hapus_pengeluaran($id_pengeluaran)
    {

        $this->Pengeluaran_model->hapusDatapengeluaran($id_pengeluaran);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/pengeluaran');
    }

    public function detail_pengeluaran($id_pengeluaran)
    {
        $data['judul'] = 'Pengeluaran';
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

        $data['pengeluaran'] = $this->Pengeluaran_model->getpengeluaranById($id_pengeluaran);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('register/detail_pengeluaran', $data);
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
        $this->load->view('register/materi', $data);
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
            $this->load->view('register/tambah_materi', $data);
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
                redirect('register/materi');
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
            $this->load->view('register/ubah_materi', $data);
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
                redirect('register/materi');
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
        $this->load->view('register/detail_materi', $data);
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
