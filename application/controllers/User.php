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
		}

		public function index()
		{
			$data['title'] = 'daftar user';
			$data['user'] = $this->user_model->get_all();

			$this->load->view('templates/header', $data);
			$this->load->view('user', $data);
			$this->load->view('templates/footer');

		}

		public function add()
		{
			$data['title'] = 'Registrasi user baru';
			$data['access'] = $this->user_model->get_access();

			$this->load->view('templates/header', $data);
			$this->load->view('user/add', $data);
			$this->load->view('templates/footer', $data);

			if (isset($_POST['btn_signup'])) {
				if ($_POST['nama'] == '' || $_POST['username'] == '' || $_POST['password'] == '') {
					$this->session->set_flashdata('msg', 'Semua kolom harus diisi');
					redirect(base_url('registrasi'));
				}else{
					$new_id = $this->user_model->new_id();
					if ($this->user_model->insert()) {
						$this->session->set_flashdata('msg', "User ".$new_id." berhasil ditambahkan ke daftar");
						redirect(base_url('userlist'));
					}else{
						$this->session->set_flashdata('msg', 'Gagal mendaftarkan user');
						redirect(base_url('registrasi'));
					}
				}
			}
		}

		public function edit($id = null)
		{
			if ($data['user'] = $this->user_model->get_by_id($id)) {
				$data['title'] = 'Edit user '.$id;
				$data['access'] = $this->user_model->get_access();

				$this->load->view('templates/header', $data);
				$this->load->view('user/edit', $data);
				$this->load->view('templates/footer', $data);
			}


			if (isset($_POST['btn_save'])) {
				if ($_POST['nama'] == '' || $_POST['username'] == '') {
					$this->session->set_flashdata('msg', 'Semua kolom harus diisi');
					redirect(base_url('user/edit/'.$id));
				}else{
					if ($this->user_model->edit($id)) {
						$this->session->set_flashdata('msg', $id." Berhasil disunting");
						redirect(base_url('userlist'));

					}else{
						$this->session->set_flashdata('msg', 'Gagal menyunting informasi user '.$id);
						redirect(base_url('user/edit/'.$id));
					}
				}
			}
		}

		public function delete($id = null)
		{
			if ($data['user'] = $this->user_model->get_by_id($id)) {
				$data['title'] = 'Hapus user '.$id;

				$this->load->view('templates/header', $data);
				$this->load->view('user/delete', $data);
				$this->load->view('templates/footer', $data);

				if (isset($_POST['btn_proceed_delete'])) {
					if ($this->user_model->delete($id)) {
						$this->session->set_flashdata('msg', $id.' berhasil dihapus dari daftar');
							redirect(base_url('userlist'));
					}else{
						$this->session->set_flashdata('msg', 'Gagal menghapus '.$id);
							redirect(base_url('userlist'));
					}
				}
			}else{
				show_404();
			}
		}
	}

?>