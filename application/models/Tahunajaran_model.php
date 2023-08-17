<?php

class Tahunajaran_model extends CI_Model
{

    public function getAlltahunajaran()
    {

        return $this->db->get('tahunajaran')->result_array();
    }

    public function gettahunajaranById($id_tahunajaran)
    {

        return $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
    }

    public function tambahDatatahunajaran()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_tahunajaran" => $this->input->post('nama_tahunajaran', true),
            "smester" => $this->input->post('smester', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('tahunajaran', $data);
    }

    public function ubahDatatahunajaran()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_tahunajaran" => $this->input->post('nama_tahunajaran', true),
            "smester" => $this->input->post('smester', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_tahunajaran', $this->input->post('id_tahunajaran', true));
        $this->db->update('tahunajaran', $data);
    }

    public function hapusDatatahunajaran($id_tahunajaran)
    {

        //$this->db->where('id_tahunajaran',$id_tahunajaran);
        //$this->db->delete('tahunajaran');
        $this->db->delete('tahunajaran', ['id_tahunajaran' => $id_tahunajaran]);
    }
}
