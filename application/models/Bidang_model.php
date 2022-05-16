<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM bidang";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getbidangs2($bid)
    {
        $query = "SELECT id,nama_bidang FROM bidang WHERE nama_bidang LIKE '%$bid%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
