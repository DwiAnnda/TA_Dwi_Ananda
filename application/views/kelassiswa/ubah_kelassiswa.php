  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- NOTIF FLASH DISINI-->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Kelas Siswa</h3>
        </div>
        <div class="card-body col-md-6">
          <form id="formTambah" action="" method="post">
            <input type="hidden" name="id_kelassiswa" class="form-control" id="id_kelassiswa" value="<?= $kelassiswa['id_kelassiswa']; ?>">
            <div class="modal-body">
              <div class="form-group">
                <label for="id_tahunajaran">Pilih Tahun Ajaran</label>
                <select class="form-control select2 select2-hidden-accessible" name="id_tahunajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <?php
                  $pilih_tahunajaran = $this->db->get('tahunajaran')->result_array();
                  foreach ($pilih_tahunajaran as $pta) : ?>
                    <?php
                    if ($pta['id_tahunajaran'] == $kelassiswa['id_tahunajaran']) {

                    ?>
                      <option value="<?= $pta['id_tahunajaran']; ?>" selected="selected"><?= $pta['nama_tahunajaran']; ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="<?= $pta['id_tahunajaran']; ?>"><?= $pta['nama_tahunajaran']; ?></option>
                    <?php
                    }
                    ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_guru">Pilih Wali Kelas</label>
                <select class="form-control select2 select2-hidden-accessible" name="id_guru" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <?php
                  $pilih_guru = $this->db->get('guru')->result_array();
                  foreach ($pilih_guru as $gr) :
                    $pilih_id_pegawai = $gr['id_pegawai'];
                    $pilih_pegawai = $this->db->get_where('pegawai', ['id_pegawai' => $pilih_id_pegawai])->row_array();
                  ?>
                    <?php
                    if ($gr['id_guru'] == $kelassiswa['id_guru']) {

                    ?>
                      <option value="<?= $gr['id_guru']; ?>" selected="selected"><?= $pilih_pegawai['nama_pegawai']; ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="<?= $gr['id_guru']; ?>"><?= $pilih_pegawai['nama_pegawai']; ?></option>
                    <?php
                    }
                    ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="id_kelas">Pilih Kelas</label>
                <select class="form-control select2 select2-hidden-accessible" name="id_kelas" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <?php
                  $pilih_kelas = $this->db->get('kelas')->result_array();
                  foreach ($pilih_kelas as $kls) : ?>
                    <?php
                    if ($kls['id_kelas'] == $kelassiswa['id_kelas']) {

                    ?>
                      <option value="<?= $kls['id_kelas']; ?>" selected="selected"><?= $kls['nama_kelas']; ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="<?= $kls['id_kelas']; ?>"><?= $kls['nama_kelas']; ?></option>
                    <?php
                    }
                    ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('kelassiswa/kelassiswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
              <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengubah data');"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->