<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->model_security->getsecurity();
		$isi['content'] 	= 'tampilan_content';
		$isi['judul']		= 'home';
		$isi['sub_judul']	= '';
		$this->load->view('tampilan_home',$isi);
	}

public function logout()
{
	$this->session->session_destroy();
	redirect('login');
}
}
