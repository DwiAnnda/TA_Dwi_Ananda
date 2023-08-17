<?php

class Jadwaltema_model extends CI_Model
{

    public function getAlljadwaltema()
    {

        return $this->db->get('jadwaltema')->result_array();
    }

    public function getjadwaltemaById($id_jadwaltema)
    {

        return $this->db->get_where('jadwaltema', ['id_jadwaltema' => $id_jadwaltema])->row_array();
    }

    public function tambahDatajadwaltema()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_tema" => $this->input->post('id_tema', true),
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jadwaltema', $data);
        //tambah absensi
        $LastId = $this->db->order_by('id_jadwaltema', 'desc')->get('jadwaltema')->row_array();
        $id_jadwaltema = $LastId['id_jadwaltema'];
        $id_kelassiswa = $LastId['id_kelassiswa'];
        $daftarsiswa  = $this->db->get_where('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa])->result_array();
        foreach ($daftarsiswa as $list) {
            $id_siswa = $list['id_siswa'];
            $tanggal = $LastId['tanggal'];
            $data = [
                "tanggal" => $tanggal,
                "id_jadwaltema" => $id_jadwaltema,
                "id_siswa" => $id_siswa,
                "user_input" => check_username(),
                "tgl_input" => date('Y-m-d h:m:i')
            ];
            $this->db->insert('absensi', $data);
        }
    }

    public function ubahDatajadwaltema()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "id_jadwaltema" => $this->input->post('id_jadwaltema', true),
            "tanggal" => $tanggal,
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jadwaltema', $this->input->post('id_jadwaltema', true));
        $this->db->update('jadwaltema', $data);
    }

    public function hapusDatajadwaltema($id_jadwaltema)
    {

        //$this->db->where('id_jadwaltema',$id_jadwaltema);
        //$this->db->delete('jadwaltema');
        $this->db->delete('jadwaltema', ['id_jadwaltema' => $id_jadwaltema]);
        $this->db->delete('absensi', ['id_jadwaltema' => $id_jadwaltema]);
    }
}
