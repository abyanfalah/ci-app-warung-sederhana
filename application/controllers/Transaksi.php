<?php 
	/**
	 * 
	 */
	class Transaksi extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('barang_model');
			$this->load->model('user_model');
			$this->load->model('transaksi_model');
			$this->load->model('pelanggan_model');

			if(!$this->session->userdata('username')){
				redirect(base_url('login'));
			}
			$this->access = $this->session->userdata('akses');
			if ($this->access != 'admin') {
				die('Anda bukan admin');
			}
		}

		private $access;

		public function index()
		{
			$data = [
				'title'     => 'transaksi',
				'transaksi' => $this->transaksi_model->get_all()->result(),
				'barang'    => $this->barang_model->get_all()->result()
			];

			$data['new_id'] = $this->transaksi_model->new_id();

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/transaksi", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function new()
		{
			$data['title'] = 'transaksi baru';
			$data['barang'] = $this->barang_model->get_all()->result();
			$data['pelanggan'] = $this->pelanggan_model->get_all()->result();

			
			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/transaksi/create", $data);
			$this->load->view($this->access."/_partials/footer");
		}
	}

?>