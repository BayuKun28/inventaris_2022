<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjamankendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
        $this->load->model('jenis_ranmor_model');
        $this->load->model('unit_pengguna_model');
        $this->load->model('kondisi_model');
        $this->load->model('jenis_bbm_model');
        $this->load->model('kendaraan_model');
        $this->load->model('peminjamankendaraan_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Peminjaman / Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pinjam'] = $this->peminjamankendaraan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjamankendaraan/index', $data);
    }
    public function FormInput()
    {

        $data['title'] = 'Peminjaman / Input Peminjaman Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis'] = $this->jenis_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjamankendaraan/input', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama_peminjam'),
            'nama_unit' => $this->input->post('nama_unit'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'keterangan' => $this->input->post('keterangan'),
            'jenis_pinjam' => 1
        );

        $this->db->insert('peminjaman', $data);

        $data2 = array(
            'status' => 1
        );
        $idupdate = $this->input->post('nama_unit');
        $this->db->where('id', $idupdate);
        $this->db->update('kendaraan', $data2);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Peminjamankendaraan');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Detail Peminjaman';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['info'] = $this->peminjamankendaraan_model->detail($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Peminjamankendaraan/detail', $data);
    }

    public function kembali()
    {
        $id = $this->input->post('idkembali');
        $data = array(
            'tgl_kembali' => $this->input->post('tgl_kembali')
        );
        $this->db->where('id', $id);
        $this->db->update('peminjaman', $data);

        $idunit = $this->input->post('idunit');
        $data2 = array(
            'status' => 0
        );
        $this->db->where('id', $idunit);
        $this->db->update('kendaraan', $data2);
        $this->session->set_flashdata('message', 'Berhasil Dikembalikan');
        redirect('Peminjamankendaraan');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kendaraan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kendaraan');
    }
    public function getnamaunit()
    {
        $un = $this->input->get('un');
        $query = $this->kendaraan_model->getkendaraan2($un, 'no_pol');
        echo json_encode($query);
    }
}
