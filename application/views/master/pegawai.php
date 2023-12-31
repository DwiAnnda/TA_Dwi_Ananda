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
                      <a href="<?= base_url('master/tambah_pegawai') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>NIP</th>
                              <th>Nama Pegawai</th>
                              <th>Jabatan</th>
                              <th>No HP</th>
                              <th>Status</th>
                              <th>Foto</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($masterpegawai as $pgw) : ?>
                              <?php
                                if ($pgw['id_pegawai'] <> '1') {
                                    $id_jabatan = $pgw['id_jabatan'];
                                    $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                                    $id_golpangkat = $pgw['id_golpangkat'];
                                    $golpangkat = $this->db->get_where('golpangkat', ['id_golpangkat' => $id_golpangkat])->row_array();
                                ?>
                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td><?= $pgw['nip']; ?></td>
                                      <td><?= $pgw['nama_pegawai']; ?></td>
                                      <td><?= $jabatan['nama_jabatan']; ?></td>
                                      <td><?= $pgw['nohp']; ?></td>
                                      <td><?= check_aktif($pgw['aktif']); ?></td>
                                      <td><img src="<?= base_url('assets/dist/img/') . $pgw['foto']; ?>" height="120" width="100" /></td>
                                      <td>
                                          <a href="<?= base_url(); ?>master/detail_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                          <a href="<?= base_url(); ?>master/ubah_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                          <a href="<?= base_url(); ?>master/hapus_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                      </td>
                                  </tr>
                          <?php $no++;
                                }
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>NIP</th>
                              <th>Nama Pegawai</th>
                              <th>Jabatan</th>
                              <th>No HP</th>
                              <th>Status</th>
                              <th>Foto</th>
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