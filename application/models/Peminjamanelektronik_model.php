<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjamanelektronik_model extends CI_Model
{
    public function read()
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
                WHERE p.jenis_pinjam = 2
                ORDER BY p.id ASC";
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
                                            WHERE k.id = p.nama_unit
                    )
                    WHEN j.id = 2 THEN (
                                            SELECT e.nama_barang
                                            FROM elektronik e
                                            WHERE e.id = p.nama_unit
                    )
                    END) as nama_unit,p.nama_unit as idunit, e.nomor_seri_barang,ko.kondisi,e.image,e.status,
                    p.tgl_pinjam,
                    p.tgl_kembali,
                    p.keterangan
            FROM peminjaman p
                LEFT JOIN jenis j on j.id = p.jenis_pinjam
                LEFT JOIN elektronik e on e.id = p.nama_unit
                LEFT JOIN kondisi ko on ko.id = e.kondisi
            WHERE p.jenis_pinjam = 2 AND p.id = '$id'
            ORDER BY p.id ASC";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function getStok($id)
    {
        $this->db->select('jumlah');
        $this->db->where('id', $id);
        return $this->db->get('elektronik')->row();
    }
}
