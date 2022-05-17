<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjamankendaraan_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT p.id,p.nama,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_barang
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_barang
                        )
                        END) as nama_barang,p.nama_barang as idbarang,p.nama_unit,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                WHERE p.jenis_pinjam = 1
                ORDER BY p.id DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function detail($id)
    {
        $query = "SELECT p.id,p.nama as nama_peminjam,
                        p.jenis_pinjam,
                        (CASE
                        WHEN j.id = 1 THEN (
                                                SELECT concat('Kendaraan Dengan No Pol', ' ', k.no_pol)
                                                FROM kendaraan k
                                                WHERE k.id = p.nama_barang
                        )
                        WHEN j.id = 2 THEN (
                                                SELECT e.nama_barang
                                                FROM elektronik e
                                                WHERE e.id = p.nama_barang
                        )
                        END) as nama_barang,p.nama_barang as idbarang,p.nama_unit,k.merk,k.tipe_ranmor,u.unit_pengguna,k.no_pol,k.no_rangka,k.no_mesin,
                        k.tahun_perolehan,k.asal_perolehan,ko.kondisi,jb.nama_jenis_bbm,k.file,jr.nama_jenis_ranmor,
                        p.tgl_pinjam,
                        p.tgl_kembali,
                        p.keterangan
                FROM peminjaman p
                    LEFT JOIN jenis j on j.id = p.jenis_pinjam
                    LEFT JOIN kendaraan k on k.id = p.nama_barang
                    LEFT JOIN unit_pengguna u on u.id = k.unit_pengguna
                    LEFT JOIN kondisi ko on ko.id = k.kondisi_ranmor
                    LEFT JOIN jenis_bbm jb on jb.id = k.jenis_bbm
                    LEFT JOIN jenis_ranmor jr on jr.id = k.jenis_ranmor
                WHERE p.jenis_pinjam = 1 AND p.id = '$id'
                ORDER BY p.id ASC";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
