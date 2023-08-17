<?php

class Kelas_model extends CI_Model
{

    public function getAllkelas()
    {

        return $this->db->get('kelas')->result_array();
    }

    public function getkelasById($id_kelas)
    {

        return $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
    }

    public function tambahDatakelas()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_kelas" => $this->input->post('nama_kelas', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('kelas', $data);
    }

    public function ubahDatakelas()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_kelas" => $this->input->post('nama_kelas', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kelas', $this->input->post('id_kelas', true));
        $this->db->update('kelas', $data);
    }

    public function hapusDatakelas($id_kelas)
    {

        //$this->db->where('id_kelas',$id_kelas);
        //$this->db->delete('kelas');
        $this->db->delete('kelas', ['id_kelas' => $id_kelas]);
    }
}
