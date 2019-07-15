<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/gallery');
    }

    public function tambahData()
    {
      $data['tab'] = '
          <li><a href="'.base_url('admin/Gallery').'">Gallery</a></li>
          <li><span>Tambah Data gallery</span></li>
      ';
      $data['proker'] = $this->mdclp->getData('tb_proker', 'id_proker')->result();
      $this->load->view('backend/form/tambahdata_gallery',$data);
    }

    public function prosesTambahData()
    {
      $file 			= $_FILES['file']['name'];
      $pisah 			= explode(".",$file);
      $ext 			= end($pisah);
      $rename 		= date("YmdHis");
      $nama_file 		= $rename.".".$ext;

      $config['upload_path']	 = './assets/backend/img/gallery/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['file_name']  	 = 'GALLERY_'.$nama_file;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

			if($this->upload->do_upload('file')){
        $data = $this->upload->data();
        //Compress Image
        // $config['image_library']='gd2';
        // $config['source_image']='./assets/backend/img/gallery/'.$data['file_name'];
        // $config['create_thumb']= FALSE;
        // $config['maintain_ratio']= FALSE;
        // $config['quality']= '100%';
        // $config['width']= 1920;
        // $config['height']= 600;
        // $config['new_image']= './assets/backend/img/gallery/'.$data['file_name'];
        // $this->load->library('image_lib', $config);
        // $this->image_lib->resize();
        
        $data = array(
          'id_proker' => $this->input->post('proker'),
          'gambar' => $data['file_name'],
        );

        $this->mdclp->inputdata('tb_gallery',$data);
        redirect('admin/Gallery');
      }else{
        echo "gagal";
      }

    }

    public function ubahData($id)
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
                <li><a href="'.base_url('admin/Gallery').'">Gallery</a></li>
                <li><span>Edit Gallery</span></li>
            ';
            $data['proker'] = $this->mdclp->getData('tb_proker', 'id_proker')->result();
            $data['gallery'] = $this->mdclp->getWhere('tb_gallery',array('id_gallery' => $id))->row();
            $this->load->view('backend/form/edit/edit_gallery',$data);
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
              'id_proker' => $this->input->post('proker')
          );

          $this->mdclp->updateData('tb_gallery',$data,array('id_gallery' => $id));
          $this->session->set_flashdata('pesan','Data berhasil di ubah');
          redirect('admin/Gallery');
        } else {
          $file 			= $_FILES['file']['name'];
          $pisah 			= explode(".",$file);
          $ext 			= end($pisah);
          $rename 		= date("YmdHis");
          $nama_file 		= $rename.".".$ext;

          $config['upload_path']	 = './assets/backend/img/gallery/';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['file_name']  	 = 'GALLERY_'.$nama_file;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if($this->upload->do_upload('file')){
            $data = $this->upload->data();
            //Compress Image
            // $config['image_library']='gd2';
            // $config['source_image']='./assets/frontend/img/slideshow/'.$data['file_name'];
            // $config['create_thumb']= FALSE;
            // $config['maintain_ratio']= FALSE;
            // $config['quality']= '100%';
            // $config['width']= 1920;
            // $config['height']= 600;
            // $config['new_image']= './assets/frontend/img/slideshow/'.$data['file_name'];
            // $this->load->library('image_lib', $config);
            // $this->image_lib->resize();
            
            $data = array(
              'id_proker' => $this->input->post('proker'),
              'gambar' => $data['file_name'],
            );

            $this->mdclp->updateData('tb_gallery',$data,array('id_gallery' => $id));
            $this->session->set_flashdata('pesan','Data berhasil di ubah');
            redirect('admin/Gallery');
          }  
      }
    }

    public function delete($id)
    {
      $data = $this->mdclp->getData('tb_gallery','id_gallery')->row();
      unlink('./assets/backend/img/gallery/'.$data->gambar);
      $this->mdclp->delete('tb_gallery',array('id_gallery' => $id));
      redirect('admin/Gallery','refresh');
    }
}