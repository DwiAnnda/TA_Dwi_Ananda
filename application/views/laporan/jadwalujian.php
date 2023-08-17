        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4"><?= $judul; ?></h2>
                    <form id="formTambah" action="" method="post">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Filter Kelas Siswa :</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_kelassiswa" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option selected value="Semua">Semua</option>
                                                <?php
                                                $kelasssiwa = $this->db->get('kelassiswa')->result_array();
                                                foreach ($kelassiswa as $jb) :
                                                    $id_tahunajaran = $jb['id_tahunajaran'];
                                                    $tahunajaran = $this->db->get_where('tahunajaran', ['id_tahunajaran' => $id_tahunajaran])->row_array();
                                                    $id_kelas = $jb['id_kelas'];
                                                    $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                                    $id_guru = $jb['id_guru'];
                                                    $guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
                                                    $id_pegawaiguru = $guru['id_pegawai'];
                                                    $pegawaiguru = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawaiguru])->row_array();
                                                ?>
                                                    <option value="<?= $jb['id_kelassiswa']; ?>"><?= $kelas['nama_kelas'] . ' Tahun : ' . $tahunajaran['nama_tahunajaran'] . '/' . $tahunajaran['smester'] . ' Wali Kelas : ' . $pegawaiguru['nama_pegawai']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Urutkan :</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="urutan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option selected value="ASC">Tertinggi</option>
                                                <option value="DESC">Terendah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group input-group-lg">
                                            <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Anda yakin ingin melihat laporan');"><i class="fa fa-print"></i> Lihat Laporan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (($this->session->flashdata()) and (isset($input_kelassiswa))) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Catatan :</h5>
                                Halaman ini hanya menampilkan laporan yang akan dicetak, untuk mencetak laporan klik tombol Cetak Laporan dibawah.
                            </div>


                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
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
                                                    <th>Tanggal</th>
                                                    <th>Nama Mata Pelajaran</th>
                                                    <th>Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($filter as $pgw) : ?>
                                                    <?php
                                                    $id_tema = $pgw['id_tema'];
                                                    $tema = $this->db->get_where('tema', ['id_tema' => $id_tema])->row_array();
                                                    $id_kelassiswa = $pgw['id_kelassiswa'];
                                                    $kelassiswa = $this->db->get_where('kelassiswa', ['id_kelassiswa' => $id_kelassiswa])->row_array();
                                                    $id_kelas = $kelassiswa['id_kelas'];
                                                    $kelas = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
                                                    ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= tanggal_indo($pgw['tanggal']); ?></td>
                                                        <td><?= $tema['nama_tema']; ?></td>
                                                        <td><?= $kelas['nama_kelas']; ?></td>
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

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <form id="formTambah" action="<?= base_url('laporan/cetakjadwalujian'); ?>" method="post" target="_blank">
                                            <input type="hidden" name="id_kelassiswa" value=<?= $input_kelassiswa; ?>>
                                            <input type="hidden" name="urutan" value=<?= $input_urutan; ?>>
                                            <button type="submit" class="btn btn-default"><i class="fas fa-print"></i> Cetak Laporan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                <?php endif; ?>
            </section>
        </div>