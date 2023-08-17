<?php

class Latihan_model extends CI_Model
{

    public function getAlllatihan()
    {

        return $this->db->get('latihan')->result_array();
    }

    public function getlatihanById($id_latihan)
    {

        return $this->db->get_where('latihan', ['id_latihan' => $id_latihan])->row_array();
    }

    public function tambahDatalatihan($id_les)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "id_les" => $id_les,
            "judul" => $this->input->post('judul', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('latihan', $data);
    }
    public function ubahDatalatihan($id_latihan)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "judul" => $this->input->post('judul', true),
            "keterangan" => $this->input->post('keterangan', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_latihan', $id_latihan);
        $this->db->update('latihan', $data);
    }

    public function hapusDatalatihan($id_latihan)
    {

        $this->db->delete('latihan', ['id_latihan' => $id_latihan]);
    }
}
