  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail Data Kenaikan Kelas</h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($kenaikankelas['tanggal']); ?></td>
                          </tr>
                          <?php
                            $id_siswa = $kenaikankelas['id_siswa'];
                            $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
                            ?>
                          <tr>
                              <td>Nama Siswa</td>
                              <td>:</td>
                              <td><?= $siswa['nama_siswa']; ?></td>
                          </tr>
                          <?php
                            $id_kelaslama = $kenaikankelas['id_kelaslama'];
                            $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelaslama])->row_array();
                            $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                            $tahunajaranlama = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                            $id_kelaslama = $kelassiswa['id_kelas'];
                            $kelas_lama = $this->db->get_where('kelas', ['id_kelas' => $id_kelaslama])->row_array();

                            $id_kelasbaru = $kenaikankelas['id_kelasbaru'];
                            $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelasbaru])->row_array();
                            $id_tahunajaran = $kelassiswa['id_tahunajaran'];
                            $tahunajaranbaru = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                            $id_kelasbaru = $kelassiswa['id_kelas'];
                            $kelas_baru = $this->db->get_where('kelas', ['id_kelas' => $id_kelasbaru])->row_array();
                            ?>
                          <tr>
                              <td>Kelas Lama</td>
                              <td>:</td>
                              <td><?= $kelas_lama['nama_kelas'] . ' (' . $tahunajaranlama['nama_tahunajaran'] . '/' . $tahunajaranlama['smester'] . ')'; ?></td>
                          </tr>
                          <tr>
                              <td>Kelas Baru</td>
                              <td>:</td>
                              <td><?= $kelas_baru['nama_kelas'] . ' (' . $tahunajaranbaru['nama_tahunajaran'] . '/' . $tahunajaranbaru['smester'] . ')'; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/kenaikankelas'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->