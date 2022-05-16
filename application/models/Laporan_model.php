<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function readkendaraanpinjam($xtglawal, $xtglakhir)
    {
        $query = "SELECT p.id,p.nama,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_unit
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_unit
                        )
                        END) as nama_unit,p.nama_unit as idunit,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                WHERE p.jenis_pinjam = 1 AND p.tgl_kembali IS NULL AND (p.tgl_pinjam BETWEEN '$xtglawal' AND '$xtglakhir')
                ORDER BY p.id ASC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function readkendaraankembali($xtglawal, $xtglakhir)
    {
        $query = "SELECT p.id,p.nama,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_unit
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_unit
                        )
                        END) as nama_unit,p.nama_unit as idunit,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                WHERE p.jenis_pinjam = 1 AND p.tgl_kembali IS NOT NULL AND (p.tgl_pinjam BETWEEN '$xtglawal' AND '$xtglakhir')
                ORDER BY p.id ASC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function readelektronikpinjam($xtglawal, $xtglakhir)
    {
        $query = "SELECT p.id,p.nama,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_unit
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_unit
                        )
                        END) as nama_unit,p.nama_unit as idunit,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                WHERE p.jenis_pinjam = 2 AND p.tgl_kembali IS NULL AND (p.tgl_pinjam BETWEEN '$xtglawal' AND '$xtglakhir')
                ORDER BY p.id ASC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function readelektronikkembali($xtglawal, $xtglakhir)
    {
        $query = "SELECT p.id,p.nama,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_unit
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_unit
                        )
                        END) as nama_unit,p.nama_unit as idunit,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                WHERE p.jenis_pinjam = 2 AND p.tgl_kembali IS NOT NULL AND (p.tgl_pinjam BETWEEN '$xtglawal' AND '$xtglakhir')
                ORDER BY p.id ASC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
