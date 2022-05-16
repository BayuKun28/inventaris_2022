<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_ranmor_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM jenis_ranmor";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getjenis2($jen)
    {
        $query = "SELECT * FROM jenis_ranmor WHERE nama_jenis_ranmor LIKE '%$jen%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
