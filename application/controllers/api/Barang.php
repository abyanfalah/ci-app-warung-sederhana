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
		}

		public function index($id = null)
		{
			if ($id) {
				$result = $this->barang_model->get_by_id($id);
			}else{
				$result = $this->barang_model->get_all();
			}


			$res = $result->result();
			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function create()
		{
			if ($result = $this->barang_model->create()) {
				$res = [
					"result"  => $result,
					"message" => "barang created",
					"status"  => 200
				];
				header("Content-type: application/json");
				echo json_encode($res);
				// var_dump($_POST);

			}
		}

		public function update($id = null)
		{
			if (! $id) {
				die("id needed to perform updation");
			}

			if ($result = $this->barang_model->update($id)) {
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang updated",
					"status"  => 200
				];
				header("Content-type: application/json");
				echo json_encode($res);
			}
		}

		public function delete($id = null)
		{
			if (! $id) {
				die("id needed to perform deletion");
			}

			if ($result = $this->barang_model->delete($id)) {
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang deleted",
					"status"  => 200
				];
				header("Content-type: application/json");
				echo json_encode($res);
			}
		}
	}
 ?>