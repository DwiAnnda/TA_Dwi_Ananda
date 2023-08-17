<?php

class Guru_model extends CI_Model
{

    public function getAllguru()
    {

        return $this->db->get('guru')->result_array();
    }
    public function getAllgurupendaftaran()
    {

        return $this->db->get_where('guru', ['id_status' => '1'])->result_array();
    }
    public function getAllguruditerima()
    {

        return $this->db->get_where('guru', ['id_status' => '2'])->result_array();
    }
    public function getAllguruditolak()
    {

        return $this->db->get_where('guru', ['id_status' => '3'])->result_array();
    }

    public function getguruById($id_guru)
    {

        return $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
    }

    public function PendaftaranDataguru()
    {
        $kode = random_string('alnum', 5);
        $tanggal = date('Y-m-d');
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "kode" => $kode,
            "tanggal" => $tanggal,
            "nip" => $this->input->post('nip', true),
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
        $this->db->insert('guru', $data);
    }

    public function terimaguru($id_guru)
    {
        $data = [
            "id_status" => '2',
            "password" => password_hash('123456', PASSWORD_DEFAULT),
            "token" => random_string('alnum', 10),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }
    public function tolakguru($id_guru)
    {
        $data = [
            "id_status" => '3',
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }
    public function ubahDataguru($id_guru)
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "nip" => $this->input->post('nip', true),
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
        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }
    public function ubahPassword($id_guru)
    {
        $data = [
            "password" => password_hash('123456', PASSWORD_DEFAULT),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }

    public function hapusDataguru($id_guru)
    {

        $this->db->delete('guru', ['id_guru' => $id_guru]);
    }
}
