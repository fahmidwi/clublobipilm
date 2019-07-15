<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/proker');
    }

    public function ProsesTambah()
    {
      $data = array(
        'judul' => $this->input->post('judul'),
        'program_kerja' => $this->input->post('deskripsi_proker'),
        'create_date' => date('Y-m-d'),
        'create_update' => '0000-00-00',
        'id_user' => $this->session->userdata('id_user'),
      );
      $this->mdclp->inputdata('tb_proker',$data);
      redirect('admin/Proker');
    }

    public function ubahData($id)
    {
      $data['tab'] = '
                <li><a href="'.base_url('admin/Proker').'">Program kerja</a></li>
                <li><span>Ubah program kerja</span></li>
            ';
      $data['proker'] = $this->mdclp->getWhere('tb_proker',array('id_proker' => $id))->row();
      $this->load->view('backend/form/edit/edit_proker',$data);
    }

    public function ProsesUbahData($id)
    {
      $a = $this->input->post('program_kerja');
      $data = array(
        'judul' => $this->input->post('judul'),
        'program_kerja' => $a,
        'create_update' => date('Y-m-d'),
        'id_user' => $this->session->userdata('id_user'),
      );

      $this->mdclp->updateData('tb_proker',$data,array('id_proker' => $id));
      redirect('admin/Proker');
    }

    public function delete($id)
    {
      $this->mdclp->delete('tb_proker',array('id_proker' => $id));
      redirect('admin/proker ','refresh');
    }
}