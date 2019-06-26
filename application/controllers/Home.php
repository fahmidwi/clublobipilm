<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_clp', 'mclp');
	}

	public function index()
	{
		$data['slideshows'] = $this->mclp->getData('tb_slideshows','id_slide')->result();
		$data['proker'] = $this->mclp->getData('tb_proker','id_proker')->result();
		$data['berita'] = $this->mclp->getBeritaAtHome();
		$data['favberita'] = $this->mclp->getBeritaFavorite()->result();
		$data['karya'] = $this->mclp->getAllKarya(null,null)->result();
		$this->load->view('index',$data);
	}
	public function pendaftaran()
	{
		$this->load->view('pendaftaran');
	}
	public function infoProker($id,$uri)
	{
		$judul = str_replace('-',' ',$uri);
		$data['infoproker'] = $this->mclp->getProker($id,$judul)->row();
		$data['proker'] = $this->mclp->getData('tb_proker','id_proker')->result();
		$this->load->view('infoProker',$data);
	}
	public function infoEvent()
	{
		$this->load->view('infoEvent');
	}
	public function karya()
	{
		$genre = $this->input->get('genre');
		$tahun_upload = $this->input->get('tahun');
		$data['tag_genre'] = $genre;
		$data['tag_tahun_upload'] = $tahun_upload;
		$data['karya'] = $this->mclp->getAllKarya($genre,$tahun_upload)->result();
		$data['genre'] = $this->mclp->getData('tb_genre','id_genre')->result();
		$this->load->view('karya',$data);
	}
	public function dk($id,$uri)
	{
		$this->mclp->updateData('tb_karya',array('flg_new' => 1),array('id_karya' => $id));
		$judul = str_replace('-',' ',$uri);
		$data['dk'] = $this->mclp->getDetailKarya($judul,$id)->row();
		$this->load->view('detail_karya',$data);
	}
	public function tentangKami()
	{
		$this->load->view('tentangkami');
	}
	public function berita($startpage)
	{
		$data['berita'] = $this->mclp->getBeritaAll(3,$startpage)->result();
		$data['favberita'] = $this->mclp->getBeritaFavorite()->result();

		$totaldata = count($this->mclp->getData('tb_berita','id_berita')->result());

		$nextpage = $startpage + 3;
		$prevpage = $startpage - 3;
		
		if($prevpage >= 0){
			$data['prev'] = "<li class='page-item'><a class='page-link' href='".base_url('Home/berita/'.$prevpage)."'>&laquo; Berita sebelumnya </a></li>";
		}else{
			$data['prev'] = "";
		}

		if ($nextpage > $totaldata) {
			$data['next'] = "";
		}else{
			$data['next'] = "<li class='page-item'><a class='page-link' href='".base_url('Home/berita/'.$nextpage)."'>Berita Selanjutnya &raquo;</a></li>";
		}

		// echo "next : ".$nextpage."<br>";
		// echo "prev : ".$prevpage."<br>";
		// echo "sisa : ".$data['sisadata']."<br>";

		// print_r($data['berita']);
		// die();

		$this->load->view('berita',$data);
	}
	
	public function db($id_berita,$keyjudul)
	{
		$getView = $this->mclp->getWhere('tb_berita',array('id_berita' => $id_berita))->row();
		$viewNew = $getView->view + 1;
		$this->mclp->updateData('tb_berita',array('view' => $viewNew),array('id_berita' => $id_berita));
		$judul = str_replace('-',' ',$keyjudul);
		$data['detail'] = $this->mclp->getDetailBerita($id_berita,$judul)->row();
		$data['berita'] = $this->mclp->getBeritaAtHome();
		$this->load->view('detail_berita',$data);
	}

	public function hubkami()
	{
		$nama = $this->input->post('nama');  	
		$email = $this->input->post('email');  	
		$subjek = $this->input->post('subjek');  	
		$pesan = $this->input->post('pesan'); 
		
		$scret_key = '6LcjjKoUAAAAAOLRGjUH3tksCAsByqha7YapUV5m';
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
		$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scret_key.'&response='.$recaptchaResponse);
		$response = json_decode($verify);
		if ($response->success) {
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'subjek' => $subjek,
				'pesan' => $pesan
				
			);
			$this->mclp->inputdata('tb_hubkami',$data);
			$this->session->set_flashdata('pesan','Berhasil mengirim pertanyaan');
			redirect(base_url('home/index#contact'));
		}else{
			echo "<pre>";
			print_r($response);
			echo "<pre>";
		}
	}

	public function pedaftaran()
	{
		$nama = "fahmi dwi s";
		$nama = "fahmi dwi s";
		$nama = "fahmi dwi s";
		$nama = "fahmi dwi s";
		$nama = "fahmi dwi s";
	}

	public function test()
	{

	}
}
