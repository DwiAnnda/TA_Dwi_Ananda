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
                      <h5><i class="icon fas fa-check"></i> Notifikasi!</h5>
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
                  <h3 class="card-title">Detail <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <div class="justify-content-between mb-3">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pembayaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <?php
                        $id_pembayaran = $pembayaran['id_pembayaran'];
                        $id_status = $pembayaran['id_status'];
                        if ($id_status == '2') {
                        ?>
                          <a href="<?= base_url('register/konfirmasipembayaran/' . $id_pembayaran . '/' . $les['id_les']); ?>"><button type="button" class="btn btn-success ml-3" onclick="return confirm('Anda yakin ingin mengkonfirmasi pembayaran ini?');"><i class="fa fa-plus"></i> Konfirmasi</button></a>
                      <?php
                        }
                        ?>
                  </div>
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pembayaran['tanggal']); ?></td>
                          </tr>
                          <tr>
                              <td>Kode</td>
                              <td>:</td>
                              <td><?= $pembayaran['kode']; ?></td>
                          </tr>
                          <?php
                            $siswa = $this->Siswa_model->getsiswaById($pembayaran['id_siswa']);
                            ?>
                          <tr>
                              <td>Siswa</td>
                              <td>:</td>
                              <td><?= $siswa['nama']; ?></td>
                          </tr>
                          <?php
                            $les = $this->Les_model->getlesById($pembayaran['id_les']);
                            $tahunajaran = $this->Tahunajaran_model->gettahunajaranById($les['id_tahunajaran']);
                            $matapelajaran = $this->Matapelajaran_model->getmatapelajaranById($les['id_matapelajaran']);
                            $kelasguru = $this->Kelasguru_model->getkelasguruById($les['id_kelasguru']);
                            $id_kelas = $kelasguru['id_kelas'];
                            $kelas = $this->Kelas_model->getkelasById($kelasguru['id_kelas']);
                            $id_guru = $kelasguru['id_guru'];
                            $guru = $this->Guru_model->getguruById($kelasguru['id_guru']);
                            ?>
                          <tr>
                              <td>Tahun Ajaran</td>
                              <td>:</td>
                              <td><?= $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester']; ?></td>
                          </tr>
                          <tr>
                              <td>Mata Pelajaran</td>
                              <td>:</td>
                              <td><?= $matapelajaran['nama_matapelajaran']; ?></td>
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
                          <?php
                            if (($pembayaran['atasnama'] !== NULL) or ($pembayaran['atasnama'] <> '')) {
                            ?>
                              <tr>
                                  <td>Atas Nama</td>
                                  <td>:</td>
                                  <td><?= $pembayaran['atasnama']; ?></td>
                              </tr>
                              <tr>
                                  <td>Nama Bank</td>
                                  <td>:</td>
                                  <td><?= $pembayaran['namabank']; ?></td>
                              </tr>
                              <tr>
                                  <td>No Rekening</td>
                                  <td>:</td>
                                  <td><?= $pembayaran['norekening']; ?></td>
                              </tr>
                          <?php } ?>
                          <tr>
                              <td>Nominal</td>
                              <td>:</td>
                              <td><?= rupiah($pembayaran['nominal']); ?></td>
                          </tr>
                          <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td><?= status_tagihan($pembayaran['id_status']); ?></td>
                          </tr>
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