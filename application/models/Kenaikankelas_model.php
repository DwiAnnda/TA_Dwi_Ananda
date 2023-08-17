<?php

class Kenaikankelas_model extends CI_Model
{

    public function getAllkenaikankelas()
    {

        return $this->db->get('kenaikankelas')->result_array();
    }

    public function getkenaikankelasById($id_kenaikankelas)
    {

        return $this->db->get_where('kenaikankelas', ['id_kenaikankelas' => $id_kenaikankelas])->row_array();
    }

    public function tambahDatakenaikankelas()
    {
        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->input->post('id_siswa', true)])->row_array();
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kelaslama" => $siswa['id_kelassiswa'],
            "id_kelasbaru" => $this->input->post('id_kelasbaru', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('kenaikankelas', $data);
        //update detail kelas siswa
        $data = [
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kelassiswa" => $this->input->post('id_kelasbaru', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_siswa', $this->input->post('id_kelasbaru', true));
        $this->db->update('siswa', $data);

        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kelassiswa" => $this->input->post('id_kelasbaru', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('detailkelassiswa', $data);
    }

    public function ubahDatakenaikankelas()
    {
        $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->input->post('id_siswa', true)])->row_array();
        $id_kelassiswalama = $siswa['id_kelassiswa'];
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kelaslama" => $siswa['id_kelassiswa'],
            "id_kelasbaru" => $this->input->post('id_kelasbaru', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kenaikankelas', $this->input->post('id_kenaikankelas', true));
        $this->db->update('kenaikankelas', $data);
        //update detail kelas siswa
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kelassiswa" => $this->input->post('id_kelasbaru', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_kelassiswa', $id_kelassiswalama);
        $this->db->update('detailkelassiswa', $data);
    }

    public function hapusDatakenaikankelas($id_kenaikankelas)
    {

        //$this->db->where('id_kenaikankelas',$id_kenaikankelas);
        //$this->db->delete('kenaikankelas');
        $this->db->delete('kenaikankelas', ['id_kenaikankelas' => $id_kenaikankelas]);
    }
}
