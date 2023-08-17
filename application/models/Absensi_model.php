<?php

class Absensi_model extends CI_Model
{

    public function getAllabsensi()
    {

        return $this->db->get('absensi')->result_array();
    }

    public function getabsensiById($id_absensi)
    {

        return $this->db->get_where('absensi', ['id_absensi' => $id_absensi])->row_array();
    }

    public function tambahDataabsensi()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_kalenderpendidikan" => $this->input->post('id_kalenderpendidikan', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_status" => $this->input->post('id_status', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('absensi', $data);
    }

    public function UbahDataabsensi($id_absensi)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_kalenderpendidikan" => $this->input->post('id_kalenderpendidikan', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_status" => $this->input->post('id_status', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_absensi', $id_absensi);
        $this->db->update('absensi', $data);
    }

    public function hapusDataabsensi($id_absensi)
    {

        //$this->db->where('id_absensi',$id_absensi);
        //$this->db->delete('absensi');
        $this->db->delete('absensi', ['id_absensi' => $id_absensi]);
    }
}
