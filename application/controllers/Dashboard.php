<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
        $this->load->model('dashboard_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['barangtetap'] = $this->dashboard_model->hitungbarangtetap();
        $data['barangtidaktetap'] = $this->dashboard_model->hitungbarangtidak();
        $data['petugas'] = $this->dashboard_model->hitungpetugas();
        $data['chartdonut'] = $this->dashboard_model->chartdonut();
        $data['chartarea'] = $this->dashboard_model->chartarea();
        $data['chartarea2'] = $this->dashboard_model->chartarea2();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Dashboard/index', $data);
    }
}
