<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Visi_model');
		$this->load->model('Misi_model');
		$this->load->model('Berita_model');
		$this->load->model('Laporan_model');
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data['visi'] = $this->Visi_model->getAllVisi();
		$data['misi'] = $this->Misi_model->getAllMisi();

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/profile/visi-misi', $data);
		$this->load->view('templates-web/footer', $data);
	}

	public function program()
	{
		$data['program'] = $this->Misi_model->getAllProgram();

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/profile/program-unggulan', $data);
		$this->load->view('templates-web/footer', $data);
	}

	// Berita Web
	public function berita()
	{
		$data['berita'] = $this->Berita_model->getAllBerita();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Home_model->jumlah_data();
		$config['base_url'] = base_url() . 'web/berita';
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
		$data['berita'] = $this->Home_model->data($config['per_page'], $from);

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/berita/berita', $data);
		$this->load->view('templates-web/footer', $data);
	}

	public function detailBerita($id)
	{
		$data['berita'] = $this->Berita_model->getBeritaWebById($id);

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/berita/detail', $data);
		$this->load->view('templates-web/footer', $data);
	}

	// Laporan
	public function anggaran()
	{
		$data['anggaran'] = $this->Laporan_model->getAllAnggaran();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlah_data();
		$config['base_url'] = base_url() . 'web/anggaran';
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

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/laporan/anggaran', $data);
		$this->load->view('templates-web/footer', $data);
	}

	public function kepegawaian()
	{
		$data['kepegawaian'] = $this->Laporan_model->getAllpegawai();

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlahDataPegawai();
		$config['base_url'] = base_url() . 'web/kepegawaian';
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

		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/laporan/kepegawaian', $data);
		$this->load->view('templates-web/footer', $data);
	}

	public function laporanLain()
	{

		// Paggination
		$this->load->library('pagination');
		$jumlah_data = $this->Laporan_model->jumlahDataLaporanLain();
		$config['base_url'] = base_url() . 'web/laporanLain';
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


		$this->load->view('templates-web/header', $data);
		$this->load->view('templates-web/topbar', $data);
		$this->load->view('cilangkap/laporan/laporan-lain', $data);
		$this->load->view('templates-web/footer', $data);
	}
}