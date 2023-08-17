<?php

class Pemasukan_model extends CI_Model
{

    public function getAllpemasukan()
    {

        return $this->db->get('pemasukan')->result_array();
    }

    public function getpemasukanById($id_pemasukan)
    {

        return $this->db->get_where('pemasukan', ['id_pemasukan' => $id_pemasukan])->row_array();
    }

    public function tambahDatapemasukan()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode_pemasukan" => $this->input->post('kode_pemasukan', true),
            "id_sumberpemasukan" => $this->input->post('id_sumberpemasukan', true),
            "nominal" => $nominal,
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pemasukan', $data);
    }

    public function ubahDatapemasukan()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "id_pemasukan" => $this->input->post('id_pemasukan', true),
            "tanggal" => $tanggal,
            "id_sumberpemasukan" => $this->input->post('id_sumberpemasukan', true),
            "nominal" => $nominal,
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pemasukan', $this->input->post('id_pemasukan', true));
        $this->db->update('pemasukan', $data);
    }

    public function hapusDatapemasukan($id_pemasukan)
    {

        //$this->db->where('id_pemasukan',$id_pemasukan);
        //$this->db->delete('pemasukan');
        $this->db->delete('pemasukan', ['id_pemasukan' => $id_pemasukan]);
    }
}
