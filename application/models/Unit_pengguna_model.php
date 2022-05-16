<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_pengguna_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM unit_pengguna";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getUnit2($jen)
    {
        $query = "SELECT * FROM unit_pengguna WHERE unit_pengguna LIKE '%$jen%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
