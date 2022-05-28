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

			// if ($this->session->has_userdata('username')) {
			// 	redirect(base_url());
			// }

			$data['title'] = 'login';
			$data['login_message'] = $this->session->flashdata('login_message');

			// var_dump($this->session->userdata);

			$this->load->view('login', $data);

			if (isset($_POST['btn_login'])) {
				if ($_POST['username'] != '') {
					if ($this->user_model->check_username()) {
						if ($_POST['password'] != '') {
							if ($user = $this->user_model->check_username_with_password()) {
								$this->session->set_userdata($user);
								header("location:".base_url());
							}else{
								$this->session->set_flashdata('login_message', 'Passsword salah');
								header("location:".base_url('login'));
							}
						}else{
							$this->session->set_flashdata('login_message', 'Password harus diisi');
							header("location:".base_url('login'));

						}
					}else{
						$this->session->set_flashdata('login_message', 'Username tidak ditemukan');
						header("location:".base_url('login'));
						
					}
				}else{
					$this->session->set_flashdata('login_message', 'Username harus diisi');
					header("location:".base_url('login'));

				}
			}
		}

		public function logout()
		{
			session_destroy();
			redirect(base_url('login'));
		}
	}

?>