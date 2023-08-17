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
                      <a href="<?= base_url('guru/tambah_les') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Tahun Ajaran</th>
                              <th>Kelas</th>
                              <th>Mata Pelajaran</th>
                              <th>Guru</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($les as $list) :
                                $id_tahunajaran = $list['id_tahunajaran'];
                                $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                $id_matapelajaran = $list['id_matapelajaran'];
                                $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id_matapelajaran])->row_array();

                                $kelasguru = $this->db->get_where('kelasguru', ['id_kelasguru' => $list['id_kelasguru']])->row_array();
                                $id_kelas = $kelasguru['id_kelas'];
                                $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                $id_guru = $kelasguru['id_guru'];
                                if ($id_guru == $pegawai['id_guru']) {
                                    $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                            ?>
                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td><?= $list['kode']; ?></td>
                                      <td><?= $tahunajaran['nama_tahunajaran'] . ' Semester ' . $tahunajaran['smester']; ?></td>
                                      <td><?= $kelas['nama_kelas']; ?></td>
                                      <td><?= $matapelajaran['nama_matapelajaran']; ?></td>
                                      <td><?= $guru['nama']; ?></td>
                                      <td>
                                          <a href="<?= base_url(); ?>guru/detail_les/<?= $list['id_les']; ?>"><button type="button" class="btn btn-success btn-sm"><i class=" fa fa-info"></i> Detail</button></a>
                                          <a href="<?= base_url(); ?>guru/ubah_les/<?= $list['id_les']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                          <a href="<?= base_url(); ?>guru/hapus_les/<?= $list['id_les']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                      </td>
                                  </tr>
                          <?php
                                    $no++;
                                }
                            endforeach;
                            ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Tahun Ajaran</th>
                              <th>Kelas</th>
                              <th>Mata Pelajaran</th>
                              <th>Guru</th>
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