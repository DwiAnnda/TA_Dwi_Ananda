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
      <?php $id_les = $les['id_les']; ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-12">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('siswa/kelasxi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <div class="col-12 col-sm-12 mt-3">
                      <div class="card card-success card-tabs">
                          <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-one-les-tab" data-toggle="pill" href="#custom-tabs-one-les" role="tab" aria-controls="custom-tabs-one-les" aria-selected="true">Data Les</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-materi-tab" data-toggle="pill" href="#custom-tabs-one-materi" role="tab" aria-controls="custom-tabs-one-materi" aria-selected="true">Materi</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-latihan-tab" data-toggle="pill" href="#custom-tabs-one-latihan" role="tab" aria-controls="custom-tabs-one-latihan" aria-selected="true">Latihan</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-komentar-tab" data-toggle="pill" href="#custom-tabs-one-komentar" role="tab" aria-controls="custom-tabs-one-komentar" aria-selected="true">Komentar</a>
                                  </li>

                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                  <!-- START TAB -->
                                  <div class="tab-pane fade show active" id="custom-tabs-one-les" role="tabpanel" aria-labelledby="custom-tabs-one-les-tab">
                                      <div class="col-4">
                                          <?php
                                            $id_tahunajaran = $les['id_tahunajaran'];
                                            $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                            $id_matapelajaran = $les['id_matapelajaran'];
                                            $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id_matapelajaran])->row_array();
                                            $id_kelasguru = $les['id_kelasguru'];
                                            $kelasguru = $this->db->get_where('kelasguru', ['id_kelasguru' => $id_kelasguru])->row_array();
                                            $id_kelas = $kelasguru['id_kelas'];
                                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                            $id_guru = $kelasguru['id_guru'];
                                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                            ?>
                                          <table class="table">
                                              <tr>
                                                  <td>Mata Pelajaran</td>
                                                  <td>:</td>
                                                  <td><?= $matapelajaran['nama_matapelajaran']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Tahun Ajaran</td>
                                                  <td>:</td>
                                                  <td><?= $tahunajaran['nama_tahunajaran'] . ' Semester ' . $tahunajaran['smester']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Kelas</td>
                                                  <td>:</td>
                                                  <td><?= $kelas['nama_kelas']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Guru</td>
                                                  <td>:</td>
                                                  <td><?= $guru['nama']; ?></td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>
                                  <!-- MATERI -->
                                  <div class="tab-pane fade" id="custom-tabs-one-materi" role="tabpanel" aria-labelledby="custom-tabs-one-materi-tab">
                                      <div class="col-12">
                                          <table id="example2" class="table table-bordered table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Tanggal</th>
                                                      <th>Nama Materi</th>
                                                      <th>File</th>
                                                      <th>Video</th>
                                                      <th>Status</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $no = 1;
                                                    $materi = $this->db->get_where('materi', ['id_les' => $id_les])->result_array();
                                                    foreach ($materi as $ft) :
                                                        $link = str_replace('&lt;', '<', $ft['link']);
                                                        $link = str_replace('&gt;', '>', $link);


                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                                          <td><?= $ft['nama_materi']; ?></td>
                                                          <td><a href="<?= base_url('files/' . $ft['file']); ?>" target="_blank"><i class="fa fa-file"></i></td>
                                                          <td style="width:50%">
                                                              <div class="embed-responsive embed-responsive-16by9">
                                                                  <?= $link; ?>
                                                              </div>
                                                          </td>
                                                          <td><?= status_materi($ft['id_status']); ?></td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <!-- Latihan -->
                                  <div class="tab-pane fade" id="custom-tabs-one-latihan" role="tabpanel" aria-labelledby="custom-tabs-one-latihan-tab">
                                      <div class="col-12">
                                          <table id="example2" class="table table-bordered table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Tanggal Publikasi</th>
                                                      <th>Judul</th>
                                                      <th>Keterangan</th>
                                                      <th>Status</th>
                                                      <th>Aksi</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php $no = 1;
                                                    $latihan = $this->db->get_where('latihan', ['id_les' => $id_les])->result_array();
                                                    foreach ($latihan as $ft) :
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                                          <td><?= $ft['judul']; ?></td>
                                                          <td><?= $ft['keterangan']; ?></td>
                                                          <td><?= status_soal($ft['id_status']); ?></td>
                                                          <td>
                                                              <a href="<?= base_url(); ?>siswa/detail_latihan/<?= $id_les . '/' . $ft['id_latihan']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <!-- KOMENTAR -->
                                  <div class="tab-pane fade" id="custom-tabs-one-komentar" role="tabpanel" aria-labelledby="custom-tabs-one-komentar-tab">
                                      <div class="col-12">
                                          <table class="table">
                                              <?php
                                                $komentar = $this->db->get_where('komentar', ['id_les' => $id_les])->result_array();
                                                foreach ($komentar as $komen) {
                                                    $id_jenispengirim = $komen['id_jenispengirim'];
                                                    $id_pengirim = $komen['id_pengirim'];
                                                    if ($id_jenispengirim == '1') {
                                                        $pengirim = $this->Guru_model->getguruById($id_pengirim);
                                                        $namapengirim = $pengirim['nama'];
                                                    } else {
                                                        $pengirim = $this->Siswa_model->getsiswaById($id_pengirim);
                                                        $namapengirim = $pengirim['nama'];
                                                    }

                                                ?>
                                                  <tr>
                                                      <td width="30%" align="right"><b><?= $namapengirim; ?> : </b></td>
                                                      <td><?= $komen['isi_komentar']; ?></td>
                                                  </tr>
                                              <?php } ?>
                                          </table>
                                          <table class="table">
                                              <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                                  <tr>

                                                      <td width="60%"><textarea name="isi_komentar" class="form-control" id="isi_komentar" rows="5" placeholder="Isi Komentar"></textarea></td>
                                                      <td><button type="submit" class="btn btn-primary btn-lg btn-block" onclick="return confirm('Apakah anda ingin mengirim komentar?');"><i class="fa fa-send"></i> Kirim</button></td>
                                                  </tr>
                                              </form>
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