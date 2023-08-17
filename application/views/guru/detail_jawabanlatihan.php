  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
          <?php if ($this->session->flashdata()) : ?>
              <!-- right column -->
              <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Notifkasi!</h5>
                      Data berhasil <?= $this->session->flashdata('flashdata'); ?>
                  </div>
              </div>
              <!--/.col (right) -->
          <?php endif; ?>
      </section>
      <?php
        $les = $this->db->get_where('les', ['id_les' => $latihan['id_les']])->row_array();
        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail Jawaban <?= $latihan['judul']; ?> Siswa <?= $siswa['nama']; ?></h3>
              </div>
              <div class="card-body">
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/detail_latihan/' . $les['id_les'] . '/' . $latihan['id_latihan']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <hr />
                  <div class="col-2">
                      <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                              <?php
                                $query_nilai = $this->db->get_where('nilai', [
                                    'id_latihan' => $latihan['id_latihan'],
                                    'id_siswa' => $siswa['id_siswa']
                                ])->row_array();
                                if ($query_nilai) {
                                    $nilai = $query_nilai['nilaiangka'];
                                } else {
                                    $nilai = '0';
                                }
                                ?>
                              <div class="form-group">
                                  <label for="nilaiangka">Nilai</label>
                                  <input type="hidden" name="id_latihan" class="form-control" id="id_latihan" value="<?= $latihan['id_latihan']; ?>" readonly>
                                  <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $siswa['id_siswa']; ?>" readonly>
                                  <input type="number" name="nilaiangka" class="form-control" id="nilaiangka" value="<?= $nilai; ?>" placeholder="Isi Nilai">
                                  <small class="text-danger"><?= form_error('nilai'); ?></small>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-block btn-primary" onclick="return confirm('Anda yakin ingin menyimpan data');"><i class="fa fa-save"></i> Simpan Nilai</button>
                              </div>
                          </div>

                      </form>
                  </div>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>Jawaban Benar</th>
                              <th>Jawaban Siswa</th>
                              <th>Hasil</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($latihansoalganda as $ft) :
                                $jawabanlatihanganda = $this->db->get_where('jawabanlatihanganda', [
                                    'id_latihansoalganda' => $ft['id_latihansoalganda'],
                                    'id_siswa' => $siswa['id_siswa']
                                ])->row_array();
                                $soalganda = $this->db->get_where('soalganda', ['id_soalganda' => $ft['id_soalganda']])->row_array();

                                if ($jawabanlatihanganda['jawaban'] == 'A') {
                                    $jawabansiswa = 'A. ' . $soalganda['a'];
                                } else if ($jawabanlatihanganda['jawaban'] == 'B') {
                                    $jawabansiswa = 'B. ' . $soalganda['b'];
                                } else if ($jawabanlatihanganda['jawaban'] == 'C') {
                                    $jawabansiswa = 'C. ' . $soalganda['c'];
                                } else if ($jawabanlatihanganda['jawaban'] == 'D') {
                                    $jawabansiswa = 'D. ' . $soalganda['d'];
                                } else if ($jawabanlatihanganda['jawaban'] == 'E') {
                                    $jawabansiswa = 'E. ' . $soalganda['e'];
                                } else {
                                    $jawabansiswa = '';
                                }

                                if ($soalganda['jawaban'] == $jawabanlatihanganda['jawaban']) {
                                    $hasil = "Benar";
                                } else {
                                    $hasil = "Salah";
                                }

                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $soalganda['pertanyaan']; ?></td>
                                  <td><?= $soalganda['jawaban']; ?></td>
                                  <td><?= $jawabanlatihanganda['jawaban']; ?></td>
                                  <td><?= $hasil; ?></td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                  </table>
                  <hr />
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>Jawaban Benar</th>
                              <th>Jawaban Siswa</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($latihansoalisian as $ft) :
                                $jawabanlatihanisian = $this->db->get_where('jawabanlatihanisian', [
                                    'id_latihansoalisian' => $ft['id_latihansoalisian'],
                                    'id_siswa' => $siswa['id_siswa']
                                ])->row_array();
                                $soalisian = $this->db->get_where('soalisian', ['id_soalisian' => $ft['id_soalisian']])->row_array();


                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $soalisian['pertanyaan']; ?></td>
                                  <td><?= $soalisian['jawaban']; ?></td>
                                  <td><?= $jawabanlatihanisian['jawaban']; ?></td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->