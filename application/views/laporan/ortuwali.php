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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Urutkan Data :</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="input_urutan" style="width: 100%;" tabindex="-1" aria-hidden="true">
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
                <?php if ($this->session->flashdata()) : ?>
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
                                                foreach ($filter as $ft) :
                                                    $id_siswa = $ft['id_siswa'];
                                                    $nama_siswa = $ft['nama_siswa'];
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

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <form id="formTambah" action="<?= base_url('laporan/cetakortuwali'); ?>" method="post" target="_blank">
                                            <input type="hidden" name="input_urutan" value=<?= $input_urutan; ?>>
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