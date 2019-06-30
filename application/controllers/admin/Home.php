<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashClp', 'mdclp');
    }

    public function index()
    {
        if ($this->session->userdata('status_log')) {
            $this->load->view('backend/index');
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function artikelStatis()
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
					<li><span>Artikel Statis</span></li>
			';
            $data['artikelstatis'] = $this->mdclp->getData('tb_artikel_statis', 'id_artikel_statis')->result();
            $this->load->view('backend/data/data_artikel_statis', $data);
        } else {
            redirect('admin/login', 'refresh');
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
            $this->load->view('backend/data/data_karyaanggota');
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
            $this->load->view('backend/data/data_user');
        } else {
            redirect('admin/login', 'refresh');
        }
    }
}