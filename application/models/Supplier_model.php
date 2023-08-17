<?php

class Supplier_model extends CI_Model
{

    public function getAllSupplier()
    {

        return $this->db->get('supplier')->result_array();
    }

    public function getSupplierById($id_supplier)
    {

        return $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
    }

    public function tambahDataSupplier()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_supplier" => $this->input->post('nama_supplier', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('supplier', $data);
    }

    public function ubahDataSupplier()
    {

        $data = [
            "id_supplier" => $this->input->post('id_supplier', true),
            "urutan" => $this->input->post('urutan', true),
            "nama_supplier" => $this->input->post('nama_supplier', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_supplier', $this->input->post('id_supplier', true));
        $this->db->update('supplier', $data);
    }

    public function hapusDatasupplier($id_supplier)
    {

        //$this->db->where('id_supplier',$id_supplier);
        //$this->db->delete('supplier');
        $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
    }
}
