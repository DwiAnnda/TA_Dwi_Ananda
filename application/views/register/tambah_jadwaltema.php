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
                  <h3 class="card-title">Tambah Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <input type="hidden" name="id_kelassiswa" class="form-control" id="id_kelassiswa" value="<?= $id_kelassiswa; ?>">
                          <?php
                            $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
                            $id_kelas = $kelassiswa['id_kelas'];
                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                            $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                            $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                            $id_guru = $kelassiswa['id_guru'];
                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                            $guru_idpegawai = $guru['id_pegawai'];
                            $gurupegawai = $this->db->get_where('pegawai', ['id_pegawai' => $guru_idpegawai])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_kelas">Kelas</label>
                              <input type="hidden" name="id_kelassiswa" class="form-control" id="id_kelassiswa" value="<?= $id_kelassiswa; ?>">
                              <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $kelas['nama_kelas']; ?>" disabled>
                              <small class="text-danger"><?= form_error('id_siswa'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_guru">Guru</label>
                              <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="<?= $gurupegawai['nama_pegawai']; ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label for="id_tahunajaran">Tahun Ajaran/Semester</label>
                              <input type="text" name="nama_tahunajaran" class="form-control" id="nama_tahunajaran" value="<?= $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester']; ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="dari_jam">Dari Jam</label>
                              <input type="text" name="dari_jam" class="form-control" id="dari_jam" data-inputmask='"mask": "99:99"' data-mask value="<?= date('H:i'); ?>">
                          </div>
                          <div class="form-group">
                              <label for="dari_jam">Sampai Jam</label>
                              <input type="text" name="sampai_jam" class="form-control" id="sampai_jam" data-inputmask='"mask": "99:99"' data-mask value="<?= date('H:i'); ?>">
                          </div>
                          <div class="form-group">
                              <label for="id_tema">Pilih Mata Pelajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tema" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $tema = $this->db->order_by('urutan', 'asc')->get('tema')->result_array();
                                    foreach ($tema as $tm) :
                                        $id_guru = $tm['id_guru'];
                                        $masterguru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                        $guru_idpegawai = $masterguru['id_pegawai'];
                                        $pegawaiguru = $this->db->get_where('pegawai', ['id_pegawai' => $guru_idpegawai])->row_array();
                                    ?>
                                      <option value="<?= $tm['id_tema']; ?>"><?= 'Matpel : ' . $tm['nama_tema'] . ' | Guru : ' . $pegawaiguru['nama_pegawai']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/detail_kelassiswa/' . $id_kelassiswa); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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