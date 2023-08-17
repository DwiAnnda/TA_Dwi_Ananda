<?php

class Jawabanlatihanisian_model extends CI_Model
{

    public function getAlljawabanlatihanisian()
    {

        return $this->db->get('jawabanlatihanisian')->result_array();
    }

    public function getjawabanlatihanisianById($id_jawabanlatihanisian)
    {

        return $this->db->get_where('jawabanlatihanisian', ['id_jawabanlatihanisian' => $id_jawabanlatihanisian])->row_array();
    }

    public function tambahDatajawabanlatihanisian()
    {

        $data = [
            "id_latihansoalisian" => $this->input->post('id_latihansoalisian', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "jawaban" => $this->input->post('jawaban', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jawabanlatihanisian', $data);
    }

    public function ubahDatajawabanlatihanisian($id_jawabanlatihanisian)
    {
        $data = [
            "jawaban" => $this->input->post('jawaban', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jawabanlatihanisian', $id_jawabanlatihanisian);
        $this->db->update('jawabanlatihanisian', $data);
    }

    public function hapusDatajawabanlatihanisian($id_jawabanlatihanisian)
    {
        $this->db->delete('jawabanlatihanisian', ['id_jawabanlatihanisian' => $id_jawabanlatihanisian]);
    }
}
