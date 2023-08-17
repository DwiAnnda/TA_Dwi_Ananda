        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4">Laporan <?= $judul; ?></h2>
                    <form id="formTambah" action="" method="post">
                        <div class="row">
                            <div class="col-md-10 offset-md-1" align="center">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_guru">Pilih Guru</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="id_guru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <option value="Semua">Semua</option>
                                            <?php
                                            $pilihguru = $this->db->get_where('guru', ['id_status' => '2'])->result_array();
                                            foreach ($pilihguru as $gur) :
                                            ?>
                                                <option value="<?= $gur['id_guru']; ?>"><?= $gur['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
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
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Catatan :</h5>
                            Halaman ini hanya menampilkan laporan yang akan dicetak, untuk mencetak laporan filter terlebih dahulu dan klik tombol Cetak Laporan dibawah.
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
                                        'id_jabatan' => '2',
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
                            <?php if (($this->session->flashdata()) and (isset($id_guru))) : ?>
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <form id="formTambah" action="<?= base_url('laporan/cetakles'); ?>" method="post" target="_blank">
                                            <input type="hidden" class="form-control" name="id_guru" value="<?= $id_guru; ?>">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-print"></i> Cetak Laporan</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </section>
        </div>