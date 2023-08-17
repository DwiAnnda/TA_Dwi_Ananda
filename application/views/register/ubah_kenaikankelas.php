  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
          <?= $this->session->flashdata('pesan_notifikasi'); ?>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Ubah Data Kenaikan Kelas</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <input type="hidden" name="id_kenaikankelas" class="form-control" id="id_kenaikankelas" value="<?= $kenaikankelas['id_kenaikankelas']; ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" data-toggle="datetimepicker" value="<?= date('d-m-Y', strtotime($kenaikankelas['tanggal'])); ?>">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <?php

                            $id_siswa = $kenaikankelas['id_siswa'];
                            $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_siswa">Siswa</label>
                              <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $kenaikankelas['id_siswa']; ?>">
                              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" disabled>
                              <small class="text-danger"><?= form_error('id_siswa'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_kelasbaru">Pilih Kelas Baru</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_kelasbaru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $kelassiswa = $this->db->get_where('kelassiswa', ['aktif' => '1'])->result_array();
                                    foreach ($kelassiswa as $klsswa) :
                                        $id_kelas = $klsswa['id_kelas'];
                                        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                        $id_tahunajaran = $klsswa['id_tahunajaran'];
                                        $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                        $id_guru = $klsswa['id_guru'];
                                        $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                        $guru_idpegawai = $guru['id_pegawai'];
                                        $gurupegawai = $this->db->get_where('pegawai', ['id_pegawai' => $guru_idpegawai])->row_array();
                                    ?>
                                      <option value="<?= $klsswa['id_kelassiswa']; ?>"><?= $kelas['nama_kelas'] . ' | ' . $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester'] . ' | ' . $gurupegawai['nama_pegawai']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/kenaikankelas'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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