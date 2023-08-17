<?php

class Siswa_model extends CI_Model
{

    public function getAllsiswa()
    {

        return $this->db->get('siswa')->result_array();
    }
    public function getAllsiswapendaftaran()
    {

        return $this->db->get_where('siswa', ['id_status' => '1'])->result_array();
    }
    public function getAllsiswaditerima()
    {

        return $this->db->get_where('siswa', ['id_status' => '2'])->result_array();
    }
    public function getAllsiswaditolak()
    {

        return $this->db->get_where('siswa', ['id_status' => '3'])->result_array();
    }

    public function getsiswaById($id_siswa)
    {

        return $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
    }

    public function PendaftaranDatasiswa()
    {
        $kode = random_string('alnum', 5);
        $tanggal = date('Y-m-d');
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "kode" => $kode,
            "tanggal" => $tanggal,
            "nis" => $this->input->post('nis', true),
            "nama" => $this->input->post('nama', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "user_input" => $this->input->post('email', true),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('siswa', $data);
    }

    public function terimasiswa($id_siswa)
    {
        $data = [
            "id_status" => '2',
            "password" => password_hash('123456', PASSWORD_DEFAULT),
            "token" => random_string('alnum', 10),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
    }
    public function tolaksiswa($id_siswa)
    {
        $data = [
            "id_status" => '3',
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
    }
    public function ubahDatasiswa($id_siswa)
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "nis" => $this->input->post('nis', true),
            "nama" =>  $this->input->post('nama', true),
            "id_jeniskelamin" =>  $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" =>  $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" =>  $this->input->post('alamat', true),
            "nohp" =>  $this->input->post('nohp', true),
            "email" =>  $this->input->post('email', true),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
    }
    public function ubahPassword($id_siswa)
    {
        $data = [
            "password" => password_hash('123456', PASSWORD_DEFAULT),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
    }

    public function hapusDatasiswa($id_siswa)
    {

        $this->db->delete('siswa', ['id_siswa' => $id_siswa]);
    }
}
