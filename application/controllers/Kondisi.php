<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('kondisi_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
    }
    public function index()
    {

        $data['title'] = 'Kondisi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kondisi'] = $this->kondisi_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kondisi/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'kondisi' => $this->input->post('kondisi')
        );
        $this->db->insert('kondisi', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Kondisi');
    }

    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'kondisi' => $this->input->post('kondisiedit')
        );
        $this->db->where('id', $id);
        $this->db->update('kondisi', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Kondisi');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kondisi');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kondisi');
    }
}
