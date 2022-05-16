<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM kondisi";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getkondisi2($jen)
    {
        $query = "SELECT * FROM kondisi WHERE kondisi LIKE '%$jen%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
