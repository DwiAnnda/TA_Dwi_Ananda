<?php

class Sumberpengeluaran_model extends CI_Model
{

    public function getAllsumberpengeluaran()
    {

        return $this->db->get('sumberpengeluaran')->result_array();
    }

    public function getsumberpengeluaranById($id_sumberpengeluaran)
    {

        return $this->db->get_where('sumberpengeluaran', ['id_sumberpengeluaran' => $id_sumberpengeluaran])->row_array();
    }

    public function tambahDatasumberpengeluaran()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_sumberpengeluaran" => $this->input->post('nama_sumberpengeluaran', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('sumberpengeluaran', $data);
    }

    public function ubahDatasumberpengeluaran()
    {

        $data = [
            "id_sumberpengeluaran" => $this->input->post('id_sumberpengeluaran', true),
            "urutan" => $this->input->post('urutan', true),
            "nama_sumberpengeluaran" => $this->input->post('nama_sumberpengeluaran', true),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_sumberpengeluaran', $this->input->post('id_sumberpengeluaran', true));
        $this->db->update('sumberpengeluaran', $data);
    }

    public function hapusDatasumberpengeluaran($id_sumberpengeluaran)
    {

        //$this->db->where('id_sumberpengeluaran',$id_sumberpengeluaran);
        //$this->db->delete('sumberpengeluaran');
        $this->db->delete('sumberpengeluaran', ['id_sumberpengeluaran' => $id_sumberpengeluaran]);
    }
}
