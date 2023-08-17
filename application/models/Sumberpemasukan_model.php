<?php

class Sumberpemasukan_model extends CI_Model
{

    public function getAllsumberpemasukan()
    {

        return $this->db->get('sumberpemasukan')->result_array();
    }

    public function getsumberpemasukanById($id_sumberpemasukan)
    {

        return $this->db->get_where('sumberpemasukan', ['id_sumberpemasukan' => $id_sumberpemasukan])->row_array();
    }

    public function tambahDatasumberpemasukan()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_sumberpemasukan" => $this->input->post('nama_sumberpemasukan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('sumberpemasukan', $data);
    }

    public function ubahDatasumberpemasukan()
    {

        $data = [
            "id_sumberpemasukan" => $this->input->post('id_sumberpemasukan', true),
            "urutan" => $this->input->post('urutan', true),
            "nama_sumberpemasukan" => $this->input->post('nama_sumberpemasukan', true),
            "user_ubah" => $this->session->userdata('username'),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_sumberpemasukan', $this->input->post('id_sumberpemasukan', true));
        $this->db->update('sumberpemasukan', $data);
    }

    public function hapusDatasumberpemasukan($id_sumberpemasukan)
    {

        //$this->db->where('id_sumberpemasukan',$id_sumberpemasukan);
        //$this->db->delete('sumberpemasukan');
        $this->db->delete('sumberpemasukan', ['id_sumberpemasukan' => $id_sumberpemasukan]);
    }
}
