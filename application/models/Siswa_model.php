<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function countSiswa()
	{
		$this->db->select(['*','COUNT(id_siswa) AS total']);
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tampilSiswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambahData() {

		$data = [
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'id_kelas' => $this->input->post('kelas')
		];

		$this->db->insert('siswa', $data);
	}

	 public function tampilSiswaById($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
    }

    public function ubahData()
    {
        $data = [
            'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'id_kelas' => $this->input->post('kelas')
        ];

        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->where('id_siswa', $this->input->post('id'));
        $this->db->update('siswa', $data);
    }

    public function hapusSiswa($id)
    {
        $this->db->delete('siswa', ['id_siswa' => $id]);
    }

	// public function get_mahasiswa_id($id)
	// {
	// 	$query = $this->db->get_where('mahasiswa', array('nim' => $id));
	// 	$mahasiswa = $query->row();

	// 	$tanggal_pisah = explode('-', $mahasiswa->tanggal_lahir);
		
	// 	$data = array(
	// 		'nim' => $mahasiswa->nim,
	// 		'nama' => $mahasiswa->nama,
	// 		'jenis_kelamin' => $mahasiswa->jenis_kelamin,
	// 		'tanggal' => $tanggal_pisah[2],
	// 		'bulan' => $tanggal_pisah[1],
	// 		'tahun' => $tanggal_pisah[0],
	// 		'id_jurusan' => $mahasiswa->id_jurusan,
	// 		'id_kelas' => $mahasiswa->id_kelas
	// 	);

	// 	return $data;
	// }

	// public function edit_mahasiswa($id)
	// {
	// 	$tanggal = $this->input->post('tanggal');
	// 	$bulan = $this->input->post('bulan');
	// 	$tahun = $this->input->post('tahun');
	// 	$tanggal_lahir = $tahun."-".$bulan."-".$tanggal;

	// 	$data = array(
	// 		'nama' => $this->input->post('nama'),
	// 		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 		'tanggal_lahir' => $tanggal_lahir,
	// 		'id_jurusan' => $this->input->post('jurusan'),
	// 		'id_kelas' => $this->input->post('kelas')
	// 	);

	// 	$this->db->where('nim', $id);
	// 	$this->db->update('mahasiswa', $data);
	// }

	// public function delete_mahasiswa($id)
	// {
	// 	$this->db->delete('mahasiswa', array('nim' => $id));
	// }

	// public function get_mahasiswa_nim($nim)
	// {
	// 	$this->db->where('nim', $nim);
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.id_jurusan');
	// 	$this->db->join('kelas', 'kelas.id_kelas = mahasiswa.id_kelas');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	// public function password_default($id)
	// {
	// 	$query = $this->db->get_where('mahasiswa', array('nim' => $id));
	// 	$row = $query->row();

	// 	$tanggal_pisah = explode('-', $row->tanggal_lahir);
	// 	$password_default = md5($tanggal_pisah[2].$tanggal_pisah[1].$tanggal_pisah[0]);

	// 	$data = array(
	// 		'password' => $row->password,
	// 		'password_default' => $password_default
	// 	);

	// 	return $data;
	// }

	// public function ganti_password($id)
	// {
	// 	$get_paslam = $this->db->get_where('mahasiswa', array('nim' => $id));
	// 	$row_paslam = $get_paslam->row();

	// 	$in_paslam = md5($this->input->post('password_lama'));

	// 	if ($row_paslam->password == $in_paslam) {
	// 		$pasbar = md5($this->input->post('password_baru'));

	// 		$this->db->where('nim', $id);
	// 		$this->db->update('mahasiswa', array('password' => $pasbar));

	// 		return TRUE;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }

	// public function get_nilai($id)
	// {
	// 	$this->db->where('nim', $id);
	// 	$this->db->select('nilai.*, dosen.nama, matakuliah.*');
	// 	$this->db->from('nilai');
	// 	$this->db->join('matakuliah', 'matakuliah.id_matakuliah = nilai.id_matakuliah');
	// 	$this->db->join('dosen', 'dosen.id_dosen = nilai.id_dosen');
	// 	$query = $this->db->get();

	// 	$i=0;
	// 	foreach ($query->result() as $result) {
	// 		$bobot = NULL;
	// 		$mutu = NULL;

	// 		switch ($result->nilai) {
	// 			case 'A':
	// 				$bobot = 4;
	// 				$mutu = $bobot * $result->sks;
	// 				break;
	// 			case 'B':
	// 				$bobot = 3;
	// 				$mutu = $bobot * $result->sks;
	// 				break;
	// 			case 'C':
	// 				$bobot = 2;
	// 				$mutu = $bobot * $result->sks;
	// 				break;
	// 			case 'D':
	// 				$bobot = 1;
	// 				$mutu = $bobot * $result->sks;
	// 				break;
	// 			case 'E':
	// 				$bobot = 0;
	// 				$mutu = $bobot * $result->sks;
	// 				break;
	// 		}

	// 		$data[$i] = array(
	// 			'matakuliah' => $result->matakuliah,
	// 			'sks' => $result->sks,
	// 			'dosen' => $result->nama,
	// 			'nilai' => $result->nilai,
	// 			'bobot' => $bobot,
	// 			'mutu' => $mutu
	// 		);

	// 		$nilai[$i] = (object) $data[$i];

	// 		$i++;
	// 	}

	// 	return $nilai;
	// }

	// public function get_ipk($id)
	// {
	// 	$this->db->where('nim', $id);
	// 	$this->db->select('nilai.nilai, matakuliah.sks');
	// 	$this->db->from('nilai');
	// 	$this->db->join('matakuliah', 'matakuliah.id_matakuliah = nilai.id_matakuliah');
	// 	$query = $this->db->get();
	// 	$result = $query->result();

	// 	$mutu = 0;
	// 	$sks = 0;

	// 	foreach ($result as $nilai) {
	// 		switch ($nilai->nilai) {
	// 			case 'A':
	// 				$mutu = $mutu + ($nilai->sks * 4);
	// 				$sks = $sks + $nilai->sks;
	// 				break;
	// 			case 'B':
	// 				$mutu = $mutu + ($nilai->sks * 3);
	// 				$sks = $sks + $nilai->sks;
	// 				break;
	// 			case 'C':
	// 				$mutu = $mutu + ($nilai->sks * 2);
	// 				$sks = $sks + $nilai->sks;
	// 				break;
	// 			case 'D':
	// 				$mutu = $mutu + ($nilai->sks * 1);
	// 				$sks = $sks + $nilai->sks;
	// 				break;
	// 			case 'E':
	// 				$mutu = $mutu + ($nilai->sks * 0);
	// 				$sks = $sks + $nilai->sks;
	// 				break;
	// 		}
	// 	}

	// 	$ipk = $mutu / $sks;
	// 	$data = array(
	// 		'mutu' => $mutu,
	// 		'sks' => $sks,
	// 		'ipk' => $ipk
	// 	);
	// 	return $data;
	// }
}