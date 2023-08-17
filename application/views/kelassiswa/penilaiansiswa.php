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
        $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
        ?>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul . ' : ' . $siswa['nama_siswa'] . '(' . $siswa['nis'] . ')'; ?></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/siswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                      <a href="<?= base_url('kelassiswa/tambah_penilaiansiswa/' . $id_siswa) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Tahun Ajaran/Semester</th>
                              <th>Tema</th>
                              <th>Nilai</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $penilaiansiswa = $this->db->order_by('tanggal', 'asc')->get_where('penilaiansiswa', ['id_siswa' => $id_siswa])->result_array();
                            $no = 1;
                            foreach ($penilaiansiswa as $pnsiswa) : ?>
                              <?php
                                $id_tahunajaran = $pnsiswa['id_tahunajaran'];
                                $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                $id_tema = $pnsiswa['id_tema'];
                                $tema = $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
                                $id_nilai = $pnsiswa['id_nilai'];
                                $nilai = $this->db->get_where('nilai', ['id_nilai' => $id_nilai])->row_array();
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($pnsiswa['tanggal']); ?></td>
                                  <td><?= $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester']; ?></td>
                                  <td><?= $tema['nama_tema']; ?></td>
                                  <td><?= $nilai['abjad']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>kelassiswa/hapus_penilaiansiswa/<?= $pnsiswa['id_penilaiansiswa']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
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
                              <th>Tahun Ajaran/Semester</th>
                              <th>Tema</th>
                              <th>Nilai</th>
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