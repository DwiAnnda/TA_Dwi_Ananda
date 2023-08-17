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
                  <div class="row mb-3">
                      <!-- <a href="<?= base_url('kelassiswa/tambah_kelassiswa') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>-->
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tahun Ajaran/Semester</th>
                              <th>Guru</th>
                              <th>Kelas</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 1;
                            foreach ($kelassiswa as $kss) :
                                $pilihtahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $kss['id_tahunajaran']])->row_array();
                                $pilihkelas = $this->db->get_where('kelas', ['id_kelas' => $kss['id_kelas']])->row_array();
                                $pilihguru = $this->db->get_where('guru', ['id_guru' => $kss['id_guru']])->row_array();
                                $pilih_idpegawai = $pilihguru['id_pegawai'];
                                $pilihpegawai = $this->db->get_where('pegawai', ['id_pegawai' => $pilihguru['id_pegawai']])->row_array();
                            ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $pilihtahunajaran['nama_tahunajaran'] . '/' . $pilihtahunajaran['smester']; ?></td>
                                  <td><?= $pilihpegawai['nama_pegawai']; ?></td>
                                  <td><?= $pilihkelas['nama_kelas']; ?></td>
                                  <td>
                                      <a href="<?= base_url(); ?>kelassiswa/detail_kelassiswa/<?= $kss['id_kelassiswa']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                      <a href="<?= base_url(); ?>kelassiswa/ubah_kelassiswa/<?= $kss['id_kelassiswa']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                      <a href="<?= base_url(); ?>kelassiswa/hapus_kelassiswa/<?= $kss['id_kelassiswa']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                  </td>
                              </tr>
                          <?php $no++;
                            endforeach; ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Tahun Ajaran/Semester</th>
                              <th>Guru</th>
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