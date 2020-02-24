<?php

class Berita_model extends CI_model
{
	// Tabel
	private $_berita = "berita";

	// Field
	public $id = "id";

	public function getAllBerita()
	{
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('berita')->result_array();
	}

	public function getBeritaById($id)
	{
		return $this->db->get_where($this->_berita, ["id" => $id])->row();
	}

	// Untuk Web Berita
	public function getBeritaWebById($id)
	{
		return $this->db->get_where('berita', ["id" => $id])->row_array();
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

	public function tambahDataBerita()
	{
		$data = [
			'judul'			=> htmlspecialchars($this->input->post('judul', true)),
			'deskripsi'		=> htmlspecialchars($this->input->post('deskripsi')),
			'gambar'		=> $this->_uploadImage(),
			'date_created'	=> time()
		];
		$this->db->insert('berita', $data);
	}

	public function hapusBerita($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_berita, array("id" => $id));
	}

	private function _deleteImage($id)
	{
		$berita = $this->getBeritaById($id);
		if ($berita->gambar[0] != "default.jpg") {
			// $path	= './assets/img/berita/';
			// unlink($path . $berita->gambar);
			$fileName = explode(".", $berita->gambar)[0];
			return array_map('unlink', glob(FCPATH . "assets/img/berita/$fileName.*"));
		}
	}

	public function ubahDataBerita()
	{
		$post				= $this->input->post();
		$this->id			= $post['id'];
		$this->judul		= $post['judul'];
		$this->deskripsi	= $post['deskripsi'];

		if (!empty($_FILES["gambar"]["name"])) {
			// $this->gambar = $this->hapusBerita();
			$this->gambar = $this->_uploadImage();
			$fileName = explode(".", $_FILES["gambar"]["name"]);
			unlink(FCPATH . "assets/img/berita/" . $post['old_image']);
		} else {
			$this->gambar = $post['old_image'];
		}
		return $this->db->update($this->_berita, $this, array('id' => $post['id']));
	}

	private function _uploadImage()
	{
		$ama_gambar = $_FILES['gambar']['name'];

		$config['upload_path']		= './assets/img/berita/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['file_name']		= time();
		$config['overwrite']		= true;
		$config['max_size']			= 10048;
		$config['file_ext_tolower']	= true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}
}