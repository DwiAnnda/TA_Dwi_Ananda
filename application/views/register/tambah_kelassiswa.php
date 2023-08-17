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
                  <h3 class="card-title">Tambah Data Kelas Siswa</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="id_tahunajaran">Pilih Tahun Ajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tahunajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $pilihtahunajaran = $this->db->get('tahunajaran')->result_array();
                                    foreach ($pilihtahunajaran as $th) :
                                    ?>
                                      <option value="<?= $th['id_tahunajaran']; ?>"><?= ' Tahun : ' . $th['nama_tahunajaran'] . ' Semester : ' . $th['smester']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_guru">Pilih Wali Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_guru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $pilihguru = $this->db->get('guru')->result_array();
                                    foreach ($pilihguru as $gur) :
                                        $pilih_idpegawai = $gur['id_pegawai'];
                                        $pilihpegawai = $this->db->get_where('pegawai', ['id_pegawai' => $pilih_idpegawai])->row_array();
                                    ?>
                                      <option value="<?= $gur['id_guru']; ?>"><?= $pilihpegawai['nama_pegawai']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_kelas">Pilih Kelas</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kelas" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $pilihkelas = $this->db->get_where('kelas')->result_array();
                                    foreach ($pilihkelas as $kls) :
                                    ?>
                                      <option value="<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/kelassiswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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