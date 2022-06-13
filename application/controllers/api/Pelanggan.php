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
		}

		public function index($nama = null)
		{
			if ($nama) {
				$result = $this->pelanggan_model->get_by_nama($nama);
			}else{
				$result = $this->pelanggan_model->get_all();
			}


			$res = $result->result();
			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function create()
		{
			if ($result = $this->pelanggan_model->create()) {
				$res = [
					"result"  => $result,
					"message" => "pelanggan created",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"message" => "pelanggan not created",
					"status"  => 500
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		public function update()
		{
			if(! $this->input->post()){
				$res = [
					"message" => "where's the data, bruh?",
					"status"  => 69420
				];
			}

			$old_telpon = $this->input->post('old_telpon');
			$telpon = $this->input->post('telpon');

			if(! $old_telpon){
				die("old_telpon is needed to perform updation");
			}

			$old_data = $this->pelanggan_model->get_by_telpon($old_telpon)->row();

			if ($result = $this->pelanggan_model->update($old_telpon)) {
				$new_data = $this->pelanggan_model->get_by_telpon($telpon)->row();
				$res = [
					"result"  => $result,
					"message" => "pelanggan updated",
					"old_data" => $old_data,
					"new_data" => $new_data,
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"pelanggan_nama" => $old_data->nama,
					"message" => "pelanggan not updated",
					"status"  => 500
				];
			}


			header("Content-type: application/json");
			echo json_encode($res);


		}

		public function delete()
		{
			if (! $nama = $this->session->userdata('delete')) {
				die("nama needed to perform deletion");
			}

			if ($result = $this->pelanggan_model->delete($nama)) {
				$res = [
					"result"  => $result,
					"pelanggan_nama" => $nama,
					"message" => "pelanggan deleted",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"pelanggan_nama" => $nama,
					"message" => "pelanggan not deleted",
					"status"  => 500
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}
	}
 ?>