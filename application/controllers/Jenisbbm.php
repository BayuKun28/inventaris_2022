<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisbbm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('jenis_bbm_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
    }
    public function index()
    {

        $data['title'] = 'Jenis BBM';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenisbbm'] = $this->jenis_bbm_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jenisbbm/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_jenis_bbm' => $this->input->post('jenisbbm')
        );
        $this->db->insert('jenis_bbm', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Jenisbbm');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_jenis_bbm' => $this->input->post('jenisbbmedit')
        );
        $this->db->where('id', $id);
        $this->db->update('jenis_bbm', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Jenisbbm');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_bbm');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Jenisbbm');
    }
}
