<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_model extends CI_Model {

	public function countMapel()
	{
		$this->db->select(['*','COUNT(id_mapel) AS total']);
		$this->db->from('mapel');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function tampilMapel()
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function tambahMapel()
    {
        $data = [
            "mapel" => htmlspecialchars($this->input->post('mapel', true))
        ];

        $this->db->insert('mapel', $data);
    }

    public function tampilMapelById($id)
    {
        return $this->db->get_where('mapel', ['id_mapel' => $id])->row_array();
    }

    public function ubahMapel()
    {
        $data = [
            "mapel" => htmlspecialchars($this->input->post('mapel', true))
        ];

        $this->db->where('id_mapel', $this->input->post('id'));
        $this->db->update('mapel', $data);
    }

    public function hapusMapel($id)
    {
        $this->db->delete('mapel', ['id_mapel' => $id]);
    }
}