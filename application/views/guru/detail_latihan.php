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
        $id_les = $les['id_les'];
        $id_latihan = $latihan['id_latihan'];
        $kelasguru = $this->db->get_where('kelasguru', ['id_kelasguru' => $les['id_kelasguru']])->row_array();
        $kelas = $this->db->get_where('kelas', ['id_kelas' => $kelasguru['id_kelas']])->row_array();
        $id_kelas = $kelas['id_kelas'];
        $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $les['id_matapelajaran']])->row_array();
        $gurulatihan = $this->db->get_where('guru', ['id_guru' => $kelasguru['id_guru']])->row_array();
        ?>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail <?= $judul . ' ' . $matapelajaran['nama_matapelajaran']; ?></h3>
              </div>
              <div class="card-body col-md-12">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('guru/detail_les/' . $id_les); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <div class="col-12 col-sm-12 mt-3">
                      <div class="card card-success card-tabs">
                          <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-one-latihansoalganda-tab" data-toggle="pill" href="#custom-tabs-one-latihansoalganda" role="tab" aria-controls="custom-tabs-one-latihansoalganda" aria-selected="true">Daftar Soal</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-jawabanlatihanganda-tab" data-toggle="pill" href="#custom-tabs-one-jawabanlatihanganda" role="tab" aria-controls="custom-tabs-one-jawabanlatihanganda" aria-selected="true">Daftar Jawaban Siswa</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                  <!-- DAFTAR SOAL-->
                                  <div class="tab-pane fade show active" id="custom-tabs-one-latihansoalganda" role="tabpanel" aria-labelledby="custom-tabs-one-latihansoalganda-tab">
                                      <h3>Data Soal Pilihan Ganda</h3>
                                      <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                          <table id="example2" class="table table-bordered table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Pertanyaan</th>
                                                      <th>A</th>
                                                      <th>B</th>
                                                      <th>C</th>
                                                      <th>D</th>
                                                      <th>E</th>
                                                      <th>Jawaban</th>
                                                      <th>Aktifkan</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $no = 1;
                                                    $soalganda = $this->db->get_where('soalganda', [
                                                        'id_les' => $id_les,
                                                        'id_status' => '1',
                                                    ])->result_array();
                                                    foreach ($soalganda as $ft) :
                                                        $latihansoalganda = $this->db->get_where('latihansoalganda', [
                                                            'id_latihan' => $id_latihan,
                                                            'id_soalganda' => $ft['id_soalganda']
                                                        ])->num_rows();
                                                        if ($latihansoalganda > 0) {
                                                            $checked = "checked";
                                                        } else {
                                                            $checked = "";
                                                        }
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= $ft['pertanyaan']; ?></td>
                                                          <td><?= $ft['a']; ?></td>
                                                          <td><?= $ft['b']; ?></td>
                                                          <td><?= $ft['c']; ?></td>
                                                          <td><?= $ft['d']; ?></td>
                                                          <td><?= $ft['e']; ?></td>
                                                          <td><?= $ft['jawaban']; ?></td>
                                                          <td>
                                                              <div class="form-group">
                                                                  <div class="form-check">
                                                                      <input type="hidden" name="id_input" class="form-control" id="id_input" value="1" readonly>
                                                                      <input type="hidden" name="id_latihan" class="form-control" id="id_latihan" value="<?= $latihan['id_latihan']; ?>" readonly>
                                                                      <input class="form-check-input" type="checkbox" id="id_soalganda<?= $ft['id_soalganda']; ?>" name="id_soalganda<?= $ft['id_soalganda']; ?>" value="<?= $ft['id_soalganda']; ?>" <?= $checked; ?>>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                          <hr />
                                          <div class="modal-footer justify-content-between">
                                              <button type="submit" class="btn btn-lg btn-primary btn-block" onclick="return confirm('Anda yakin ingin menetapkan soal latihan diatas?');"><i class="fa fa-save"></i> Simpan Soal Pilihan Ganda</button>
                                          </div>
                                      </form>
                                      <h3>Data Soal Isian</h3>
                                      <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                          <table id="example2" class="table table-bordered table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Pertanyaan</th>
                                                      <th>Jawaban</th>
                                                      <th>Aktifkan</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $no = 1;
                                                    $soalisian = $this->db->get_where('soalisian', [
                                                        'id_les' => $id_les,
                                                        'id_status' => '1',
                                                    ])->result_array();
                                                    foreach ($soalisian as $ft) :
                                                        $latihansoalisian = $this->db->get_where('latihansoalisian', [
                                                            'id_latihan' => $id_latihan,
                                                            'id_soalisian' => $ft['id_soalisian']
                                                        ])->num_rows();
                                                        if ($latihansoalisian > 0) {
                                                            $checked = "checked";
                                                        } else {
                                                            $checked = "";
                                                        }
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= $ft['pertanyaan']; ?></td>
                                                          <td><?= $ft['jawaban']; ?></td>
                                                          <td>
                                                              <div class="form-group">
                                                                  <div class="form-check">
                                                                      <input type="hidden" name="id_input" class="form-control" id="id_input" value="2" readonly>
                                                                      <input type="hidden" name="id_latihan" class="form-control" id="id_latihan" value="<?= $latihan['id_latihan']; ?>" readonly>
                                                                      <input class="form-check-input" type="checkbox" id="id_soalisian<?= $ft['id_soalisian']; ?>" name="id_soalisian<?= $ft['id_soalisian']; ?>" value="<?= $ft['id_soalisian']; ?>" <?= $checked; ?>>
                                                                  </div>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                          <hr />
                                          <div class="modal-footer justify-content-between">
                                              <button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Anda yakin ingin menetapkan soal latihan diatas?');"><i class="fa fa-save"></i> Simpan Soal Isian</button>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- DAFTAR JAWABAN -->
                                  <div class="tab-pane fade" id="custom-tabs-one-jawabanlatihanganda" role="tabpanel" aria-labelledby="custom-tabs-one-jawabanlatihanganda-tab">
                                      <div class="col-12">
                                          <table class="table table-bordered table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>NIS</th>
                                                      <th>Nama</th>
                                                      <th>Kelas</th>
                                                      <th>Aksi</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $no = 1;
                                                    $daftarsiswa = $this->db->get_where('daftarsiswa', [
                                                        'id_les' => $id_les,
                                                        'id_status' => '1',
                                                    ])->result_array();
                                                    foreach ($daftarsiswa as $ft) :
                                                        $siswa = $this->db->get_where('siswa', ['id_siswa' => $ft['id_siswa']])->row_array();
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= $siswa['nis']; ?></td>
                                                          <td><?= $siswa['nama']; ?></td>
                                                          <td><?= $kelas['nama_kelas']; ?></td>
                                                          <td>
                                                              <a href="<?= base_url(); ?>guru/detail_jawabanlatihan/<?= $id_latihan . '/' . $ft['id_siswa']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <!-- END TAB -->
                              </div>
                          </div>
                          <!-- /.card -->
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->