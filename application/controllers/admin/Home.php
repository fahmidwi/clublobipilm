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
        $data = array(
            'flg_konfirmasi' => 1
        );

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
            Untuk info lebih lanjut silahkan hubungi nomor Admin 08998779734(Whatsapp chat only).<br>
            Terima kasih, selamat berkompetisi :).<br>
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
        $this->mdclp->updateData('tb_registrasi',$data,array('id_registrasi' => $id));
        $this->session->set_flashdata('pesan','Konfirmasi telah berhasil');
        redirect('admin/home/CalonPesertaClp');
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
    		$data['karya'] = $this->mclp->getAllKarya(null,null)->result();
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

}