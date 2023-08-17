        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4"><?= $judul; ?></h2>

                </div>
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
                                                <th>Total Pemasukan</th>
                                                <th>Total Pengeluaran</th>
                                                <th>Saldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= '1'; ?></td>
                                                <td><?= rupiah($totalPemasukan); ?></td>
                                                <td><?= rupiah($totalPengeluaran); ?></td>
                                                <td><?= rupiah($Saldo); ?></td>
                                            </tr>
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
                                    <form id="formTambah" action="<?= base_url('laporan/cetaksaldo'); ?>" method="post" target="_blank">
                                        <input type="hidden" class="form-control" name="ceksaldo" value='1'>
                                        <button type="submit" class="btn btn-default"><i class="fas fa-print"></i> Cetak Laporan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section>
        </div>