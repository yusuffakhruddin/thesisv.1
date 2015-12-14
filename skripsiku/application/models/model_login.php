<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {
	public function getlogin($u, $p)
	{
		$pwd=md5($p);
		$this->db->where('username',$u);
		$this->db->where('password',$pwd);
		$query=$this->db->get('admin');
		if ($query->num_rows()>0) 
		{
		foreach ($query->result() as $row) {
			$sess = array('username' 		=>$row->username ,
						  'nama_lengkap' 	=>$row->nama_lengkap);
			$this->session->set_userdata($sess);
			redirect('home');
		}
		}else{
			$this->session->set_flashdata('info', 'Maaf Usernama atau Password Anda Salah');
			redirect('login');
		}

	}
	

}
