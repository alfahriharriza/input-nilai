<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('username') == null) {
			redirect('auth');
		}

		$this->load->model('Kelas_model');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Kelas';
		$data['kelas'] = $this->Kelas_model->tampilKelas();

		$this->load->view('temp/header', $data);
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('kelas/index', $data);
		$this->load->view('temp/footer');
		$this->load->view('temp/js');
	}

	public function tambah()
	{
		$data['judul'] = 'Halaman Data Kelas';
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('kelas/tambah');
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Kelas_model->tambahKelas();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data ditambahkan!
                  </div>');
            redirect('kelas');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Halaman Data Kelas';
		$data['kelas'] = $this->Kelas_model->tampilKelasById($id);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('kelas/ubah', $data);
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Kelas_model->ubahKelas();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data diubah!
                  </div>');
            redirect('kelas');
		}
	}

    public function hapus($id)
    {
        $this->Kelas_model->hapusKelas($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data dihapus!
                  </div>');
        redirect('kelas');
    }
}