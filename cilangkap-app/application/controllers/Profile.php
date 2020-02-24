<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$data['title'] = 'Banner Profile Desa Cilangkap';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['slider'] = $this->Profile_model->getAllSlider();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/pic-fronted/profile/index', $data);
		$this->load->view('templates/footer');
	}

	public function ubahSlider()
	{
		$data['title'] = 'Ubah 
		Banner Profile Desa Cilangkap';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->helper('form');


		$data['slider'] = $this->Profile_model->getSliderById($_POST["id"]);

		// $this->form_validation->set_rules('gambar', 'gambar', 'required');

		if (empty($_FILES['gambar']['name'])) {
			# code...
			// var_dump($_POST["id"]);
			// var_dump($_FILES["gambar"]);
			// var_dump($_FILES["lol"]);
			// var_dump($_POST["old_gambar"]);
			// die;
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/pic-fronted/profile/index', $data);
			$this->load->view('templates/footer');
		} else {
			# code...
			var_dump('ee');
			$this->Profile_model->ubahDataSlider();
			$this->session->set_flashdata('slider', '<div class="alert alert-success" role="alert">Gambar <strong>Berhasil Diubah!</strong></div>');
			redirect('profile');
		}
	}
}