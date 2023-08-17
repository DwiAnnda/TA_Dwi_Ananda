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
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="id_guru">Guru</label>
                              <input type="hidden" name="id_guru" class="form-control" id="id_guru" value="<?= $pegawai['id_guru']; ?>" readonly>
                              <input type="text" name="nama" class="form-control" id="nama" value="<?= $pegawai['nama']; ?>" readonly>
                              <small class="text-danger"><?= form_error('id_guru'); ?></small>
                          </div>
                          <?php
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
                              <label for="pertanyaan">Pertanyaan</label>
                              <textarea name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Isi pertanyaan" rows="5"><?= $soalisian['pertanyaan']; ?></textarea>
                              <small class="text-danger"><?= form_error('pertanyaan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="jawaban">Jawaban</label>
                              <textarea name="jawaban" class="form-control" id="jawaban" placeholder="Isi Jawaban" rows="5"><?= $soalisian['jawaban']; ?></textarea>
                              <small class="text-danger"><?= form_error('jawaban'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_status">Status Soal</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="<?= $soalisian['id_status']; ?>"><?= status_soal($soalisian['id_status']); ?></option>
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/detail_les/' . $les['id_les']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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