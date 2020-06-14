<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('user_m');
	}
	public function login()
	{
		alreadyLogin();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_user' => $row->id_user,
                    'kode_dokter' => $row->kode_dokter,
                    'level' => $row->level   
                );
				$this->session->set_userdata($params);
				if ($row->level == 'admin') {
                    $level = "Administrator";
                }elseif ($row->level == 'receipt') {
                    $level = "Receiptionist";
                }elseif ($row->level == 'apotek') {
                    $level = "Apoteker";
                }elseif ($row->level == 'dokter') {
                    $level = "Dokter";
                }
				$this->session->set_flashdata('loginsuccess', 'Selamat datang '.$level);
            	redirect('dashboard');
			}else{
				$this->session->set_flashdata('loginfail', 'username / password salah');
            	redirect('auth/login');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		redirect('auth/login');
	}
}