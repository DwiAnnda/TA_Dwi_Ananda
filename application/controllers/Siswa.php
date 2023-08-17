<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->model('Kelasguru_model');
        $this->load->model('Les_model');
        $this->load->model('Tahunajaran_model');
        $this->load->model('Materi_model');

        $this->load->model('Pembayaran_model');
        $this->load->model('Komentar_model');

        $this->load->model('Matapelajaran_model');
        $this->load->model('Materi_model');
        $this->load->model('Soalganda_model');
        $this->load->model('Soalisian_model');
        $this->load->model('Latihan_model');
        $this->load->model('Latihansoalganda_model');
        $this->load->model('Latihansoalisian_model');
        $this->load->model('Tugas_model');
        $this->load->model('Jawabanlatihanganda_model');
        $this->load->model('Jawabanlatihanisian_model');

        check_login();
        $this->load->helper('string');
    }

    public function index()
    {

        $data['judul'] = 'Beranda';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '3';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

    //kelasx
    public function kelasx()
    {

        $data['judul'] = 'Kelas X';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $id_kelas = '1';
        $data['kelasguru'] = $this->db->get_where('kelasguru', [
            'id_kelas' => $id_kelas,
            'id_status' => '1',
        ])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/kelasx', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_kelasx($id_les)
    {
        $data['judul'] = 'Kelas X';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarsiswa', $data);
            $this->load->view('siswa/detail_kelasx', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Komentar_model->tambahDatakomentarsiswa($id_siswa, $id_les);
            $this->session->set_flashdata('flashdata', 'dikirim');
            redirect('siswa/detail_kelasx/' . $id_les);
        }
    }
    //kelasxi
    public function kelasxi()
    {

        $data['judul'] = 'Kelas XI';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $id_kelas = '2';
        $data['kelasguru'] = $this->db->get_where('kelasguru', [
            'id_kelas' => $id_kelas,
            'id_status' => '1',
        ])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/kelasxi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_kelasxi($id_les)
    {
        $data['judul'] = 'Kelas XI';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarsiswa', $data);
            $this->load->view('siswa/detail_kelasxi', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Komentar_model->tambahDatakomentarsiswa($id_siswa, $id_les);
            $this->session->set_flashdata('flashdata', 'dikirim');
            redirect('siswa/detail_kelasxi/' . $id_les);
        }
    }
    //kelasxii
    public function kelasxii()
    {

        $data['judul'] = 'Kelas XII';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $id_kelas = '3';
        $data['kelasguru'] = $this->db->get_where('kelasguru', [
            'id_kelas' => $id_kelas,
            'id_status' => '1',
        ])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/kelasxii', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail_kelasxii($id_les)
    {
        $data['judul'] = 'Kelas XII';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarsiswa', $data);
            $this->load->view('siswa/detail_kelasxii', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Komentar_model->tambahDatakomentarsiswa($id_siswa, $id_les);
            $this->session->set_flashdata('flashdata', 'dikirim');
            redirect('siswa/detail_kelasxii/' . $id_les);
        }
    }

    public function detail_latihan($id_les, $id_latihan)
    {
        $data['judul'] = 'Latihan';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['latihan'] = $this->Latihan_model->getlatihanById($id_latihan);
        $data['les'] = $this->Les_model->getlesById($id_les);

        $this->form_validation->set_rules('id_input', 'Input', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebarsiswa', $data);
            $this->load->view('siswa/detail_latihan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_input = $this->input->post("id_input", true);

            $id_siswa = $this->input->post("id_siswa", true);
            $jawaban = $this->input->post("jawaban", true);
            //soalganda
            if ($id_input == '1') {
                $id_latihansoalganda = $this->input->post("id_latihansoalganda", true);
                $jawabanlatihanganda = $this->db->get_where('jawabanlatihanganda', [
                    'id_latihansoalganda' => $id_latihansoalganda,
                    'id_siswa' => $id_siswa
                ])->row_array();
                if ($jawabanlatihanganda) {
                    $id_jawabanlatihanganda = $jawabanlatihanganda['id_jawabanlatihanganda'];
                    $this->Jawabanlatihanganda_model->ubahDatajawabanlatihanganda($id_jawabanlatihanganda);
                } else {
                    $this->Jawabanlatihanganda_model->tambahDatajawabanlatihanganda();
                }
            }

            //soalisian
            if ($id_input == '2') {
                $id_latihansoalisian = $this->input->post("id_latihansoalisian", true);
                $jawabanlatihanisian = $this->db->get_where('jawabanlatihanisian', [
                    'id_latihansoalisian' => $id_latihansoalisian,
                    'id_siswa' => $id_siswa
                ])->row_array();
                if ($jawabanlatihanisian) {
                    $id_jawabanlatihanisian = $jawabanlatihanisian['id_jawabanlatihanisian'];
                    $this->Jawabanlatihanisian_model->ubahDatajawabanlatihanisian($id_jawabanlatihanisian);
                } else {
                    $this->Jawabanlatihanisian_model->tambahDatajawabanlatihanisian();
                }
            }
            $this->session->set_flashdata('flashdata', 'dijawab');
            redirect('siswa/detail_latihan/' . $id_les . '/' . $id_latihan);
        }
    }

    public function tagihan($id_les)
    {
        $data['judul'] = 'Tagihan';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $id_kelasguru = $data['les']['id_kelasguru'];
        $id_tahunajaran = $data['les']['id_tahunajaran'];
        $id_matapelajaran = $data['les']['id_matapelajaran'];
        $data['tahunajaran'] = $this->Tahunajaran_model->gettahunajaranById($id_tahunajaran);
        $data['kelasguru'] = $this->Kelasguru_model->getkelasguruById($id_kelasguru);
        $id_guru = $data['kelasguru']['id_guru'];
        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);
        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $id_kelas = $data['kelasguru']['id_kelas'];
        $data['kelas'] = $this->Kelas_model->getkelasById($id_kelas);

        $data['biaya'] = $this->db->get_where('biaya', ['id_kelas' => $id_kelas])->row_array();
        $id_biaya = $data['biaya']['id_biaya'];
        $nominal = $data['biaya']['nominal'];

        $data['bank'] = $this->db->get('bank')->row_array();

        $cekpembayaran = $this->db->get_where('pembayaran', [
            'id_les' => $id_les,
            'id_siswa' => $id_siswa
        ])->num_rows();
        if ($cekpembayaran !== 1) {

            $this->Pembayaran_model->tambahDataTagihan($id_siswa, $id_les, $id_biaya, $nominal);
        }
        $data['pembayaran'] = $this->db->get_where('pembayaran', [
            'id_les' => $id_les,
            'id_siswa' => $id_siswa
        ])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/tagihan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasipembayaran($id_les, $id_pembayaran)
    {
        $data['judul'] = 'Tagihan';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $data['les'] = $this->Les_model->getlesById($id_les);
        $id_kelasguru = $data['les']['id_kelasguru'];
        $id_tahunajaran = $data['les']['id_tahunajaran'];
        $id_matapelajaran = $data['les']['id_matapelajaran'];
        $data['tahunajaran'] = $this->Tahunajaran_model->gettahunajaranById($id_tahunajaran);
        $data['kelasguru'] = $this->Kelasguru_model->getkelasguruById($id_kelasguru);
        $id_guru = $data['kelasguru']['id_guru'];
        $data['matapelajaran'] = $this->Matapelajaran_model->getmatapelajaranById($id_matapelajaran);
        $data['guru'] = $this->Guru_model->getguruById($id_guru);

        $data['les'] = $this->db->get_where('les', ['id_les' => $id_les])->row_array();
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
        $id_statuspembayaran = $data['pembayaran']['id_status'];
        if ($id_statuspembayaran > 1) {
            echo "<script>alert('Tagihan ini sudah dibayar!');history.go(-1);</script>";
        } else {
            $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();


            $this->form_validation->set_rules('namabank', 'Nama Bank', 'required');
            $this->form_validation->set_rules('atasnama', 'Atas Nama', 'required');
            $this->form_validation->set_rules('norekening', 'No Rekening', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebarsiswa', $data);
                $this->load->view('siswa/konfirmasipembayaran', $data);
                $this->load->view('templates/footer', $data);
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
                    $this->Pembayaran_model->ubahDatapembayaran($id_pembayaran, $file_baru);
                    $this->session->set_flashdata('flashdata', 'dibayar, mohon menunggu konfirmasi dari admin');
                    redirect('siswa/tagihan/' . $id_les);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan upload silahkan periksa kesalahan!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
        }
    }

    //pembayaran
    public function pembayaran()
    {

        $data['judul'] = 'Riwayat Pembayaran';
        $data['pengguna'] = $this->db->get_where('siswa', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama'];
        $data['username'] = $data['pengguna']['email'];
        $data['id_level'] = '4';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_siswa = $data['pengguna']['id_siswa'];
        $data['pegawai'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

        $id_kelas = '1';
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_siswa' => $id_siswa])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebarsiswa', $data);
        $this->load->view('siswa/pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }
}
