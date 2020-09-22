<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('Mapel_model');
	// 	$this->load->model('Siswa_model');
	// }

	public function getNilai()
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
		$this->db->join('kelas', 'kelas.id_kelas = nilai.id_kelas');
		$this->db->join('mapel', 'mapel.id_mapel = nilai.id_mapel');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function inputNilai()
	{
		$mapel = $this->Mapel_model->tampilMapel();
		$siswa = $this->Siswa_model->tampilSiswa();

		$data = [
			'id_siswa' => $siswa['id_siswa'],
			'id_mapel' => $mapel['id_mapel'],
			'nilai_siswa' => htmlspecialchars($this->input->post('nilai'))
		];

		$this->db->insert('nilai', $data);
	}

	public function hapusNilai($id)
    {
        $this->db->delete('nilai', ['id_siswa' => $id]);
    }

    public function updateNilai($id)
    {
    	$this->db->where('id_siswa',$id);
		$this->db->update('nilai', array('nilai_siswa' => $this->input->post('nilai')));
    }

	// public function tambahNilai()
 //    {
 //        $data = [
 //            "nilai" => htmlspecialchars($this->input->post('nilai', true))
 //        ];

 //        $this->db->insert('nilaii', $data);
 //    }

	// public function set()
	// {
	// 	$id_mapel = $this->input->post('mapel');
	// 	$id_kelas = $this->input->post('kelas');

	// 	//Start untuk database nilai
	// 	$this->db->select('siswa.nis');
	// 	$this->db->from('siswa');
	// 	$this->db->where('id_kelas', $id_kelas);
	// 	$query = $this->db->get();
	// 	$isi_nis = $query->result_array();
	// 	$i_nis = 0;

	// 	//Start isi nim ke array
	// 	//Untuk mengetahui berapa jumlah mahasiswa yang berada di
	// 	//$id_kelas dan supaya pengaksesan nim dalam looping menjadi
	// 	//lebih mudah
	// 	foreach ($isi_nis as $isi_nis) {
	// 		$nis[$i_nis] = $isi_nis['nis'];
	// 		$i_nis++;
	// 	}
	// 	//End isi nim ke array

	// 	//Looping untuk pengecekan data di database nilai apakah
	// 	//sudah ada data dengan nim = $nim[$i] dan id_matakuliah =
	// 	//$id_matakuliah
	// 	//***
	// 	//Looping dilakukan sebanyak $i_nim yang didapat dari looping
	// 	//isi_nim
	// 	//***
	// 	//Hal ini dilakukan agar tidak ada duplikasi data
	// 	for ($i=0; $i<$i_nis; $i++) {
	// 		$data_cek_nilai = array(
	// 			'nis' => $nis[$i],
	// 			'id_mapel' => $id_mapel
	// 		);

	// 		$query = $this->db->get_where('nilai', $data_cek_nilai);
	// 		$cek_nilai = $query->num_rows();

	// 		//Jika data dengan nim = $nim[i] dan id_matakuliah =
	// 		//$id_matakuliah tidak ada di database maka data
	// 		//diinputkan ke database
	// 		if ($cek_nilai == 0) {
	// 			$data = array(
	// 				'id_nilai' => NULL,
	// 				'nis' => $nis[$i],
	// 				'id_mapel' => $id_mapel
	// 			);

	// 			$this->db->insert('nilaii', $data);
	// 		}
	// 	}
	// 	//End untuk database nilai

	// 	//Start untuk view add_nilai
	// 	$view_add_nilai = $this->db->get_where('siswa', array('id_kelas' => $id_kelas));
	// 	return $view_add_nilai->result();
	// 	//End untuk view add_nilai
	// }

	// public function tambahNilai()
	// {
	// 	$nilai = $this->input->post('nilai');
	// 	$this->db->where('nilaii', $id);
	// 	$this->db->update('nilaii', array('nilai' => $nilai));
	// }
}