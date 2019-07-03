<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karya extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/karya');
    }

    public function tambahData()
    {
      $data['tab'] = '
          <li><a href="'.base_url('admin/Karya').'">Karya Anggota</a></li>
          <li><span>Tambah Data Karya</span></li>
      ';
	  	$data['genre'] = $this->mdclp->getData('tb_genre','id_genre')->result();
      $this->load->view('backend/form/tambahdata_karyaanggota',$data);
    }

    public function prosesTambahData()
    {
      $file 			= $_FILES['file']['name'];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis");
      $nama_file 		= $rename.".".$ext;

      $config['upload_path']	 = './assets/frontend/img/poster_karya/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['file_name']  	 = 'KARYA_'.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

			if($this->upload->do_upload('file')){
        $data = $this->upload->data();
        
        $data = array(
          'judul_film' => $this->input->post('judul'),
          'sinopsis' => $this->input->post('sinopsis'),
          'durasi' => $this->input->post('durasi'),
          'poster' => $data['file_name'],
          'link_film' => $this->input->post('link'),
          'create_date' => date('Y-m-d'),
          'id_user' => $this->session->userdata('id_user'),
          'cast' => $this->input->post('crew'),
          'id_genre' => $this->input->post('genre'),
          'flg_new' => 0
        );

        $this->mdclp->inputdata('tb_karya',$data);
        redirect('admin/Karya');
      }else{
        echo "gagal";
      }

    }

    public function ubahData($id)
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
                <li><a href="'.base_url('admin/ArtikelStatis').'">Karya Anggota</a></li>
                <li><span>Edit Karya</span></li>
            ';
            $data['karya'] = $this->mdclp->getWhere('tb_karya',array('id_karya' => $id))->row();
	        	$data['genre'] = $this->mdclp->getData('tb_genre','id_genre')->result();
            $this->load->view('backend/form/edit/edit_karya',$data);
        } else {
            redirect('admin/login','refresh');
        }
    }

    public function ProsesUbahData($id)
    {
        $file = $_FILES['file']['name'];

        if (empty($file)) {
          $data = array(
            'judul_film' => $this->input->post('judul'),
            'sinopsis' => $this->input->post('sinopsis'),
            'durasi' => $this->input->post('durasi'),
            'link_film' => $this->input->post('link'),
            'cast' => $this->input->post('crew'),
            'id_genre' => $this->input->post('genre'),
          );
          $a = $this->mdclp->updateData('tb_karya',$data,array('id_karya' => $id));
          redirect('admin/Karya');
        } else {
          $file 			= $_FILES['file']['name'];
          $pisah 			= explode(".",$file);
          $ext 			= end($pisah);
          $rename 		= date("YmdHis");
          $nama_file 		= $rename.".".$ext;

          $config['upload_path']	 = './assets/frontend/img/poster_karya/';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['file_name']  	 = 'KARYA_'.$nama_file;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            $data = array(
              'judul_film' => $this->input->post('judul'),
              'sinopsis' => $this->input->post('sinopsis'),
              'durasi' => $this->input->post('durasi'),
              'poster' => $data['file_name'],
              'link_film' => $this->input->post('link'),
              'cast' => $this->input->post('crew'),
              'id_genre' => $this->input->post('genre'),
            );
    
            $this->mdclp->updateData('tb_karya',$data,array('id_karya' => $id));
            $this->session->set_flashdata('pesan','Data berhasil di ubah');
            redirect('admin/Karya');
          }  
      }
    }

    public function delete($id)
    {
      $data = $this->mdclp->getData('tb_karya','id_karya')->row();
      unlink('./assets/frontend/img/poster_karya/'.$data->poster);
      $this->mdclp->delete('tb_karya',array('id_karya' => $id));
      redirect('admin/Karya','refresh');
    }
}