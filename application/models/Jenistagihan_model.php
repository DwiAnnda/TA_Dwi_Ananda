<?php

class Jenistagihan_model extends CI_Model
{

    public function getAlljenistagihan()
    {

        return $this->db->get('jenistagihan')->result_array();
    }

    public function getjenistagihanById($id_jenistagihan)
    {

        return $this->db->get_where('jenistagihan', ['id_jenistagihan' => $id_jenistagihan])->row_array();
    }

    public function tambahDatajenistagihan()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $data = [
            "kode" => random_string('alnum', 5),
            "nama_jenistagihan" => $this->input->post('nama_jenistagihan', true),
            "nominal" => $nominal,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jenistagihan', $data);
    }

    public function ubahDatajenistagihan()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $data = [
            "nama_jenistagihan" => $this->input->post('nama_jenistagihan', true),
            "nominal" => $nominal,
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jenistagihan', $this->input->post('id_jenistagihan', true));
        $this->db->update('jenistagihan', $data);
    }

    public function hapusDatajenistagihan($id_jenistagihan)
    {
        $this->db->delete('jenistagihan', ['id_jenistagihan' => $id_jenistagihan]);
    }
}
