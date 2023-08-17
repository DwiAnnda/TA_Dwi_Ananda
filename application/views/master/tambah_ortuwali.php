  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <?= $this->session->flashdata('pesan_notifikasi'); ?>
      </section>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tambah Data Orang Tua/Wali</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <input type="hidden" class="form-control" name="id_siswa" value="<?= $id_siswa; ?>" data-toggle="datetimepicker">
                          <?php
                            $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_siswa">Siswa</label>
                              <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $id_siswa; ?>">
                              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" disabled>
                              <small class="text-danger"><?= form_error('nik'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_kategoriortuwali">Pilih Kategori Ortu/Wali</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kategoriortuwali" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $kategoriortuwali = $this->db->get('kategoriortuwali')->result_array();
                                    foreach ($kategoriortuwali as $ktortu) : ?>
                                      <option value="<?= $ktortu['id_kategoriortuwali']; ?>"><?= $ktortu['nama_kategoriortuwali']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="nik">NIK</label>
                              <input type="text" name="nik" class="form-control" id="nik" value="<?= set_value('nik'); ?>" placeholder="Isi NIK">
                              <small class="text-danger"><?= form_error('nik'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_ortuwali">Nama Orang Tua/Wali</label>
                              <input type="text" name="nama_ortuwali" class="form-control" id="nama_ortuwali" value="<?= set_value('nama_ortuwali'); ?>" placeholder="Isi Nama Siswa">
                              <small class="text-danger"><?= form_error('nama_ortuwali'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_jeniskelamin">Pilih Jenis Kelamin</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_jeniskelamin" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="1">Laki-laki</option>
                                  <option value="2">Perempuan</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" placeholder="Isi Tempat Lahir">
                              <small class="text-danger"><?= form_error('tempat_lahir'); ?></small>
                          </div>
                          <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" data-target="#reservationdate2" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>" placeholder="Isi Alamat">
                              <small class="text-danger"><?= form_error('alamat'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= set_value('pekerjaan'); ?>" placeholder="Isi Pekerjaan">
                              <small class="text-danger"><?= form_error('pekerjaan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nohp">No HP</label>
                              <input type="text" name="nohp" class="form-control" id="nohp" value="<?= set_value('nohp'); ?>" placeholder="Isi No HP">
                              <small class="text-danger"><?= form_error('nohp'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/detail_siswa/') . $id_siswa; ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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