<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        require APPPATH . 'libraries/phpmailer/src/Exception.php';
        require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH . 'libraries/phpmailer/src/SMTP.php';
        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->model('Kelasguru_model');
        $this->load->model('Matapelajaran_model');

        $this->load->model('Les_model');
        $this->load->model('Komentar_model');



        $this->load->model('Materi_model');
        $this->load->model('Soalganda_model');
        $this->load->model('Soalisian_model');
        $this->load->model('Latihan_model');
        $this->load->model('Latihansoalganda_model');
        $this->load->model('Latihansoalisian_model');
        $this->load->model('Tugas_model');
        $this->load->model('Nilai_model');



        check_login();
        $this->load->helper('string');
    }

    public function index()
    {

        $data['judul'] = 'Beranda';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarguru', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //kelasguru
    public function kelasguru()
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['kelasguru'] = $this->Kelasguru_model->getAllkelasByGuru($id_guru);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarguru', $data);
        $this->load->view('guru/kelasguru', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_kelasguru()
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_kelasguru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelasguru_model->tambahDatakelasguru();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('guru/kelasguru');
        }
    }
    public function ubah_kelasguru($id_kelasguru)
    {

        $data['judul'] = 'Kelas';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['kelasguru'] = $this->Kelasguru_model->getkelasguruById($id_kelasguru);

        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_kelasguru', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kelasguru_model->ubahDatakelasguru($id_kelasguru);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/kelasguru');
        }
    }
    public function hapus_kelasguru($id_kelasguru)
    {

        $this->Kelasguru_model->hapusDatakelasguru($id_kelasguru);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/kelasguru');
    }

    //les
    public function les()
    {

        $data['judul'] = 'Les';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getAllles();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarguru', $data);
        $this->load->view('guru/les', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_les()
    {

        $data['judul'] = 'Les';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $this->form_validation->set_rules('id_tahunajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('id_kelasguru', 'Kelas', 'required');
        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_les', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Les_model->tambahDatales();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('guru/les');
        }
    }
    public function ubah_les($id_les)
    {

        $data['judul'] = 'Les';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('id_tahunajaran', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('id_kelasguru', 'Kelas', 'required');
        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_les', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Les_model->ubahDatales($id_les);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/les');
        }
    }
    public function hapus_les($id_les)
    {

        $this->Les_model->hapusDatales($id_les);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/les');
    }
    //detail les
    public function detail_les($id_les)
    {

        $data['judul'] = 'Les';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/detail_les', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Komentar_model->tambahDatakomentarguru($id_guru, $id_les);
            $this->session->set_flashdata('flashdata', 'dikirim');
            redirect('guru/detail_les/' . $id_les);
        }
    }

    public function tambah_materi($id_les)
    {
        $data['judul'] = 'Materi';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('tanggal', 'Tanggal Publikasi', 'required');
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('link', 'Embeded Video Youtube', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_materi', $data);
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
                $this->Materi_model->tambahDatamateri($id_les, $file_baru);
                /*$les = $this->db->get_where('les', ['id_les' => $id_les])->row_array();
                $id_kelas = $les['id_kelas'];
                $siswa = $this->db->get_where('siswa', [
                    'id_kelas' => $id_kelas,
                    'id_status' => '1'
                ])->result_array();
                foreach ($siswa as $daftarsiswa) {
                    $emailpenerima = $daftarsiswa['email'];
                    $isipesan = "Pemberitahuan ada materi baru. Silahkan login pada https://dwiananda.skripsibanjarmasin.my.id/home/login/";
                    //echo "<script>alert('$emailpenerima');</script>";
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

                    $mail->send();
                    // Send email

                }
                */
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('guru/detail_les/' . $id_les);
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                echo "<script>history.go(-1);</script>";
            }
        }
    }
    public function ubah_materi($id_les, $id_materi)
    {
        $data['judul'] = 'Materi';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['materi'] = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('tanggal', 'Tanggal Publikasi', 'required');
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('link', 'Embeded Video Youtube', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_materi', $data);
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
                $this->Materi_model->ubahDatamateri($id_materi, $file_baru);
                $this->session->set_flashdata('flashdata', 'diubah');
                redirect('guru/detail_les/' . $id_les);
            } else {
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    public function hapus_materi($id_les, $id_materi)
    {
        $materi = $this->Materi_model->getmateriById($id_materi);
        $file_lama = $materi['file'];
        unlink(FCPATH . './files/' . $file_lama);
        $this->Materi_model->hapusDatamateri($id_materi);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/detail_les/' . $id_les);
    }
    public function tambah_soalganda($id_les)
    {
        $data['judul'] = 'Soal Pilihan Ganda';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('pilihana', 'Pilihan A', 'required');
        $this->form_validation->set_rules('pilihanb', 'Pilihan B', 'required');
        $this->form_validation->set_rules('pilihanc', 'Pilihan C', 'required');
        $this->form_validation->set_rules('pilihand', 'Pilihan D', 'required');
        $this->form_validation->set_rules('pilihane', 'Pilihan E', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_soalganda', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Soalganda_model->tambahDatasoalganda($id_les);
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('guru/detail_les/' . $id_les);
        }
    }
    public function ubah_soalganda($id_les, $id_soalganda)
    {
        $data['judul'] = 'Soal Pilihan Ganda';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['soalganda'] = $this->Soalganda_model->getsoalgandaById($id_soalganda);
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('id_soalganda', 'Soal Ganda', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('pilihana', 'Pilihan A', 'required');
        $this->form_validation->set_rules('pilihanb', 'Pilihan B', 'required');
        $this->form_validation->set_rules('pilihanc', 'Pilihan C', 'required');
        $this->form_validation->set_rules('pilihand', 'Pilihan D', 'required');
        $this->form_validation->set_rules('pilihane', 'Pilihan E', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_soalganda', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Soalganda_model->ubahDatasoalganda($id_soalganda);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/detail_les/' . $id_les);
        }
    }
    public function hapus_soalganda($id_les, $id_soalganda)
    {
        $this->Soalganda_model->hapusDatasoalganda($id_soalganda);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/detail_les/' . $id_les);
    }
    public function tambah_soalisian($id_les)
    {
        $data['judul'] = 'Soal Isian';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_soalisian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Soalisian_model->tambahDatasoalisian($id_les);
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('guru/detail_les/' . $id_les);
        }
    }
    public function ubah_soalisian($id_les, $id_soalisian)
    {
        $data['judul'] = 'Soal Isian';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['soalisian'] = $this->Soalisian_model->getsoalisianById($id_soalisian);
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_soalisian', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Soalisian_model->ubahDatasoalisian($id_soalisian);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/detail_les/' . $id_les);
        }
    }
    public function hapus_soalisian($id_matapelajaran, $id_soalisian)
    {
        $this->Soalisian_model->hapusDatasoalisian($id_soalisian);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/detail_matapelajaran/' . $id_matapelajaran);
    }
    public function tambah_latihan($id_les)
    {
        $data['judul'] = 'Latihan';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_latihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Latihan_model->tambahDatalatihan($id_les);
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            $latihan = $this->db->order_by('id_latihan', 'desc')->get('latihan')->row_array();
            $id_latihan = $latihan['id_latihan'];
            redirect('guru/detail_latihan/' . $id_les . '/' . $id_latihan);
        }
    }
    public function ubah_latihan($id_les, $id_latihan)
    {
        $data['judul'] = 'Latihan';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['latihan'] = $this->Latihan_model->getlatihanById($id_latihan);
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_latihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Latihan_model->ubahDatalatihan($id_latihan);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/detail_les/' . $id_les);
        }
    }
    public function hapus_latihan($id_les, $id_latihan)
    {
        $this->Latihansoalganda_model->hapusDatalatihansoalgandaAll($id_latihan);
        $this->Latihansoalisian_model->hapusDatalatihansoalisianAll($id_latihan);
        $this->Latihan_model->hapusDatalatihan($id_latihan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/detail_les/' . $id_les);
    }
    public function detail_latihan($id_les, $id_latihan)
    {
        $data['judul'] = 'Latihan';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['latihan'] = $this->Latihan_model->getlatihanById($id_latihan);
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('id_latihan', 'Latihan', 'required');
        $this->form_validation->set_rules('id_input', 'Input', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/detail_latihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_input = $this->input->post("id_input", true);
            //soalganda
            if ($id_input == '1') {
                $this->Latihansoalganda_model->hapusDatalatihansoalgandaAll($id_latihan);
                $soalganda = $this->db->order_by('id_soalganda', 'asc')->get_where('soalganda')->result_array();
                foreach ($soalganda as $soal) {
                    $id = $soal['id_soalganda'];
                    $id_soalganda = $this->input->post("id_soalganda$id");
                    if (!empty($id_soalganda)) {
                        $this->Latihansoalganda_model->tambahDatalatihansoalganda($id_latihan, $id_soalganda);
                    }
                }
            }
            //soalisian
            if ($id_input == '2') {
                $this->Latihansoalisian_model->hapusDatalatihansoalisianAll($id_latihan);
                $soalisian = $this->db->order_by('id_soalisian', 'asc')->get_where('soalisian')->result_array();
                foreach ($soalisian as $soal) {
                    $id = $soal['id_soalisian'];
                    $id_soalisian = $this->input->post("id_soalisian$id");
                    if (!empty($id_soalisian)) {
                        $this->Latihansoalisian_model->tambahDatalatihansoalisian($id_latihan, $id_soalisian);
                    }
                }
            }
            $this->session->set_flashdata('flashdata', 'dinilai');
            redirect('guru/detail_latihan/' . $id_les . '/' . $id_latihan);
        }
    }

    public function detail_jawabanlatihan($id_latihan, $id_siswa)
    {
        $data['judul'] = 'Jawaban Latihan Soal Pilihan Ganda';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['latihan'] = $this->Latihan_model->getlatihanById($id_latihan);
        $data['latihansoalganda'] = $this->db->get_where('latihansoalganda', ['id_latihan' => $id_latihan])->result_array();
        $data['latihansoalisian'] = $this->db->get_where('latihansoalisian', ['id_latihan' => $id_latihan])->result_array();
        $data['siswa'] = $this->Siswa_model->getsiswaById($id_siswa);

        $this->form_validation->set_rules('nilaiangka', 'Nilai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/detail_jawabanlatihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nilai = $this->db->get_where('nilai', [
                'id_latihan' => $id_latihan,
                'id_siswa' => $id_siswa
            ])->row_array();
            if ($nilai) {
                $id_nilai = $nilai['id_nilai'];
                $this->Nilai_model->ubahDatanilai($id_nilai);
                $this->session->set_flashdata('flashdata', 'diperbaharui');
                redirect('guru/detail_jawabanlatihan/' . $id_latihan . '/' . $id_siswa);
            } else {
                $this->Nilai_model->tambahDatanilai();
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('guru/detail_jawabanlatihan/' . $id_latihan . '/' . $id_siswa);
            }
        }
    }

    public function tambah_tugas($id_matapelajaran)
    {
        $data['judul'] = 'Materi';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);

        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/tambah_tugas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Tugas_model->tambahDatatugas();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            $tugas = $this->db->order_by('id_tugas', 'desc')->get('tugas')->row_array();
            $id_tugas = $tugas['id_tugas'];
            redirect('guru/detail_matapelajaran/' . $id_matapelajaran);
        }
    }
    public function ubah_tugas($id_matapelajaran, $id_tugas)
    {
        $data['judul'] = 'Materi';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $data['tugas'] = $this->Tugas_model->gettugasById($id_tugas);
        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);

        $this->form_validation->set_rules('id_tugas', 'Soal isian', 'required');
        $this->form_validation->set_rules('id_matapelajaran', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarguru', $data);
            $this->load->view('guru/ubah_tugas', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Tugas_model->ubahDatatugas($id_tugas);
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('guru/detail_matapelajaran/' . $id_matapelajaran);
        }
    }
    public function hapus_tugas($id_matapelajaran, $id_tugas)
    {
        $this->tugassoalganda_model->hapusDatatugassoalgandaAll($id_tugas);
        $this->tugassoalisian_model->hapusDatatugassoalisianAll($id_tugas);
        $this->Tugas_model->hapusDatatugas($id_tugas);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('guru/detail_matapelajaran/' . $id_matapelajaran);
    }
    //saldo
    public function saldo()
    {

        $data['judul'] = 'Saldo';
        $data['pengguna'] = $this->db->get_where('guru', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_guru = $data['pengguna']['id_guru'];
        $data['pegawai'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarguru', $data);
        $this->load->view('guru/saldo', $data);
        $this->load->view('templates/footer', $data);
    }
}
