<?php 
	/**
	 * 
	 */
	class Supply extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('supply_model');
		}

		public function index($id = null)
		{
			if ($id) {
				$result = $this->supply_model->get_by_id($id)->row();
			}else{
				$result = $this->supply_model->get_all()->result();
			}

			$res = $result;
			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function create()
		{
			$id = $this->supply_model->new_id();
			if ($result = $this->supply_model->create()) {
				$res = [
					"result"  => $result,
					"message" => "supply created",
					"id_supply" => $id,
					"status"  => 200
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		// public function update()
		// {
		// 	if(! $id = $this->session->userdata('edit')){
		// 		die('You need the id to perform updation');
		// 	}

		// 	if(! $this->input->post()){
		// 		$res = [
		// 			"message" => "where's the data, bruh?",
		// 			"status"  => 69420
		// 		];
		// 	}


		// 	if ($result = $this->supply_model->update($id)) {
		// 		$res = [
		// 			"result"  => $result,
		// 			"barang_id" => $id,
		// 			"message" => "barang updated",
		// 			"status"  => 200
		// 		];
		// 	}else{
		// 		$res = [
		// 			"result"  => $result,
		// 			"barang_id" => $id,
		// 			"message" => "barang not updated",
		// 			"status"  => 500
		// 		];
		// 	}

		// 	header("Content-type: application/json");
		// 	echo json_encode($res);
		// }

		// public function delete()
		// {
		// 	if (! $id = $this->session->userdata('delete')) {
		// 		die("id needed to perform deletion");
		// 	}

		// 	if ($result = $this->supply_model->delete($id)) {
		// 		$res = [
		// 			"result"  => $result,
		// 			"barang_id" => $id,
		// 			"message" => "barang deleted",
		// 			"status"  => 200
		// 		];
		// 	}else{
		// 		$res = [
		// 			"result"  => $result,
		// 			"barang_id" => $id,
		// 			"message" => "barang not deleted",
		// 			"status"  => 500
		// 		];
		// 	}
		// 		header("Content-type: application/json");
		// 		echo json_encode($res);
		// }

		public function create_detail()
		{
			if ($result = $this->supply_model->create_detail_supply()) {
				$res = [
					"result"  => $result,
					"message" => "detail supply saved",
					"status"  => 200
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		public function get_detail($id)
		{
			if (! $id) { return die("id_supply needed"); }

			if ($result = $this->supply_model->get_detail($id)) {
				$res = $result->result();
			}
			header("Content-type: application/json");
			echo json_encode($res);
		}	

		public function new_id()
		{
			echo $this->supply_model->new_id();
		}
	}
 ?>