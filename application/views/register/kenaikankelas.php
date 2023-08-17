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

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <div class="row mb-3">
                      <a href="<?= base_url('register/tambah_kenaikankelas') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Siswa</th>
                              <th>Kelas Lama</th>
                              <th>Kelas Baru</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($kenaikankelas as $kkls) : ?>
                              <?php
                                $id_siswa = $kkls['id_siswa'];
                                $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();

                                $id_kelaslama = $kkls['id_kelaslama'];
                                $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelaslama])->row_array();
                                $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                                $tahunajaranlama = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                $id_kelaslama = $kelassiswa['id_kelas'];
                                $kelas_lama = $this->db->get_where('kelas', ['id_kelas' => $id_kelaslama])->row_array();

                                $id_kelasbaru = $kkls['id_kelasbaru'];
                                $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelasbaru])->row_array();
                                $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                                $tahunajaranbaru = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                $id_kelasbaru = $kelassiswa['id_kelas'];
                                $kelas_baru = $this->db->get_where('kelas', ['id_kelas' => $id_kelasbaru])->row_array();
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($kkls['tanggal']); ?></td>
                                  <td><?= $siswa['nama_siswa']; ?></td>
                                  <td><?= $kelas_lama['nama_kelas'] . '<br/> (' . $tahunajaranlama['nama_tahunajaran'] . '/' . $tahunajaranlama['smester'] . ')'; ?></td>
                                  <td><?= $kelas_baru['nama_kelas'] . '<br/> (' . $tahunajaranbaru['nama_tahunajaran'] . '/' . $tahunajaranbaru['smester'] . ')'; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_kenaikankelas/<?= $kkls['id_kenaikankelas']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>register/ubah_kenaikankelas/<?= $kkls['id_kenaikankelas']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>register/hapus_kenaikankelas/<?= $kkls['id_kenaikankelas']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
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
                              <th>Kelas Lama</th>
                              <th>Kelas Baru</th>
                              <th>Aksi</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->