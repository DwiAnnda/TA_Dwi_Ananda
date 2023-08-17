  <!-- Main content -->
  <div class="invoice">
      <!-- title row -->
      <div class="row">
          <div class="col-12" align="center">
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
                              Laporan <?= $judul; ?>
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
                          <th>Tahun Ajaran</th>
                          <th>Kelas</th>
                          <th>Mata Pelajaran</th>
                          <th>Guru</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($filter as $ft) :
                            $les = $this->db->get_where('les', ['id_kelasguru' => $ft['id_kelasguru']])->row_array();
                            $kode = $les['kode'];
                            $id_tahunajaran = $les['id_tahunajaran'];
                            $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                            $id_kelas = $ft['id_kelas'];
                            $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                            $id_guru = $ft['id_guru'];
                            $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                            $id_matapelajaran = $les['id_matapelajaran'];
                            $matapelajaran = $this->db->get_where('matapelajaran', ['id_matapelajaran' => $id_matapelajaran])->row_array();
                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $kode; ?></td>
                              <td><?= $tahunajaran['nama_tahunajaran'] . ' Semester ' . $tahunajaran['smester']; ?></td>
                              <td><?= $kelas['nama_kelas']; ?></td>
                              <td><?= $matapelajaran['nama_matapelajaran']; ?></td>
                              <td><?= $guru['nama']; ?></td>
                          </tr>
                      <?php
                            $no++;

                        endforeach;
                        ?>
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