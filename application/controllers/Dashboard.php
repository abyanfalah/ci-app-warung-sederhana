<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $access;

	public function __construct()
	{
		parent::__construct();

		// Redirect ke halaman login jika belum login
		if(! $this->session->userdata('username')){
			redirect('login');
		}

		$this->load->model('user_model');
		$this->access = $this->session->userdata('akses');
		$this->session->unset_userdata('edit');
		$this->session->unset_userdata('delete');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user'  => $this->user_model->get_all(),
		];

		$this->load->view($this->access."/_partials/header", $data);
		$this->load->view($this->access."/_partials/sidebar", $data);
		$this->load->view($this->access."/dashboard", $data);
		$this->load->view($this->access."/_partials/footer");
	}

}
