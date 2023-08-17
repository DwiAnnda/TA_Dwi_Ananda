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
                  <div class="row mb-3">
                      <a href="<?= base_url('master/tambah_jenistagihan') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Nama Jenis Tagihan</th>
                              <th>Nominal</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($jenistagihan as $ft) : ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $ft['kode']; ?></td>
                                  <td><?= $ft['nama_jenistagihan']; ?></td>
                                  <td><?= rupiah($ft['nominal']); ?></td>
                                  <td><?= check_aktif($ft['id_status']); ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>master/detail_jenistagihan/<?= $ft['id_jenistagihan']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>master/ubah_jenistagihan/<?= $ft['id_jenistagihan']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>master/hapus_jenistagihan/<?= $ft['id_jenistagihan']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Nama Jenis Tagihan</th>
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