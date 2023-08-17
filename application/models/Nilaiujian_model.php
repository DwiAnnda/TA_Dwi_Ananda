<?php

class Nilaiujian_model extends CI_Model
{

    public function getAllnilaiujian()
    {

        return $this->db->get('nilaiujian')->result_array();
    }

    public function getnilaiujianById($id_nilaiujian)
    {

        return $this->db->get_where('nilaiujian', ['id_nilaiujian' => $id_nilaiujian])->row_array();
    }

    public function tambahDatanilaiujian()
    {
        $id_nilaiujian = $this->input->post('id_nilaiujian');
        $nilaiujian = $this->db->get_where('nilaiujian', ['id_nilaiujian' => $id_nilaiujian])->row_array();
        $tanggal = $nilaiujian['tanggal'];
        $data = [
            "tanggal" => $tanggal,
            "nilaipengetahuan" => $this->input->post('nilaipengetahuan', true),
            "nilaiketerampilan" => $this->input->post('nilaiketerampilan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('nilaiujian', $data);
    }

    public function ubahDatanilaiujian()
    {
        $id_nilaiujian = $this->input->post('id_nilaiujian');
        $nilaiujian = $this->db->get_where('nilaiujian', ['id_nilaiujian' => $id_nilaiujian])->row_array();
        $tanggal = $nilaiujian['tanggal'];
        $data = [
            "tanggal" => $tanggal,
            "nilaipengetahuan" => $this->input->post('nilaipengetahuan', true),
            "nilaiketerampilan" => $this->input->post('nilaiketerampilan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_nilaiujian', $this->input->post('id_nilaiujian', true));
        $this->db->update('nilaiujian', $data);
    }

    public function hapusDatanilaiujian($id_nilaiujian)
    {

        //$this->db->where('id_nilaiujian',$id_nilaiujian);
        //$this->db->delete('nilaiujian');
        $this->db->delete('nilaiujian', ['id_nilaiujian' => $id_nilaiujian]);
    }
}
