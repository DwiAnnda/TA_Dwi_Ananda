<?php
function check_login()
{
    $ini = get_instance();
    if (!$ini->session->userdata('token')) {
        redirect('auth');
    } else {
        $id_level = $ini->session->userdata('id_level');
        $url = $ini->uri->segment(1);

        $queryMenu = $ini->db->get_where('menu', ['url' => $url])->row_array();
        $id_menu = $queryMenu['id_menu'];

        $queryAksesMenu = $ini->db->get_where('aksesmenu', [
            'id_level' => $id_level,
            'id_menu' => $id_menu
        ]);

        if ($queryAksesMenu->num_rows() <= 0) {
            redirect('auth');
        }
    }
}
function check_username()
{
    $ini = get_instance();
    $token = $ini->session->userdata('token');
    $queryAdmin = $ini->db->get_where('pengguna', ['token' => $token])->row_array();
    if ($queryAdmin) {
        $username = $queryAdmin['username'];
    }
    $queryGuru = $ini->db->get_where('guru', ['token' => $token])->row_array();
    if ($queryGuru) {
        $username = $queryGuru['email'];
    }
    $querySiswa = $ini->db->get_where('siswa', ['token' => $token])->row_array();
    if ($querySiswa) {
        $username = $querySiswa['email'];
    }


    return $username;
}


function check_jeniskelamin($id_jeniskelamin = '1')
{
    if ($id_jeniskelamin == '1') {
        return 'Laki-laki';
    } else {
        return 'Perempuan';
    }
}

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function check_totalpengadaan($id_barang)
{
    $ini = get_instance();
    $sql = "SELECT SUM(jumlah) as jumlah FROM pengadaan WHERE id_barang=" . $id_barang;
    $result = $ini->db->query($sql);
    return $result->row()->jumlah;
}

function check_totalpenempatan($id_barang)
{
    $ini = get_instance();
    $sql = "SELECT SUM(jumlah) as jumlah FROM penempatan WHERE id_barang=" . $id_barang;
    $result = $ini->db->query($sql);
    return $result->row()->jumlah;
}

function check_sisabarang($id_barang)
{
    $ini = get_instance();
    $jumlahPengadaan = 0;
    $pengadaan = $ini->db->get_where('pengadaan', ['id_barang' => $id_barang])->result_array();
    foreach ($pengadaan as $pgd) :
        $jumlahPengadaan = $pgd['jumlah'] + $jumlahPengadaan;
    endforeach;

    $jumlahPenempatan = 0;
    $penempatan = $ini->db->get_where('penempatan', ['id_barang' => $id_barang])->result_array();
    foreach ($penempatan as $pnp) :
        $jumlahPenempatan = $pnp['jumlah'] + $jumlahPenempatan;
    endforeach;

    $sisaBarang = $jumlahPengadaan - $jumlahPenempatan;
    return $sisaBarang;
}

function check_sisabenih($id_benih)
{
    $ini = get_instance();
    $jumlahPembelian = 0;
    $pembelian = $ini->db->get_where('pembelian', ['id_benih' => $id_benih])->result_array();
    foreach ($pembelian as $pb) :
        $jumlahPembelian = $pb['jumlah'] + $jumlahPembelian;
    endforeach;

    $jumlahPenjualan = 0;
    $penjualan = $ini->db->get_where('penjualan', ['id_benih' => $id_benih])->result_array();
    foreach ($penjualan as $pj) :
        $jumlahPenjualan = $pj['jumlah'] + $jumlahPenjualan;
    endforeach;

    $sisabenih = $jumlahPembelian - $jumlahPenjualan;
    return $sisabenih;
}
function get_token($panjang)
{
    $randomkode = array(
        range(1, 9),
        range('a', 'z'),
        range('A', 'Z')
    );
    $karakter = array();
    foreach ($randomkode as $key => $val) {
        foreach ($val as $k => $v) {
            $karakter[] = $v;
        }
    }
    $randomkode = null;
    for ($i = 1; $i <= $panjang; $i++) {
        // mengambil array secara acak
        $randomkode .= $karakter[rand($i, count($karakter) - 1)];
    }
    return $randomkode;
}
function check_aktif($aktif = '1')
{
    if ($aktif == '1') {
        $nama_status = 'Aktif';
    } else {
        $nama_status = 'Tidak Aktif';
    }
    return $nama_status;
}
function check_absensi($status = '1')
{
    $ini = get_instance();
    $status = $ini->db->get_where('status', ['id_status' => $status])->row_array();
    return $status['nama_status'];
}

function rupiah($harga)
{

    $hasil_rupiah = "Rp. " . number_format($harga, 0, ',', '.');
    return $hasil_rupiah;
}
function status_calonsiswa($id_status = '1')
{
    if ($id_status == '1') {
        return 'Pendaftaran';
    } else if ($id_status == '2') {
        return 'Diterima';
    } else {
        return 'Ditolak';
    }
}
function status_pendaftaran($id_status = '1')
{
    if ($id_status == '1') {
        return 'Pendaftaran';
    } else if ($id_status == '2') {
        return 'Diterima';
    } else {
        return 'Ditolak';
    }
}
function jenispendaftaran($id_jenispendaftaran = '1')
{
    if ($id_jenispendaftaran == '1') {
        return 'Siswa';
    } else {
        return 'Guru';
    }
}

function status_materi($id_status = '1')
{
    if ($id_status == '1') {
        $nama_status = 'Aktif';
    } else {
        $nama_status = 'Tidak Aktif';
    }
    return $nama_status;
}
function status_soal($id_status = '1')
{
    if ($id_status == '1') {
        $nama_status = 'Aktif';
    } else {
        $nama_status = 'Tidak Aktif';
    }
    return $nama_status;
}
function status_tagihan($id_status = '1')
{
    if ($id_status == '1') {
        return 'Belum Bayar';
    } else if ($id_status == '2') {
        return 'Menunggu Konfirmasi';
    } else {
        return 'Selesai';
    }
}
