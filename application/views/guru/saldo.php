  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
          <?php if ($this->session->flashdata()) : ?>
              <!-- right column -->
              <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Notifikasi!</h5>
                      Data berhasil <?= $this->session->flashdata('flashdata'); ?>
                  </div>
              </div>
              <!--/.col (right) -->
          <?php endif; ?>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>No</th>
                          <th>Nama Guru</th>
                          <th>60% (Guru)</th>
                          <th>40% (Admin)</th>
                          <th>Total</th>
                      </tr>
                      <?php
                        $no = 1;
                        $totalnominal = 0;
                        $kelasguru = $this->Kelasguru_model->getAllkelasByGuru($pegawai['id_guru']);
                        foreach ($kelasguru as $klsgr) {
                            $les = $this->db->get_where('les', ['id_kelasguru' => $klsgr['id_kelasguru']])->result_array();
                            foreach ($les as $ls) {
                                $pembayaran = $this->db->get_where('pembayaran', [
                                    'id_les' => $ls['id_les'],
                                    'id_status' => '3',
                                ])->row_array();
                                $totalnominal = $totalnominal + $pembayaran['nominal'];
                            }
                        }
                        ?>
                      <tr>
                          <td><?= $no; ?></td>
                          <td><?= $pegawai['nama']; ?></td>
                          <td><?= rupiah($totalnominal * (60 / 100)); ?></td>
                          <td><?= rupiah($totalnominal * (40 / 100)); ?></td>
                          <td><?= rupiah($totalnominal); ?></td>
                      </tr>
                      <?php
                        $no++;
                        ?>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->