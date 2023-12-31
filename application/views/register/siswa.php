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
                  <!--<div class="row mb-3">
                      <a href="<?= base_url('register/tambah_siswa') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div> -->
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>NIS</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>No HP</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($siswa as $ft) :
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $ft['nis']; ?></td>
                                  <td><?= $ft['nama']; ?></td>
                                  <td><?= check_jeniskelamin($ft['id_jeniskelamin']); ?></td>
                                  <td><?= $ft['tempat_lahir']; ?></td>
                                  <td><?= $ft['tanggal_lahir']; ?></td>
                                  <td><?= $ft['nohp']; ?></td>
                                  <td><?= $ft['email']; ?></td>
                                  <td><?= status_pendaftaran($ft['id_status']); ?></td>
                                  <td><?= $ft['alamat']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_siswa/<?= $ft['id_siswa']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>register/ubah_siswa/<?= $ft['id_siswa']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>register/hapus_siswa/<?= $ft['id_siswa']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>NIS</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>No HP</th>
                              <th>Email</th>
                              <th>Status</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
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