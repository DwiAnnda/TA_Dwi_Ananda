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
        $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $les['id_matapelajaran']])->row_array();
        $gurulatihan = $this->db->get_where('guru', ['id_guru' => $kelasguru['id_guru']])->row_array();
        $nilai = $this->db->get_where('nilai', [
            'id_latihan' => $id_latihan,
            'id_siswa' => $pengguna['id_siswa'],
        ])->row_array();
        if ($nilai) {
            $hasil = $nilai['nilaiangka'];
        } else {
            $hasil = "Belum Dinilai";
        }
        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail <?= $latihan['judul'] . ' ' . $matapelajaran['nama_matapelajaran']; ?></h3>
              </div>
              <div class="card-body">
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('siswa/detail_kelasx/' . $les['id_les']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <h3>Nilai : <?= $hasil; ?></h3>
                  </div>
                  <hr />
                  <h3>Data Soal Pilihan Ganda</h3>
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>A</th>
                              <th>B</th>
                              <th>C</th>
                              <th>D</th>
                              <th>E</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            $soalganda = $this->db->get_where('soalganda', [
                                'id_les' => $id_les,
                                'id_status' => '1',
                            ])->result_array();
                            foreach ($soalganda as $ft) :
                                $ceklatihansoalganda = $this->db->get_where('latihansoalganda', [
                                    'id_latihan' => $id_latihan,
                                    'id_soalganda' => $ft['id_soalganda']
                                ])->num_rows();
                                if ($ceklatihansoalganda > 0) {
                                    $latihansoalganda = $this->db->get_where('latihansoalganda', [
                                        'id_latihan' => $id_latihan,
                                        'id_soalganda' => $ft['id_soalganda']
                                    ])->row_array();
                                    $cekA = $this->db->get_where('jawabanlatihanganda', [
                                        'id_latihansoalganda' => $latihansoalganda['id_latihansoalganda'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban' => 'A'
                                    ])->num_rows();
                                    if ($cekA > 0) {
                                        $checkedA = "checked";
                                    } else {
                                        $checkedA = "";
                                    }
                                    $cekB = $this->db->get_where('jawabanlatihanganda', [
                                        'id_latihansoalganda' => $latihansoalganda['id_latihansoalganda'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban' => 'B'
                                    ])->num_rows();
                                    if ($cekB > 0) {
                                        $checkedB = "checked";
                                    } else {
                                        $checkedB = "";
                                    }
                                    $cekC = $this->db->get_where('jawabanlatihanganda', [
                                        'id_latihansoalganda' => $latihansoalganda['id_latihansoalganda'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban' => 'C'
                                    ])->num_rows();
                                    if ($cekC > 0) {
                                        $checkedC = "checked";
                                    } else {
                                        $checkedC = "";
                                    }
                                    $cekD = $this->db->get_where('jawabanlatihanganda', [
                                        'id_latihansoalganda' => $latihansoalganda['id_latihansoalganda'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban' => 'D'
                                    ])->num_rows();
                                    if ($cekD > 0) {
                                        $checkedD = "checked";
                                    } else {
                                        $checkedD = "";
                                    }
                                    $cekE = $this->db->get_where('jawabanlatihanganda', [
                                        'id_latihansoalganda' => $latihansoalganda['id_latihansoalganda'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban' => 'E'
                                    ])->num_rows();
                                    if ($cekE > 0) {
                                        $checkedE = "checked";
                                    } else {
                                        $checkedE = "";
                                    }



                            ?>
                                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="id_input" class="form-control" id="id_input" value="1" readonly>
                                      <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $pengguna['id_siswa']; ?>" readonly>
                                      <input type="hidden" name="id_latihansoalganda" class="form-control" id="id_latihansoalganda" value="<?= $latihansoalganda['id_latihansoalganda']; ?>" readonly>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $ft['pertanyaan']; ?></td>
                                          <div class="form-group">
                                              <td>
                                                  <?php
                                                    $no = $no + 1;
                                                    ?>
                                                  <div class="custom-control custom-radio">
                                                      <input class="custom-control-input" type="radio" id="customRadio<?= $no; ?>" name="jawaban" value="A" <?= $checkedA; ?>>
                                                      <label for="customRadio<?= $no; ?>" class="custom-control-label"><?= $ft['a']; ?></label>
                                                  </div>
                                              </td>
                                              <td>
                                                  <?php
                                                    $no = $no + 1;
                                                    ?>
                                                  <div class="custom-control custom-radio">
                                                      <input class="custom-control-input" type="radio" id="customRadio<?= $no; ?>" name="jawaban" value="B" <?= $checkedB; ?>>
                                                      <label for="customRadio<?= $no; ?>" class="custom-control-label"><?= $ft['b']; ?></label>
                                                  </div>
                                              </td>
                                              <td>
                                                  <?php
                                                    $no = $no + 1;
                                                    ?>
                                                  <div class="custom-control custom-radio">
                                                      <input class="custom-control-input" type="radio" id="customRadio<?= $no; ?>" name="jawaban" value="C" <?= $checkedC; ?>>
                                                      <label for="customRadio<?= $no; ?>" class="custom-control-label"><?= $ft['c']; ?></label>
                                                  </div>
                                              </td>
                                              <td>
                                                  <?php
                                                    $no = $no + 1;
                                                    ?>
                                                  <div class="custom-control custom-radio">
                                                      <input class="custom-control-input" type="radio" id="customRadio<?= $no; ?>" name="jawaban" value="D" <?= $checkedD; ?>>
                                                      <label for="customRadio<?= $no; ?>" class="custom-control-label"><?= $ft['d']; ?></label>
                                                  </div>
                                              </td>
                                              <td>
                                                  <?php
                                                    $no = $no + 1;
                                                    ?>
                                                  <div class="custom-control custom-radio">
                                                      <input class="custom-control-input" type="radio" id="customRadio<?= $no; ?>" name="jawaban" value="E" <?= $checkedE; ?>>
                                                      <label for="customRadio<?= $no; ?>" class="custom-control-label"><?= $ft['e']; ?></label>
                                                  </div>
                                              </td>
                                          </div>
                                          <td>
                                              <?php
                                                if (!$nilai) {
                                                ?>
                                                  <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Anda yakin sudah memilih jawaban dan menyimpan?');"> Simpan Jawaban</button>
                                              <?php } ?>
                                          </td>
                                      </tr>
                                  </form>
                          <?php $no++;
                                }
                            endforeach; ?>
                      </tbody>
                  </table>
                  <hr />

                  <h3>Data Soal Isian</h3>
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Pertanyaan</th>
                              <th>Jawaban</th>
                              <th>Aktifkan</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            $soalisian = $this->db->get_where('soalisian', [
                                'id_les' => $id_les,
                                'id_status' => '1',
                            ])->result_array();
                            foreach ($soalisian as $ft) :
                                $ceklatihansoalisian = $this->db->get_where('latihansoalisian', [
                                    'id_latihan' => $id_latihan,
                                    'id_soalisian' => $ft['id_soalisian']
                                ])->num_rows();
                                if ($ceklatihansoalisian > 0) {
                                    $latihansoalisian = $this->db->get_where('latihansoalisian', [
                                        'id_latihan' => $id_latihan,
                                        'id_soalisian' => $ft['id_soalisian']
                                    ])->row_array();
                                    $cekjawaban = $this->db->get_where('jawabanlatihanisian', [
                                        'id_latihansoalisian' => $latihansoalisian['id_latihansoalisian'],
                                        'id_siswa' => $pengguna['id_siswa'],
                                        'jawaban !=' => NULL
                                    ])->row_array();
                                    if ($cekjawaban) {
                                        $jawaban = $cekjawaban['jawaban'];
                                    } else {
                                        $jawaban = "";
                                    }

                            ?>
                                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $ft['pertanyaan']; ?></td>
                                          <td>
                                              <div class="form-group">
                                                  <div class="form-check">
                                                      <input type="hidden" name="id_input" class="form-control" id="id_input" value="2" readonly>
                                                      <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $pengguna['id_siswa']; ?>" readonly>
                                                      <input type="hidden" name="id_latihansoalisian" class="form-control" id="id_latihansoalisian" value="<?= $latihansoalisian['id_latihansoalisian']; ?>" readonly>
                                                      <textarea name="jawaban" class="form-control" id="jawaban" rows="5"><?= $jawaban; ?></textarea>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <?php
                                                if (!$nilai) {
                                                ?>
                                                  <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Anda yakin sudah memilih jawaban dan menyimpan?');"> Simpan Jawaban</button>
                                              <?php } ?>
                                          </td>
                                      </tr>
                                  </form>
                          <?php $no++;
                                }
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