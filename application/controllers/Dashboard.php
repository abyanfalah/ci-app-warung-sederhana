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
		$this->load->model('barang_model');
		$this->load->model('transaksi_model');

		$this->access = $this->session->userdata('akses');
	}

	public function index()
	{
		$data = [
			'title'              => 'Dashboard',
			'user'               => $this->user_model->get_all(),
			'barang'             => $this->barang_model->get_all(),
			'transaksi'          => $this->transaksi_model->get_all(),
			'transaksi_hari_ini' => $this->transaksi_model->get_by_date()
		];

		$this->load->view($this->access."/_partials/header", $data);
		$this->load->view($this->access."/_partials/sidebar", $data);
		$this->load->view($this->access."/dashboard", $data);
		$this->load->view($this->access."/_partials/footer");
	}

	public function test()
	{
		$a = $this->transaksi_model->get_by_date('20220620');
		// $a = $this->transaksi_model->get_all();
		// $a = $a->num_rows();
		$a = $a->result_array();
		$res = [];
		$res = $a;

		header('Content-Type: application/json');
		echo json_encode($res, JSON_PRETTY_PRINT);
	}

}
