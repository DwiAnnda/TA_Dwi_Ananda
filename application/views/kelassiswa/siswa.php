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
                              <th>NIK</th>
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($siswa as $ssw) :
                                $id_siswa = $ssw['id_siswa'];
                                $cekdaftarsiswa = $this->db->order_by('id_daftarsiswa', 'desc')->get_where('daftarsiswa', ['id_siswa' => $id_siswa]);
                                if ($cekdaftarsiswa->num_rows() > 0) {
                                    $cekdaftarsiswa->row_array();
                                    $id_kelassiswa = $cekdaftarsiswa['id_kelassiswa'];
                                    $kelasisswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
                                    $id_kelas = $kelasisswa['id_kelas'];
                                    $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                }
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $ssw['nik']; ?></td>
                                  <td><?= $ssw['nama_siswa']; ?></td>
                                  <td><?= $kelas['nama_kelas']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>kelassiswa/penilaiansiswa/<?= $ssw['id_siswa']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Penilaian Siswa</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>NIK</th>
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
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