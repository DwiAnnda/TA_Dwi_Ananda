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
                  <h3 class="card-title">Ubah Data Tahun Ajaran</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <input type="hidden" name="id_tahunajaran" class="form-control" id="id_tahunajaran" value="<?= $tahunajaran['id_tahunajaran']; ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="urutan">Urutan</label>
                              <input type="text" name="urutan" class="form-control" id="urutan" value="<?= $tahunajaran['urutan']; ?>" placeholder="Isi Urutan">
                              <small class="text-danger"><?= form_error('urutan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_tahunajaran">Nama Tahun Ajaran</label>
                              <input type="text" name="nama_tahunajaran" class="form-control" id="nama_tahunajaran" value="<?= $tahunajaran['nama_tahunajaran']; ?>" placeholder="Isi Nama Tahun Ajaran">
                              <small class="text-danger"><?= form_error('nama_tahunajaran'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="smester">Semester</label>
                              <input type="number" name="smester" class="form-control" id="smester" value="<?= $tahunajaran['smester']; ?>" placeholder="Isi Semester">
                              <small class="text-danger"><?= form_error('smester'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/tahunajaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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