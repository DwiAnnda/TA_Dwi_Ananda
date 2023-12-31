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
                  <h3 class="card-title">Tambah Data Sumber Pengeluaran</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <?php
                            $cekurutan = $this->db->query('SELECT * FROM sumberpengeluaran ORDER BY urutan DESC');
                            if ($cekurutan->num_rows() < 1) {
                                $urutan = '1';
                            } else {
                                $cekurutan = $cekurutan->row_array();
                                $urutan = $cekurutan['urutan'] + 1;
                            }
                            ?>
                          <div class="form-group">
                              <label for="urutan">Urutan</label>
                              <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $urutan; ?>" placeholder="Isi Urutan Angka">
                              <small class="text-danger"><?= form_error('urutan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_sumberpengeluaran">Nama Sumber Pengeluaran</label>
                              <input type="text" name="nama_sumberpengeluaran" class="form-control" id="nama_sumberpengeluaran" value="<?= set_value('nama_sumberpengeluaran'); ?>" placeholder="Isi Nama Sumber Pengeluaran">
                              <small class="text-danger"><?= form_error('nama_sumberpengeluaran'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/sumberpengeluaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambah data');"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->