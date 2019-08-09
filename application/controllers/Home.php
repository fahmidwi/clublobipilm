<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_clp', 'mclp');
		$this->load->model('Model_dashClp', 'mdclp');
	}

	public function index()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$data['slideshows'] = $this->mclp->getData('tb_slideshows','id_slide')->result();
		$data['proker'] = $this->mclp->getData('tb_proker','id_proker')->result();
		$data['berita'] = $this->mclp->getBeritaAtHome();
		$data['favberita'] = $this->mclp->getBeritaFavorite()->result();
		$data['karya'] = $this->mclp->getAllKarya(null,null,null)->result();
		$data['sejarah'] = $this->db->like('tb_artikel_statis.title','Sejarah Club Lobi Pilm')->get('tb_artikel_statis')->row();
		$this->load->view('index',$data);
	}
	
	public function infoProker($id,$uri)
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
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
		$genre;
		$tahun_upload;
		$starpage;
		
		$genre = $this->input->get('genre');
		$tahun_upload = $this->input->get('tahun');
		$starpage = $this->input->get('next');

		if ($starpage == "") {
			$starpage = 0;
		}else{
			$starpage = $starpage;
		}

		if ($genre == "") {
			$genre = 'SEMUA';
		}else{
			$genre = $genre;
		}

		if ($tahun_upload == "") {
			$tahun_upload = date('Y');
		}else{
			$tahun_upload = $tahun_upload;
		}

		$data['tag_genre'] = $genre;
		$data['tag_tahun_upload'] = $tahun_upload;
		$data['karya'] = $this->mclp->getAllKarya($genre,$tahun_upload,$starpage)->result();
		$jum = $this->mclp->getAllKarya($genre,$tahun_upload,$starpage)->num_rows();
		$data['genre'] = $this->mclp->getData('tb_genre','id_genre')->result();

		

		$totaldata = count($this->mclp->getData('tb_karya','id_karya')->result());

		$nextpage = $starpage + 12;
		$prevpage = $starpage - 12;


		$linkprev = base_url('Home/karya?next='.$prevpage.'&genre='.$genre.'&tahun='.$tahun_upload);
		$linknext = base_url('Home/karya?next='.$nextpage.'&genre='.$genre.'&tahun='.$tahun_upload);
		if($prevpage >= 0){
			$data['prev'] = "<li class='page-item'><a class='page-link' href='".$linkprev."'>&laquo;sebelumnya </a></li>";
		}else{
			$data['prev'] = "";
		}

		if ($nextpage >= $totaldata) {
			$data['next'] = "";
		}else{
			$data['next'] = "<li class='page-item'><a class='page-link' href='".$linknext."'>Selanjutnya &raquo;</a></li>";
		}
		// echo $starpage.'<br>';
		// echo $tahun_upload.'<br>';
		// echo $genre.'<br>';
		// print_r($data['karya']);die();
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		if ($jum==0) {
			$this->load->view('tidakadakarya',$data);
			return;
		}
		$this->load->view('karya',$data);
	}
	public function dk($id,$uri)
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$this->mclp->updateData('tb_karya',array('flg_new' => 1),array('id_karya' => $id));
		$judul = str_replace('-',' ',$uri);
		$data['dk'] = $this->mclp->getDetailKarya($judul,$id)->row();
		$this->load->view('detail_karya',$data);
	}
	public function tentangKami()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$data['sejarah'] = $this->db->like('tb_artikel_statis.title','Sejarah Club Lobi Pilm')->get('tb_artikel_statis')->row();
		$data['statis'] = $this->mclp->getData('tb_artikel_statis','id_artikel_statis')->result();
		$this->load->view('tentangkami',$data);
	}
	public function berita()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$startpage = $this->uri->segment(3);
		if ($startpage == "") {
			echo "not falid url";
			return;
		}
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

		if ($nextpage >= $totaldata) {
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
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
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

	public function pendaftaran()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$data['settings'] = $this->mclp->getData('settings','id_settings')->row();
		// if ($data['settings']->bukaDaftar == date('Y-m-d')) {
		// 	echo "Ya buka";
		// } else if($data['settings']->tutupDaftar == '2019-07-10'){
		// 	echo "Tutup";
		// }
		//die();
		$data['genre'] = $this->mclp->getData('tb_genre','id_genre')->result();
		
		$where = array(
			'flg_konfirmasi' => 1,
			'indiefestKe' => $data['settings']->indiefestKe
		);
		
		$data['terdaftar'] = $this->mclp->getWhere('tb_registrasi',$where)->result();
		$this->load->view('pendaftaran',$data);
	}

	public function prosesPedaftaran()
	{
		$file 			= $_FILES['file_poster']['name'];
		$pisah 			= explode(".",$file);
		$ext 			= end($pisah);
		$rename 		= date("YmdHis");
		$nama_file 		= $rename.".".$ext;

		$config['upload_path']	 = './assets/backend/img/poster_regis';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['file_name']  	 = 'REGIS_'.$nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$scret_key = '6LcjjKoUAAAAAOLRGjUH3tksCAsByqha7YapUV5m';
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
		$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scret_key.'&response='.$recaptchaResponse);
		$response = json_decode($verify);
	
		if ($response->success) {
			if($this->upload->do_upload('file_poster')){
				$settings = $this->mclp->getData('settings','id_settings')->row();
				$data = array(
					'indiefestKe' => $settings->indiefestKe,
					'nama_perwakilan' => $this->input->post('nama_pewakilan'),
					'asal_sekolah' => strtoupper($this->input->post('asal_sekolah')),
					'email' => $this->input->post('email'),
					'judul_film' => $this->input->post('judul_film'),
					'durasi' => $this->input->post('durasi'),
					'sinopsis' => $this->input->post('editor1'),
					'crew' => $this->input->post('editor2'),
					'poster' => $config['file_name'],
					'link_film' => $this->input->post('link_film'),
					'id_genre' => $this->input->post('genre'),
					'tanggal_registrasi' => date('Y-m-d H:i:s'),
					'no_tlp' => $this->input->post('no_tlp'),
				);
				
				$this->mclp->inputdata('tb_registrasi',$data);
				$this->session->set_flashdata('status','true');
				redirect(base_url('home/success'),'refresh');
			}else{
				echo json_encode(array('msg' => 'gagal upload'));
				die();
			}
		}else{
			echo "<pre>";
			print_r($response);
			echo "<pre>";
		}	
		
	}

	public function autokomplitSekolah()
	{
		$keyword = $this->uri->segment(3);
		if (!$keyword) {
			echo "not access";
			return;
		}
		$dataSekolah = $this->db->distinct()
														->select('asal_sekolah')
														->from('tb_registrasi')
														->like('asal_sekolah',$keyword)
														->get()
														->result();

		$data = array(
			'dataSekolah' => $dataSekolah
		);
		echo json_encode($data);
	}


	public function success()
	{
		if ($this->session->flashdata('status')) {
			$this->load->view('terimakasih.php');
    }else{
      redirect('home/pendaftaran');
    }
	}
	public function gallery()
	{
		$id_proker = $this->uri->segment(3);
		if (!$id_proker) {
			echo 'not found';
			return;
		}
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();

		$jum = $this->mclp->getWhere('tb_gallery',array('id_proker' => $id_proker))->num_rows();
		if ($jum==0) {
			$this->load->view('tidakadafoto',$data);
			return;
		}
		$data['gallery'] = $this->mclp->getWhere('tb_gallery',array('id_proker' => $id_proker))->result();
		$data['judul'] = $this->mclp->getWhere('tb_proker',array('id_proker' => $id_proker))->row();
		$this->load->view('gallery',$data);
	}

	public function keanggotaan()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$q = $this->input->get('q');

		if ($q != '') {
			$data['anggota'] = $this->mclp->dataAnggota($q)->result();
		}else{
			$data['anggota'] = $this->mclp->dataAnggota(null)->result();
		}

		$this->load->view('keanggotaan',$data);
	}

	public function checkInvoice()
	{
		$codeInvoice = $this->uri->segment(3);
		if (!$codeInvoice) {
			echo "cannot for this!";
			return;
		}
		$data = $this->db->select('*')
											->from('tb_registrasi')
											->join('tb_genre','tb_registrasi.id_genre = tb_genre.id_genre')
											->join('invoice','tb_registrasi.id_registrasi = invoice.id_registrasi')
											->where(array('code_invoice' => $codeInvoice))
											->get();

		if ($data->num_rows() == 0) {
			echo json_encode(array('not_found' => true));
		}else{
			echo json_encode(array('found' => true,'dataInvoice' => $data->row()));
		}
	}

	public function uploadBuktiPembayaran()
	{
		$file 			= $_FILES['file_bukti']['name'];
		$pisah 			= explode(".",$file);
		$ext 			= end($pisah);
		$rename 		= date("YmdHis");
		$nama_file 		= $rename.".".$ext;

		$config['upload_path']	 = './assets/backend/img/bukti_pembayaran';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']  	 = 'BUKTI_INV_'.$nama_file;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$scret_key = '6LcjjKoUAAAAAOLRGjUH3tksCAsByqha7YapUV5m';
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
		$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scret_key.'&response='.$recaptchaResponse);
		$response = json_decode($verify);
	
		if ($response->success) {
			if($this->upload->do_upload('file_bukti')){
				$data = array(
					'bukti_pembayaran' => $config['file_name'],
					'tanggal_upload_bukti' => date('Y-m-d H:i:s'),
					'status_bukti' => 1
				);

				$this->mclp->updateData('invoice',$data,array('id_invoice' => $this->input->post('idv')));
				$this->session->set_flashdata('confirm_success',' <strong>SELAMAT!</strong> Konfirmasi pembayaran kamu berhasil. Silahkan tunggu kami akan memberi
				konfirmasi lewat E-mail (kotak masuk/spam).');
				redirect(base_url('home/konfirmasipembayaran'),'refresh');
			}else{
				echo json_encode(array('msg' => 'gagal upload'));
				die();
			}
		}else{
			echo "<pre>";
			print_r($response);
			echo "<pre>";
		}
	}

	public function konfirmasipembayaran()
	{
		$data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
		$this->load->view('konfirmasipembayaran',$data);
	}
}