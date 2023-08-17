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
                          <?php
                            $guru = $this->db->get_where('guru', ['id_pegawai' => $pegawai['id_pegawai']])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_guru">Wali Kelas</label>
                              <input type="hidden" class="form-control" name="id_guru" value="<?= $guru['id_guru']; ?>" readonly>
                              <input type="text" class="form-control" name="nama_pegawai" value="<?= $pegawai['nama_pegawai']; ?>" readonly>
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
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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