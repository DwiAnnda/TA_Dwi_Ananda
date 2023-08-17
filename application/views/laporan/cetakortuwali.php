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
                              <?= $judul; ?>
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
                          <th>Nama Siswa</th>
                          <th>Ortu/Wali</th>
                          <th>NIK</th>
                          <th>Nama Ortu/Wali</th>
                          <th>TTL</th>
                          <th>Alamat</th>
                          <th>Pekerjaan</th>
                          <th>No HP</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($filter as $sp) :
                            $id_siswa = $sp['id_siswa'];
                            $nama_siswa = $sp['nama_siswa'];
                            $ortuwali = $this->db->get_where('ortuwali', ['id_siswa' => $id_siswa])->result_array();
                            foreach ($ortuwali as $ort) {
                                $nik = $ort['nik'];
                                $nama_ortuwali = $ort['nama_ortuwali'];
                                $id_kategoriortuwali = $ort['id_kategoriortuwali'];
                                $kategoriortuwali = $this->db->get_where('kategoriortuwali', ['id_kategoriortuwali' => $id_kategoriortuwali])->row_array();

                        ?>
                              <tr>
                                  <td><?= $no; ?></td>
                                  <td><?= $nama_siswa; ?></td>
                                  <td><?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                                  <td><?= $ort['nik']; ?></td>
                                  <td><?= $ort['nama_ortuwali']; ?></td>
                                  <td><?= $ort['tempat_lahir'] . ', ' . tanggal_indo($ort['tanggal_lahir']); ?></td>
                                  <td><?= $ort['alamat']; ?></td>
                                  <td><?= $ort['pekerjaan']; ?></td>
                                  <td><?= $ort['nohp']; ?></td>
                              </tr>
                      <?php
                                $no++;
                            }
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