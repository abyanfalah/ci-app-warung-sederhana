<?php 
	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');

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
				'title' => 'user',
				'user'  => $this->user_model->get_all()->result()
			];

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/user", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function create()
		{
			$data['title'] = 'Registrasi user baru';
			$data['access'] = $this->user_model->get_accesses()->result();
			
			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/user/create", $data);
			$this->load->view($this->access."/_partials/footer");
		}

		public function edit($id = null)
		{
			if ($data['user'] = $this->user_model->get_by_id($id)->row()) {
				$this->session->set_userdata('edit', $id);
				$data['title'] = 'Edit user '.$id;
				$data['access'] = $this->user_model->get_accesses()->result();

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/user/update", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}

		public function delete($id = null)
		{
			if ($data['user'] = $this->user_model->get_by_id($id)->row()) {
				$data['title'] = 'Hapus user '.$id;
				$this->session->set_userdata('delete', $id);

				$this->load->view($this->access."/_partials/header", $data);
				$this->load->view($this->access."/_partials/sidebar", $data);
				$this->load->view($this->access."/user/delete", $data);
				$this->load->view($this->access."/_partials/footer");
			}else{
				show_404();
			}
		}

		public function change_username_password()
		{
			$data['user'] = $this->user_model->get_by_id($this->session->userdata('edit'));
			$this->session->unset_userdata('edit');

			$this->load->view($this->access."/_partials/header", $data);
			$this->load->view($this->access."/_partials/sidebar", $data);
			$this->load->view($this->access."/user/change_username_password", $data);
			$this->load->view($this->access."/_partials/footer");
		}
	}

?>