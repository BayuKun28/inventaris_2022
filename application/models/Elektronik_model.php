<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Elektronik_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT e.id,e.nama_barang,e.nomor_seri_barang,e.jumlah,e.kondisi as idkondisi,k.kondisi,e.image
        FROM elektronik e
        LEFT JOIN kondisi k on k.id = e.kondisi
        ORDER BY e.id DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function edit($id)
    {
        $query = "SELECT e.id,e.nama_barang,e.nomor_seri_barang,e.jumlah,e.kondisi as idkondisi,k.kondisi,e.image
        FROM elektronik e
        LEFT JOIN kondisi k on k.id = e.kondisi
        WHERE e.id = '$id'
        ORDER BY e.id";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
    public function getelektronik2($un)
    {
        $query = "SELECT id,nama_barang FROM elektronik WHERE nama_barang LIKE '%$un%' AND jumlah > 0 ";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
