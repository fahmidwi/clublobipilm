<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_dashClp','mdclp');
    }

	public function index()
	{
        if ($this->session->userdata('status_log')) {
            redirect('admin/home','refresh');
        } else {
    		$this->load->view('backend/halaman_login');
        }
    }
    
    public function actLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dataLog = array(
            'username' => $username,
            'password' => md5($password),
        );

        $dataLog = $this->mdclp->getWhere('tb_user',$dataLog);

        if ($dataLog->num_rows() == 1) {
            $dataSess = $dataLog->row();
            $dataSess = array(
                'id_user' => $dataSess->id_user, 
                'nama' => $dataSess->nama, 
                'email' => $dataSess->email,
                'username' => $dataSess->username, 
                'password' => $dataSess->password, 
                'level_akses' => $dataSess->level_akses,
                'status_log' => 'on'
            );

            $this->session->set_userdata($dataSess);
            redirect('admin/home');
        } else {
            redirect('admin/home');
        }
        

    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login','refresh');
        
    }

}