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
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode</th>
                              <th>Siswa</th>
                              <th>Atas Nama</th>
                              <th>Bank</th>
                              <th>No Rekening</th>
                              <th>Nominal</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($pembayaran as $list) :
                                $id_siswa = $list['id_siswa'];
                                $siswa = $this->Siswa_model->getsiswaById($id_siswa);
                                $id_les = $list['id_les'];
                                $les = $this->Les_model->getlesById($id_les);
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($list['tanggal']); ?></td>
                                  <td><?= $list['kode']; ?></td>
                                  <td><?= $siswa['nama']; ?></td>
                                  <td><?= $list['atasnama']; ?></td>
                                  <td><?= $list['namabank']; ?></td>
                                  <td><?= $list['norekening']; ?></td>
                                  <td><?= rupiah($list['nominal']); ?></td>
                                  <td><?= status_tagihan($list['id_status']); ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_pembayaran/<?= $list['id_pembayaran']; ?>"><button type="button" class="btn btn-success btn-sm"><i class=" fa fa-info"></i> Detail</button></a>
                                  </td>
                              </tr>
                          <?php
                                $no++;
                            endforeach;
                            ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode</th>
                              <th>Siswa</th>
                              <th>Atas Nama</th>
                              <th>Bank</th>
                              <th>No Rekening</th>
                              <th>Nominal</th>
                              <th>Status</th>
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