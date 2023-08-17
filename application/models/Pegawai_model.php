<?php

class Pegawai_model extends CI_Model
{

    public function getAllPegawai()
    {

        return $this->db->get('pegawai')->result_array();
    }

    public function getPegawaiById($id_pegawai)
    {

        return $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
    }

    public function tambahDataPegawai($file_ijazah, $file_ktp, $file_kk, $file_foto)
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $tmt = date('Y-m-d', strtotime($this->input->post('tmt')));
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "id_golpangkat" => $this->input->post('id_golpangkat', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "id_pendidikan" => $this->input->post('id_pendidikan', true),
            "tmt" => $tmt,
            "ijazah" => $file_ijazah,
            "ktp" => $file_ktp,
            "kk" => $file_kk,
            "foto" => $file_foto,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pegawai', $data);
    }
    //ijazah
    public function ubahDataPegawaiIjazah($file_baru)
    {
        $data = [
            "ijazah" => $file_baru,
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }
    //ktp
    public function ubahDataPegawaiktp($file_baru)
    {
        $data = [
            "ktp" => $file_baru,
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }
    //kk
    public function ubahDataPegawaikk($file_baru)
    {
        $data = [
            "kk" => $file_baru,
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }
    //foto
    public function ubahDataPegawaiFoto($file_baru)
    {
        $data = [
            "foto" => $file_baru,
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }

    public function ubahDataPegawai()
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "id_golpangkat" => $this->input->post('id_golpangkat', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }

    public function hapusDataPegawai($id_pegawai)
    {

        //$this->db->where('id_pegawai',$id_pegawai);
        //$this->db->delete('pegawai');
        $this->db->delete('pegawai', ['id_pegawai' => $id_pegawai]);
    }
}
