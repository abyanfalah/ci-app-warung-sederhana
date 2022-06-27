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
				$result = $this->pelanggan_model->get_by_nama($nama)->row();
			}else{
				$result = $this->pelanggan_model->get_all()->result();
			}


			$res = $result;
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
			// var_dump($this->input->post());

			if (! $telpon = $this->input->post('telpon')) {
				die("telpon number needed to perform deletion");
			}else{
				$data = $this->pelanggan_model->get_by_telpon($telpon)->row();
			}

			if ($result = $this->pelanggan_model->delete($telpon)) {
				$res = [
					"result"  => $result,
					"pelanggan_nama" => $data->nama,
					"pelanggan_telpon" => $data->telpon,
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

		public function table()
		{
			$data['pelanggan'] = $this->pelanggan_model->get_all()->result();
			$this->load->view('admin/pelanggan/table', $data);
		}
	}
 ?>