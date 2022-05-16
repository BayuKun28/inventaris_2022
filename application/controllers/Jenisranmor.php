<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisranmor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('jenis_ranmor_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
    }
    public function index()
    {

        $data['title'] = 'Jenis Ranmor';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenisranmor'] = $this->jenis_ranmor_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jenisranmor/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_jenis_ranmor' => $this->input->post('jenisranmor')
        );
        $this->db->insert('jenis_ranmor', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Jenisranmor');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_jenis_ranmor' => $this->input->post('jenisranmoredit')
        );
        $this->db->where('id', $id);
        $this->db->update('jenis_ranmor', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Jenisranmor');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_ranmor');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Jenisranmor');
    }
}
