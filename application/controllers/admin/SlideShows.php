<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SlideShows extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/slideshow');
    }

    public function tambahData()
    {
      $data['tab'] = '
          <li><a href="'.base_url('admin/SlideShows').'">Slideshows</a></li>
          <li><span>Tambah Data slideshow</span></li>
      ';
      $this->load->view('backend/form/tambahdata_slideshow',$data);
    }

    public function prosesTambahData()
    {
      $file 			= $_FILES['file']['name'];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis");
      $nama_file 		= $rename.".".$ext;

      $config['upload_path']	 = './assets/frontend/img/slideshow/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['file_name']  	 = 'SLIDE_'.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

			if($this->upload->do_upload('file')){
        $data = $this->upload->data();
        //Compress Image
        $config['image_library']='gd2';
        $config['source_image']='./assets/frontend/img/slideshow/'.$data['file_name'];
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['quality']= '100%';
        $config['width']= 1920;
        $config['height']= 600;
        $config['new_image']= './assets/frontend/img/slideshow/'.$data['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
        $data = array(
          'file' => $data['file_name'],
          'title' => $this->input->post('judul'),
          'desk' => $this->input->post('deskripsi_slide')
        );

        $this->mdclp->inputdata('tb_slideshows',$data);
        redirect('admin/SlideShows');
      }else{
        echo "gagal";
      }

    }

    public function ubahData($id)
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
                <li><a href="'.base_url('admin/Slideshows').'">SlideShows</a></li>
                <li><span>Edit SlideShows</span></li>
            ';
            $data['slideshow'] = $this->mdclp->getWhere('tb_slideshows',array('id_slide' => $id))->row();
            $this->load->view('backend/form/edit/edit_slideshows',$data);
        } else {
            redirect('admin/login','refresh');
        }
    }

    public function ProsesUbahData($id)
    {
        $file = $_FILES['file']['name'];
        echo $file;
        if (empty($file)) {
          $data = array(
              'title' => $this->input->post('judul'),
              'desk' => $this->input->post('deskripsi_slide')
          );

          $this->mdclp->updateData('tb_slideshows',$data,array('id_slide' => $id));
          $this->session->set_flashdata('pesan','Data berhasil di ubah');
          redirect('admin/SlideShows');
        } else {
          $file 			= $_FILES['file']['name'];
          $pisah 			= explode(".",$file);
          $ext 			= end($pisah);
          $rename 		= date("YmdHis");
          $nama_file 		= $rename.".".$ext;

          $config['upload_path']	 = './assets/frontend/img/slideshow/';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['file_name']  	 = 'SLIDE_'.$nama_file;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/frontend/img/slideshow/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '100%';
            $config['width']= 1920;
            $config['height']= 600;
            $config['new_image']= './assets/frontend/img/slideshow/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            
            $data = array(
              'file' => $data['file_name'],
              'title' => $this->input->post('judul'),
              'desk' => $this->input->post('deskripsi_slide')
            );

            $this->mdclp->updateData('tb_slideshows',$data,array('id_slide' => $id));
            $this->session->set_flashdata('pesan','Data berhasil di ubah');
            redirect('admin/SlideShows');
          }  
      }
    }

    public function delete($id)
    {
      $data = $this->mdclp->getData('tb_slideshows','id_slide')->row();
      unlink('./assets/frontend/img/slideshow/'.$data->file);
      $this->mdclp->delete('tb_slideshows',array('id_slide' => $id));
      redirect('admin/SlideShows','refresh');
    }
}