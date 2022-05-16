<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Elektronik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('jenis_ranmor_model');
        $this->load->model('unit_pengguna_model');
        $this->load->model('kondisi_model');
        $this->load->model('jenis_bbm_model');
        $this->load->model('elektronik_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Barang Tetap / Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['elektronik'] = $this->elektronik_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('elektronik/index', $data);
    }
    public function FormInput()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $data['title'] = 'Barang Tetap / Input Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['elektronik'] = $this->elektronik_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('elektronik/input', $data);
    }

    public function tambah()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $message = array('error' => $this->upload->display_errors());
            echo "<script>alert('$message');</script>";
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'nomor_seri_barang' => $this->input->post('nomor_seri'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi' => $this->input->post('kondisi'),
                'image' => $fileData['file_name']
            );

            $this->db->insert('elektronik', $data);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Elektronik');
        }
    }
    public function editview()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $id = $this->uri->segment(3);
        $data['title'] = 'Edit Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['elektronik'] = $this->elektronik_model->edit($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('elektronik/edit', $data);
    }

    public function edit()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $id = $this->input->post('id');
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['max_size'] = 20000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'nomor_seri_barang' => $this->input->post('nomor_seri'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi' => $this->input->post('kondisi')
            );
            $this->db->where('id', $id);
            $this->db->update('elektronik', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Elektronik');
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'nomor_seri_barang' => $this->input->post('nomor_seri'),
                'jumlah' => $this->input->post('jumlah'),
                'kondisi' => $this->input->post('kondisi'),
                'image' => $fileData['file_name']
            );
            $this->db->where('id', $id);
            $this->db->update('elektronik', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Elektronik');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $this->db->where('id', $id);
        $this->db->delete('elektronik');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Elektronik');
    }
    public function getJenisranmor()
    {
        $jen = $this->input->get('jen');
        $query = $this->jenis_ranmor_model->getjenis2($jen, 'nama_jenis_ranmor');
        echo json_encode($query);
    }
    public function getUnitpengguna()
    {
        $jen = $this->input->get('jen');
        $query = $this->unit_pengguna_model->getunit2($jen, 'unit_pengguna');
        echo json_encode($query);
    }
    public function getKondisi()
    {
        $jen = $this->input->get('jen');
        $query = $this->kondisi_model->getkondisi2($jen, 'kondisi');
        echo json_encode($query);
    }
    public function getJenisbbm()
    {
        $jen = $this->input->get('jen');
        $query = $this->jenis_bbm_model->getjenis2($jen, 'nama_jenis_bbm');
        echo json_encode($query);
    }
}
