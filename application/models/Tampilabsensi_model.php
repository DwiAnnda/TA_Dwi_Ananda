<?php

class Tampilabsensi_model extends CI_Model
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
        $id_kelassiswa = $this->input->post('id_kelassiswa');
        $daftarsiswa  = $this->db->get_where('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa])->result_array();
        $id_siswa = $daftarsiswa['id_siswa'];
        foreach ($daftarsiswa as $list) {
            $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
            $data = [
                "tanggal" => $tanggal,
                "id_kelassiswa" => $id_kelassiswa,
                "id_siswa" => $id_siswa,
                "user_input" => check_username(),
                "tgl_input" => date('Y-m-d h:m:i')
            ];
            $this->db->insert('absensi', $data);
        }
    }

    public function ubahDataabsensi()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "jam" => $this->input->post('jam', true),
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_status" => $this->input->post('id_status', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_absensi', $this->input->post('id_absensi', true));
        $this->db->update('absensi', $data);
    }

    public function hapusDataabsensi($id_absensi)
    {

        //$this->db->where('id_absensi',$id_absensi);
        //$this->db->delete('absensi');
        $this->db->delete('absensi', ['id_absensi' => $id_absensi]);
    }
}
