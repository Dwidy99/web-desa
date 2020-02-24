<?php

class Laporan_model extends CI_model
{
	// Tabel
	private $_anggaran = "anggaran";

	// Field
	public $id = "id";

	// Anggaran
	public function getAllAnggaran()
	{
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('anggaran')->result_array();
	}

	public function getAnggaranById($id)
	{
		return $this->db->get_where('anggaran', ["id" => $id])->row_array();
	}

	function data($number, $offset)
	{
		$this->db->order_by('date_created', 'DESC');
		return $query = $this->db->get('anggaran', $number, $offset)->result_array();
	}

	public function jumlah_data()
	{
		return $this->db->get('anggaran')->num_rows();
	}

	public function tambahDataAnggaran()
	{
		$data = [
			'nama_anggaran'			=> htmlspecialchars($this->input->post('nama_anggaran', true)),
			'tahun'					=> htmlspecialchars($this->input->post('tahun', true)),
			'date_created'			=> time(),
			'skpd'					=> strtoupper($this->input->post('skpd', true)),
			'document'				=> $this->_uploadFile()
		];
		$this->db->insert('anggaran', $data);
	}

	public function ubahDataAnggaran()
	{
		$post					= $this->input->post();
		$this->id				= htmlspecialchars($post['id'], true);
		$this->nama_anggaran	= htmlspecialchars($post['nama_anggaran'], true);
		$this->tahun			= htmlspecialchars($post['tahun'], true);
		$this->date_created		= time();
		$this->skpd				= strtoupper($this->input->post('skpd', true));

		if (!empty($_FILES["document"]["name"])) {
			$this->document = $this->_uploadFile();
			$fileName = explode(".", $_FILES["document"]["name"]);
			unlink(FCPATH . "assets/document/anggaran/" . $post['old_document']);
		} else {
			$this->document = $post['old_document'];
		}
		return $this->db->update('anggaran', $this, array('id' => $post['id']));
	}

	private function _uploadFile()
	{
		$config['upload_path']		= './assets/document/anggaran/';
		$config['allowed_types']	= 'jpg|png|JPG|PNG|JPEG|pdf|xlsx|xls|docx|doc';
		$config['file_name']		= rand();
		$config['overwrite']		= true;
		$config['remove_space']		= true;
		$config['max_size']			= 10048;
		$config['file_ext_tolower']	= true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('document')) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}

	public function hapusAnggaran($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_anggaran, array("id" => $id));
	}

	private function _deleteFile($id)
	{
		$anggaran = $this->getAnggaranById($id);
		if ($anggaran['document'][0] != "default.jpg") {
			$fileName = explode(".", $anggaran['document'])[0];
			return array_map('unlink', glob(FCPATH . "assets/document/anggaran/$fileName.*"));
		}
	}

	// Kepegawaian
	public function getAllpegawai()
	{
		return $this->db->get('kepegawaian')->result_array();
	}

	public function getPegawaiById($id)
	{
		return $this->db->get_where('kepegawaian', ["id" => $id])->row_array();
	}

	function dataPegawai($number, $offset)
	{
		return $query = $this->db->get('kepegawaian', $number, $offset)->result_array();
	}

	public function jumlahDataPegawai()
	{
		return $this->db->get('kepegawaian')->num_rows();
	}

	public function tambahDataPegawai()
	{
		$data = [
			'nama'			=> htmlspecialchars($this->input->post('nama', true)),
			'jabatan'		=> htmlspecialchars($this->input->post('jabatan', true)),
			'alamat'		=> htmlspecialchars($this->input->post('alamat', true)),
			'telepon'		=> htmlspecialchars($this->input->post('telepon', true)),
		];
		$this->db->insert('kepegawaian', $data);
	}

	public function ubahDataPegawai()
	{
		$data = [
			'nama'			=> htmlspecialchars($this->input->post('nama', true)),
			'jabatan'		=> htmlspecialchars($this->input->post('jabatan', true)),
			'alamat'		=> htmlspecialchars($this->input->post('alamat', true)),
			'telepon'		=> htmlspecialchars($this->input->post('telepon', true)),
		];

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('kepegawaian', $data);
	}

	public function hapusKepegawaian($id)
	{
		return $this->db->delete('kepegawaian', array("id" => $id));
	}

	// Laporan Lain - lain
	public function getAlllaporanLain()
	{
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('laporan-lain')->result_array();
	}

	public function getLaporanLainById($id)
	{
		return $this->db->get_where('laporan-lain', ["id" => $id])->row_array();
	}

	// Pagination
	function dataLaporanLain($number, $offset)
	{
		$this->db->order_by('date_created', 'DESC');
		return $query = $this->db->get('laporan-lain', $number, $offset)->result_array();
	}

	public function jumlahDataLaporanLain()
	{
		return $this->db->get('laporan-lain')->num_rows();
	}

	public function tambahDataLaporan()
	{
		$data = [
			'nama'					=> htmlspecialchars($this->input->post('nama', true)),
			'tahun'					=> htmlspecialchars($this->input->post('tahun', true)),
			'date_created'			=> time(),
			'jenis'					=> strtoupper($this->input->post('jenis', true)),
			'document'				=> $this->_uploadFileLaporan()
		];
		$this->db->insert('laporan-lain', $data);
	}

	private function _uploadFileLaporan()
	{
		$config['upload_path']		= './assets/document/Laporan-lain-lain/';
		$config['allowed_types']	= 'jpg|png|JPG|PNG|JPEG|pdf|xlsx|xls|docx|doc';
		$config['file_name']		= rand();
		$config['overwrite']		= true;
		$config['max_size']			= 10048;
		$config['file_ext_tolower']	= true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('document')) {
			return $this->upload->data("file_name");
		}
		return "default.jpg";
	}

	public function ubahDataLaporanLain()
	{
		$post					= $this->input->post();
		$this->id				= htmlspecialchars($post['id'], true);
		$this->nama				= htmlspecialchars($post['nama'], true);
		$this->tahun			= htmlspecialchars($post['tahun'], true);
		$this->date_created		= time();
		$this->jenis			= strtoupper($this->input->post('jenis', true));

		if (!empty($_FILES["document"]["name"])) {
			$this->document = $this->_uploadFileLaporan();
			$fileName = explode(".", $_FILES["document"]["name"]);
			unlink(FCPATH . "assets/document/laporan-lain-lain/" . $post['old_document']);
		} else {
			$this->document = $post['old_document'];
		}
		return $this->db->update('laporan-lain', $this, array('id' => $post['id']));
	}

	public function hapusLaporan($id)
	{
		$this->_deleteFileLaporan($id);
		return $this->db->delete('laporan-lain', array("id" => $id));
	}

	private function _deleteFileLaporan($id)
	{
		$laporanLain = $this->getlaporanLainById($id);
		if ($laporanLain['document'][0] != "default.jpg") {
			$fileName = explode(".", $laporanLain['document'])[0];
			return array_map('unlink', glob(FCPATH . "assets/document/laporan-lain-lain/$fileName.*"));
		}
	}
}