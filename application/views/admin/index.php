  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul; ?></h3>
              </div>
              <div class="card-body">
                  <div class="alert alert-info alert-dismissible">
                      <h4 align="center"><?= strtoupper($profil['nama_profil']); ?><br /><?= $profil['nama_aplikasi']; ?></h4>
                  </div>
                  <div class="row">
                      <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-info"><i class="fas fa fa-user"></i></span>

                              <div class="info-box-content">
                                  <a href="<?= base_url('master/matapelajaran'); ?>"><span class="info-box-text">Mata Pelajaran</span>
                                      <span class="info-box-number"><?= $matapelajaran->num_rows(); ?></span></a>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-success"><i class="fas fa fa-user"></i></span>

                              <div class="info-box-content">
                                  <a href="<?= base_url('master/kelas'); ?>"><span class="info-box-text">Kelas</span>
                                      <span class="info-box-number"><?= $masterkelas->num_rows(); ?></span></a>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-danger"><i class="fas fa fa-user"></i></span>

                              <div class="info-box-content">
                                  <a href="<?= base_url('register/siswa'); ?>"><span class="info-box-text">Siswa</span>
                                      <span class="info-box-number"><?= $mastersiswa->num_rows(); ?></span></a>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <!-- /.col -->
                      <div class="col-md-3 col-sm-6 col-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-warning"><i class="fas fa fa-user"></i></span>

                              <div class="info-box-content">
                                  <a href="<?= base_url('master/guru'); ?>"><span class="info-box-text">Guru</span>
                                      <span class="info-box-number"><?= $masterguru->num_rows(); ?></span></a>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->

                      <div class="col-12 mt-2">
                          <div class="alert alert-info alert-dismissible">
                              <h4 align="center">Pendaftaran Guru</h4>
                          </div>
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>NIP</th>
                                      <th>Nama</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Tempat Lahir</th>
                                      <th>Tanggal Lahir</th>
                                      <th>Alamat</th>
                                      <th>No HP</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                    $guru = $this->Guru_model->getAllgurupendaftaran();
                                    foreach ($guru as $ft) :
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $ft['nip']; ?></td>
                                          <td><?= $ft['nama']; ?></td>
                                          <td><?= check_jeniskelamin($ft['id_jeniskelamin']); ?></td>
                                          <td><?= $ft['tempat_lahir']; ?></td>
                                          <td><?= $ft['tanggal_lahir']; ?></td>
                                          <td><?= $ft['alamat']; ?></td>
                                          <td><?= $ft['nohp']; ?></td>
                                          <td><?= $ft['email']; ?></td>
                                          <td><?= status_pendaftaran($ft['id_status']); ?></td>
                                          <td>
                                              <a href="<?= base_url(); ?>register/detail_guru/<?= $ft['id_guru']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                          </td>
                                      </tr>
                                  <?php $no++;
                                    endforeach; ?>
                              </tbody>
                          </table>
                          <div class="alert alert-info alert-dismissible">
                              <h4 align="center">Pendaftaran Siswa</h4>
                          </div>
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>NIS</th>
                                      <th>Nama</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Tempat Lahir</th>
                                      <th>Tanggal Lahir</th>
                                      <th>Alamat</th>
                                      <th>No HP</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                    $siswa = $this->Siswa_model->getAllsiswapendaftaran();
                                    foreach ($siswa as $ft) :
                                    ?>
                                      <tr>
                                          <td><?= $no; ?></td>
                                          <td><?= $ft['nis']; ?></td>
                                          <td><?= $ft['nama']; ?></td>
                                          <td><?= check_jeniskelamin($ft['id_jeniskelamin']); ?></td>
                                          <td><?= $ft['tempat_lahir']; ?></td>
                                          <td><?= $ft['tanggal_lahir']; ?></td>
                                          <td><?= $ft['alamat']; ?></td>
                                          <td><?= $ft['nohp']; ?></td>
                                          <td><?= $ft['email']; ?></td>
                                          <td><?= status_pendaftaran($ft['id_status']); ?></td>
                                          <td>
                                              <a href="<?= base_url(); ?>register/detail_siswa/<?= $ft['id_siswa']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                          </td>
                                      </tr>
                                  <?php $no++;
                                    endforeach; ?>
                              </tbody>
                          </table>
                          <!--<img src="<?= base_url('assets/dist/img/login.jpg'); ?>" class="image" width="100%" />-->
                          <!-- /.info-box -->
                      </div>

                  </div>

              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = donutData;
      var pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions
      })
  </script>