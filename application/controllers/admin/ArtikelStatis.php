<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArtikelStatis extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/artikelStatis');
    }

    public function ubahData($id)
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
                <li><a href="'.base_url('admin/ArtikelStatis').'">Tentang kami</a></li>
                <li><span>Edit Tentang kami</span></li>
            ';
            $data['artikelstatis'] = $this->mdclp->getWhere('tb_artikel_statis',array('id_artikel_statis' => $id))->row();
            $this->load->view('backend/form/edit/edit_artikelstatis',$data);
        } else {
            redirect('admin/login','refresh');
        }
    }

    public function ProsesUbahData($id)
    {
        $data = array(
            'isi' => $this->input->post('isi')
        );

        $this->mdclp->updateData('tb_artikel_statis',$data,array('id_artikel_statis' => $id));
        $this->session->set_flashdata('pesan','Data berhasil di ubah');
        redirect('admin/ArtikelStatis');
        
    }
}