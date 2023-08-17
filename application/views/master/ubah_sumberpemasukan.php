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
                  <h3 class="card-title">Ubah Data Sumber Pemasukan</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formUbah" action="" method="post">
                      <input type="hidden" name="id_sumberpemasukan" class="form-control" id="id_sumberpemasukan" value="<?= $sumberpemasukan['id_sumberpemasukan']; ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="urutan">Urutan</label>
                              <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $sumberpemasukan['urutan']; ?>" placeholder="Isi Urutan Angka">
                              <small class="text-danger"><?= form_error('urutan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_sumberpemasukan">Nama Sumber Pemasukan</label>
                              <input type="text" name="nama_sumberpemasukan" class="form-control" id="nama_sumberpemasukan" value="<?= $sumberpemasukan['nama_sumberpemasukan']; ?>" placeholder="Isi Nama Sumber Pemasukan">
                              <small class="text-danger"><?= form_error('nama_sumberpemasukan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/sumberpemasukan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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