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
                  <h3 class="card-title">Detail Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <?php
                            $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $materi['id_matapelajaran']])->row_array();
                            $nama_matapelajaran = $matapelajaran['nama_matapelajaran'];
                            $id_kelas = $matapelajaran['id_kelas'];
                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                            ?>
                          <tr>
                              <td>Kelas</td>
                              <td>:</td>
                              <td><?= $kelas['nama_kelas']; ?></td>
                          </tr>
                          <tr>
                              <td>Nama Mata Pelajaran</td>
                              <td>:</td>
                              <td><?= $nama_matapelajaran; ?></td>
                          </tr>
                          <?php
                            $id_guru = $matapelajaran['id_guru'];
                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                            $guru_idpegawai = $guru['id_pegawai'];
                            $pegawaiguru = $this->db->get_where('pegawai', ['id_pegawai' => $guru_idpegawai])->row_array();
                            ?>
                          <tr>
                              <td>Nama Guru</td>
                              <td>:</td>
                              <td><?= $pegawaiguru['nama_pegawai']; ?></td>
                          </tr>
                          <tr>
                              <td>File Materi</td>
                              <td>:</td>
                              <td><a href="<?= base_url('files/' . $materi['file']); ?>" target="_blank"><i class="fa fa-file"></i></td>
                          </tr>
                          <tr>
                              <td>Video Materi</td>
                              <td>:</td>
                              <td><a href="<?= $materi['link']; ?>" target="_blank"><i class="fa fa-video"></i></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/materi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->