<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('username') == null) {
			redirect('auth');
		}

		$this->load->model('Mapel_model');
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		$data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['siswa'] = $this->Siswa_model->countSiswa();
		$data['kelas'] = $this->Kelas_model->countKelas();
		$data['mapel'] = $this->Mapel_model->countMapel();

		$data['judul'] = 'Halaman Beranda';
		$this->load->view('temp/header', $data);
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('temp/footer');
		$this->load->view('temp/js');
	}
}