<?php

class Penilaiansiswa_model extends CI_Model
{

    public function getAllpenilaiansiswa()
    {

        return $this->db->get('penilaiansiswa')->result_array();
    }

    public function getpenilaiansiswaById($id_penilaiansiswa)
    {

        return $this->db->get_where('penilaiansiswa', ['id_penilaiansiswa' => $id_penilaiansiswa])->row_array();
    }

    public function tambahDatapenilaiansiswa()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_tema" => $this->input->post('id_tema', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_nilai" => $this->input->post('id_nilai', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('penilaiansiswa', $data);
    }

    public function ubahDatapenilaiansiswa()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_tema" => $this->input->post('id_tema', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_nilai" => $this->input->post('id_nilai', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_penilaiansiswa', $this->input->post('id_penilaiansiswa', true));
        $this->db->update('penilaiansiswa', $data);
    }

    public function hapusDatapenilaiansiswa($id_penilaiansiswa)
    {

        //$this->db->where('id_penilaiansiswa',$id_penilaiansiswa);
        //$this->db->delete('penilaiansiswa');
        $this->db->delete('penilaiansiswa', ['id_penilaiansiswa' => $id_penilaiansiswa]);
    }
}
