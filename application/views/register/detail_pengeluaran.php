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
                  <h3 class="card-title">Detail Data Pengeluaran</h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>Kode Pengeluaran</td>
                              <td>:</td>
                              <td><?= $pengeluaran['kode_pengeluaran']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pengeluaran['tanggal']); ?></td>
                          </tr>
                          <?php
                            $id_sumberpengeluaran = $pengeluaran['id_sumberpengeluaran'];
                            $sumberpengeluaran = $this->db->get_where('sumberpengeluaran', ['id_sumberpengeluaran' => $id_sumberpengeluaran])->row_array();
                            ?>
                          <tr>
                              <td>Nama Sumber Pengeluaran</td>
                              <td>:</td>
                              <td><?= $sumberpengeluaran['nama_sumberpengeluaran']; ?></td>
                          </tr>
                          <tr>
                              <td>Nominal</td>
                              <td>:</td>
                              <td><?= rupiah($pengeluaran['nominal']); ?></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><?= $pengeluaran['keterangan']; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pengeluaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->