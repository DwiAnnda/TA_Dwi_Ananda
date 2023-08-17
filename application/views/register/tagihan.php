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
                  <div class="justify-content-between">
                      <a href="<?= base_url('register/tambah_tagihan'); ?>"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Jenis Tagihan</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($tagihan as $ft) :
                                $id_pendaftaran = $ft['id_pendaftaran'];
                                $pendaftaran = $this->db->get_where('pendaftaran', ['id_pendaftaran' => $id_pendaftaran])->row_array();

                                $siswa = $this->db->get_where('siswa', ['id_pendaftaran' => $id_pendaftaran])->row_array();
                                $nama = $siswa['nama'];
                                $id_jenistagihan = $ft['id_jenistagihan'];
                                $jenistagihan = $this->db->get_where('jenistagihan', ['id_jenistagihan' => $id_jenistagihan])->row_array();
                                $nama_jenistagihan = $jenistagihan['nama_jenistagihan'];

                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                  <td><?= $pendaftaran['kode']; ?></td>
                                  <td><?= $nama; ?></td>
                                  <td><?= $nama_jenistagihan; ?></td>
                                  <td><?= status_tagihan($ft['id_status']); ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/detail_tagihan/<?= $ft['id_tagihan']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>register/ubah_tagihan/<?= $ft['id_tagihan']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>register/hapus_tagihan/<?= $ft['id_tagihan']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Jenis Tagihan</th>
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