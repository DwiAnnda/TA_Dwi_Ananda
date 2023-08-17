<?php

class Soalisian_model extends CI_Model
{

    public function getAllsoalisian()
    {

        return $this->db->get('soalisian')->result_array();
    }

    public function getsoalisianById($id_soalisian)
    {

        return $this->db->get_where('soalisian', ['id_soalisian' => $id_soalisian])->row_array();
    }

    public function tambahDatasoalisian($id_les)
    {
        $data = [
            "kode" => random_string('alnum', 10),
            "id_les" => $id_les,
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "jawaban" => $this->input->post('jawaban', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('soalisian', $data);
    }
    public function ubahDatasoalisian($id_soalisian)
    {
        $data = [
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "jawaban" => $this->input->post('jawaban', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_soalisian', $id_soalisian);
        $this->db->update('soalisian', $data);
    }

    public function hapusDatasoalisian($id_soalisian)
    {

        $this->db->delete('soalisian', ['id_soalisian' => $id_soalisian]);
    }
}
