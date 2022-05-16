<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Dompdf\Dompdf as Dompdf;

class Laporan extends CI_Controller
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
        $this->load->model('peminjamanelektronik_model');
        $this->load->model('laporan_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function Peminjamankendaraan()
    {

        $data['title'] = 'Laporan / Peminjaman Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tanggalawal');
        $xtanggalakhir = $this->input->post('tanggalakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tanggalawal');
            $xtanggalakhir = $this->input->post('tanggalakhir');
        } else {
            $xtanggalawal = date('Y/m/d');
            $xtanggalakhir = date('Y/m/d', strtotime('+1 days'));
        }

        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;
        $data['pinjam'] = $this->laporan_model->readkendaraanpinjam($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/kendaraanpinjam', $data);
    }

    public function cetaktransaksikendaraan()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Cetak Transaksi Kendaraan';
        $data['info'] = $this->peminjamankendaraan_model->detail($id);
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);

        $this->load->view('laporan/cetaktransaksikendaraan', $data);
    }
    public function cetakpeminjamankendaraan()
    {
        $data['title'] = 'Laporan Peminjaman Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['pinjam'] = $this->laporan_model->readkendaraanpinjam($xtanggalawal, $xtanggalakhir);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('Laporan/cetakpeminjamankendaraan', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Peminjaman Kendaraan Tanggal ' . $xtanggalawal . ' Sampai ' . date('yyyy/mm/dd'), array("Attachment" => false));
    }

    public function Pengembaliankendaraan()
    {

        $data['title'] = 'Laporan / Pengembalian Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tanggalawal');
        $xtanggalakhir = $this->input->post('tanggalakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tanggalawal');
            $xtanggalakhir = $this->input->post('tanggalakhir');
        } else {
            $xtanggalawal = date('Y/m/d');
            $xtanggalakhir = date('Y/m/d', strtotime('+1 days'));
        }

        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;
        $data['kembali'] = $this->laporan_model->readkendaraankembali($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/kendaraankembali', $data);
    }
    public function cetakpengembaliankendaraan()
    {
        $data['title'] = 'Laporan Pengembalian Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['kembali'] = $this->laporan_model->readkendaraankembali($xtanggalawal, $xtanggalakhir);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('Laporan/cetakpengembaliankendaraan', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Pengembalian Kendaraan Tanggal ' . $xtanggalawal . ' Sampai ' . date('yyyy/mm/dd'), array("Attachment" => false));
    }

    public function Peminjamanelektronik()
    {

        $data['title'] = 'Laporan / Peminjaman Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tanggalawal');
        $xtanggalakhir = $this->input->post('tanggalakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tanggalawal');
            $xtanggalakhir = $this->input->post('tanggalakhir');
        } else {
            $xtanggalawal = date('Y/m/d');
            $xtanggalakhir = date('Y/m/d', strtotime('+1 days'));
        }

        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;
        $data['pinjam'] = $this->laporan_model->readelektronikpinjam($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/elektronikpinjam', $data);
    }

    public function cetakpeminjamanelektronik()
    {
        $data['title'] = 'Laporan Peminjaman Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['pinjam'] = $this->laporan_model->readelektronikpinjam($xtanggalawal, $xtanggalakhir);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('Laporan/cetakpeminjamanelektronik', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Peminjaman Elektronik Tanggal ' . $xtanggalawal . ' Sampai ' . date('yyyy/mm/dd'), array("Attachment" => false));
    }
    public function cetaktransaksielektronik()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Cetak Transaksi';
        $data['info'] = $this->peminjamanelektronik_model->detail($id);
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);

        $this->load->view('laporan/cetaktransaksielektronik', $data);
    }

    public function Pengembalianelektronik()
    {

        $data['title'] = 'Laporan / Pengembalian Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tanggalawal');
        $xtanggalakhir = $this->input->post('tanggalakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tanggalawal');
            $xtanggalakhir = $this->input->post('tanggalakhir');
        } else {
            $xtanggalawal = date('Y/m/d');
            $xtanggalakhir = date('Y/m/d', strtotime('+1 days'));
        }

        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;
        $data['kembali'] = $this->laporan_model->readelektronikkembali($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/elektronikkembali', $data);
    }
    public function cetakpengembalianelektronik()
    {
        $data['title'] = 'Laporan Pengembalian Elektronik';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['kembali'] = $this->laporan_model->readelektronikkembali($xtanggalawal, $xtanggalakhir);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('Laporan/cetakpengembalianelektronik', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Pengembalian Elektronik Tanggal ' . $xtanggalawal . ' Sampai ' . date('yyyy/mm/dd'), array("Attachment" => false));
    }
}
