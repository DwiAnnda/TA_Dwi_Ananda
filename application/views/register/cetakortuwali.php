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

              <table align="center">
                  <tr>
                      <td>Tanggal Registrasi</td>
                      <td>:</td>
                      <td><?= tanggal_indo($siswa['tanggal']); ?></td>
                  </tr>
                  <tr>
                      <td>NIS</td>
                      <td>:</td>
                      <td><?= $siswa['nis']; ?></td>
                  </tr>
                  <tr>
                      <td>NIK</td>
                      <td>:</td>
                      <td><?= $siswa['nik']; ?></td>
                  </tr>
                  <tr>
                      <td>No Kartu Keluarga</td>
                      <td>:</td>
                      <td><?= $siswa['nokk']; ?></td>
                  </tr>
                  <tr>
                      <td>Nama Siswa</td>
                      <td>:</td>
                      <td><?= $siswa['nama_siswa']; ?></td>
                  </tr>
                  <?php
                    $id_siswa = $siswa['id_siswa'];
                    $cekdaftarsiswa = $this->db->order_by('id_daftarsiswa', 'desc')->get_where('daftarsiswa', ['id_siswa' => $id_siswa]);
                    if ($cekdaftarsiswa->num_rows() > 0) {
                        $cekdaftarsiswa = $this->db->order_by('id_daftarsiswa', 'desc')->get_where('daftarsiswa', ['id_siswa' => $id_siswa])->row_array();
                        $id_kelassiswa = $cekdaftarsiswa['id_kelassiswa'];
                        $kelasisswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
                        $id_kelas = $kelasisswa['id_kelas'];
                        $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                        $nama_kelas = $kelas['nama_kelas'];
                    } else {
                        $nama_kelas = 'Belum Ada';
                    }
                    ?>
                  <tr>
                      <td>Kelas</td>
                      <td>:</td>
                      <td><?= $nama_kelas; ?></td>
                  </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td><?= check_jeniskelamin($siswa['id_jeniskelamin']); ?></td>
                  </tr>
                  <tr>
                      <td>Tempat Lahir</td>
                      <td>:</td>
                      <td><?= $siswa['tempat_lahir']; ?></td>
                  </tr>
                  <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td><?= tanggal_indo($siswa['tanggal_lahir']); ?></td>
                  </tr>
                  <tr>
                      <td>Anak Ke</td>
                      <td>:</td>
                      <td><?= $siswa['anak_ke']; ?></td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?= $siswa['alamat']; ?></td>
                  </tr>
                  <tr>
                      <td>Foto</td>
                      <td>:</td>
                      <td><img src="<?= base_url('assets/dist/img/') . $siswa['foto']; ?>" height="120" width="100" /></td>
                  </tr>
                  <tr>
                      <td colspan="3" height="30"></td>
                  </tr>
                  <?php
                    $no = 1;
                    foreach ($ortuwali as $ft) :
                        $id_siswa = $siswa['id_siswa'];
                        $nama_siswa = $siswa['nama_siswa'];
                        $kategoriortuwali = $this->db->get_where('kategoriortuwali', ['id_kategoriortuwali' => $ft['id_kategoriortuwali']])->row_array();
                    ?>
                      <tr>
                          <td>NIK <?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                          <td>:</td>
                          <td><?= $ft['nik']; ?></td>
                      </tr>
                      <tr>
                          <td>Nama <?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                          <td>:</td>
                          <td><?= $ft['nama_ortuwali']; ?></td>
                      </tr>
                      <tr>
                          <td>Alamat <?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                          <td>:</td>
                          <td><?= $ft['alamat']; ?></td>
                      </tr>
                      <tr>
                          <td>Pekerjaan <?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                          <td>:</td>
                          <td><?= $ft['pekerjaan']; ?></td>
                      </tr>
                      <tr>
                          <td>No HP <?= $kategoriortuwali['nama_kategoriortuwali']; ?></td>
                          <td>:</td>
                          <td><?= $ft['nohp']; ?></td>
                      </tr>
                      <tr>
                          <td colspan="3" height="10"></td>
                      </tr>
                  <?php
                        $no++;
                    endforeach; ?>

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