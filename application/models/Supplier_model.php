<?php 
	/**
	 * 
	 */
	class Supplier_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'supplier';

		public function get_all()
		{
			return $this->db->get($this->table);
		}

		public function get_by_id($id)
		{
			return $this->db->get_where($this->table, ["id" => $id]);	
		}

		public function create()
		{
			$data = [
				"nama" => $this->input->post("nama"),
				"asal" => $this->input->post("asal"),
				"telpon" => $this->input->post("telpon")

			];

			return $this->db->insert($this->table, $data);
		}

		public function update($id)
		{
			$data = [
				"nama" => $this->input->post("nama"),
				"asal" => $this->input->post("asal"),
				"telpon" => $this->input->post("telpon")
			];

			return $this->db->update($this->table, $data, ["id" => $id]);
		}

		public function delete($id)
		{
			return $this->db->delete($this->table, ["id" => $id]);
		}

		// public function new_id()
		// {
		// 	$id = 'U001';
		// 	$last = $this->db->query("SELECT id FROM ".$this->table."  ORDER BY id DESC LIMIT 1")->row();

		// 	if ($last) {
		// 		$last = $last->id;
		// 		$new = substr($last, 1);
		// 		$new++;
		// 		$new = substr($id, 0, -(strlen($new))).$new;
				
		// 		return $new;
		// 	}else{
		// 		return $id;
		// 	}
		// }
	}
?>

