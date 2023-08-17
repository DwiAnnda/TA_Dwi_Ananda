  <!-- Main content -->
  <div class="invoice">
      <!-- title row -->
      <div class="row">
          <div class="col-12">
              <table width="80%" align="center">
                  <tr>
                      <td rowspan="2" align="right"><img src="<?= base_url('assets/dist/img/' . $profil['logo']); ?>" height="120" width="120" /></td>
                  </tr>
                  <tr>
                      <td align="center">
                          <h4><?= $profil['nama_profil']; ?></h4>
                          <p>Alamat : <?= $profil['alamat']; ?>. Telp :<?= $profil['telepon']; ?>. Kodepos : <?= $profil['kodepos']; ?> <br />
                              Email : <?= $profil['email']; ?>. Website : <?= $profil['website']; ?></p>
                          <h4>
                              <?= $judul . ' ' . status_calonsiswa($id_status); ?>
                          </h4>
                      </td>
                  </tr>
              </table>
          </div>
      </div>
      <hr />

      <!-- Table row -->
      <div class="row">
          <div class="col-12 table-responsive">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Tanggal</th>
                          <th>Nama Siswa</th>
                          <th>Jenis Kelamin</th>
                          <th>TTL</th>
                          <th>Anak Ke</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Email</th>
                          <th>Foto</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($filter as $ft) : ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $ft['kode']; ?></td>
                              <td><?= tanggal_indo($ft['tanggal']); ?></td>
                              <td><?= $ft['nama_siswa']; ?></td>
                              <td><?= check_jeniskelamin($ft['id_jeniskelamin']); ?></td>
                              <td><?= $ft['tempat_lahir'] . ', ' . tanggal_indo($ft['tanggal_lahir']); ?></td>
                              <td><?= $ft['anak_ke']; ?></td>
                              <td><?= $ft['alamat']; ?></td>
                              <td><?= $ft['nohp']; ?></td>
                              <td><?= $ft['email']; ?></td>
                              <td><img src="<?= base_url('assets/dist/img/') . $ft['foto']; ?>" height="120" width="100" /></td>
                              <td><?= status_calonsiswa($ft['id_status']); ?></td>
                          </tr>
                      <?php $no++;
                        endforeach; ?>
                  </tbody>
              </table>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">

          </div>
          <!-- /.col -->
          <div class="col-6">
              <?php
                $pejabatttd = $this->db->get_where('pejabat_ttd', [
                    'aktif' => '1'
                ])->row_array();
                $nip_pejabattd = $pejabatttd['nip'];
                $nama_pejabattd = $pejabatttd['nama_pegawai'];
                $id_jabatanttd = $pejabatttd['id_jabatan'];
                $jabatanttd = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatanttd])->row_array();
                $nama_jabatanttd = $jabatanttd['nama_jabatan'];
                ?>
              <table align="right" width="60%">
                  <tr align="center">
                      <td>Banjarmasin, <?= tanggal_indo(date('Y-m-d')); ?></td>
                  </tr>
                  <tr align="center">
                      <td><?= $nama_jabatanttd; ?><br /><br /><br /></td>
                  </tr>
                  <tr align="center">
                      <td><b><u><?= $nama_pejabattd ?></u></b></td>
                  </tr>
                  <tr align="center">
                      <td><b><?= 'NIP. ' . $nip_pejabattd ?></b></td>
                  </tr>
              </table>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>