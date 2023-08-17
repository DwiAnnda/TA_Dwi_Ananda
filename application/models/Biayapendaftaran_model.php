<?php

class Biayapendaftaran_model extends CI_Model
{

    public function getAllbiayapendaftaran()
    {

        return $this->db->get('biayapendaftaran')->result_array();
    }

    public function getbiayapendaftaranById($id_biayapendaftaran)
    {

        return $this->db->get_where('biayapendaftaran', ['id_biayapendaftaran' => $id_biayapendaftaran])->row_array();
    }

    public function tambahDatabiayapendaftaran()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "biaya" => $this->input->post('biaya', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('biayapendaftaran', $data);
    }

    public function ubahDatabiayapendaftaran()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "biaya" => $this->input->post('biaya', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_biayapendaftaran', $this->input->post('id_biayapendaftaran', true));
        $this->db->update('biayapendaftaran', $data);
    }

    public function hapusDatabiayapendaftaran($id_biayapendaftaran)
    {

        //$this->db->where('id_biayapendaftaran',$id_biayapendaftaran);
        //$this->db->delete('biayapendaftaran');
        $this->db->delete('biayapendaftaran', ['id_biayapendaftaran' => $id_biayapendaftaran]);
    }
}
