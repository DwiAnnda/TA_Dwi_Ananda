<?php

class Tagihan_model extends CI_Model
{

    public function getAlltagihan()
    {

        return $this->db->get('tagihan')->result_array();
    }

    public function gettagihanById($id_tagihan)
    {

        return $this->db->get_where('tagihan', ['id_tagihan' => $id_tagihan])->row_array();
    }

    public function tambahDatatagihanpendaftaran($id_pendaftaran)
    {
        $tagihan = $this->db->get_where('jenistagihan', ['id_jenistagihan' => '1'])->row_array();
        $nominal = $tagihan['nominal'];
        $tanggal = date('Y-m-d');
        $data = [
            "tanggal" => $tanggal,
            "id_pendaftaran" => $id_pendaftaran,
            "id_jenistagihan" => '1',
            "nominal" => $nominal,
            "user_input" => 'Umum',
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('tagihan', $data);
    }
    public function tambahDatatagihan()
    {
        $id_jenistagihan = $this->input->post('id_jenistagihan');
        $tagihan = $this->db->get_where('jenistagihan', ['id_jenistagihan' => $id_jenistagihan])->row_array();
        $nominal = $tagihan['nominal'];
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_pendaftaran" => $this->input->post('id_pendaftaran', true),
            "id_jenistagihan" => $id_jenistagihan,
            "nominal" => $nominal,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('tagihan', $data);
    }

    public function terimatagihan($id_pendaftaran)
    {
        $data = [
            "id_status" => '3',
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->update('tagihan', $data);
    }

    public function hapusDatatagihan($id_tagihan)
    {
        $tagihan = $this->Tagihan_model->gettagihanById($id_tagihan);
        $id_pendaftaran = $tagihan['id_pendaftaran'];
           $data = [
            "id_status" => '1',
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->update('pendaftaran', $data);
        
        $this->db->delete('tagihan', ['id_tagihan' => $id_tagihan]);
    }
}
