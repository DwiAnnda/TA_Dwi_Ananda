<?php

class Kalenderpendidikan_model extends CI_Model
{

    public function getAllkalenderpendidikan()
    {

        return $this->db->get('kalenderpendidikan')->result_array();
    }

    public function getkalenderpendidikanById($id_kalenderpendidikan)
    {

        return $this->db->get_where('kalenderpendidikan', ['id_kalenderpendidikan' => $id_kalenderpendidikan])->row_array();
    }

    public function tambahDatakalenderpendidikan()
    {
        $dari_tanggal = date('Y-m-d', strtotime($this->input->post('dari_tanggal')));
        $sampai_tanggal = date('Y-m-d', strtotime($this->input->post('sampai_tanggal')));
        while (strtotime($dari_tanggal) <= strtotime($sampai_tanggal)) {
            $hari = date('l', strtotime($dari_tanggal));
            if ($hari  != 'Sunday') {
                $data = [
                    "tanggal" => $dari_tanggal,
                    "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
                    "user_input" => check_username(),
                    "tgl_input" => date('Y-m-d h:m:i')
                ];
                $this->db->insert('kalenderpendidikan', $data);
            }
            $dari_tanggal = date("Y-m-d", strtotime("+1 day", strtotime($dari_tanggal))); //looping tambah 1 date
        }
    }

    public function ubahDatakalenderpendidikan()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "tanggal" => $tanggal,
            "nik" => $this->input->post('nik', true),
            "nokk" => $this->input->post('nokk', true),
            "nama_kalenderpendidikan" => $this->input->post('nama_kalenderpendidikan', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "anak_ke" => $this->input->post('anak_ke', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "aktif" => $this->input->post('aktif', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kalenderpendidikan', $this->input->post('id_kalenderpendidikan', true));
        $this->db->update('kalenderpendidikan', $data);
    }

    public function hapusDatakalenderpendidikan($id_kalenderpendidikan)
    {

        //$this->db->where('id_kalenderpendidikan',$id_kalenderpendidikan);
        //$this->db->delete('kalenderpendidikan');
        $this->db->delete('kalenderpendidikan', ['id_kalenderpendidikan' => $id_kalenderpendidikan]);
    }
}
