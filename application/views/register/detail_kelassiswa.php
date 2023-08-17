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
      <?php $id_kelassiswa = $kelassiswa['id_kelassiswa']; ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail Data Kelas Siswa</h3>
              </div>
              <div class="card-body col-md-12">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/kelassiswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <div class="col-12 col-sm-12 mt-3">
                      <div class="card card-success card-tabs">
                          <div class="card-header p-0 pt-1">
                              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-one-kelassiswa-tab" data-toggle="pill" href="#custom-tabs-one-kelassiswa" role="tab" aria-controls="custom-tabs-one-kelassiswa" aria-selected="true">Kelas Siswa</a>
                                  </li>

                                  <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-one-daftarsiswa-tab" data-toggle="pill" href="#custom-tabs-one-daftarsiswa" role="tab" aria-controls="custom-tabs-one-daftarsiswa" aria-selected="false">Daftar Siswa</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="custom-tabs-one-tabContent">
                                  <!-- START TAB -->
                                  <div class="tab-pane fade show active" id="custom-tabs-one-kelassiswa" role="tabpanel" aria-labelledby="custom-tabs-one-kelassiswa-tab">
                                      <div class="col-6">
                                          <?php
                                            $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
                                            $id_kelas = $kelassiswa['id_kelas'];
                                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                            $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                                            $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                            $id_guru = $kelassiswa['id_guru'];
                                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                            $id_pegawaiguru = $guru['id_pegawai'];
                                            $pegawaiguru = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawaiguru])->row_array();
                                            ?>
                                          <table class="table">
                                              <tr>
                                                  <td>Nama Kelas</td>
                                                  <td>:</td>
                                                  <td><?= $kelas['nama_kelas']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Tahun Ajaran</td>
                                                  <td>:</td>
                                                  <td><?= $tahunajaran['nama_tahunajaran']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Semester</td>
                                                  <td>:</td>
                                                  <td><?= $tahunajaran['smester']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Nama Wali Kelas</td>
                                                  <td>:</td>
                                                  <td><?= $pegawaiguru['nama_pegawai']; ?></td>
                                              </tr>
                                          </table>
                                      </div>
                                  </div>

                                  <div class="tab-pane fade" id="custom-tabs-one-daftarsiswa" role="tabpanel" aria-labelledby="custom-tabs-one-daftarsiswa-tab">
                                      <div class="justify-content-between mb-3">
                                          <a href="<?= base_url('register/tambah_daftarsiswa/' . $id_kelassiswa) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Daftar Siswa</button></a>
                                      </div>
                                      <div class="col-12">
                                          <?php
                                            $cekdaftarsiswa = $this->db->get_where('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa]);
                                            if ($cekdaftarsiswa->num_rows() > 0) {
                                                $daftarsiswa = $this->db->get_where('daftarsiswa', ['id_kelassiswa' => $id_kelassiswa])->result_array();
                                            ?>
                                              <table id="example4" class="table table-bordered table-striped">
                                                  <thead>
                                                      <tr>
                                                          <th>No</th>
                                                          <th>Tanggal</th>
                                                          <th>Siswa</th>
                                                          <th>Aksi</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php $no = 1;
                                                        foreach ($daftarsiswa as $list) :
                                                            $siswa = $this->db->get_where('siswa', ['id_siswa' => $list['id_siswa']])->row_array();
                                                        ?>
                                                          <tr>
                                                              <td><?= $no; ?></td>
                                                              <td><?= tanggal_indo($list['tanggal']); ?></td>
                                                              <td><?= $siswa['nama_siswa']; ?></td>
                                                              <td>
                                                                  <a href="<?= base_url(); ?>register/absensi/<?= $list['id_siswa']; ?>/<?= $id_kelassiswa; ?>"><button type="button" class="btn btn-success btn-sm mr-5"><i class="fa fa-plus"></i> Absensi</button></a>
                                                                  <a href="<?= base_url(); ?>register/hapus_daftarsiswa/<?= $list['id_daftarsiswa']; ?>/<?= $id_kelassiswa; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                                              </td>
                                                          </tr>
                                                      <?php $no++;
                                                        endforeach; ?>
                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>No</th>
                                                          <th>Tanggal</th>
                                                          <th>Siswa</th>
                                                          <th>Aksi</th>
                                                      </tr>
                                                  </tfoot>
                                              </table>
                                          <?php
                                            }
                                            ?>
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