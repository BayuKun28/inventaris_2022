<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function hitungbarangtetap()
    {
        $query = "SELECT SUM(a.hitung) as hitung 
                    FROM (
                    SELECT COUNT(e.id) as hitung FROM elektronik e 
                    UNION
                    SELECT COUNT(k.id) as hitung FROM kendaraan k )
                    a";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function hitungbarangtidak()
    {
        $query = "SELECT COUNT(b.id) as hitung FROM barang_tidak_tetap b";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function hitungpetugas()
    {
        $query = "SELECT COUNT(p.id) as hitung FROM pengguna p WHERE p.level = 2";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }

    public function chartdonut()
    {
        $query = "SELECT 
                    (SELECT COUNT(p.id) as pinjamkendaraan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND p.tgl_kembali IS NOT NULL AND YEAR(p.tgl_pinjam) = YEAR(NOW())) as pengembaliankendaraan,
                    (SELECT COUNT(p.id) as pinjamkendaraan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND p.tgl_kembali IS NULL AND YEAR(p.tgl_pinjam) = YEAR(NOW())) as peminjamankendaraan,
                    (SELECT COUNT(p.id) as pinjamkendaraan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND p.tgl_kembali IS NOT NULL AND YEAR(p.tgl_pinjam) = YEAR(NOW())) as pengembalianelektronik,
                    (SELECT COUNT(p.id) as pinjamkendaraan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND p.tgl_kembali IS  NULL AND YEAR(p.tgl_pinjam) = YEAR(NOW())) as peminjamanelektronik";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function chartarea()
    {
        $query = "SELECT COUNT(p.id) as jumlah, 'Januari' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 1
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Februari' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 2
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Maret' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 3
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'April' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 4
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Mei' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 5
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Juni' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 6
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Juli' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 7
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Agustus' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 8
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'September' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 9
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Oktober' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 10
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'November' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 11
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Desember' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 1 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 12";
        return $this->db->query($query)->result();
        echo json_encode($query);
    }
    public function chartarea2()
    {
        $query = "SELECT COUNT(p.id) as jumlah, 'Januari' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 1
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Februari' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 2
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Maret' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 3
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'April' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 4
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Mei' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 5
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Juni' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 6
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Juli' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 7
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Agustus' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 8
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'September' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 9
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Oktober' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 10
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'November' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 11
                        UNION
                        SELECT COUNT(p.id) as jumlah, 'Desember' as bulan FROM peminjaman p WHERE p.jenis_pinjam = 2 AND YEAR(p.tgl_pinjam) = YEAR(NOW()) AND MONTH(p.tgl_pinjam) = 12";
        return $this->db->query($query)->result();
        echo json_encode($query);
    }
}
