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
                  <h3 class="card-title">Ubah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <input type="hidden" name="id_matapelajaran" class="form-control" id="id_matapelajaran" value="<?= $matapelajaran['id_matapelajaran']; ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="urutan">Urutan</label>
                              <input type="text" name="urutan" class="form-control" id="urutan" value="<?= $matapelajaran['urutan']; ?>" placeholder="Isi Urutan">
                              <small class="text-danger"><?= form_error('urutan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_matapelajaran">Nama Mata Pelajaran</label>
                              <input type="text" name="nama_matapelajaran" class="form-control" id="nama_matapelajaran" value="<?= $matapelajaran['nama_matapelajaran']; ?>" placeholder="Isi Nama Mata Pelajaran">
                              <small class="text-danger"><?= form_error('nama_matapelajaran'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_status">Status Mata Pelajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="<?= $matapelajaran['id_status']; ?>"><?= check_aktif($matapelajaran['id_status']); ?></option>
                                  <option value="1">Aktfi</option>
                                  <option value="2">Tidak Aktif</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/matapelajaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengubah data');"><i class="fa fa-save"></i> Simpan</button>
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