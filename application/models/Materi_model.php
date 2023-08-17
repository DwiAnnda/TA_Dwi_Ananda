<?php

class materi_model extends CI_Model
{

    public function getAllmateri()
    {

        return $this->db->get('materi')->result_array();
    }

    public function getmateriById($id_materi)
    {

        return $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
    }

    public function tambahDatamateri($id_les, $file_baru)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "id_les" => $id_les,
            "nama_materi" => $this->input->post('nama_materi', true),
            "file" => $file_baru,
            "link" => $this->input->post('link', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('materi', $data);
    }
    public function ubahDatamateri($id_materi, $file_baru)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "nama_materi" => $this->input->post('nama_materi', true),
            "file" => $file_baru,
            "link" => $this->input->post('link', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_materi', $id_materi);
        $this->db->update('materi', $data);
    }

    public function hapusDatamateri($id_materi)
    {

        $this->db->delete('materi', ['id_materi' => $id_materi]);
    }
}
