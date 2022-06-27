<?php 
	/**
	 * 
	 */
	class Supplier extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('supplier_model');

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
				'title'     => 'Daftar supplier (pemasok)',
				'supplier' => $this->supplier_model->get_all()->result()
			];

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/supplier", $data);
			$this->load->view($this->access."/_partials/footer");
		}
	}

?>