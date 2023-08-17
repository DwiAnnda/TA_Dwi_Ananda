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
                  <h3 class="card-title">Tambah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="nama_jenistagihan">Nama Jenis Tagihan</label>
                              <input type="text" name="nama_jenistagihan" class="form-control" id="nama_jenistagihan" value="<?= set_value('nama_jenistagihan'); ?>" placeholder="Isi Nama Jenis Tagihan">
                              <small class="text-danger"><?= form_error('nama_jenistagihan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nominal">Nominal</label>
                              <input type="text" name="nominal" class="form-control" id="nominal" value="<?= set_value('nominal'); ?>" placeholder="Isi Nominal">
                              <small class="text-danger"><?= form_error('nominal'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/jenistagihan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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