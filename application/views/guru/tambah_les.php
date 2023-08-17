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
                              <label for="id_kelasguru">Pilih Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kelasguru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $kelasguru = $this->db->get_where('kelasguru', ['id_status' => '1'])->result_array();
                                    foreach ($kelasguru as $list) :
                                        $cekles = $this->db->get_where('les', ['id_kelasguru' => $list['id_kelasguru']])->num_rows();
                                        if ($cekles !== 1) {
                                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $list['id_kelas']])->row_array();
                                    ?>
                                          <option value="<?= $list['id_kelasguru']; ?>"><?= $kelas['nama_kelas']; ?></option>
                                  <?php
                                        }
                                    endforeach;
                                    ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_matapelajaran">Pilih Mata Pelajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_matapelajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $matapelajaran = $this->db->get_where('matapelajaran', ['id_status' => '1'])->result_array();
                                    foreach ($matapelajaran as $list) :
                                    ?>
                                      <option value="<?= $list['id_matapelajaran']; ?>"><?= $list['nama_matapelajaran']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/les'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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