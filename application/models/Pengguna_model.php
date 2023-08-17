<?php

class pengguna_model extends CI_Model
{

    public function getAllPengguna()
    {

        return $this->db->get('pengguna')->result_array();
    }

    public function getPenggunaById($id_pengguna)
    {

        return $this->db->get_where('pengguna', ['id_pengguna' => $id_pengguna])->row_array();
    }

    public function tambahDataPengguna()
    {
        $id_pegawai = $this->input->post('id_pegawai', true);
        $pegawai = $this->Pegawai_model->getPegawaiById($id_pegawai);
        $data = [
            "id_pegawai" => $id_pegawai,
            "nama_pengguna" => $pegawai['nama_pegawai'],
            "username" => $this->input->post('username', true),
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "id_level" => $this->input->post('id_level', true),
            "aktif" => $this->input->post('aktif', true),
            "token" => get_token(10),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pengguna', $data);
    }

    public function ubahDataPengguna()
    {

        $data = [
            "id_pengguna" => $this->input->post('id_pengguna', true),
            "username" => $this->input->post('username', true),
            "id_level" => $this->input->post('id_level', true),
            "aktif" => $this->input->post('aktif', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pengguna', $this->input->post('id_pengguna', true));
        $this->db->update('pengguna', $data);
        if ($this->input->post('password') != '') {
            $data = [
                "id_pengguna" => $this->input->post('id_pengguna', true),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->where('id_pengguna', $this->input->post('id_pengguna', true));
            $this->db->update('pengguna', $data);
        }
    }

    public function hapusDataPengguna($id_pengguna)
    {

        //$this->db->where('id_pengguna',$id_pengguna);
        //$this->db->delete('pengguna');
        $this->db->delete('pengguna', ['id_pengguna' => $id_pengguna]);
    }
}
