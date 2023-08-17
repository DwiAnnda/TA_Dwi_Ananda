<?php

class Tugas_model extends CI_Model
{

    public function getAlltugas()
    {

        return $this->db->get('tugas')->result_array();
    }

    public function gettugasById($id_tugas)
    {

        return $this->db->get_where('tugas', ['id_tugas' => $id_tugas])->row_array();
    }

    public function tambahDatatugas()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "id_matapelajaran" => $this->input->post('id_matapelajaran', true),
            "judul" => $this->input->post('judul', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('tugas', $data);
    }
    public function ubahDatatugas()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_matapelajaran" => $this->input->post('id_matapelajaran', true),
            "judul" => $this->input->post('judul', true),
            "keterangan" => $this->input->post('keterangan', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_tugas', $this->input->post('id_tugas', true));
        $this->db->update('tugas', $data);
    }

    public function hapusDatatugas($id_tugas)
    {

        $this->db->delete('tugas', ['id_tugas' => $id_tugas]);
    }
}
