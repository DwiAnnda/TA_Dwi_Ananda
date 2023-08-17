<?php

class Pengumuman_model extends CI_Model
{

    public function getAllpengumuman()
    {

        return $this->db->get('pengumuman')->result_array();
    }

    public function getpengumumanById($id_pengumuman)
    {

        return $this->db->get_where('pengumuman', ['id_pengumuman' => $id_pengumuman])->row_array();
    }

    public function tambahDatapengumuman()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_pendaftaran = date('Y-m-d', strtotime($this->input->post('tanggal_pendaftaran')));
        $tanggal_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
        $data = [
            "tanggal" => $tanggal,
            "tanggal_pendaftaran" => $tanggal_pendaftaran,
            "tanggal_akhir" => $tanggal_akhir,
            "nomor_surat" => $this->input->post('nomor_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "syarat" => $this->input->post('syarat', true),
            "tempat" => $this->input->post('tempat', true),
            "kontak" => $this->input->post('kontak', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pengumuman', $data);
    }

    public function ubahDatapengumuman()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_pendaftaran = date('Y-m-d', strtotime($this->input->post('tanggal_pendaftaran')));
        $tanggal_akhir = date('Y-m-d', strtotime($this->input->post('tanggal_akhir')));
        $data = [
            "tanggal" => $tanggal,
            "tanggal_pendaftaran" => $tanggal_pendaftaran,
            "tanggal_akhir" => $tanggal_akhir,
            "nomor_surat" => $this->input->post('nomor_surat', true),
            "perihal" => $this->input->post('perihal', true),
            "syarat" => $this->input->post('syarat', true),
            "tempat" => $this->input->post('tempat', true),
            "kontak" => $this->input->post('kontak', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pengumuman', $this->input->post('id_pengumuman', true));
        $this->db->update('pengumuman', $data);
    }

    public function hapusDatapengumuman($id_pengumuman)
    {

        //$this->db->where('id_pengumuman',$id_pengumuman);
        //$this->db->delete('pengumuman');
        $this->db->delete('pengumuman', ['id_pengumuman' => $id_pengumuman]);
    }
}
