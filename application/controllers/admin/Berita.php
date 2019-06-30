<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashClp', 'mdclp');
    }

    public function index()
    {
        redirect('admin/home/berita');
    }

    public function tambahData()
    {
        $data['tab'] = '
          <li><a href="' . base_url('admin/Berita') . '">Berita CLP</a></li>
          <li><span>Tambah Data berita</span></li>
      ';
        $this->load->view('backend/form/tambahdata_berita', $data);
    }

    public function prosesTambahData()
    {
        $file = $_FILES['gambar']['name'];
        $pisah = explode(".", $file);
        $ext = end($pisah);
        $rename = date("YmdHis");
        $nama_file = $rename . "." . $ext;

        $config['upload_path'] = './assets/frontend/img/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = 'BERITA_' . $nama_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $data = $this->upload->data();
            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/frontend/img/berita/' . $data['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '100%';
            $config['width'] = 1280;
            $config['height'] = 853;
            $config['new_image'] = './assets/frontend/img/berita/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
              'judul_berita' => $this->input->post('judul_berita'),
              'isi_berita' => $this->input->post('isi_berita'),
              'gambar' => $data['file_name'],
              'create_date' => date('Y-m-d'),
              'id_user' => $this->session->userdata('id_user'),
              'view' => 0,
              'sumber' => $this->input->post('sumber'),
            );

            $this->mdclp->inputdata('tb_berita', $data);
            redirect('admin/Berita');
        } else {
            echo "gagal";
        }

    }

    public function ubahData($id)
    {
        if ($this->session->userdata('status_log')) {
            $data['tab'] = '
                <li><a href="' . base_url('admin/Berita') . '">Berita CLP</a></li>
                <li><span>Edit Berita</span></li>
            ';
            $data['berita'] = $this->mdclp->getWhere('tb_berita', array('id_berita' => $id))->row();
            $this->load->view('backend/form/edit/edit_berita', $data);
        } else {
            redirect('admin/login', 'refresh');
        }
    }

    public function ProsesUbahData($id)
    {
        $file = $_FILES['gambar']['name'];

        if (empty($file)) {
          $data = array(
            'judul_berita' => $this->input->post('judul_berita'),
            'isi_berita' => $this->input->post('isi_berita'),
            'sumber' => $this->input->post('sumber'),
          );

            $this->mdclp->updateData('tb_berita', $data, array('id_berita' => $id));
            $this->session->set_flashdata('pesan', 'Data berhasil di ubah');
            redirect('admin/Berita');
        } else {
            $file = $_FILES['gambar']['name'];
            $pisah = explode(".", $file);
            $ext = end($pisah);
            $rename = date("YmdHis");
            $nama_file = $rename . "." . $ext;

            $config['upload_path'] = './assets/frontend/img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = 'BERITA_' . $nama_file;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/frontend/img/berita/' . $data['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '100%';
                $config['width'] = 1920;
                $config['height'] = 600;
                $config['new_image'] = './assets/frontend/img/berita/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                  'judul_berita' => $this->input->post('judul_berita'),
                  'isi_berita' => $this->input->post('isi_berita'),
                  'gambar' => $data['file_name'],
                  'sumber' => $this->input->post('sumber'),
                );

                $this->mdclp->updateData('tb_berita', $data, array('id_berita' => $id));
                $this->session->set_flashdata('pesan', 'Data berhasil di ubah');
                redirect('admin/Berita');
            }
        }
    }

    public function delete($id)
    {
        $data = $this->mdclp->getData('tb_berita', 'id_berita')->row();
        unlink('./assets/frontend/img/berita/' . $data->gambar);
        $this->mdclp->delete('tb_berita', array('id_berita' => $id));
        redirect('admin/Berita', 'refresh');
    }
}