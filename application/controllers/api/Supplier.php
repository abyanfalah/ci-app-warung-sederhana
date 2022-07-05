<?php 
	/**
	 * 
	 */
	class Supplier extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('supplier_model');
		}

		public function index($id = null)
		{
			if ($id) {
				$result = $this->supplier_model->get_by_id($id)->row();
			}else{
				$result = $this->supplier_model->get_all()->result();
			}


			$res = $result;
			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function create()
		{
			if ($result = $this->supplier_model->create()) {
				$res = [
					"result"  => $result,
					"message" => "supplier created",
					"status"  => 200
				];
				header("Content-type: application/json");
				echo json_encode($res);
			}
		}

		public function update()
		{
			if(! $this->input->post()){
				$res = [
					"message" => "where's the data, bruh?",
					"status"  => 420
				];
			}

			if(! $id = $this->input->post('id')){
				die('You need the id to perform updation');
			}

			if ($result = $this->supplier_model->update($id)) {
				$res = [
					"result"      => $result,
					"supplier_id" => $id,
					"message"     => "supplier updated",
					"status"      => 200
				];
			}else{
				$res = [
					"result"      => $result,
					"supplier_id" => $id,
					"message"     => "supplier not updated",
					"status"      => 500
				];
			}

			header("Content-type: application/json");
			echo json_encode($res);
		}

		public function delete()
		{
			if (! $id = $this->input->post('id')) {
				die("id needed to perform deletion");
			}

			if ($result = $this->supplier_model->delete($id)) {
				$res = [
					"result"      => $result,
					"supplier_id" => $id,
					"message"     => "supplier deleted",
					"status"      => 200
				];
			}else{
				$res = [
					"result"    => $result,
					"barang_id" => $id,
					"message"   => "supplier not deleted",
					"status"    => 500
				];
			}
				header("Content-type: application/json");
				echo json_encode($res);
		}

		public function table()
		{
			$data['supplier'] = $this->supplier_model->get_all()->result();
			$this->load->view('admin/supplier/table', $data);
		}

		public function get_supplier_list()
		{
			$access = $this->session->userdata('akses');
			if (! $access == 'admin') {
				die('Anda bukan admin');
			}

			$data['supplier'] = $this->supplier_model->get_all()->result();
			$this->load->view($access."/supplier/list", $data);
		}
	}
 ?>