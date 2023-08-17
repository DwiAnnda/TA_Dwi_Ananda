<?php

class Latihansoalganda_model extends CI_Model
{

    public function getAlllatihansoalganda()
    {

        return $this->db->get('latihansoalganda')->result_array();
    }

    public function getlatihansoalgandaById($id_latihansoalganda)
    {

        return $this->db->get_where('latihansoalganda', ['id_latihansoalganda' => $id_latihansoalganda])->row_array();
    }

    public function tambahDatalatihansoalganda($id_latihan, $id_soalganda)
    {
        $data = [
            "id_latihan" => $id_latihan,
            "id_soalganda" => $id_soalganda,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('latihansoalganda', $data);
    }

    public function hapusDatalatihansoalganda($id_latihansoalganda)
    {

        $this->db->delete('latihansoalganda', ['id_latihansoalganda' => $id_latihansoalganda]);
    }

    public function hapusDatalatihansoalgandaAll($id_latihan)
    {

        $this->db->delete('latihansoalganda', ['id_latihan' => $id_latihan]);
    }
}
