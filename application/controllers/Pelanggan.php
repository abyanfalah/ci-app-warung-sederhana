<?php 
	/**
	 * 
	 */
	class Pelanggan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('pelanggan_model');

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
				'title' => 'pelanggan',
				'pelanggan'  => $this->pelanggan_model->get_all()->result()
			];

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/pelanggan", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function create()
		{
			$data['title'] = 'Registrasi pelanggan baru';

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/pelanggan/create", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function edit($nama = null)
		{
			if ($data['pelanggan'] = $this->pelanggan_model->get_by_id($nama)->row()) {
				$this->session->set_userdata('edit', $nama);
				$data['title'] = 'Edit pelanggan '.$nama;
				$data['jenis'] = $this->pelanggan_model->get_jenis()->result();
				$data['satuan'] = $this->pelanggan_model->get_satuan()->result();

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/pelanggan/update", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}

		public function delete($nama = null)
		{
			if ($data['pelanggan'] = $this->pelanggan_model->get_by_id($nama)->row()) {
				$data['title'] = 'Hapus pelanggan '.$nama;
				$this->session->set_userdata('delete', $nama);

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/pelanggan/delete", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}
	}

?>