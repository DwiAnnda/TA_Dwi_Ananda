<?php

class Kelasguru_model extends CI_Model
{

    public function getAllkelasguru()
    {

        return $this->db->get('kelasguru')->result_array();
    }

    public function getkelasguruById($id_kelasguru)
    {

        return $this->db->get_where('kelasguru', ['id_kelasguru' => $id_kelasguru])->row_array();
    }
    public function getAllkelasByGuru($id_guru)
    {

        return $this->db->get_where('kelasguru', ['id_guru' => $id_guru])->result_array();
    }

    public function tambahDatakelasguru()
    {

        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('kelasguru', $data);
    }

    public function ubahDatakelasguru($id_kelasguru)
    {

        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kelasguru', $id_kelasguru);
        $this->db->update('kelasguru', $data);
    }

    public function hapusDatakelasguru($id_kelasguru)
    {
        $this->db->delete('kelasguru', ['id_kelasguru' => $id_kelasguru]);
    }
}
