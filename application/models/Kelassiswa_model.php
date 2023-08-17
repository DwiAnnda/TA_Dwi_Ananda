<?php

class Kelassiswa_model extends CI_Model
{

    public function getAllkelassiswa()
    {

        return $this->db->get('kelassiswa')->result_array();
    }

    public function getkelassiswaById($id_kelassiswa)
    {

        return $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
    }

    public function tambahDatakelassiswa()
    {

        $data = [
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_guru" => $this->input->post('id_guru', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('kelassiswa', $data);
    }

    public function ubahDatakelassiswa()
    {

        $data = [
            "id_tahunajaran" => $this->input->post('id_tahunajaran', true),
            "id_guru" => $this->input->post('id_guru', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kelassiswa', $this->input->post('id_kelassiswa', true));
        $this->db->update('kelassiswa', $data);
    }

    public function hapusDatakelassiswa($id_kelassiswa)
    {

        //$this->db->where('id_kelassiswa',$id_kelassiswa);
        //$this->db->delete('kelassiswa');
        $this->db->delete('kelassiswa', ['id_kelassiswa' => $id_kelassiswa]);
        $this->db->delete('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa]);
    }
}
