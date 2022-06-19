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

			// var_dump($this->transaksi_model->get_all()->result());
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

		// public function edit($id = null)
		// {
		// 	if ($data['barang'] = $this->barang_model->get_by_id($id)->row()) {
		// 		$this->session->set_userdata('edit', $id);
		// 		$data['title'] = 'Edit barang '.$id;
		// 		$data['jenis'] = $this->barang_model->get_jenis()->result();
		// 		$data['satuan'] = $this->barang_model->get_satuan()->result();

		// 		$this->load->view($this->access."/_partials/header", $data);
		// 		$this->load->view($this->access."/_partials/sidebar", $data);
		// 		$this->load->view($this->access."/barang/update", $data);
		// 		$this->load->view($this->access."/_partials/footer");
		// 	}else{
		// 		show_404();
		// 	}
		// }

		// public function delete($id = null)
		// {
		// 	if ($data['barang'] = $this->barang_model->get_by_id($id)->row()) {
		// 		$data['title'] = 'Hapus barang '.$id;
		// 		$this->session->set_userdata('delete', $id);

		// 		$this->load->view($this->access."/_partials/header", $data);
		// 		$this->load->view($this->access."/_partials/sidebar", $data);
		// 		$this->load->view($this->access."/barang/delete", $data);
		// 		$this->load->view($this->access."/_partials/footer");
		// 	}else{
		// 		show_404();
		// 	}
		// }
	}

?>