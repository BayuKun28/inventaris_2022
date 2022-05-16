<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT k.id,
                    jr.nama_jenis_ranmor as jenis_ranmor,
                    k.merk,
                    k.tipe_ranmor,
                    up.unit_pengguna,
                    k.no_pol,
                    k.no_rangka,
                    k.no_mesin,
                    k.tahun_perolehan,
                    k.asal_perolehan,
                    kr.kondisi as kondisi_ranmor,
                    jb.nama_jenis_bbm as jenis_bbm,
                    k.file
            FROM kendaraan k
                LEFT JOIN jenis_ranmor jr on jr.id = k.jenis_ranmor
                LEFT JOIN unit_pengguna up on up.id = k.unit_pengguna
                LEFT JOIN kondisi kr on kr.id = k.kondisi_ranmor
                LEFT JOIN jenis_bbm jb on jb.id = k.jenis_bbm
            ORDER BY k.id ASC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function edit($id)
    {
        $query = "SELECT k.id,
                    jr.id as idjenisranmor ,jr.nama_jenis_ranmor as jenis_ranmor,
                    k.merk,
                    k.tipe_ranmor,
                    up.id as idunit,up.unit_pengguna,
                    k.no_pol,
                    k.no_rangka,
                    k.no_mesin,
                    k.tahun_perolehan,
                    k.asal_perolehan,
                    kr.id as idkondisi ,kr.kondisi as kondisi_ranmor,
                    jb.id as idjenisbbm,jb.nama_jenis_bbm as jenis_bbm,
                    k.file
            FROM kendaraan k
                LEFT JOIN jenis_ranmor jr on jr.id = k.jenis_ranmor
                LEFT JOIN unit_pengguna up on up.id = k.unit_pengguna
                LEFT JOIN kondisi kr on kr.id = k.kondisi_ranmor
                LEFT JOIN jenis_bbm jb on jb.id = k.jenis_bbm
            WHERE k.id = '$id'
            ORDER BY k.id ASC";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function getkendaraan2($un)
    {
        $query = "SELECT id,no_pol FROM kendaraan WHERE no_pol LIKE '%$un%' AND status = 0";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
