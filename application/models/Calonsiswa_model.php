<?php

class Calonsiswa_model extends CI_Model
{

    public function getAllcalonsiswa()
    {

        return $this->db->get('calonsiswa')->result_array();
    }

    public function getcalonsiswaById($id_calonsiswa)
    {

        return $this->db->get_where('calonsiswa', ['id_calonsiswa' => $id_calonsiswa])->row_array();
    }

    public function tambahDatacalonsiswa($id_pengumuman, $file_ijazah, $file_akta, $file_kk, $file_foto)
    {
        $kode = random_string('alnum', 10);
        $tanggal = date('Y-m-d');
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "id_pengumuman" => $id_pengumuman,
            "kode" => $kode,
            "tanggal" => $tanggal,
            "nik" => $this->input->post('nik', true),
            "nokk" => $this->input->post('nokk', true),
            "nama_siswa" => $this->input->post('nama_siswa', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "anak_ke" => $this->input->post('anak_ke', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "ijazah" => $file_ijazah,
            "akta" => $file_akta,
            "kk" => $file_kk,
            "foto" => $file_foto,
            "user_input" => $this->input->post('email', true),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('calonsiswa', $data);
    }

    //ijazah
    public function ubahDatasiswaIjazah($file_baru)
    {
        $data = [
            "ijazah" => $file_baru,
        ];
        $this->db->where('id_calonsiswa', $this->input->post('id_calonsiswa', true));
        $this->db->update('calonsiswa', $data);
    }
    //akta
    public function ubahDatacalonsiswaakta($file_baru)
    {
        $data = [
            "akta" => $file_baru,
        ];
        $this->db->where('id_calonsiswa', $this->input->post('id_calonsiswa', true));
        $this->db->update('calonsiswa', $data);
    }
    //kk
    public function ubahDatacalonsiswakk($file_baru)
    {
        $data = [
            "kk" => $file_baru,
        ];
        $this->db->where('id_calonsiswa', $this->input->post('id_calonsiswa', true));
        $this->db->update('calonsiswa', $data);
    }
    //foto
    public function ubahDatacalonsiswaFoto($file_baru)
    {
        $data = [
            "foto" => $file_baru,
        ];
        $this->db->where('id_calonsiswa', $this->input->post('id_calonsiswa', true));
        $this->db->update('calonsiswa', $data);
    }

    public function ubahDatacalonsiswa()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $data = [
            "tanggal" => $tanggal,
            "nik" => $this->input->post('nik', true),
            "nokk" => $this->input->post('nokk', true),
            "nama_siswa" => $this->input->post('nama_siswa', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "anak_ke" => $this->input->post('anak_ke', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_calonsiswa', $this->input->post('id_calonsiswa', true));
        $this->db->update('calonsiswa', $data);
    }
    public function terimacalonsiswa($id_calonsiswa)
    {
        $calonsiswa = $this->Calonsiswa_model->getcalonsiswaById($id_calonsiswa);
        $tanggal = date('Y-m-d');
        $data = [
            "id_calonsiswa" => $id_calonsiswa,
            "tanggal" => $tanggal,
            "nik" => $calonsiswa['nik'],
            "nokk" => $calonsiswa['nokk'],
            "nama_siswa" => $calonsiswa['nama_siswa'],
            "id_jeniskelamin" => $calonsiswa['id_jeniskelamin'],
            "tempat_lahir" => $calonsiswa['tempat_lahir'],
            "tanggal_lahir" => $calonsiswa['tanggal_lahir'],
            "anak_ke" => $calonsiswa['anak_ke'],
            "alamat" => $calonsiswa['alamat'],
            "nohp" => $calonsiswa['nohp'],
            "email" => $calonsiswa['email'],
            "password" => password_hash('123456', PASSWORD_DEFAULT),
            "ijazah" => $calonsiswa['ijazah'],
            "akta" => $calonsiswa['akta'],
            "kk" => $calonsiswa['kk'],
            "foto" => $calonsiswa['foto'],
            "user_ubah" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('siswa', $data);
        //update status
        $data = [
            "id_status" => '2',
        ];
        $this->db->where('id_calonsiswa', $id_calonsiswa);
        $this->db->update('calonsiswa', $data);
    }
    public function tolakcalonsiswa($id_calonsiswa)
    {
        //update status
        $data = [
            "id_status" => '3',
        ];
        $this->db->where('id_calonsiswa', $id_calonsiswa);
        $this->db->update('calonsiswa', $data);
    }

    public function hapusDatacalonsiswa($id_calonsiswa)
    {

        //$this->db->where('id_calonsiswa',$id_calonsiswa);
        //$this->db->delete('calonsiswa');
        $this->db->delete('calonsiswa', ['id_calonsiswa' => $id_calonsiswa]);
    }
}
