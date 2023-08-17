<?php

class Latihansoalisian_model extends CI_Model
{

    public function getAlllatihansoalisian()
    {

        return $this->db->get('latihansoalisian')->result_array();
    }

    public function getlatihansoalisianById($id_latihansoalisian)
    {

        return $this->db->get_where('latihansoalisian', ['id_latihansoalisian' => $id_latihansoalisian])->row_array();
    }

    public function tambahDatalatihansoalisian($id_latihan, $id_soalisian)
    {
        $data = [
            "id_latihan" => $id_latihan,
            "id_soalisian" => $id_soalisian,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('latihansoalisian', $data);
    }

    public function hapusDatalatihansoalisian($id_latihansoalisian)
    {

        $this->db->delete('latihansoalisian', ['id_latihansoalisian' => $id_latihansoalisian]);
    }

    public function hapusDatalatihansoalisianAll($id_latihan)
    {

        $this->db->delete('latihansoalisian', ['id_latihan' => $id_latihan]);
    }
}
