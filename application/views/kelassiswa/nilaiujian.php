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
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/detail_kelassiswa/' . $id_kelassiswa); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Ujian</th>
                              <th>Mata Pelajaran</th>
                              <th>Siswa</th>
                              <th>Nilai Pengetahuan</th>
                              <th>Nilai Keterampilan</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($nilaiujian as $nj) : ?>
                              <?php
                                $id_jadwalujian = $nj['id_jadwalujian'];
                                $jadwalujian = $this->db->get_where('jadwalujian', ['id_jadwalujian' => $id_jadwalujian])->row_array();
                                $id_tema = $jadwalujian['id_tema'];
                                $tema = $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
                                $id_siswa = $nj['id_siswa'];
                                $siswa = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
                                $nilaipengetahuan = $nj['nilaipengetahuan'];
                                $nilaiketerampilan = $nj['nilaiketerampilan'];
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($nj['tanggal']); ?></td>
                                  <td><?= $tema['nama_tema']; ?></td>
                                  <td><?= $siswa['nama_siswa']; ?></td>
                                  <form id="formTambah" action="" method="post">
                                      <input type="hidden" class="form-control" name="id_nilaiujian" value="<?= $nj['id_nilaiujian']; ?>">
                                      <td width="100">
                                          <div class="form-group">
                                              <input type="number" name="nilaipengetahuan" class="form-control" id="nilaipengetahuan" value="<?= $nj['nilaipengetahuan']; ?>" placeholder="Isi Nilai Pengetahuan">
                                          </div>
                                      </td>
                                      <td width="100">
                                          <div class="form-group">
                                              <input type="number" name="nilaiketerampilan" class="form-control" id="nilaiketerampilan" value="<?= $nj['nilaiketerampilan']; ?>" placeholder="Isi Nilai Keterampilan">
                                          </div>
                                      </td>
                                      <td>
                                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menyimpan data');"><i class="fa fa-save"></i> Ubah</button>
                                      </td>
                                  </form>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Ujian</th>
                              <th>Mata Pelajaran</th>
                              <th>Siswa</th>
                              <th>Nilai Pengetahuan</th>
                              <th>Nilai Keterampilan</th>
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