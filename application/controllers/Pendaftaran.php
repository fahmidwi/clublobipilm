<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_clp', 'mclp');
  }
  
  public function Anggota($params)
  {
    if ($params=='clp') {
      $data['proker'] = $this->db->select('id_proker,judul')
															 ->from('tb_proker')
															 ->order_by('id_proker','DESC')
															 ->get()
															 ->result();
	  	$this->load->view('daftarkeanggotaan.php',$data);
    }
  }
  
  public function submitDaftar()
  {
    $scret_key = '6LcjjKoUAAAAAOLRGjUH3tksCAsByqha7YapUV5m';
		$recaptchaResponse = $this->input->post('g-recaptcha-response');
		$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$scret_key.'&response='.$recaptchaResponse);
		$response = json_decode($verify);
	
		if ($response->success) {
      $file 			= $_FILES['file']['name'];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis");
      $nama_file 		= $rename.".".$ext;

      $config['upload_path']	 = './assets/backend/img/foto_profile/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['file_name']  	 = 'PROFILE_'.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

			if($this->upload->do_upload('file')){
        $data = $this->upload->data();

        $angkatan = $this->input->post('angkatan');
        $npm = $this->input->post('npm');
  
        $code_clp = $this->createCode($npm,$angkatan);//call fungsi createCode

        $dataAnggota = array(
          'foto_profile' => $data['file_name'], 
          'code_anggota' => $code_clp, 
          'nama' => $this->input->post('nama'), 
          'no_telepon' => $this->input->post('no_telepon'),
          'npm' => $npm,
          'angkatan_clp' => $angkatan
        );
    
        $idAnggota = $this->mclp->inputAnggota($dataAnggota);

        $username = $this->createUsername($angkatan);//call fungsi createUsername

        $dataUser = array(
          'nama' => $this->input->post('nama'),
          'email' => $this->input->post('email'),
          'username' => $username,
          'password' => md5($this->input->post('password')),
          'level_akses' => '1',
          'id_anggota' => $idAnggota
        );

        $regis = $this->mclp->inputdata('tb_user',$dataUser);
        if ($regis) {

          $toemail = $this->input->post('email');
          $subject = 'PENDAFTARAN BERHASIL';
          $message = "
          <div style='padding:2%;background-color:white;'>
          <center><img src='".base_url('/assets/frontend/img/logoclp.png')."' margin-left:2%;></center>
          </div>
          <br>
          <center><h2 style='font-family: arial;'>Pendaftaran Berhasil</h2></center>

          <p style='font-family: verdana'>
              Hallo <b>".$this->input->post('nama')."</b> selamat anda terdaftar didalam data Keanggotaan Club Lobi Pilm<br><br>
              Username : ".$username."<br>
              password : ".$this->input->post('password')."<br>
              Code Anggota : ".$code_clp."( bisa untuk alternatif password anda )<br><br><br>
              anda dapat mengakses halaman anggota, dengan login pada <a href=".base_url('admin/login').">halaman admin (".base_url('admin/login').")</a>
              <br><br>Terima kasih atas kerja sama nya.<br>
          </p></center>
          <br><br><br><br>
          <i>regards,</i>
          <p><b>Club Lobi Pilm</b></p>
          <br>
          <div style='background-color: #e4e4e4; padding: 10px; font-family: verdana;'>
              <center>
                  <p>@".date('Y')." Club Lobi Pilm - Universitas Pakuan</p>
              </center>
          </div>
          ";
          $this->sendEmail($toemail,$subject,$message);
          $this->session->set_flashdata('status','true');
          redirect('pendaftaran/success');
        } else {
          echo 'GAGAL MELAKUKAN REGISTRASI <a href="'.base_url("pendaftaran/anggota/clp").'">ULANGI</a>';
        }
      }else{
          echo 'GAGAL UPLOAD FOTO <a href="'.base_url("pendaftaran/anggota/clp").'">ULANGI</a>';
      }
    }else{
      echo "Ga";
    }
  }

  public function createCode($npm,$angkatan)
  {
    $code_clp;

    $revNpm = strrev($npm);
    $revnpm5digit = substr($revNpm,0,5);
    $npm5digit = strrev($revnpm5digit);
    $code_clp = 'CLP'.$angkatan.$npm5digit;
    
    return $code_clp;
  }

  //FUNGSI GENERET USERNAME
  public function createUsername($angkatan)
  {
    $username;

    $lastcode = $this->db->select('*')
                            ->from('tb_user')
                            ->like('username',$angkatan)
                            ->order_by('id_user','DESC')
                            ->get();

    $jum =  $lastcode->num_rows();
    $data = $lastcode->row();

    if ($jum == 0) {
      $no = '0001';
      $username = 'CLP-'.$angkatan.'-'.$no;
    }else{
      $datausername = $data->username;
      $nourutlast = explode('-',$datausername)[2];
      $format = 10000 + $nourutlast;
      $newnourut = $format + 1;
      $nofix = substr($newnourut,1,4);
      $username = 'CLP-'.$angkatan.'-'.$nofix;
    }   
    
    return $username;
  }
  
  public function checkNpm($npm)
  {
    $data = $this->mclp->getWhere('tb_anggota',array('npm' => $npm))->num_rows();
    echo json_encode(array('res' => $data));
  }
  
  public function sendEmail($toemail,$subject,$msg)
	{

	    $this->load->library('email');
	    $config = array();
	    $config['charset'] = 'utf-8';
	    $config['protocol']= "smtp";
	    $config['mailtype']= "html";
	    $config['smtp_host']= "ssl://smtp.googlemail.com";//pengaturan smtp
	    $config['smtp_port']= 465;
	    $config['smtp_user']= "fahmidwi45@gmail.com"; // isi dengan email
	    $config['smtp_pass']= "liberofd21"; // isi dengan password kamu
	    $config['crlf']="\r\n";
	    $config['newline']="\r\n";
	    $config['wordwrap'] = TRUE;
	    //memanggil library email dan set konfigurasi untuk pengiriman email
	    $this->email->initialize($config);
	    //konfigurasi pengiriman
	    $this->email->from($config['smtp_user'],'Club Lobi Pilm');
	    $this->email->to($toemail);
	    $this->email->subject($subject);
	    $this->email->message($msg);

	    if(!$this->email->send())
	    {
	       show_error($this->email->print_debugger());
	    }
	}

	public function success()
	{
    if ($this->session->flashdata('status')) {
      $this->load->view('thxregisanggota');
    }else{
      redirect('pendaftaran/anggota/clp');
    }
  }
}
