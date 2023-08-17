<?php

class Soalganda_model extends CI_Model
{

    public function getAllsoalganda()
    {

        return $this->db->get('soalganda')->result_array();
    }

    public function getsoalgandaById($id_soalganda)
    {

        return $this->db->get_where('soalganda', ['id_soalganda' => $id_soalganda])->row_array();
    }

    public function tambahDatasoalganda($id_les)
    {
        $data = [
            "kode" => random_string('alnum', 10),
            "id_les" => $id_les,
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "a" => $this->input->post('pilihana', true),
            "b" => $this->input->post('pilihanb', true),
            "c" => $this->input->post('pilihanc', true),
            "d" => $this->input->post('pilihand', true),
            "e" => $this->input->post('pilihane', true),
            "jawaban" => $this->input->post('jawaban', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('soalganda', $data);
    }
    public function ubahDatasoalganda($id_soalganda)
    {
        $data = [
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "a" => $this->input->post('pilihana', true),
            "b" => $this->input->post('pilihanb', true),
            "c" => $this->input->post('pilihanc', true),
            "d" => $this->input->post('pilihand', true),
            "e" => $this->input->post('pilihane', true),
            "jawaban" => $this->input->post('jawaban', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_soalganda', $id_soalganda);
        $this->db->update('soalganda', $data);
    }

    public function hapusDatasoalganda($id_soalganda)
    {

        $this->db->delete('soalganda', ['id_soalganda' => $id_soalganda]);
    }
}
