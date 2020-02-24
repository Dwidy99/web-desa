<?php

class Home_model extends CI_model
{
	// Slider
	public function getAllSlider()
	{
		return $this->db->get('profile')->row_array();
	}

	// Berita
	public function getAllBerita()
	{
		$this->db->limit(6);
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('berita')->result_array();
	}

	// Pagination
	function data($number, $offset)
	{
		$this->db->order_by('date_created', 'DESC');
		return $query = $this->db->get('berita', $number, $offset)->result_array();
	}

	public function jumlah_data()
	{
		return $this->db->get('berita')->num_rows();
	}
}