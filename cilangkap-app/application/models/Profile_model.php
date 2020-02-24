<?php

class Profile_model extends CI_model
{
	// Tabel
	private $_profile = "profile";

	// Field
	public $id = "id";

	public function getAllSlider()
	{
		return $this->db->get('profile')->row_array();
	}

	public function getSliderById($id)
	{
		return $this->db->get_where($this->_profile, ["id" => $id])->row_array();
	}

	public function ubahDataSlider()
	{
		$post				= $this->input->post();
		$this->id			= $post['id'];

		if (!empty($_FILES["gambar"]["name"])) {
			// var_dump('dd');
			// die;
			$this->gambar = $this->_uploadImage();
			// $fileName = explode(".", $_FILES["gambar"]["name"]);
			unlink(FCPATH . "assets/img/slider/" . $post['old_gambar']);
		} else {
			$this->gambar = $post['old_gambar'];
		}
		return $this->db->update($this->_profile, $this, array('id' => $post['id']));
	}

	private function _uploadImage()
	{
		var_dump('cc');
		$config['upload_path']		= './assets/img/slider/';
		$config['allowed_types']	= 'jpg|png|JPG|PNG|JPEG';
		$config['file_name']		= rand();
		$config['overwrite']		= true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			// var_dump('aa');
			// die;
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}
}