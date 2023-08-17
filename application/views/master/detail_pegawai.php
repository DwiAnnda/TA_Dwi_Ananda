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
                  <h3 class="card-title">Detail Data Pegawai</h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>NIP</td>
                              <td>:</td>
                              <td><?= $masterpegawai['nip']; ?></td>
                          </tr>
                          <tr>
                              <td>Nama Pegawai</td>
                              <td>:</td>
                              <td><?= $masterpegawai['nama_pegawai']; ?></td>
                          </tr>
                          <?php
                            $nama_jeniskelamin = check_jeniskelamin($masterpegawai['id_jeniskelamin']);
                            ?>
                          <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?= $nama_jeniskelamin; ?></td>
                          </tr>
                          <tr>
                              <td>Tempat Lahir</td>
                              <td>:</td>
                              <td><?= $masterpegawai['tempat_lahir']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Lahir</td>
                              <td>:</td>
                              <td><?= tanggal_indo($masterpegawai['tanggal_lahir']); ?></td>
                          </tr>
                          <?php
                            $id_jabatan = $masterpegawai['id_jabatan'];
                            $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                            ?>
                          <tr>
                              <td>jabatan</td>
                              <td>:</td>
                              <td><?= $jabatan['nama_jabatan']; ?></td>
                          </tr>
                          <tr>
                              <td>Alamat</td>
                              <td>:</td>
                              <td><?= $masterpegawai['alamat']; ?></td>
                          </tr>
                          <tr>
                              <td>No HP</td>
                              <td>:</td>
                              <td><?= $masterpegawai['nohp']; ?></td>
                          </tr>
                          <tr>
                              <td>Ijazah</td>
                              <td>:</td>
                              <td><a href="<?= base_url('assets/dist/img/') . $masterpegawai['ijazah']; ?>" target="_blank">Ijazah</a></td>
                          </tr>
                          <tr>
                              <td>KTP</td>
                              <td>:</td>
                              <td><a href="<?= base_url('assets/dist/img/') . $masterpegawai['ktp']; ?>" target="_blank">KTP</a></td>
                          </tr>
                          <tr>
                              <td>KK</td>
                              <td>:</td>
                              <td><a href="<?= base_url('assets/dist/img/') . $masterpegawai['kk']; ?>" target="_blank">Kartu Keluarga (KK)</a></td>
                          </tr>
                          <tr>
                              <td>Foto Pegawai</td>
                              <td>:</td>
                              <td><img src="<?= base_url('assets/dist/img/') . $masterpegawai['foto']; ?>" height="120" width="100" /></[td>
                          </tr>
                          <tr>
                              <td>Status Pegawai</td>
                              <td>:</td>
                              <td><?= check_aktif($masterpegawai['aktif']); ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pegawai'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->