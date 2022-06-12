<?php 
	/**
	 * 
	 */
	class barang extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('barang_model');

			if(!$this->session->userdata('username')){
				redirect(base_url('login'));
			}
			$this->access = $this->session->userdata('akses');
			if ($this->access != 'admin') {
				die('Anda bukan admin');
			}

			$this->session->unset_userdata('edit');
			$this->session->unset_userdata('delete');
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
			if ($data['barang'] = $this->barang_model->get_by_id($id)->row()) {
				$data['title'] = 'Hapus barang '.$id;
				$this->session->set_userdata('delete', $id);

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/barang/delete", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}
	}

?>