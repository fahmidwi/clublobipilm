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

    public function ProsesUbahData($id)
    {
      $no = $this->input->post('no');
      $namedesk = 'deskripsi_proker'.$no;
      $a = $this->input->post($namedesk);
      echo $a;
      $data = array(
        'judul' => $this->input->post('judul'),
        'program_kerja' => $a,
        'create_update' => date('Y-m-d'),
        'id_user' => $this->session->userdata('id_user'),
      );
      print_r($data);die();
      $this->mdclp->updateData('tb_proker',$data,array('id_proker' => $id));
      redirect('admin/Proker');
    }

    public function delete($id)
    {
      $this->mdclp->delete('tb_proker',array('id_proker' => $id));
      redirect('admin/proker ','refresh');
    }
}