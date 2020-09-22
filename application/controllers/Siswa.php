<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('username') == null) {
			redirect('auth');
		}

		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Siswa';
		$data['siswa'] = $this->Siswa_model->tampilSiswa();

		$this->load->view('temp/header', $data);
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('siswa/index', $data);
		$this->load->view('temp/footer');
		$this->load->view('temp/js');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|exact_length[4]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		

		if($this->form_validation->run() == false) {		
			$data['judul'] = 'Halaman Data Siswa';
			$data['kelas'] = $this->Kelas_model->tampilKelas();

			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('siswa/tambah', $data);
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Siswa_model->tambahData();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data berhasil ditambah
                  </div>');
            redirect('siswa');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|exact_length[4]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		

		if($this->form_validation->run() == false) {		
			$data['judul'] = 'Halaman Data Siswa';
			$data['siswa'] = $this->Siswa_model->tampilSiswaById($id);
			$data['kelas'] = $this->Kelas_model->tampilKelas();

			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('siswa/ubah', $data);
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Siswa_model->ubahData();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data berhasil diubah
                  </div>');
            redirect('siswa');
		}

	}

	public function hapus($id)
    {
        $this->Siswa_model->hapusSiswa($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data dihapus!
                  </div>');
        redirect('siswa');
    }
}