<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('backend/index');
	}
	public function data_peserta()
	{
		$this->load->view('backend/data/data_peserta');
	}
	public function data_slideshow()
	{
		$this->load->view('backend/data/data_slideshow');
	}
	public function data_visi()
	{
		$this->load->view('backend/data/data_visi');
	}
	public function data_misi()
	{
		$this->load->view('backend/data/data_misi');
	}
	public function data_sejarah()
	{
		$this->load->view('backend/data/data_sejarah');
	}
	public function data_proker()
	{
		$this->load->view('backend/data/data_proker');
	}
	public function data_berita()
	{
		$this->load->view('backend/data/data_berita');
	}
	public function data_genre()
	{
		$this->load->view('backend/data/data_genre');
	}
	public function data_karyaanggota()
	{
		$this->load->view('backend/data/data_karyaanggota');
	}
	public function data_user()
	{
		$this->load->view('backend/data/data_user');
	}
	public function tambahdata_peserta()
	{
		$this->load->view('backend/form/tambahdata_peserta');
	}
	public function tambahdata_genre()
	{
		$this->load->view('backend/form/tambahdata_genre');
	}
	public function tambahdata_slideshow()
	{
		$this->load->view('backend/form/tambahdata_slideshow');
	}
	public function tambahdata_visi()
	{
		$this->load->view('backend/form/tambahdata_visi');
	}
	public function tambahdata_misi()
	{
		$this->load->view('backend/form/tambahdata_misi');
	}
	public function tambahdata_sejarah()
	{
		$this->load->view('backend/form/tambahdata_sejarah');
	}
	public function tambahdata_proker()
	{
		$this->load->view('backend/form/tambahdata_proker');
	}
	public function tambahdata_berita()
	{
		$this->load->view('backend/form/tambahdata_berita');
	}
		public function tambahdata_karyaanggota()
	{
		$this->load->view('backend/form/tambahdata_karyaanggota');
	}
	public function tambahdata_user()
	{
		$this->load->view('backend/form/tambahdata_user');
	}

}
