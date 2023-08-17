  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail Data pemasukan</h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>Kode pemasukan</td>
                              <td>:</td>
                              <td><?= $pemasukan['kode_pemasukan']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pemasukan['tanggal']); ?></td>
                          </tr>
                          <?php
                            $id_sumberpemasukan = $pemasukan['id_sumberpemasukan'];
                            $sumberpemasukan = $this->db->get_where('sumberpemasukan', ['id_sumberpemasukan' => $id_sumberpemasukan])->row_array();
                            ?>
                          <tr>
                              <td>Nama Sumber Pemasukan</td>
                              <td>:</td>
                              <td><?= $sumberpemasukan['nama_sumberpemasukan']; ?></td>
                          </tr>
                          <tr>
                              <td>Nominal</td>
                              <td>:</td>
                              <td><?= rupiah($pemasukan['nominal']); ?></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><?= $pemasukan['keterangan']; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pemasukan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->