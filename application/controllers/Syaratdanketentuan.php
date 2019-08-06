<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syaratdanketentuan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_clp', 'mclp');
  }
  
  public function indiefest()
  {
		$this->load->view('syaratdanketentuan');
  }
}