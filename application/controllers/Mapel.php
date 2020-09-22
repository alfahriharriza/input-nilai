<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('username') == null) {
			redirect('auth');
		}

		$this->load->model('Mapel_model');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Mata Pelajaran';
		$data['mapel'] = $this->Mapel_model->tampilMapel();

		$this->load->view('temp/header', $data);
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('mapel/index', $data);
		$this->load->view('temp/footer');
		$this->load->view('temp/js');
	}

	public function tambah()
	{
		$data['judul'] = 'Halaman Mata Pelajaran';
		$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('mapel/tambah');
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Mapel_model->tambahMapel();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data ditambahkan!
                  </div>');
            redirect('mapel');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Halaman Mata Pelajaran';
		$data['mapel'] = $this->Mapel_model->tampilMapelById($id);
		$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('temp/header', $data);
			$this->load->view('temp/navbar');
			$this->load->view('temp/sidebar');
			$this->load->view('mapel/ubah', $data);
			$this->load->view('temp/footer');
			$this->load->view('temp/js');
		} else {
			$this->Mapel_model->ubahMapel();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data diubah!
                  </div>');
            redirect('mapel');
		}
	}

    public function hapus($id)
    {
        $this->Mapel_model->hapusMapel($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data dihapus!
                  </div>');
        redirect('mapel');
    }
}