<?php

class Tema_model extends CI_Model
{

    public function getAlltema()
    {

        return $this->db->get('tema')->result_array();
    }

    public function gettemaById($id_tema)
    {

        return $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
    }

    public function tambahDatatema()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "id_kategoritema" => $this->input->post('id_kategoritema', true),
            "nama_tema" => $this->input->post('nama_tema', true),
            "id_guru" => $this->input->post('id_guru', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('tema', $data);
    }

    public function ubahDatatema()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "id_kategoritema" => $this->input->post('id_kategoritema', true),
            "nama_tema" => $this->input->post('nama_tema', true),
            "id_guru" => $this->input->post('id_guru', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_tema', $this->input->post('id_tema', true));
        $this->db->update('tema', $data);
    }

    public function hapusDatatema($id_tema)
    {

        //$this->db->where('id_tema',$id_tema);
        //$this->db->delete('tema');
        $this->db->delete('tema', ['id_tema' => $id_tema]);
    }
}
