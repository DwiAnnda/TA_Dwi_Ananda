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
                      <a href="<?= base_url('kelassiswa/tambah_materi'); ?>"><button type="button" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kelas</th>
                              <th>Guru</th>
                              <th>Nama Mata Pelajaran</th>
                              <th>File</th>
                              <th>Link Video</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($materi as $ft) :

                                $id_matapelajaran = $ft['id_matapelajaran'];
                                $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id_matapelajaran])->row_array();
                                $nama_matapelajaran = $matapelajaran['nama_matapelajaran'];
                                $id_kelas = $matapelajaran['id_kelas'];
                                $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                $nama_kelas = $kelas['nama_kelas'];
                                $id_guru = $matapelajaran['id_guru'];
                                $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                $id_pegawaiguru = $guru['id_pegawai'];
                                $pegawaiguru = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawaiguru])->row_array();
                                $nama_guru = $pegawaiguru['nama_pegawai'];
                                if ($pegawai['id_pegawai'] == $id_pegawaiguru) {

                            ?>
                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                      <td><?= $nama_kelas; ?></td>
                                      <td><?= $nama_guru; ?></td>
                                      <td><?= $nama_matapelajaran; ?></td>
                                      <td><a href="<?= base_url('files/' . $ft['file']); ?>" target="_blank"><i class="fa fa-file"></i></td>
                                      <td><a href="<?= $ft['link']; ?>" target="_blank"><i class="fa fa-video"></i></td>
                                      <td>
                                          <a href="<?= base_url(); ?>kelassiswa/detail_materi/<?= $ft['id_materi']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                          <a href="<?= base_url(); ?>kelassiswa/ubah_materi/<?= $ft['id_materi']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                          <a href="<?= base_url(); ?>kelassiswa/hapus_materi/<?= $ft['id_materi']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                      </td>
                                  </tr>
                          <?php
                                    $no++;
                                }
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Kelas</th>
                              <th>Guru</th>
                              <th>Nama Mata Pelajaran</th>
                              <th>File</th>
                              <th>Link Video</th>
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