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
                  <h3 class="card-title"><?= $judul . ' <b>' . $siswa['nama_siswa']; ?> </b></h3>
              </div>
              <div class="card-body">
                  <div class="justify-content-between">
                      <button type="button" class="btn btn-warning mb-2" onclick="window.location='<?= base_url('register/detail_kelassiswa/' . $id_kelassiswa); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Absen</th>
                              <th>Status</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            $kalenderpendidikan = $this->Kalenderpendidikan_model->getAllkalenderpendidikan();
                            foreach ($kalenderpendidikan as $ft) :
                                $absensi = $this->db->get_where('absensi', [
                                    'id_kalenderpendidikan' => $ft['id_kalenderpendidikan'],
                                    'id_siswa' => $id_siswa
                                ]);
                                if ($absensi->num_rows() > 0) {
                                    $absensi = $this->db->get_where('absensi', [
                                        'id_kalenderpendidikan' => $ft['id_kalenderpendidikan'],
                                        'id_siswa' => $id_siswa
                                    ])->row_array();
                                    $id_status = $absensi['id_status'];
                                } else {
                                    $id_status = '4';
                                }
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= tanggal_indo($ft['tanggal']); ?></td>
                                  <form id="formTambah" action="" method="post">
                                      <td>
                                          <input type="hidden" class="form-control" name="id_kalenderpendidikan" value="<?= $ft['id_kalenderpendidikan']; ?>">
                                          <input type="hidden" class="form-control" name="id_siswa" value="<?= $id_siswa; ?>">
                                          <input type="hidden" class="form-control" name="tanggal" value="<?= $ft['tanggal']; ?>">
                                          <div class="form-group">
                                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                  <option value="<?= $id_status; ?>"><?= check_absensi($id_status); ?></option>
                                                  <?php
                                                    $pilihstatus = $this->db->get('status')->result_array();
                                                    foreach ($pilihstatus as $plstatus) {
                                                    ?>
                                                      <option value="<?= $plstatus['id_status']; ?>"><?= $plstatus['nama_status']; ?></option>
                                                  <?php } ?>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menyimpan data');"><i class="fa fa-save"></i> Simpan</button>
                                      </td>
                                  </form>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tanggal Absen</th>
                              <th>Siswa</th>
                              <th>status</th>
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