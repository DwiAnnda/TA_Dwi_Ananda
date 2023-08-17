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
                  <h3 class="card-title">Tambah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
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
                              <label for="id_matapelajaran">Pilih Guru</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_matapelajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $matapelajaran = $this->db->order_by('id_guru', 'asc')->get('matapelajaran')->result_array();
                                    foreach ($matapelajaran as $list) :
                                        $id_kelas = $list['id_kelas'];
                                        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                        $nama_kelas = $kelas['nama_kelas'];
                                        $id_guru = $list['id_guru'];
                                        $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                        $pilih_idpegawai = $guru['id_pegawai'];
                                        $pilihpegawai = $this->db->get_where('pegawai', ['id_pegawai' => $pilih_idpegawai])->row_array();
                                    ?>
                                      <option value="<?= $list['id_matapelajaran']; ?>"><?= $pilihpegawai['nama_pegawai'] . ' Kelas :' . $nama_kelas . ' MatPel :' . $list['nama_matapelajaran']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="nama_materi">Nama Materi</label>
                              <input type="text" name="nama_materi" class="form-control" id="nama_materi" value="<?= set_value('nama_materi'); ?>" placeholder="Isi Nama Materi">
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
                              <input type="text" name="link" class="form-control" id="link" value="<?= set_value('link'); ?>" placeholder="Isi Link Video Youtube">
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/materi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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