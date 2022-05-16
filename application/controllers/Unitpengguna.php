<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unitpengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('unit_pengguna_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
    }
    public function index()
    {

        $data['title'] = 'Unit Pengguna';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['unit'] = $this->unit_pengguna_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('unitpengguna/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'unit_pengguna' => $this->input->post('unit_pengguna')
        );
        $this->db->insert('unit_pengguna', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Unitpengguna');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'unit_pengguna' => $this->input->post('unit_penggunaedit')
        );
        $this->db->where('id', $id);
        $this->db->update('unit_pengguna', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Unitpengguna');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unit_pengguna');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Unitpengguna');
    }
}
