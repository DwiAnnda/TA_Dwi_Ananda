<?php

class Ortuwali_model extends CI_Model
{

    public function getAllortuwali()
    {

        return $this->db->get('ortuwali')->result_array();
    }

    public function getortuwaliById($id_ortuwali)
    {

        return $this->db->get_where('ortuwali', ['id_ortuwali' => $id_ortuwali])->row_array();
    }

    public function tambahDataortuwali()
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kategoriortuwali" => $this->input->post('id_kategoriortuwali', true),
            "nik" => $this->input->post('nik', true),
            "nama_ortuwali" => $this->input->post('nama_ortuwali', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "nohp" => $this->input->post('nohp', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('ortuwali', $data);
    }

    public function ubahDataortuwali($id_ortuwali)
    {
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "id_siswa" => $this->input->post('id_siswa', true),
            "id_kategoriortuwali" => $this->input->post('id_kategoriortuwali', true),
            "nik" => $this->input->post('nik', true),
            "nama_ortuwali" => $this->input->post('nama_ortuwali', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "pekerjaan" => $this->input->post('pekerjaan', true),
            "nohp" => $this->input->post('nohp', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_ortuwali', $this->input->post('id_ortuwali', true));
        $this->db->update('ortuwali', $data);
    }

    public function hapusDataortuwali($id_ortuwali)
    {

        //$this->db->where('id_ortuwali',$id_ortuwali);
        //$this->db->delete('ortuwali');
        $this->db->delete('ortuwali', ['id_ortuwali' => $id_ortuwali]);
    }
}
