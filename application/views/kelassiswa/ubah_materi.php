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
                  <h3 class="card-title">Ubah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id_materi" class="form-control" id="id_materi" value="<?= $materi['id_materi']; ?>" readonly>
                      <input type="hidden" name="file_lama" class="form-control" id="file_lama" value="<?= $materi['file']; ?>" readonly>
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" data-toggle="datetimepicker" value="<?= date('d-m-Y', strtotime($materi['tanggal'])); ?>">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <?php
                            $guru = $this->db->get_where('guru', ['id_pegawai' => $pegawai['id_pegawai']])->row_array();
                            $id_guru = $guru['id_guru'];
                            $nama_guru = $pegawai['nama_pegawai'];
                            ?>
                          <div class="form-group">
                              <label for="id_guru">Guru</label>
                              <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="<?= $nama_guru; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="id_matapelajaran">Pilih Mata Pelajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_matapelajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $materi['id_matapelajaran']])->row_array();
                                    $id_kelas = $matapelajaran['id_kelas'];
                                    $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                    $nama_kelas = $kelas['nama_kelas'];
                                    ?>
                                  <option value="<?= $matapelajaran['id_matapelajaran']; ?>"><?= ' Kelas :' . $nama_kelas . ' MatPel :' . $matapelajaran['nama_matapelajaran']; ?></option>
                                  <?php
                                    $matapelajaran = $this->db->get_where('matapelajaran', ['id_guru' => $id_guru])->result_array();
                                    foreach ($matapelajaran as $list) :
                                        $id_kelas = $list['id_kelas'];
                                        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                        $nama_kelas = $kelas['nama_kelas'];
                                    ?>
                                      <option value="<?= $list['id_matapelajaran']; ?>"><?= ' Kelas :' . $nama_kelas . ' MatPel :' . $list['nama_matapelajaran']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="nama_materi">Nama Materi</label>
                              <input type="text" name="nama_materi" class="form-control" id="nama_materi" value="<?= $materi['nama_materi']; ?>" placeholder="Isi Nama Materi">
                              <small class="text-danger"><?= form_error('nama_materi'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="file">Unggah File Materi (pdf)</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf" required>
                                  <label class="custom-file-label" for="file">Pilih File</label>
                                  <small class="text-danger"><?= form_error('file'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="link">Link Video Materi</label>
                              <input type="text" name="link" class="form-control" id="link" value="<?= $materi['link']; ?>" placeholder="Isi Link Video Youtube">
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/materi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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