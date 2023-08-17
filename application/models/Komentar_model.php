<?php

class Komentar_model extends CI_Model
{

    public function getAllkomentar()
    {

        return $this->db->get('komentar')->result_array();
    }

    public function getkomentarById($id_komentar)
    {

        return $this->db->get_where('komentar', ['id_komentar' => $id_komentar])->row_array();
    }

    public function tambahDatakomentarguru($id_pengirim, $id_les)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "id_jenispengirim" => '1',
            "id_pengirim" => $id_pengirim,
            "id_les" => $id_les,
            "isi_komentar" => $this->input->post('isi_komentar', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('komentar', $data);
    }
    public function tambahDatakomentarsiswa($id_pengirim, $id_les)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => random_string('alnum', 10),
            "id_jenispengirim" => '2',
            "id_pengirim" => $id_pengirim,
            "id_les" => $id_les,
            "isi_komentar" => $this->input->post('isi_komentar', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('komentar', $data);
    }
    public function ubahDatakomentar($id_komentar)
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "isi_komentar" => $this->input->post('isi_komentar', true),
            "keterangan" => $this->input->post('keterangan', true),
            "id_status" => $this->input->post('id_status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_komentar', $id_komentar);
        $this->db->update('komentar', $data);
    }

    public function hapusDatakomentar($id_komentar)
    {

        $this->db->delete('komentar', ['id_komentar' => $id_komentar]);
    }
}
