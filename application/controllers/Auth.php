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

			var_dump($_POST);
			$data['title'] = 'login';
			var_dump($this->session->userdata);


			$this->load->view('login', $data);

			if (isset($_POST['btn_login'])) {

				if (! $_POST['username']) {
					$this->session->set_flashdata('login_message', 'Username harus diisi');
					header("location:".base_url('login'));
					die();
				}

				if (! $this->user_model->check_username()) {
					$this->session->set_flashdata('login_message', 'Username tidak ditemukan');
					header("location:".base_url('login'));
					die();
				}

				if (! $_POST['password']) {
					$this->session->set_flashdata('login_message', 'Password harus diisi');
					header("location:".base_url('login'));
					die();
				}
						
				if (! ($user = $this->user_model->check_username_with_password())) {
					$this->session->set_flashdata('login_message', 'Passsword salah');
					header("location:".base_url('login'));
					die();
				}					

				$this->session->set_userdata($user);
				header("location:".base_url());
			}
		}

		public function logout()
		{
			session_destroy();
			redirect(base_url('login'));
		}
	}

?>