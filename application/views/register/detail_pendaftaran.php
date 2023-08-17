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
      <?php
        $id_pendaftaran = $pendaftaran['id_pendaftaran'];
        $pendaftaran = $this->db->get_where('pendaftaran', ['id_pendaftaran' => $id_pendaftaran])->row_array();
        $tagihan = $this->db->get_where('tagihan', ['id_pendaftaran' => $id_pendaftaran])->row_array();
        $pembayaran = $this->db->get_where('pembayaran', ['id_pendaftaran' => $id_pendaftaran])->row_array();

        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail Data <?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between mb-3">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pendaftaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <?php
                        if (($tagihan) and ($pendaftaran['id_status'] == '1') and ($pendaftaran['id_jenispendaftaran']=='1')) {
                        ?>
                          <a href="<?= base_url('register/terimapendaftaran/' . $id_pendaftaran); ?>"><button type="button" class="btn btn-success ml-3" onclick="return confirm('Anda yakin ingin menerima pendaftaran ini?');"><i class="fa fa-plus"></i> Terima</button></a>
                          <a href="<?= base_url('register/tolakpendaftaran/' . $id_pendaftaran); ?>"><button type="button" class="btn btn-danger ml-3" onclick="return confirm('Anda yakin ingin menolak pendaftaran ini?');"><i class="fa fa-minus"></i> Tolak</button></a>
                      <?php } else if (($pendaftaran['id_status'] == '1') and ($pendaftaran['id_jenispendaftaran']=='2')){ ?>
                            <a href="<?= base_url('register/terimapendaftaran/' . $id_pendaftaran); ?>"><button type="button" class="btn btn-success ml-3" onclick="return confirm('Anda yakin ingin menerima pendaftaran ini?');"><i class="fa fa-plus"></i> Terima</button></a>
                          <a href="<?= base_url('register/tolakpendaftaran/' . $id_pendaftaran); ?>"><button type="button" class="btn btn-danger ml-3" onclick="return confirm('Anda yakin ingin menolak pendaftaran ini?');"><i class="fa fa-minus"></i> Tolak</button></a>
                      <?php } ?>
                  </div>
                  <div class="row">
                      <div class="col-6">
                          <h3>Data Pendaftaran</h3>
                          <table class="table table-sm">
                              <tr>
                                  <td>Kode</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['kode']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Pendaftaran</td>
                                  <td>:</td>
                                  <td><?= tanggal_indo($pendaftaran['tanggal']); ?></td>
                              </tr>
                              <tr>
                                  <td>Jenis Pendaftaran</td>
                                  <td>:</td>
                                  <td><?= jenispendaftaran($pendaftaran['id_jenispendaftaran']); ?></td>
                              </tr>
                              <tr>
                                  <td>NIS/NIK</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['nik']; ?></td>
                              </tr>
                              <tr>
                                  <td>Nama</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['nama']; ?></td>
                              </tr>
                              <tr>
                                  <td>Jenis Kelamin</td>
                                  <td>:</td>
                                  <td><?= check_jeniskelamin($pendaftaran['id_jeniskelamin']); ?></td>
                              </tr>
                              <tr>
                                  <td>Tempat Lahir</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['tempat_lahir']; ?></td>
                              </tr>
                              <tr>
                                  <td>Tanggal Lahir</td>
                                  <td>:</td>
                                  <td><?= tanggal_indo($pendaftaran['tanggal_lahir']); ?></td>
                              </tr>
                              <tr>
                                  <td>Alamat</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['alamat']; ?></td>
                              </tr>
                              <tr>
                                  <td>No HP</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['nohp']; ?></td>
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['email']; ?></td>
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:</td>
                                  <td><?= status_pendaftaran($pendaftaran['id_status']); ?></td>
                              </tr>
                              <tr>
                                  <td>QrCode</td>
                                  <td>:</td>
                                  <td align="left"><img src="<?= base_url('documents/') . $pendaftaran['kode'] . '.png'; ?>" height="200" /></td>
                              </tr>
                          </table>
                      </div>
                    <?php
                    if ($pendaftaran['id_jenispendaftaran']=='1') {
                    ?>
                      <div class="col-6">
                          <?php
                            if ($pembayaran) {
                            ?>
                              <h3>Data Pembayaran</h3>
                              <table class="table table-sm">
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>:</td>
                                      <td><?= $pembayaran['tanggal']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Nominal</td>
                                      <td>:</td>
                                      <td><?= rupiah($pembayaran['nominal']); ?></td>
                                  </tr>
                                  <tr>
                                      <td>Nama Pengirim</td>
                                      <td>:</td>
                                      <td><?= $pembayaran['atasnama']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Nama Bank</td>
                                      <td>:</td>
                                      <td><?= $pembayaran['namabank']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Nomor Rekening</td>
                                      <td>:</td>
                                      <td><?= $pembayaran['norekening']; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Bukti Pembayaran</td>
                                      <td>:</td>
                                      <td><a href="<?= base_url('files/' . $pembayaran['file']); ?>" target="_blank"><i class="fa fa-file"></i> </a></td>
                                  </tr>
                              </table>
                          <?php } else {
                                echo "<h3>Belum melakukan pembayaran</h3>";
                            } ?>
                      </div>
                      <?php } ?>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->