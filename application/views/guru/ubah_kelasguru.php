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
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="id_guru">Guru</label>
                              <input type="hidden" name="id_guru" class="form-control" id="id_guru" value="<?= $pegawai['id_guru']; ?>" readonly>
                              <input type="text" name="nama" class="form-control" id="nama" value="<?= $pegawai['nama']; ?>" readonly>
                              <small class="text-danger"><?= form_error('id_guru'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_kelas">Pilih Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kelas" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $kelas = $this->db->get_where('kelas', ['id_status' => '1'])->result_array();
                                    foreach ($kelas as $list) :
                                        $cekkelasguru = $this->db->get_where('kelasguru', [
                                            'id_guru' => $kelasguru['id_guru'],
                                            'id_kelas' => $list['id_kelas']
                                        ])->num_rows();
                                        if ($cekkelasguru == 1) {
                                    ?>
                                          <option value="<?= $list['id_kelas']; ?>" selected="selected"><?= $list['nama_kelas']; ?></option>
                                      <?php } else { ?>
                                          <option value="<?= $list['id_kelas']; ?>"><?= $list['nama_kelas']; ?></option>
                                  <?php
                                        }
                                    endforeach;
                                    ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_status">Status Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="<?= $kelasguru['id_status']; ?>"><?= check_aktif($kelasguru['id_status']); ?></option>
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/kelasguru'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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