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
                  <h3 class="card-title">Tambah Data Guru</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="id_pegawai">Pilih Pegawai</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_pegawai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $pilihpegawai = $this->db->get_where('pegawai')->result_array();
                                    foreach ($pilihpegawai as $plpeg) :
                                        if ($plpeg['id_pegawai'] <> '1') {
                                            $cekguru = $this->db->get_where('guru', ['id_pegawai' => $plpeg['id_pegawai']]);
                                            if ($cekguru->num_rows() < 1) {

                                    ?>
                                              <option value="<?= $plpeg['id_pegawai']; ?>"><?= $plpeg['nama_pegawai']; ?></option>
                                  <?php }
                                        }
                                    endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/guru'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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