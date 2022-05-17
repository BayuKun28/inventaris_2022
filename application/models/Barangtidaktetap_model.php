<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangtidaktetap_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM barang_tidak_tetap ORDER BY id DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function edit($id)
    {
        $query = "SELECT *
        FROM barang_tidak_tetap 
        WHERE id = '$id'
        ORDER BY id ASC";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
