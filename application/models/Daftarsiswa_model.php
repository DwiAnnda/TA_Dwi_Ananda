<?php

class Daftarsiswa_model extends CI_Model
{

    public function getAlldaftarsiswa()
    {

        return $this->db->get('daftarsiswa')->result_array();
    }

    public function getdaftarsiswaById($id_daftarsiswa)
    {

        return $this->db->get_where('daftarsiswa', ['id_daftarsiswa' => $id_daftarsiswa])->row_array();
    }

    public function tambahDatadaftarsiswa()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('daftarsiswa', $data);
    }

    public function ubahDatadaftarsiswa()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_daftarsiswa', $this->input->post('id_daftarsiswa', true));
        $this->db->update('daftarsiswa', $data);
    }

    public function hapusDatadaftarsiswa($id_daftarsiswa)
    {

        //$this->db->where('id_daftarsiswa',$id_daftarsiswa);
        //$this->db->delete('daftarsiswa');
        $this->db->delete('daftarsiswa', ['id_daftarsiswa' => $id_daftarsiswa]);
    }
}
