<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $access;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->access = $this->session->userdata('akses');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user'  => $this->user_model->get_all(),
		];

		$this->load->view($this->access."/_partials/header", $data);
		$this->load->view($this->access."/_partials/sidebar", $data);
		$this->load->view($this->access."/_partials/footer");

		// var_dump($this->session->userdata);


	}

}
