<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjamanelektronik extends CI_Controller
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
        $this->load->model('elektronik_model');
        $this->load->model('peminjamanelektronik_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Peminjaman / Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pinjam'] = $this->peminjamanelektronik_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjamanelektronik/index', $data);
    }
    public function FormInput()
    {

        $data['title'] = 'Peminjaman / Input Peminjaman Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis'] = $this->jenis_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjamanelektronik/input', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama_peminjam'),
            'nama_barang' => $this->input->post('nama_barang'),
            'nama_unit' => $this->input->post('nama_unit'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'keterangan' => $this->input->post('keterangan'),
            'jenis_pinjam' => 2
        );

        $this->db->insert('peminjaman', $data);

        $idupdate = $this->input->post('nama_barang');

        $stok = $this->peminjamanelektronik_model->getStok($idupdate)->jumlah;
        $rumus = max($stok - 1, 0);
        $data2 = array(
            'jumlah' => $rumus
        );

        $this->db->where('id', $idupdate);
        $this->db->update('elektronik', $data2);

        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Peminjamanelektronik');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Detail Peminjaman';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['info'] = $this->peminjamanelektronik_model->detail($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjamanelektronik/detail', $data);
    }

    public function kembali()
    {
        $id = $this->input->post('idkembali');
        $data = array(
            'tgl_kembali' => $this->input->post('tgl_kembali')
        );
        $this->db->where('id', $id);
        $this->db->update('peminjaman', $data);

        $idbarang = $this->input->post('idbarang');

        $stok = $this->peminjamanelektronik_model->getStok($idbarang)->jumlah;
        $rumus = max($stok + 1, 0);
        $data2 = array(
            'jumlah' => $rumus
        );

        $this->db->where('id', $idbarang);
        $this->db->update('elektronik', $data2);
        $this->session->set_flashdata('message', 'Berhasil Dikembalikan');
        redirect('Peminjamanelektronik');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kendaraan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kendaraan');
    }
    public function getnamabarang()
    {
        $un = $this->input->get('un');
        $query = $this->elektronik_model->getelektronik2($un, 'nama_barang');
        echo json_encode($query);
    }
}
