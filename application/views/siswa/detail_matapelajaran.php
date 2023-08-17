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
      <?php $id_matapelajaran = $matapelajaran['id_matapelajaran']; ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-12">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('siswa/matapelajaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <div class="col-12 col-sm-12 mt-3">
                      <div class="card card-success card-tabs">
                          <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-one-matapelajaran-tab" data-toggle="pill" href="#custom-tabs-one-matapelajaran" role="tab" aria-controls="custom-tabs-one-matapelajaran" aria-selected="true">Mata Pelajaran</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-materi-tab" data-toggle="pill" href="#custom-tabs-one-materi" role="tab" aria-controls="custom-tabs-one-materi" aria-selected="true">Materi</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-latihan-tab" data-toggle="pill" href="#custom-tabs-one-latihan" role="tab" aria-controls="custom-tabs-one-latihan" aria-selected="true">Latihan</a>
                                  </li>
                                  <!-- <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-tugas-tab" data-toggle="pill" href="#custom-tabs-one-tugas" role="tab" aria-controls="custom-tabs-one-tugas" aria-selected="true">Tugas</a>
                                  </li>-->

                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                  <!-- START TAB -->
                                  <div class="tab-pane fade show active" id="custom-tabs-one-matapelajaran" role="tabpanel" aria-labelledby="custom-tabs-one-matapelajaran-tab">
                                      <div class="col-4">
                                          <?php
                                            $id_tahunajaran = $matapelajaran['id_tahunajaran'];
                                            $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                            $id_mapel = $matapelajaran['id_mapel'];
                                            $mapel = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();
                                            $id_kelas = $matapelajaran['id_kelas'];
                                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                            $id_guru = $matapelajaran['id_guru'];
                                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                            ?>
                                          <table class="table">
                                              <tr>
                                                  <td>Mata Pelajaran</td>
                                                  <td>:</td>
                                                  <td><?= $mapel['nama_mapel']; ?></td>
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
                                                    $materi = $this->db->get_where('materi', ['id_matapelajaran' => $id_matapelajaran])->result_array();
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
                                                    $latihan = $this->db->get_where('latihan', ['id_matapelajaran' => $id_matapelajaran])->result_array();
                                                    foreach ($latihan as $ft) :
                                                        $nilai = $this->db->get_where('nilai', [
                                                            'id_latihan' => $ft['id_latihan'],
                                                            'id_siswa' => $pengguna['id_siswa'],
                                                        ])->row_array();
                                                        if ($nilai) {
                                                            $hasil = $nilai['nilaiangka'];
                                                        } else {
                                                            $hasil = "Belum Dinilai";
                                                        }
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                                          <td><?= $ft['judul']; ?></td>
                                                          <td><?= $ft['keterangan']; ?></td>
                                                          <td><?= $hasil; ?></td>
                                                          <td><?= status_soal($ft['id_status']); ?></td>
                                                          <td>
                                                              <a href="<?= base_url(); ?>siswa/detail_latihan/<?= $id_matapelajaran . '/' . $ft['id_latihan']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Kerjakan</button></a>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                  <!-- TUGAS -->
                                  <!--<div class="tab-pane fade" id="custom-tabs-one-tugas" role="tabpanel" aria-labelledby="custom-tabs-one-tugas-tab">
                                      <div class="col-12">
                                          <div class="justify-content-between">
                                              <a href="<?= base_url('siswa/tambah_tugas/' . $id_matapelajaran); ?>"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data Tugas</button></a>
                                          </div>
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
                                                    $tugas = $this->db->get_where('tugas', ['id_matapelajaran' => $id_matapelajaran])->result_array();
                                                    foreach ($tugas as $ft) :
                                                    ?>
                                                      <tr>
                                                          <td><?= $no; ?></td>
                                                          <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                                          <td><?= $ft['judul']; ?></td>
                                                          <td><?= $ft['keterangan']; ?></td>
                                                          <td><?= status_soal($ft['id_status']); ?></td>
                                                          <td>
                                                              <a href="<?= base_url(); ?>siswa/ubah_tugas/<?= $id_matapelajaran . '/' . $ft['id_tugas']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                                              <a href="<?= base_url(); ?>siswa/hapus_tugas/<?= $id_matapelajaran . '/' . $ft['id_tugas']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                                          </td>
                                                      </tr>
                                                  <?php $no++;
                                                    endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>-->
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