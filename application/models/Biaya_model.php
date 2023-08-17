biaya<?php

        class Biaya_model extends CI_Model
        {

            public function getAllbiaya()
            {

                return $this->db->get('biaya')->result_array();
            }

            public function getbiayaById($id_biaya)
            {

                return $this->db->get_where('biaya', ['id_biaya' => $id_biaya])->row_array();
            }

            public function ubahDatabiaya($id_biaya)
            {
                $nominal = $this->input->post('nominal', true);
                $nominal = str_replace("Rp. ", "", $nominal);
                $nominal = str_replace(".", "", $nominal);
                $data = [
                    "nominal" => $nominal,
                    "user_ubah" => check_username(),
                    "tgl_ubah" => date('Y-m-d h:m:i')
                ];
                $this->db->where('id_biaya', $id_biaya);
                $this->db->update('biaya', $data);
            }

            public function hapusDatabiaya($id_biaya)
            {

                $this->db->delete('biaya', ['id_biaya' => $id_biaya]);
            }
        }
