<?php

class Visi_model extends CI_model
{
	public function getAllVisi()
	{
		return $this->db->get('visi')->row_array();
	}

	public function getVisiById($id)
	{
		return $this->db->get_where('visi', ['id' => $id])->row_array();
	}

	public function ubahDataVisi()
	{
		$data = [
			"visi" => $this->input->post('visi', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('visi', $data);
	}
}