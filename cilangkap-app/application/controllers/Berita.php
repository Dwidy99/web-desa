<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Berita_model');
	}

	public function index()
	{
		$data['title']	= 'Halaman Berita & Kegiatan';
		$data['user']	= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Berita_model->jumlah_data();
		$config['base_url'] = base_url() . 'berita/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;

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
		$data['berita'] = $this->Berita_model->data($config['per_page'], $from);

		// $data['berita']		= $this->Berita_model->getAllBerita();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/berita', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title']		= 'Halaman Detail Berita';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['berita']		= $this->Berita_model->getBeritaById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/berita/detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title']		= 'Halaman Tambah Berita';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('judul', 'Judul', 'required', [
			'required' => 'Judul harus diisi!'
		]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
			'required' => 'Deskripsi harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/berita/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Berita_model->tambahDataBerita();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Ditambahkan!</strong></div>');
			redirect('berita');
		}
	}

	public function ubah($id)
	{
		$data['title']		= 'Halaman Ubah Berita';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data["berita"]		= $this->Berita_model->getBeritaById($id);

		$this->form_validation->set_rules('judul', 'Judul', 'required', [
			'required' => 'Judul harus diisi!'
		]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
			'required' => 'Deskripsi harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/berita/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Berita_model->ubahDataBerita();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('berita');
		}
	}

	public function hapus($id)
	{
		$this->Berita_model->hapusBerita($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil <strong>Dihapus!</strong></div>');
		redirect('berita');
	}
}