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
}
