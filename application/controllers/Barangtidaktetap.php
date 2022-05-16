<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangtidaktetap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('barangtidaktetap_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Barang Tidak Tetap';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->barangtidaktetap_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barangtidaktetap/index', $data);
    }

    public function tambah()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->insert('barang_tidak_tetap', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Barangtidaktetap');
    }

    public function editview()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $id = $this->uri->segment(3);
        $data['title'] = 'Edit Barang Tidak Tetap';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->barangtidaktetap_model->edit($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barangtidaktetap/edit', $data);
    }

    public function edit()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $id = $this->input->post('id');
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id', $id);
        $this->db->update('barang_tidak_tetap', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Barangtidaktetap');
    }

    public function delete($id)
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $this->db->where('id', $id);
        $this->db->delete('barang_tidak_tetap');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Barangtidaktetap');
    }

    public function FormInput()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }

        $data['title'] = 'Barang Tidak Tetap / Input Barang';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->barangtidaktetap_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barangtidaktetap/input', $data);
    }

    public function getJenis()
    {
        $jen = $this->input->get('jen');
        $query = $this->jenis_model->getjenis2($jen, 'nama_jenis');
        echo json_encode($query);
    }
}
