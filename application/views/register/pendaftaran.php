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
                              <th>Kode</th>
                              <th>Tanggal</th>
                              <th>Jenis</th>
                              <th>NIS/NIK</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($pendaftaran as $ft) :
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $ft['kode']; ?></td>
                                  <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                  <td><?= jenispendaftaran($ft['id_jenispendaftaran']); ?></td>
                                  <td><?= $ft['nik']; ?></td>
                                  <td><?= $ft['nama']; ?></td>
                                  <td><?= $ft['email']; ?></td>
                                  <td><?= status_pendaftaran($ft['id_status']); ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_pendaftaran/<?= $ft['id_pendaftaran']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>register/hapus_pendaftaran/<?= $ft['id_pendaftaran']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Tanggal</th>
                              <th>Jenis</th>
                              <th>NIS/NIK</th>
                              <th>Nama</th>
                              <th>Email</th>
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