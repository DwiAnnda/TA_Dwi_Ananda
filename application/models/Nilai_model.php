<?php

class Nilai_model extends CI_Model
{

    public function getAllnilai()
    {

        return $this->db->get('nilai')->result_array();
    }

    public function getnilaiById($id_nilai)
    {

        return $this->db->get_where('nilai', ['id_nilai' => $id_nilai])->row_array();
    }

    public function tambahDatanilai()
    {

        $data = [
            "tanggal" => date('Y-m-d'),
            "id_latihan" => $this->input->post('id_latihan', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "nilaiangka" => $this->input->post('nilaiangka', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('nilai', $data);
    }

    public function ubahDatanilai($id_nilai)
    {
        $data = [
            "id_latihan" => $this->input->post('id_latihan', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "nilaiangka" => $this->input->post('nilaiangka', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
    }

    public function hapusDatanilai($id_nilai)
    {

        //$this->db->where('id_nilai',$id_nilai);
        //$this->db->delete('nilai');
        $this->db->delete('nilai', ['id_nilai' => $id_nilai]);
    }
}
