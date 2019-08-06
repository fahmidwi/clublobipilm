<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

	public function peserta()
	{
		$this->load->library('mypdf');
		$data['data'] = array(
			['nama_sekolah'	=>	'SMK ADI SANGGORO', 'name'=>'example name 1'],
			['judul'		=>	'Tau aH', 'name'=>'example name 2'],
			['genre'		=>	'Action', 'name'=>'example name 3']
		);
		$this->mypdf->generate('laporan/peserta', $data);
	}
	public function anggota()
	{
		$this->load->library('mypdf');
		$data['data'] = array(
			['nama_sekolah'	=>	'SMK ADI SANGGORO', 'name'=>'example name 1'],
			['judul'		=>	'Tau aH', 'name'=>'example name 2'],
			['genre'		=>	'Action', 'name'=>'example name 3']
		);
		$this->mypdf->generate('laporan/anggota', $data);
	}
}

 ?>