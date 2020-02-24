<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data['slider'] = $this->Home_model->getAllSlider();
		$data['berita'] = $this->Home_model->getAllBerita();

		// Arsip berita
		$data['berita'] = $this->Home_model->getAllBerita();

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/index', $data);
		$this->load->view('templates-web/footer', $data);
	}
}