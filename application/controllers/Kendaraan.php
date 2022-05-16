<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
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
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Barang Tetap / Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kendaraan'] = $this->kendaraan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/index', $data);
    }
    public function FormInput()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $data['title'] = 'Barang Tetap / Input Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis'] = $this->jenis_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/input', $data);
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
                'jenis_ranmor' => $this->input->post('jenis_ranmor'),
                'merk' => $this->input->post('merk'),
                'tipe_ranmor' => $this->input->post('tipe_ranmor'),
                'unit_pengguna' => $this->input->post('unit_pengguna'),
                'no_pol' => $this->input->post('no_pol'),
                'no_rangka' => $this->input->post('no_rangka'),
                'no_mesin' => $this->input->post('no_mesin'),
                'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                'asal_perolehan' => $this->input->post('asal_perolehan'),
                'kondisi_ranmor' => $this->input->post('kondisi_ranmor'),
                'jenis_bbm' => $this->input->post('jenis_bbm'),
                'file' => $fileData['file_name']
            );

            $this->db->insert('kendaraan', $data);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Kendaraan');
        }
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Detail Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kendaraan'] = $this->kendaraan_model->edit($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/detail', $data);
    }

    public function editview()
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $id = $this->uri->segment(3);
        $data['title'] = 'Edit Kendaraan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kendaraan'] = $this->kendaraan_model->edit($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/edit', $data);
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
                'jenis_ranmor' => $this->input->post('jenis_ranmor'),
                'merk' => $this->input->post('merk'),
                'tipe_ranmor' => $this->input->post('tipe_ranmor'),
                'unit_pengguna' => $this->input->post('unit_pengguna'),
                'no_pol' => $this->input->post('no_pol'),
                'no_rangka' => $this->input->post('no_rangka'),
                'no_mesin' => $this->input->post('no_mesin'),
                'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                'asal_perolehan' => $this->input->post('asal_perolehan'),
                'kondisi_ranmor' => $this->input->post('kondisi_ranmor'),
                'jenis_bbm' => $this->input->post('jenis_bbm')
            );
            $this->db->where('id', $id);
            $this->db->update('kendaraan', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Kendaraan');
        } else {
            $fileData = $this->upload->data();
            $data = array(
                'jenis_ranmor' => $this->input->post('jenis_ranmor'),
                'merk' => $this->input->post('merk'),
                'tipe_ranmor' => $this->input->post('tipe_ranmor'),
                'unit_pengguna' => $this->input->post('unit_pengguna'),
                'no_pol' => $this->input->post('no_pol'),
                'no_rangka' => $this->input->post('no_rangka'),
                'no_mesin' => $this->input->post('no_mesin'),
                'tahun_perolehan' => $this->input->post('tahun_perolehan'),
                'asal_perolehan' => $this->input->post('asal_perolehan'),
                'kondisi_ranmor' => $this->input->post('kondisi_ranmor'),
                'jenis_bbm' => $this->input->post('jenis_bbm'),
                'file' => $fileData['file_name']
            );
            $this->db->where('id', $id);
            $this->db->update('kendaraan', $data);
            $this->session->set_flashdata('message', 'Berhasil Di Update');
            redirect('Kendaraan');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('level') !== '1') {
            redirect('auth/blocked', 'refresh');
        }
        $this->db->where('id', $id);
        $this->db->delete('kendaraan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kendaraan');
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
