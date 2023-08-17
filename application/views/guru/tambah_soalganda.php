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
                              <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" value="<?= set_value('pertanyaan'); ?>" placeholder="Isi pertanyaan">
                              <small class="text-danger"><?= form_error('pertanyaan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pilihana">Pilihan A</label>
                              <input type="text" name="pilihana" class="form-control" id="pilihana" value="<?= set_value('pilihana'); ?>" placeholder="Isi Pilihan A">
                              <small class="text-danger"><?= form_error('pilihana'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pilihanb">Pilihan B</label>
                              <input type="text" name="pilihanb" class="form-control" id="pilihanb" value="<?= set_value('pilihanb'); ?>" placeholder="Isi Pilihan B">
                              <small class="text-danger"><?= form_error('pilihanb'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pilihanc">Pilihan C</label>
                              <input type="text" name="pilihanc" class="form-control" id="pilihanc" value="<?= set_value('pilihanc'); ?>" placeholder="Isi Pilihan C">
                              <small class="text-danger"><?= form_error('pilihanc'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pilihand">Pilihan D</label>
                              <input type="text" name="pilihand" class="form-control" id="pilihand" value="<?= set_value('pilihand'); ?>" placeholder="Isi Pilihan D">
                              <small class="text-danger"><?= form_error('pilihand'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pilihane">Pilihan E</label>
                              <input type="text" name="pilihane" class="form-control" id="pilihane" value="<?= set_value('pilihane'); ?>" placeholder="Isi Pilihan E">
                              <small class="text-danger"><?= form_error('pilihane'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="jawaban">Pilih Jawaban</label>
                              <select class="form-control select2 select2-hidden-accessible" name="jawaban" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/detail_les/' . $les['id_les']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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