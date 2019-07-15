<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
	  {
		parent::__construct();
		$this->load->model('Model_dashClp','mdclp');
    }
    
    public function index()
    {
        redirect('admin/home/user');
    }

    public function ChangeToAdmin($id)
    {
        $data = array(
            'level_akses' => 0,
            'level_admin' => 1
        );

        $this->mdclp->updateData('tb_user',$data,array('id_user' => $id));
        redirect('admin/User');
    }

    public function hapusAnggota($id)
    {
        $data = array(
            'flg_delete' => 1,
        );

        $this->mdclp->updateData('tb_user',$data,array('id_user' => $id));
        redirect('admin/User');
    }
}