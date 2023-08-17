  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <?= $this->session->flashdata('pesan_notifikasi'); ?>
      </section>
      <?php $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array(); ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tambah Data <?= $judul . ' : ' . $siswa['nama_siswa'] . '(' . $siswa['nis'] . ')'; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <?php
                            $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
                            ?>
                          <div class="form-group">
                              <label for="id_siswa">Nama Siswa</label>
                              <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $id_siswa; ?>">
                              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" disabled>
                              <small class="text-danger"><?= form_error('id_siswa'); ?></small>
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
                              <label for="id_tahunajaran">Pilih Tahun Ajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tahunajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $tahunajaran = $this->db->order_by('urutan', 'asc')->get_where('tahunajaran', ['aktif' => '1'])->result_array();
                                    foreach ($tahunajaran as $ta) : ?>
                                      <option value="<?= $ta['id_tahunajaran']; ?>"><?= $ta['nama_tahunajaran'] . '/' . $ta['smester']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_tema">Pilih Tema</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tema" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $tema = $this->db->order_by('urutan', 'asc')->get('tema')->result_array();
                                    foreach ($tema as $tm) : ?>
                                      <option value="<?= $tm['id_tema']; ?>"><?= $tm['nama_tema']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_tema">Pilih Nilai</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_nilai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $nilai = $this->db->order_by('urutan', 'asc')->get('nilai')->result_array();
                                    foreach ($nilai as $nl) : ?>
                                      <option value="<?= $nl['id_nilai']; ?>"><?= $nl['abjad']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/penilaiansiswa/' . $id_siswa); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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