<?php

class Jadwalujian_model extends CI_Model
{

    public function getAlljadwalujian()
    {

        return $this->db->get('jadwalujian')->result_array();
    }

    public function getjadwalujianById($id_jadwalujian)
    {

        return $this->db->get_where('jadwalujian', ['id_jadwalujian' => $id_jadwalujian])->row_array();
    }

    public function tambahDatajadwalujian()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_tema" => $this->input->post('id_tema', true),
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jadwalujian', $data);

        //tambah nilaiujian
        $LastId = $this->db->order_by('id_jadwalujian', 'desc')->get('jadwalujian')->row_array();
        $id_jadwalujian = $LastId['id_jadwalujian'];
        $id_kelassiswa = $LastId['id_kelassiswa'];
        $daftarsiswa  = $this->db->get_where('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa])->result_array();
        foreach ($daftarsiswa as $list) {
            $id_siswa = $list['id_siswa'];
            $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
            $data = [
                "tanggal" => $tanggal,
                "id_jadwalujian" => $id_jadwalujian,
                "id_siswa" => $id_siswa,
                "user_input" => check_username(),
                "tgl_input" => date('Y-m-d h:m:i')
            ];
            $this->db->insert('nilaiujian', $data);
        }
    }

    public function ubahDatajadwalujian()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "id_jadwalujian" => $this->input->post('id_jadwalujian', true),
            "tanggal" => $tanggal,
            "id_kelassiswa" => $this->input->post('id_kelassiswa', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jadwalujian', $this->input->post('id_jadwalujian', true));
        $this->db->update('jadwalujian', $data);
    }

    public function hapusDatajadwalujian($id_jadwalujian)
    {

        //$this->db->where('id_jadwalujian',$id_jadwalujian);
        //$this->db->delete('jadwalujian');
        $this->db->delete('jadwalujian', ['id_jadwalujian' => $id_jadwalujian]);
        $this->db->delete('nilaiujian', ['id_jadwalujian' => $id_jadwalujian]);
    }
}
