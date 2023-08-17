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
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/siswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <?php
                        $id_siswa = $siswa['id_siswa'];
                        $id_status = $siswa['id_status'];
                        if ($id_status == '1') {
                        ?>
                          <a href="<?= base_url('register/terimasiswa/' . $id_siswa); ?>"><button type="button" class="btn btn-success ml-3" onclick="return confirm('Anda yakin ingin menerima siswa ini?');"><i class="fa fa-plus"></i> Terima</button></a>
                          <a href="<?= base_url('register/tolaksiswa/' . $id_siswa); ?>"><button type="button" class="btn btn-danger ml-3" onclick="return confirm('Anda yakin ingin menolak siswa ini?');"><i class="fa fa-minus"></i> Tolak</button></a>
                      <?php
                        }
                        ?>
                  </div>
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>NIS</td>
                              <td>:</td>
                              <td><?= $siswa['nis']; ?></td>
                          </tr>
                          <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $siswa['nama']; ?></td>
                          </tr>
                          <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?= check_jeniskelamin($siswa['id_jeniskelamin']); ?></td>
                          </tr>
                          <tr>
                              <td>Tempat Lahir</td>
                              <td>:</td>
                              <td><?= $siswa['tempat_lahir']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Lahir</td>
                              <td>:</td>
                              <td><?= tanggal_indo($siswa['tanggal_lahir']); ?></td>
                          </tr>
                          <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?= $siswa['alamat']; ?></td>
                          </tr>
                          <tr>
                              <td>No HP</td>
                              <td>:</td>
                              <td><?= $siswa['nohp']; ?></td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td><?= $siswa['email']; ?></td>
                          </tr>
                          <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td><?= status_pendaftaran($siswa['id_status']); ?></td>
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