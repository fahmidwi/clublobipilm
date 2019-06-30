<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/genre');
    }

    public function ProsesTambah()
    {
      $data = array(
        'genre' => $this->input->post('genre'),
      );
      $this->mdclp->inputdata('tb_genre',$data);
      redirect('admin/genre');
    }

    public function ProsesUbahData($id)
    {
      $data = array(
        'genre' => $this->input->post('genre'),
      );
      $this->mdclp->updateData('tb_genre',$data,array('id_genre' => $id));
      redirect('admin/genre');
    }

    public function delete($id)
    {
      $this->mdclp->delete('tb_genre',array('id_genre' => $id));
      redirect('admin/genre ','refresh');
    }
}