<?php 
	/**
	 * 
	 */
	class Barang extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('barang_model');
			$this->load->model('supplier_model');

			// kalau belum login
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
				'title' => 'barang',
				'barang'  => $this->barang_model->get_all()->result()
			];

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/barang", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function create()
		{
			$data['title'] = 'Registrasi barang baru';
			$data['jenis'] = $this->barang_model->get_jenis()->result();
			$data['satuan'] = $this->barang_model->get_satuan()->result();
			
			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/barang/create", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function edit($id = null)
		{
			if ($data['barang'] = $this->barang_model->get_by_id($id)->row()) {
				$this->session->set_userdata('edit', $id);
				$data['title'] = 'Edit barang '.$id;
				$data['jenis'] = $this->barang_model->get_jenis()->result();
				$data['satuan'] = $this->barang_model->get_satuan()->result();

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/barang/update", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}

		public function delete($id = null)
		{
			// kalau barang ada
			if ($data['barang'] = $this->barang_model->get_by_id($id)->row()) {
				$data['title'] = 'Hapus barang '.$id;
				$this->session->set_userdata('delete', $id);

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/barang/delete", $data);
				$this->load->view($this->access."/_partials/footer");
			}
			// kalo barang ga ada
			else{
				show_404();
			}
		}

		public function supply()
		{
			$data = [
				"title" => "supply barang",
				"supplier" => $this->supplier_model->get_all()->result()
				// "new_id" => $this->barang_model->
			];

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/barang/supply", $data);
			$this->load->view($this->access."/_partials/footer");
		}
	}

?>