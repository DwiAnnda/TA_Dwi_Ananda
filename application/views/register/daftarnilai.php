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
                  <h3 class="card-title"><?= $judul . ' Siswa : ' . $siswa['nama_siswa']; ?></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/detail_kelassiswa/' . $id_kelassiswa); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Ujian</th>
                              <th>Mata Pelajaran</th>
                              <th>Nilai Pengetahuan</th>
                              <th>Predikat Pengetahuan</th>
                              <th>Nilai Keterampilan</th>
                              <th>Predikat Keterampilan</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($nilaiujian as $list) : ?>
                              <?php
                                $id_jadwalujian = $list['id_jadwalujian'];
                                $jadwalujian = $this->db->get_where('jadwalujian', ['id_jadwalujian' => $id_jadwalujian])->row_array();
                                $id_tema = $jadwalujian['id_tema'];
                                $tema = $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
                                $nilaipengetahuan = $list['nilaipengetahuan'];
                                $abjadnilaipengetahuan = $this->db->query("select * from nilai where minimal<=$nilaipengetahuan")->row_array();
                                $abjadpengetahuan = $abjadnilaipengetahuan['abjad'];
                                $nilaiketerampilan = $list['nilaiketerampilan'];
                                $abjadnilaiketerampilan = $this->db->query("select * from nilai where minimal<= $nilaiketerampilan")->row_array();
                                $abjadketerampilan = $abjadnilaiketerampilan['abjad'];
                                ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($list['tanggal']); ?></td>
                                  <td><?= $tema['nama_tema']; ?></td>
                                  <td><?= $nilaipengetahuan; ?></td>
                                  <td><?= $abjadpengetahuan; ?></td>
                                  <td><?= $nilaiketerampilan; ?></td>
                                  <td><?= $abjadketerampilan; ?></td>

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
                              <th>Nilai Pengetahuan</th>
                              <th>Predikat Pengetahuan</th>
                              <th>Nilai Keterampilan</th>
                              <th>Predikat Keterampilan</th>
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