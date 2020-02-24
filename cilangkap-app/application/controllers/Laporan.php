<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Laporan_model');
	}

	// Anggaran
	public function index()
	{
		$data['title']	= 'Halaman Anggaran';
		$data['user']	= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['anggaran']		= $this->Laporan_model->getAllAnggaran();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlah_data();
		$config['base_url'] = base_url() . 'laporan/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

		$config['first_link']       = 'Pertama';
		$config['last_link']        = 'Terakhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['anggaran'] = $this->Laporan_model->data($config['per_page'], $from);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/anggaran/index', $data);
		$this->load->view('templates/footer');
	}

	public function download($id)
	{
		if (!empty($id)) {
			$this->load->helper('download');
			$this->Laporan_model->getAnggaranById($id);
			$file = './assets/document/anggaran/' . $id;
			force_download($file, NULL);
			redirect('laporan');
		} else {
			$this->session->set_flashdata('download', '<div class="alert alert-success" role="alert"><strong>Gambar Kosong!</strong></div>');
			redirect('laporan');
		}
	}

	public function tambah()
	{
		$data['title']		= 'Halaman Form Tambah Data Anggaran';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_anggaran', 'Nama', 'required', [
			'required' => 'Nama harus diisi!'
		]);
		$this->form_validation->set_rules('skpd', 'Laporan SKPD', 'required', [
			'required' => 'Laporan harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/anggaran/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Laporan_model->tambahDataAnggaran();
			$this->session->set_flashdata('anggaran', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Ditambahkan!</strong></div>');
			redirect('laporan');
		}
	}

	public function ubah($id)
	{
		$data['title']		= 'Halaman Ubah Data';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data["anggaran"]		= $this->Laporan_model->getAnggaranById($id);

		$this->form_validation->set_rules('nama_anggaran', 'Nama', 'required');
		$this->form_validation->set_rules('skpd', 'SKPD', 'required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/anggaran/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Laporan_model->ubahDataAnggaran();
			$this->session->set_flashdata('anggaran', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('laporan');
		}
	}

	public function hapus($id)
	{
		$this->Laporan_model->hapusAnggaran($id);
		$this->session->set_flashdata('anggaran', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
		redirect('laporan');
	}

	// Kepegawaian
	public function pegawai()
	{
		$data['title']	= 'Halman Kepegawaian';
		$data['user']	= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// $data['kepegawaian']		= $this->Laporan_model->getAllPegawai();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlahDataPegawai();
		$config['base_url'] = base_url() . 'laporan/pegawai';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

		$config['first_link']       = 'Pertama';
		$config['last_link']        = 'Terakhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['kepegawaian'] = $this->Laporan_model->dataPegawai($config['per_page'], $from);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/kepegawaian/pegawai', $data);
		$this->load->view('templates/footer');
	}

	public function tambahPegawai()
	{
		$data['title']		= 'Halman Form Tambah Data Pegawai';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/kepegawaian/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Laporan_model->tambahDataPegawai();
			$this->session->set_flashdata('pegawai', '<div class="alert alert-success" role="alert">Data <strong>Pegawai Berhasil Ditambahkan!</strong></div>');
			redirect('laporan/pegawai');
		}
	}

	public function ubahPegawai($id)
	{
		$data['title']				= 'Halman Form Ubah Data';
		$data['user']				= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data["kepegawaian"]		= $this->Laporan_model->getPegawaiById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/kepegawaian/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Laporan_model->ubahDataPegawai();
			$this->session->set_flashdata('pegawai', '<div class="alert alert-success" role="alert">Data <strong>Pegawai Berhasil Diubah!</strong></div>');
			redirect('laporan/pegawai');
		}
	}

	public function hapusPegawai($id)
	{
		$this->Laporan_model->hapusKepegawaian($id);
		$this->session->set_flashdata('pegawai', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
		redirect('laporan/pegawai');
	}

	// Laporan Lain
	public function laporanLain()
	{
		$data['title']	= 'Halman Laporan lain-lain';
		$data['user']	= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// $data['laporanLain']		= $this->Laporan_model->getAlllaporanLain();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlahDataLaporanLain();
		$config['base_url'] = base_url() . 'laporan/laporanLain';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

		$config['first_link']       = 'Pertama';
		$config['last_link']        = 'Terakhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['laporanLain'] = $this->Laporan_model->dataLaporanLain($config['per_page'], $from);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/laporan/laporan-lain/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambahLaporan()
	{
		$data['title']		= 'Halman Form Tambah Data Anggaran';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama Laporan harus diisi!'
		]);
		$this->form_validation->set_rules('jenis', 'Jenis', 'required', [
			'required' => 'Jenis Laporan harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/laporan-lain/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Laporan_model->tambahDataLaporan();
			$this->session->set_flashdata('laporan-lain', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Ditambahkan!</strong></div>');
			redirect('laporan/laporanLain');
		}
	}

	public function downloadLaporan($id)
	{
		if (!empty($id)) {
			$this->load->helper('download');
			$this->Laporan_model->getLaporanLainById($id);
			$file = './assets/document/laporan-lain-lain/' . $id;
			force_download($file, NULL);
			redirect('laporan/laporanLain');
		} else {
			$this->session->set_flashdata('download', '<div class="alert alert-success" role="alert"><strong>Gambar Kosong!</strong></div>');
			redirect('laporan/laporanLain');
		}
	}

	public function ubahLaporan($id)
	{
		$data['title']		= 'Halman Ubah Data Laporan';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['laporanLain']		= $this->Laporan_model->getLaporanLainById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			// var_dump('aa');
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/laporan/laporan-lain/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			// var_dump('bbb');
			$this->Laporan_model->ubahDataLaporanLain();
			$this->session->set_flashdata('laporan-lain', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('laporan/laporanLain');
		}
	}

	public function hapusLaporan($id)
	{
		$this->Laporan_model->hapusLaporan($id);
		$this->session->set_flashdata('laporan-lain', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
		redirect('laporan/laporanLain');
	}
}