<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Visi_model');
		$this->load->model('Misi_model');
		$this->session->keep_flashdata('message');
	}

	public function index()
	{
		$data['title'] = 'Dasboard';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function visi()
	{
		$data['title'] = 'Visi';
		$data['visi'] = $this->Visi_model->getAllVisi();
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/visi-misi/visi/visi', $data);
		$this->load->view('templates/footer');
	}

	public function ubahVisi($id)
	{
		$data['title'] = 'Ubah Visi';
		$data['visi'] = $this->Visi_model->getVisiById($id);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('visi', 'Visi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/visi-misi/visi/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Visi_model->ubahDataVisi();
			$this->session->set_flashdata('visi', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('admin/visi');
		}
	}

	// Misi
	public function misi()
	{
		$data['title'] = 'Misi';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['misi'] = $this->Misi_model->getAllMisi();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/visi-misi/misi/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title']		= 'Detail Misi';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['misi']		= $this->Misi_model->getMisiById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/visi-misi/misi/detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Data';
		$data['misi'] = $this->Misi_model->getAllMisi();
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('no', 'No', 'required');
		$this->form_validation->set_rules('misi', 'Misi', 'required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/visi-misi/misi/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Misi_model->tambahDataMisi();
			$this->session->set_flashdata('flash', ' ditambah');
			redirect('admin/visi-misi/misi');
		}
	}

	public function hapus($id)
	{
		$this->Misi_model->hapusDataMisi($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/misi');
	}

	public function ubahMisi($id)
	{
		$data['title'] = 'Ubah Misi';
		$data['misi'] = $this->Misi_model->getMisiById($id);
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('no', 'Urutan ke', 'required');
		$this->form_validation->set_rules('misi', 'Misi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/visi-misi/misi/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Misi_model->ubahDataMisi();
			$this->session->set_flashdata('misi', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('admin/misi');
		}
	}

	// Misi
	public function program()
	{
		$data['title'] = 'Halaman Program Unggulan';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['program'] = $this->Misi_model->getAllProgram();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/visi-misi/program/index', $data);
		$this->load->view('templates/footer');
	}

	public function detailProgram($id)
	{
		$data['title']		= 'Halaman Detail Program';
		$data['user']		= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['program']		= $this->Misi_model->getProgramById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/visi-misi/program/detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambahProgram()
	{
		$data['title'] = 'Halaman Tambah Data Program';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('no', 'No', 'required');
		$this->form_validation->set_rules('program', 'Program', 'required');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/visi-misi/program/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			$this->Misi_model->tambahDataProgram();
			$this->session->set_flashdata('program', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('admin/program');
		}
	}

	public function ubahProgram($id)
	{
		$data['title'] = 'Halaman Ubah Program';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['program'] = $this->Misi_model->getProgramById($id);

		$this->form_validation->set_rules('no', 'Urutan ke', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/visi-misi/program/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Misi_model->ubahDataProgram();
			$this->session->set_flashdata('program', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
			redirect('admin/program');
		}
	}

	public function hapusProgram($id)
	{
		$this->Misi_model->hapusDataProgram($id);
		$this->session->set_flashdata('program', '<div class="alert alert-success" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
		redirect('admin/program');
	}
}