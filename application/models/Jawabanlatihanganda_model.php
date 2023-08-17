<?php

class Jawabanlatihanganda_model extends CI_Model
{

    public function getAlljawabanlatihanganda()
    {

        return $this->db->get('jawabanlatihanganda')->result_array();
    }

    public function getjawabanlatihangandaById($id_jawabanlatihanganda)
    {

        return $this->db->get_where('jawabanlatihanganda', ['id_jawabanlatihanganda' => $id_jawabanlatihanganda])->row_array();
    }

    public function tambahDatajawabanlatihanganda()
    {

        $data = [
            "id_latihansoalganda" => $this->input->post('id_latihansoalganda', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "jawaban" => $this->input->post('jawaban', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jawabanlatihanganda', $data);
    }

    public function ubahDatajawabanlatihanganda($id_jawabanlatihanganda)
    {
        $data = [
            "jawaban" => $this->input->post('jawaban', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jawabanlatihanganda', $id_jawabanlatihanganda);
        $this->db->update('jawabanlatihanganda', $data);
    }

    public function hapusDatajawabanlatihanganda($id_jawabanlatihanganda)
    {
        $this->db->delete('jawabanlatihanganda', ['id_jawabanlatihanganda' => $id_jawabanlatihanganda]);
    }
}
