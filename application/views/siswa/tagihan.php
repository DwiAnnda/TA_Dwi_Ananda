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
                  <h3 class="card-title"><?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <center>
                      <h1>Tagihan</h1>
                      <h3>Pembayaran Biaya Les</h3>
                  </center>
                  <br />
                  <table align="center">
                      <tr>
                          <td>Tahun Ajaran</td>
                          <td>:</td>
                          <td><?= $tahunajaran['nama_tahunajaran'] . ' Semester ' . $tahunajaran['smester']; ?></td>
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
                  </table>
                  <center>
                      <p>
                          <b> Segera lakukan pembayaran transfer <br /><?= rupiah($biaya['nominal']); ?> pada nomor rekening dibawah ini : </b>
                      </p>
                      <table align="center">
                          <tr>
                              <td>Nama Bank</td>
                              <td>:</td>
                              <td><?= $bank['namabank']; ?></td>
                          </tr>
                          <tr>
                              <td>No Rekening</td>
                              <td>:</td>
                              <td><?= $bank['norekening']; ?></td>
                          </tr>
                          <tr>
                              <td>Atas Nama</td>
                              <td>:</td>
                              <td><?= $bank['atasnama']; ?></td>
                          </tr>
                      </table>
                      <h2>Status : <?= status_tagihan($pembayaran['id_status']); ?></h2>
                      <?php
                        if ($pembayaran['id_status'] == '1') {
                        ?>
                          <div class="text-center">
                              <a href="<?= base_url('siswa/konfirmasipembayaran/' . $les['id_les'] . '/' . $pembayaran['id_pembayaran']) ?>"><button type="button" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Konfirmasi Pembayaran</button></a>
                          </div>
                      <?php } ?>
                  </center>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->