<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function countKelas()
	{
		$this->db->select(['*','COUNT(id_kelas) AS total']);
		$this->db->from('kelas');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function tampilKelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function tambahKelas()
    {
        $data = [
            "kelas" => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->insert('kelas', $data);
    }

    public function tampilKelasById($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }

    public function ubahKelas()
    {
        $data = [
            "kelas" => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->where('id_kelas', $this->input->post('id'));
        $this->db->update('kelas', $data);
    }

    public function hapusKelas($id)
    {
        $this->db->delete('kelas', ['id_kelas' => $id]);
    }
}