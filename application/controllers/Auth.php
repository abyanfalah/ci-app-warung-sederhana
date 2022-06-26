<?php 
	/**
	 * 
	 */
	class Auth extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
			
		}

		public function login()
		{
			if ($this->session->has_userdata('username')) {
				redirect(base_url());
			}

			$data['title'] = 'login';

			$this->load->view('login', $data);
		}

		public function logout()
		{
			session_destroy();
			redirect('login');
		}

		function authenticate()
		{
			if ($this->session->has_userdata('username')) {
				redirect(base_url());
			}
		}

		public function show_userdata()
		{
			var_dump($this->session->userdata());
		}
	}

?>