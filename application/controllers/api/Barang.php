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
			$this->load->model('supplier_model');
		}

		public function index($id = null)
		{
			if ($id) {
				$result = $this->barang_model->get_by_id($id)->row();
			}else{
				$result = $this->barang_model->get_all()->result();
			}


			$res = $result;
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
					"status"  => 69420
				];
			}


			if ($result = $this->barang_model->update($id)) {
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang updated",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang not updated",
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

			if ($result = $this->barang_model->delete($id)) {
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang deleted",
					"status"  => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "barang not deleted",
					"status"  => 500
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		public function update_stok()
		{	
			header("Content-type: application/json");

			if(! $this->input->post("id") && ! $this->input->post("stok")){
				$res = [
					"message" => "data (id, stok) needed to perform stock updation",
					"status"  => 100,
					"data" => var_dump($this->input->post())
				];
				echo json_encode($res);
				var_dump($this->input->post());
				die();
			}

			$id  = $this->input->post("id");
			$stok  = $this->input->post("stok");

			if ($result = $this->barang_model->update_stok($id)) {
				$res = [
					"result" => $result,
					"barang_id" => $id,
					"stok"      => $this->barang_model->get_by_id($id)->row()->stok,
					"message"   => "stok barang updated",
					"status"    => 200
				];
			}else{
				$res = [
					"result"  => $result,
					"barang_id" => $id,
					"message" => "stok barang not updated",
					"status"  => 500
				];
			}
			echo json_encode($res);
		}

		public function get_all_with_capitalized_name($id = null)
		{

			$result = $this->barang_model->get_all()->result();

			// kapitalisasi huruf awal dari nama barang
			foreach($result as $r){
				$r->nama = ucwords($r->nama);
			}

			$res = $result;
			header("Content-type: application/json");
			echo json_encode($res);
		}


	}
 ?>