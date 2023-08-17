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
      <?php
        $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
        $id_kelas = $kelassiswa['id_kelas'];
        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $id_tahunajaran = $kelassiswa['id_tahunajaran'];
        $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
        $id_guru = $kelassiswa['id_guru'];
        $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
        $guru_idpegawai = $guru['id_pegawai'];
        $gurupegawai = $this->db->get_where('pegawai', ['id_pegawai' => $guru_idpegawai])->row_array();
        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul . ' Untuk ' . $kelas['nama_kelas'] . ' | Tahun Ajaran : ' . $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester'] . ' | Guru : ' . $gurupegawai['nama_pegawai']; ?></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/kelassiswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <a href="<?= base_url('register/tambah_jadwaltema/' . $id_kelassiswa) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama Mata Pelajaran</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $jadwaltema = $this->db->order_by('tanggal', 'asc')->get_where('jadwaltema', ['id_kelassiswa' => $id_kelassiswa])->result_array();
                            $no = 1;
                            foreach ($jadwaltema as $jdwal) : ?>
                              <?php
                                $id_tema = $jdwal['id_tema'];
                                $tema = $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($jdwal['tanggal']); ?></td>
                                  <td><?= $tema['nama_tema']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>register/hapus_jadwaltema/<?= $jdwal['id_jadwaltema']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nama Mata Pelajaran</th>
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