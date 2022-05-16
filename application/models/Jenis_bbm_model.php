<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_bbm_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM jenis_bbm";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getjenis2($jen)
    {
        $query = "SELECT * FROM jenis_bbm WHERE nama_jenis_bbm LIKE '%$jen%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
