<?php

class Pengeluaran_model extends CI_Model
{

    public function getAllpengeluaran()
    {

        return $this->db->get('pengeluaran')->result_array();
    }

    public function getpengeluaranById($id_pengeluaran)
    {

        return $this->db->get_where('pengeluaran', ['id_pengeluaran' => $id_pengeluaran])->row_array();
    }

    public function tambahDatapengeluaran()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode_pengeluaran" => $this->input->post('kode_pengeluaran', true),
            "id_sumberpengeluaran" => $this->input->post('id_sumberpengeluaran', true),
            "nominal" => $nominal,
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pengeluaran', $data);
    }

    public function ubahDatapengeluaran()
    {
        $nominal = $this->input->post('nominal', true);
        $nominal = str_replace("Rp. ", "", $nominal);
        $nominal = str_replace(".", "", $nominal);
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "id_pengeluaran" => $this->input->post('id_pengeluaran', true),
            "tanggal" => $tanggal,
            "id_sumberpengeluaran" => $this->input->post('id_sumberpengeluaran', true),
            "nominal" => $nominal,
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pengeluaran', $this->input->post('id_pengeluaran', true));
        $this->db->update('pengeluaran', $data);
    }

    public function hapusDatapengeluaran($id_pengeluaran)
    {

        //$this->db->where('id_pengeluaran',$id_pengeluaran);
        //$this->db->delete('pengeluaran');
        $this->db->delete('pengeluaran', ['id_pengeluaran' => $id_pengeluaran]);
    }
}
