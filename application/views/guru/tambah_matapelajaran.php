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
                  <h3 class="card-title">Tambah Data <?= $judul; ?></h3>
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
                              <label for="id_tahunajaran">Pilih Tahun Ajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tahunajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $tahunajaran = $this->db->get_where('tahunajaran', ['id_status' => '1'])->result_array();
                                    foreach ($tahunajaran as $list) :
                                    ?>
                                      <option value="<?= $list['id_tahunajaran']; ?>"><?= $list['nama_tahunajaran'] . ' Semester ' . $list['smester']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_kelas">Pilih Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kelas" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $kelas = $this->db->get_where('kelas', ['id_status' => '1'])->result_array();
                                    foreach ($kelas as $list) :
                                    ?>
                                      <option value="<?= $list['id_kelas']; ?>"><?= $list['nama_kelas']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_mapel">Pilih Mata Pelajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_mapel" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $mapel = $this->db->get_where('mapel', ['id_status' => '1'])->result_array();
                                    foreach ($mapel as $list) :
                                    ?>
                                      <option value="<?= $list['id_mapel']; ?>"><?= $list['nama_mapel']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/matapelajaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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