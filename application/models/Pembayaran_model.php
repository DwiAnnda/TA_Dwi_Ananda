<?php

class Pembayaran_model extends CI_Model
{

    public function getAllpembayaran()
    {

        return $this->db->get('pembayaran')->result_array();
    }

    public function getpembayaranById($id_pembayaran)
    {

        return $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
    }

    public function tambahDataTagihan($id_siswa, $id_les, $id_biaya, $nominal)
    {
        $tanggal = date('Y-m-d');
        $data = [
            "kode" => random_string('alnum', 10),
            "tanggal" => $tanggal,
            "id_siswa" => $id_siswa,
            "id_les" => $id_les,
            "id_biaya" => $id_biaya,
            "nominal" => $nominal,
            "user_input" => 'Umum',
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pembayaran', $data);
    }

    public function ubahDatapembayaran($id_pembayaran, $file_baru)
    {
        $data = [
            "atasnama" => $this->input->post('atasnama', true),
            "namabank" => $this->input->post('namabank', true),
            "norekening" => $this->input->post('norekening', true),
            "file" => $file_baru,
            "id_status" => "2",
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', $data);
    }
    public function konfirmasipembayaran($id_pembayaran, $id_les)
    {
        $data = [
            "id_status" => "3",
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', $data);
        $pembayaran = $this->Pembayaran_model->getpembayaranById($id_pembayaran);
        $id_les = $pembayaran['id_les'];
        $id_siswa = $pembayaran['id_siswa'];
        //daftarsiswa
        $tanggal = date('Y-m-d');
        $data = [
            "tanggal" => $tanggal,
            "id_les" => $id_les,
            "id_siswa" => $id_siswa,
            "user_ubah" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('daftarsiswa', $data);
    }

    public function hapusDatapembayaran($id_pembayaran)
    {

        //$this->db->where('id_pembayaran',$id_pembayaran);
        //$this->db->delete('pembayaran');
        $this->db->delete('pembayaran', ['id_pembayaran' => $id_pembayaran]);
    }
}
