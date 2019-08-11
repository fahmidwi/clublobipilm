<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashClp', 'mdclp');
        $this->load->model('Model_clp', 'mclp');
    }

    public function index()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '';
            $data['jumPeserta'] = $this->db->select('*')
                                        ->from('tb_registrasi')
                                        ->like('tanggal_registrasi',date('Y'))
                                        ->get()
                                        ->num_rows();
            $data['jumAnggota'] = $this->mdclp->getData('tb_anggota','id_anggota')->num_rows();
            $data['jumKarya'] = $this->mdclp->getData('tb_karya','id_karya')->num_rows();
            $this->load->view('backend/index',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function tentangkami()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Tentang Kami</span></li>
			';
            $data['artikelstatis'] = $this->mdclp->getData('tb_artikel_statis', 'id_artikel_statis')->result();
            $this->load->view('backend/data/data_artikel_statis', $data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function settings()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Pengaturan</span></li>
			';
            $data['pengaturan'] = $this->mdclp->getData('settings', 'id_settings')->row();
            $this->load->view('backend/pengaturan',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function setpendaftaran($id)
    {
        $data = array(
            'indiefestKe' => $this->input->post('indiefestKe'),
            'biayaIndiefest' => str_replace('.','',$this->input->post('biaya')),
            'bukaDaftar' => $this->input->post('buka'),
            'tutupDaftar' => $this->input->post('tutup'),
            'syaratketentuan' => $this->input->post('syaratketentuan')
        );

        $this->mdclp->updateData('settings',$data,array('id_settings' => $id));
        $this->session->set_flashdata('pesan','Pengaturan pendaftaran indiefest telah di perbaharui');
        redirect('admin/home/settings');
    }

    public function setpopup($id)
    {
        $file 			= $_FILES['file']['name'];
        $pisah 			= explode(".",$file);
        $ext 			= end($pisah);
        $rename 		= date("YmdHis");
        $nama_file 		= $rename.".".$ext;

        $config['upload_path']	 = './assets/frontend/img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']  	 = 'POPUPWEB_'.$nama_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
            $popUpLama = $this->mdclp->getData('settings', 'id_settings')->row();
            unlink('./assets/frontend/img/'.$popUpLama->popUpWeb);
            $data = $this->upload->data();

            $data = array(
                'popUpWeb' => $data['file_name']
            );
            $this->mdclp->updateData('settings',$data,array('id_settings' => $id));
            $this->session->set_flashdata('pesan','Pop up Website telah diubah');
            redirect('admin/home/settings');
        }else{
          echo 'Gagal upload coba gambar lain, <a href="'.base_url("admin/home/settings").'">KEMBALI</a>';
        }
    }

    public function CalonPesertaClp()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Calong Peserta</span></li>
			';
            $data['peserta'] = $this->mdclp->calonPeserta()->result();
            $this->load->view('backend/data/data_peserta',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function konfimasicalonpeserta($id)
    {
        $dataPendaftar = $this->mdclp->getWhere('tb_registrasi',array('id_registrasi' => $id))->row();
        
        //MEMBUAT INVOICE PEMBAYARAN PENDAFTAR
        $this->addInvoice($id);
        //______
        
        $data = array(
            'flg_konfirmasi' => 1
        );
        $dataInvoice = $this->mdclp->getWhere('invoice',array('id_registrasi' => $id))->row();
        $toemail = $dataPendaftar->email;
        $subject = 'DATA FILM ANDA TELAH DI SETUJUI';
        $message = "
        <div style='padding:2%;background-color:white;'>
        <center><img src='".base_url('/assets/frontend/img/logoclp.png')."' margin-left:2%;></center>
        </div>
        <br>
        <center><h2 style='font-family: arial;'>DATA FILM ANDA TELAH DI SETUJUI</h2></center>

        <p style='font-family: verdana'>
            Hallo <b>".$dataPendaftar->nama_perwakilan." (".$dataPendaftar->asal_sekolah.")</b> selamat karya anda memenuhi Syarat & ketentaun indifest, dengan ini anda telah menjadi peserta indiefest ".$dataPendaftar->indiefestKe.",<br><br>
            <br>
        </p></center>
        <p>
          Silahkan lakukan pembayaran melalui Bank berikut:<br>
          Bank BCA <br>
          <b>No Rek : 99999999 </b><br>
          A/n : Dono
        </p>
        <center>
        <table style='border:1px solid black;'>
              <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>Code Invoice</th>
                  <th scope='col'>Perihal</th>
                  <th scope='col'>Biaya Pendaftaran</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope='row'>1</th>
                  <td>".$dataInvoice->code_invoice."</td>
                  <td>".$dataInvoice->perihal."</td>
                  <td>".rupiah($dataInvoice->biaya)."</td>
                </tr>
              </tbody>
        </table>
        </center>   
            <br>
            <p>Jika sudah melakukan pembayaran silahkan konfirmasi pembayaran anda melalui <a href=".base_url('home/konfirmasipembayaran/'.$dataInvoice->token).">Halaman Konfirmasi</a>
            </p>
            <br>
            <p>
                Untuk info lebih lanjut silahkan hubungi nomor Admin 08998779734(Whatsapp chat only).<br>
                Terima kasih, selamat berkompetisi :).
            </p>
        <br>
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
        $this->mdclp->updateData('tb_registrasi',$data,array('id_registrasi' => $id));
        $this->session->set_flashdata('pesan','Konfirmasi telah berhasil');
        redirect('admin/home/CalonPesertaClp');
    }

    public function addInvoice($id_registrasi)
	{
		$biaya = $this->mclp->getData('settings','id_settings')->row();

		$data = array(
            //'id_invoice' => null,
            'id_registrasi' => $id_registrasi,
            'code_invoice' => $this->genereCodeInvoice(),
            'token' => $this->genereToken(),
			'biaya' => $biaya->biayaIndiefest,
            'perihal' => 'Pembayaran pendaftaran Indiefest',
            //'bukti_pembayaran' => null,
            'status' => 0,//BELUM DIKONFIRMASI PEMBAYARAN
            //'tanggal_upload_bukti' => null,
            //'tanggal_valid' => null
        );
        $this->mdclp->inputdata('invoice',$data);
        return true;
	}

	public function genereCodeInvoice()
	{
        $code = '';
        //CODE UNIK
        $hash = base_convert(microtime(false), 10, 9);
        $hash = strtoupper(substr($hash,0,6));
		$code = 'CLP'.$hash;
        return $code;
    }

    public function genereToken()
    {
        $token = bin2hex(openssl_random_pseudo_bytes(64));
        $subToken = substr($token,0,50);
        return $token;
    }

    public function getBuktiPembayaran()
    {
        $id_registrasi = $this->uri->segment(4);
        if (!$id_registrasi) {
            echo "not this";
            return;
        }
        $data = $this->mdclp->getWhere('invoice',array('id_registrasi' => $id_registrasi));

        if ($data->num_rows() == 0) {
            echo json_encode(array('data' => 'not found'));
        }else{
            echo json_encode(array('data' => $data->row()));
        }
    }

    public function konfimasipembayaran()
    {
        $id_registrasi = $this->uri->segment(4);
        if (!$id_registrasi) {
            echo 'not this';
            return;
        }

        $where = array('id_registrasi' => $id_registrasi);
        $up = $this->mdclp->updateData('tb_registrasi',array('status_pembayaran' => 1),$where);
        if ($up) {
             $dataInvoice = $this->mdclp->getWhere('invoice',array('id_registrasi' => $id_registrasi))->row();
            $dataPendaftar = $this->mdclp->getWhere('tb_registrasi',array('id_registrasi' => $id_registrasi))->row();
            $toemail = $dataPendaftar->email;
            $subject = 'PEMBAYARAN ANDA TELAH DIKONFIRMASI';
            $message = "
            <div style='padding:2%;background-color:white;'>
            <center><img src='".base_url('/assets/frontend/img/logoclp.png')."' margin-left:2%;></center>
            </div>
            <br>
            <center><h2 style='font-family: arial;'>PEMBAYARAN ANDA TELAH DIKONFIRMASI</h2></center>

            <p style='font-family: verdana'>
                Hallo <b>".$dataPendaftar->nama_perwakilan." (".$dataPendaftar->asal_sekolah.")</b> pembayaran dengan invoice dibawah telah kami konfirmasi <br>
            </p></center>
            <center>
            <table style='border:1px solid black;'>
                <thead>
                    <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Code Invoice</th>
                    <th scope='col'>Perihal</th>
                    <th scope='col'>Biaya Pendaftaran</th>
                    <th scope='col'>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope='row'>1</th>
                    <td>".$dataInvoice->code_invoice."</td>
                    <td>".$dataInvoice->perihal."</td>
                    <td>".rupiah($dataInvoice->biaya)."</td>
                    <td><b style='color:green'>terkonfirmasi</b></td>
                    </tr>
                </tbody>
            </table>
            </center>   
                <br>
                <p>
                    Untuk info lebih lanjut silahkan hubungi nomor Admin 08998779734(Whatsapp chat only).<br>
                    Terima kasih, selamat berkompetisi :).
                </p>
            <br>
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
            redirect('admin/home/CalonPesertaClp');
        }else{
            echo "GAGAL, KEMBALI DAN LAKUKAN LAGI";
        }
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

    public function slideshow()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Slideshows</span></li>
			';
            $data['slideshows'] = $this->mdclp->getData('tb_slideshows', 'id_slide')->result();
            $this->load->view('backend/data/data_slideshow', $data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function gallery()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Gallery</span></li>
			';
            $data['gallery'] = $this->mdclp->getGallery()->result();
            $this->load->view('backend/data/data_gallery', $data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }


    public function proker()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Program Kerja</span></li>
			';
            $data['proker'] = $this->db->select('tb_proker.*,tb_user.nama')
                ->from('tb_proker')
                ->join('tb_user', 'tb_proker.id_user = tb_user.id_user')
                ->order_by('tb_proker.id_proker', 'DESC')
                ->get()
                ->result();
            $this->load->view('backend/data/data_proker', $data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }
    public function berita()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
							<li><span>Berita CLP</span></li>
						';
            $data['berita'] = $this->mdclp->getData('tb_berita', 'id_berita')->result();
            $this->load->view('backend/data/data_berita',$data);
        } else {
            redirect('admin/login', 'refresh');
        }

    }
    public function karya()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Karya Anggota</span></li>
			';
    		$data['karya'] = $this->mclp->getAllKarya(null,null,null)->result();
            $this->load->view('backend/data/data_karyaanggota',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }
    public function genre()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
							<li><span>Genre</span></li>
						';
            $data['genre'] = $this->mdclp->getData('tb_genre', 'id_genre')->result();
            $this->load->view('backend/data/data_genre',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function user()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>User</span></li>
			';
            $data['user'] = $this->mdclp->DataAdmin()->result();
            //print_r($data['user']);die();
            $this->load->view('backend/data/data_user',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function keanggotaan()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Keanggotaan</span></li>
			';
            $data['keanggotaan'] = $this->mdclp->DataKeanggotaan()->result();
            //print_r($data['user']);die();
            $this->load->view('backend/data/data_keanggotaan',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function profile($npm)
    {
        $data['detailanggota'] = $this->mdclp->getDetailAnggota($npm)->row();
        print_r($data['detailanggota']);
    }

    public function masukan()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Masukan/pertanyaan</span></li>
			';
            $data['masukan'] = $this->mdclp->getData('tb_hubkami','id_hubkami')->result();
            //print_r($data['user']);die();
            $this->load->view('backend/data/data_masukan',$data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

}