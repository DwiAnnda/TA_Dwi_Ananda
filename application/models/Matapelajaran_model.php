<?php

class matapelajaran_model extends CI_Model
{

    public function getAllmatapelajaran()
    {

        return $this->db->get('matapelajaran')->result_array();
    }

    public function getmatapelajaranById($id_matapelajaran)
    {

        return $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id_matapelajaran])->row_array();
    }

    public function tambahDatamatapelajaran()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_matapelajaran" => $this->input->post('nama_matapelajaran', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('matapelajaran', $data);
    }

    public function ubahDatamatapelajaran()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_matapelajaran" => $this->input->post('nama_matapelajaran', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_matapelajaran', $this->input->post('id_matapelajaran', true));
        $this->db->update('matapelajaran', $data);
    }

    public function hapusDatamatapelajaran($id_matapelajaran)
    {

        //$this->db->where('id_matapelajaran',$id_matapelajaran);
        //$this->db->delete('matapelajaran');
        $this->db->delete('matapelajaran', ['id_matapelajaran' => $id_matapelajaran]);
    }
}
