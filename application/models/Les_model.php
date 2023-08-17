<?php

class Les_model extends CI_Model
{

    public function getAllles()
    {

        return $this->db->get('les')->result_array();
    }

    public function getlesById($id_les)
    {

        return $this->db->get_where('les', ['id_les' => $id_les])->row_array();
    }

    public function tambahDatales()
    {

        $data = [
            "kode" => random_string('alnum', 5),
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_kelasguru" => $this->input->post('id_kelasguru', true),
            "id_matapelajaran" => $this->input->post('id_matapelajaran', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('les', $data);
    }

    public function ubahDatales($id_les)
    {

        $data = [
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_kelasguru" => $this->input->post('id_kelasguru', true),
            "id_matapelajaran" => $this->input->post('id_matapelajaran', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_les', $id_les);
        $this->db->update('les', $data);
    }

    public function hapusDatales($id_les)
    {
        $this->db->delete('les', ['id_les' => $id_les]);
    }
}
