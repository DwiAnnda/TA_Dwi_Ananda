<?php

class Pendaftaran_model extends CI_Model
{

    public function getAllpendaftaran()
    {

        return $this->db->get('pendaftaran')->result_array();
    }

    public function getpendaftaranById($id_pendaftaran)
    {

        return $this->db->get_where('pendaftaran', ['id_pendaftaran' => $id_pendaftaran])->row_array();
    }

    public function tambahDatapendaftaran()
    {
        $kode = random_string('alnum', 5);
        $tanggal = date('Y-m-d');
        $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
        $id_jenispendaftaran = $this->input->post('id_jenispendaftaran', true);
        if ($id_jenispendaftaran == '1') {
            $id_kelas =  $this->input->post('id_kelas', true);
        } else {
            $id_kelas = 0;
        }
        $data = [
            "kode" => $kode,
            "tanggal" => $tanggal,
            "id_jenispendaftaran" => $id_jenispendaftaran,
            "nik" => $this->input->post('nik', true),
            "nama" => $this->input->post('nama', true),
            "id_kelas" => $id_kelas,
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tanggal_lahir" => $tanggal_lahir,
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "user_input" => $this->input->post('email', true),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pendaftaran', $data);
    }

    public function terimapendaftaran($id_pendaftaran)
    {
        $data = [
            "id_status" => '2',
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->update('pendaftaran', $data);

        $pendaftaran = $this->Pendaftaran_model->getpendaftaranById($id_pendaftaran);
        $id_jenispendaftaran = $pendaftaran['id_jenispendaftaran'];
        $nik = $pendaftaran['nik'];
        $nama = $pendaftaran['nama'];
        $id_kelas = $pendaftaran['id_kelas'];
        $id_jeniskelamin = $pendaftaran['id_jeniskelamin'];
        $tempat_lahir = $pendaftaran['tempat_lahir'];
        $tanggal_lahir = $pendaftaran['tanggal_lahir'];
        $alamat = $pendaftaran['alamat'];
        $nohp = $pendaftaran['nohp'];
        $email = $pendaftaran['email'];
        if ($id_jenispendaftaran == '1') {
            //siswa       
            $data = [
                "id_pendaftaran" => $id_pendaftaran,
                "nik" => $nik,
                "nama" => $nama,
                "id_kelas" => $id_kelas,
                "id_jeniskelamin" => $id_jeniskelamin,
                "tempat_lahir" => $tempat_lahir,
                "tanggal_lahir" => $tanggal_lahir,
                "alamat" => $alamat,
                "nohp" => $nohp,
                "email" => $email,
                "password" => password_hash('123456', PASSWORD_DEFAULT),
                "token" => random_string('alnum', 10),
                "user_input" => check_username(),
                "tgl_input" => date('Y-m-d h:m:i')
            ];
            $this->db->insert('siswa', $data);
        } else if ($id_jenispendaftaran == '2') {
            //guru       
            $data = [
                "id_pendaftaran" => $id_pendaftaran,
                "nik" => $nik,
                "nama" => $nama,
                "id_jeniskelamin" => $id_jeniskelamin,
                "tempat_lahir" => $tempat_lahir,
                "tanggal_lahir" => $tanggal_lahir,
                "alamat" => $alamat,
                "nohp" => $nohp,
                "email" => $email,
                "password" => password_hash('123456', PASSWORD_DEFAULT),
                "token" => random_string('alnum', 10),
                "user_input" => check_username(),
                "tgl_input" => date('Y-m-d h:m:i')
            ];
            $this->db->insert('guru', $data);
        }
    }
    public function tolakpendaftaran($id_pendaftaran)
    {
        $data = [
            "id_status" => '3',
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->update('pendaftaran', $data);
    }

    public function hapusDatapendaftaran($id_pendaftaran)
    {

        $this->db->delete('pendaftaran', ['id_pendaftaran' => $id_pendaftaran]);
    }
}
