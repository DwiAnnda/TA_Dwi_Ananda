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
                      <h5><i class="icon fas fa-check"></i> Notifkasi!</h5>
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
                      <a href="<?= base_url('register/tambah_pengeluaran') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode Pengeluaran</th>
                              <th>Nama Sumber Pengeluaran</th>
                              <th>Nominal</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($pengeluaran as $pgd) : ?>
                              <?php
                                $id_sumberpengeluaran = $pgd['id_sumberpengeluaran'];
                                $sumberpengeluaran = $this->db->get_where('sumberpengeluaran', ['id_sumberpengeluaran' => $id_sumberpengeluaran])->row_array();
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($pgd['tanggal']); ?></td>
                                  <td><?= $pgd['kode_pengeluaran']; ?></td>
                                  <td><?= $sumberpengeluaran['nama_sumberpengeluaran']; ?></td>
                                  <td><?= rupiah($pgd['nominal']); ?></td>
                                  <td><?= $pgd['keterangan']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_pengeluaran/<?= $pgd['id_pengeluaran']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>register/ubah_pengeluaran/<?= $pgd['id_pengeluaran']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>register/hapus_pengeluaran/<?= $pgd['id_pengeluaran']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode Pengeluaran</th>
                              <th>Nama Sumber Pengeluaran</th>
                              <th>Nominal</th>
                              <th>Keterangan</th>
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