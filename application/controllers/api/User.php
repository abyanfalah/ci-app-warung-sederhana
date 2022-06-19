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
		}

		public function index($id = null)
		{
			if ($id) {
				$result = $this->user_model->get_by_id($id);
			}else{
				$result = $this->user_model->get_all();
			}


			$res = $result->result();
			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function create()
		{
			if ($result = $this->user_model->create()) {
				$res = [
					"result"  => $result,
					"message" => "user created",
					"status"  => 200
				];
				header("Content-type: application/json");
				echo json_encode($res);
			}
		}

		public function update()
		{
			if(! $id = $this->session->userdata('edit')){
				die('You need the id to perform updation');
			}

			if(! $this->input->post()){
				$res = [
					"message" => "where's the data, bruh?",
					"status"  => 420
				];
			}


			if ($result = $this->user_model->update($id)) {
				$res = [
					"result"  => $result,
					"user_id" => $id,
					"message" => "user updated",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"user_id" => $id,
					"message" => "user not updated",
					"status"  => 500
				];
			}

			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function delete()
		{
			if (! $id = $this->session->userdata('delete')) {
				die("id needed to perform deletion");
			}

			if ($result = $this->user_model->delete($id)) {
				$res = [
					"result"  => $result,
					"user_id" => $id,
					"message" => "user deleted",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "user not deleted",
					"status"  => 500
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		public function get_current_user_id()
		{
			$res = [
				"id" => $this->session->userdata('id')
			];
			header("Content-type: application/json");
			echo json_encode($res);
		}
	}
 ?>