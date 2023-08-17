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
                  <h3 class="card-title">Detail Data Orang Tua/Wali</h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>NIK</td>
                              <td>:</td>
                              <td><?= $ortuwali['nik']; ?></td>
                          </tr>
                          <tr>
                              <td>Nama Orang Tua/Wali</td>
                              <td>:</td>
                              <td><?= $ortuwali['nama_ortuwali']; ?></td>
                          </tr>
                          <?php
                            $nama_jeniskelamin = check_jeniskelamin($ortuwali['id_jeniskelamin']);
                            ?>
                          <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?= $nama_jeniskelamin; ?></td>
                          </tr>
                          <tr>
                              <td>Tempat Lahir</td>
                              <td>:</td>
                              <td><?= $ortuwali['tempat_lahir']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Lahir</td>
                              <td>:</td>
                              <td><?= tanggal_indo($ortuwali['tanggal_lahir']); ?></td>
                          </tr>
                          <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?= $ortuwali['alamat']; ?></td>
                          </tr>
                          <tr>
                              <td>Pekerjaan</td>
                              <td>:</td>
                              <td><?= $ortuwali['pekerjaan']; ?></td>
                          </tr>
                          <tr>
                              <td>No HP</td>
                              <td>:</td>
                              <td><?= $ortuwali['nohp']; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/ortuwali'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->