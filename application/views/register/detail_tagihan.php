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
        $pendaftaran = $this->Pendaftaran_model->getpendaftaranById($tagihan['id_pendaftaran']);
        $siswa = $this->db->get_where('siswa', ['id_pendaftaran' => $pendaftaran['id_pendaftaran']])->row_array();
        $jenistagihan = $this->db->get_where('jenistagihan', ['id_jenistagihan' => $tagihan['id_jenistagihan']])->row_array();
        $pembayaran = $this->db->get_where('pembayaran', ['id_tagihan' => $tagihan['id_tagihan']])->row_array();
        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Detail <?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between mb-3">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/tagihan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <?php
                      if (!$pembayaran) {
                      ?>
                      <a href="<?= base_url('register/kirim_notiftagihan/'.$tagihan['id_tagihan']);?>"><button type="button" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengirim notifikasi tagihan ke email');"><i class="fa fa-plus"></i> Kirim Notifikasi</button></a>
                      <?php } ?>
                  </div>
                  <div class="row">
                      <div class="col-6">
                          <h3>Data Tagihan</h3>
                          <table class="table table-sm">
                              <tr>
                                  <td>Tanggal Tagihan</td>
                                  <td>:</td>
                                  <td><?= tanggal_indo($tagihan['tanggal']); ?></td>
                              </tr>
                              <tr>
                                  <td>Kode Pendaftaran</td>
                                  <td>:</td>
                                  <td><?= $pendaftaran['kode']; ?></td>
                              </tr>
                              <tr>
                                  <td>NIS</td>
                                  <td>:</td>
                                  <td><?= $siswa['nik']; ?></td>
                              </tr>
                              <tr>
                                  <td>Nama</td>
                                  <td>:</td>
                                  <td><?= $siswa['nama']; ?></td>
                              </tr>
                              <tr>
                                  <td>Jenis Tagihan</td>
                                  <td>:</td>
                                  <td><?= $jenistagihan['nama_jenistagihan']; ?></td>
                              </tr>
                              <tr>
                                  <td>Nominal</td>
                                  <td>:</td>
                                  <td><?= rupiah($tagihan['nominal']); ?></td>
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:</td>
                                  <td><?= status_tagihan($tagihan['id_status']); ?></td>
                              </tr>
                          </table>
                      </div>
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
                          <?php } else { ?>
                              <h3>Data Tagihan Belum Dibayar</h3>
                              <!--<div class="row mb-3">
                                  <a href="<?= base_url('register/tambah_pembayaran/' . $tagihan['id_tagihan']) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pembayaran Tagihan</button></a>
                              </div>-->
                          <?php } ?>
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