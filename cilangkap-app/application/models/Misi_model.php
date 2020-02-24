<?php

class Misi_model extends CI_model
{
	public function getAllMisi()
	{
		return $this->db->get('misi')->result_array();
	}

	public function getMisiById($id)
	{
		return $this->db->get_where('misi', ['id' => $id])->row_array();
	}

	public function tambahDataMisi()
	{
		$data = [
			"no"	=> $this->input->post('no', true),
			"misi"	=> $this->input->post('misi', true)
		];

		$this->db->insert('misi', $data);
		redirect('admin/misi');
	}

	public function hapusDataMisi($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('misi');
	}

	public function ubahDataMisi()
	{
		$data = [
			"no" => $this->input->post('no', true),
			"misi" => $this->input->post('misi', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('misi', $data);
	}

	// Program
	public function getAllProgram()
	{
		return $this->db->get('program')->result_array();
	}

	public function getProgramById($id)
	{
		return $this->db->get_where('program', ['id' => $id])->row_array();
	}

	public function tambahDataProgram()
	{
		$data = [
			"no"		=> $this->input->post('no', true),
			"deskripsi"	=> $this->input->post('program', true)
		];

		$this->db->insert('program', $data);
	}

	public function ubahDataProgram()
	{
		$data = [
			"no" 		=> $this->input->post('no', true),
			"deskripsi" => $this->input->post('deskripsi', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('program', $data);
	}

	public function hapusDataProgram($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('program');
	}
}