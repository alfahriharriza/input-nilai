<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('username') == null) {
			redirect('auth');
		}

		$this->load->model('Mapel_model');
		$this->load->model('Kelas_model');
		$this->load->model('Nilai_model');
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Nilai Siswa';
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$data['mapel'] = $this->db->get('mapel')->result_array();
		$data['nilai'] = $this->db->get('nilai')->result_array();
		$data['nilai'] = $this->Nilai_model->getNilai();

		$this->load->view('temp/header', $data);
		$this->load->view('temp/navbar');
		$this->load->view('temp/sidebar');
		$this->load->view('nilai/index', $data);
		$this->load->view('temp/footer');
		$this->load->view('temp/js');
	}

	public function get_siswa()
	{
		$id_kelas = $this->input->post('id_kelas');
		$data = $this->db->get_where('siswa',array('id_kelas' => $id_kelas))->result();
		echo json_encode($data);
	}

	public function input_nilai()
	{
		$id_siswa = $this->input->post('siswa');
		$id_mapel = $this->input->post('mapel');
		$id_kelas = $this->input->post('kelas');
		$nilai_siswa = $this->input->post('nilai');

		$data = [
			'id_siswa' =>$id_siswa,
			'id_mapel' =>$id_mapel,
			'id_kelas' =>$id_kelas,
			'nilai_siswa' => $nilai_siswa
		];

		$this->db->insert('nilai', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Nilai siswa telah di input!
                  </div>');
		redirect('nilai');
	}

	public function hapus($id)
    {
        $this->Nilai_model->hapusNilai($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Data dihapus!
                  </div>');
        redirect('nilai');
    }

    public function edit($id)
    {
        $this->Nilai_model->updateNilai($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible text-center " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Nilai siswa diperbarui!
                  </div>');
        redirect('nilai');
    }
}