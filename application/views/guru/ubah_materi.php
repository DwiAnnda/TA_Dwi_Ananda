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
                              <label for="id_guru">Guru</label>
                              <input type="hidden" name="id_guru" class="form-control" id="id_guru" value="<?= $pegawai['id_guru']; ?>" readonly>
                              <input type="text" name="nama" class="form-control" id="nama" value="<?= $pegawai['nama']; ?>" readonly>
                              <small class="text-danger"><?= form_error('id_guru'); ?></small>
                          </div>
                          <?php
                            $les = $this->Les_model->getlesById($materi['id_les']);
                            $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $les['id_matapelajaran']])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_matapelajaran">Mata Pelajaran</label>
                              <input type="hidden" name="id_matapelajaran" class="form-control" id="id_matapelajaran" value="<?= $matapelajaran['id_matapelajaran']; ?>" readonly>
                              <input type="text" name="nama_matapelajaran" class="form-control" id="nama_matapelajaran" value="<?= $matapelajaran['nama_matapelajaran']; ?>" readonly>
                              <small class="text-danger"><?= form_error('id_matapelajaran'); ?></small>
                          </div>
                          <?php
                            $kelasguru = $this->db->get_where('kelasguru', ['id_kelasguru' => $les['id_kelasguru']])->row_array();
                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $kelasguru['id_kelas']])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_kelasguru">Kelas</label>
                              <input type="hidden" name="id_kelasguru" class="form-control" id="id_kelasguru" value="<?= $les['id_kelasguru']; ?>" readonly>
                              <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $kelas['nama_kelas']; ?>" readonly>
                              <small class="text-danger"><?= form_error('id_kelasguru'); ?></small>
                          </div>
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" data-toggle="datetimepicker" value="<?= date('d-m-Y', strtotime($materi['tanggal'])); ?>">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="nama_materi">Nama Materi</label>
                              <input type="text" name="nama_materi" class="form-control" id="nama_materi" value="<?= $materi['nama_materi']; ?>" placeholder="Isi Nama Materi">
                              <small class="text-danger"><?= form_error('nama_materi'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="file">Unggah File Materi (pdf) <i><a href="<?= base_url('files/' . $materi['file']); ?>" target="_blank">File Lama</i></a></label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf" required>
                                  <label class="custom-file-label" for="file">Pilih File</label>
                                  <small class="text-danger"><?= form_error('file'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="link">Link Video Materi</label>
                              <textarea name="link" class="form-control" id="link" placeholder="Isi Link Video Youtube"><?= $materi['link']; ?></textarea>
                          </div>
                          <div class="form-group">
                              <label for="id_status">Status Materi</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="<?= $materi['id_status']; ?>"><?= status_materi($materi['id_status']); ?></option>
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/materi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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