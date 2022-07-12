<?php 
	/**
	 * 
	 */
	class Supply_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'barang_masuk';
		// use "s" for supply

		public function get_all()
		{
			return $this->db->query("
				SELECT
					s.id,
					su.id as id_supplier,
					su.nama as supplier,
					u.id as id_user,
					u.nama as user,
					
				FROM $this->table
				INNER JOIN user u ON s.id_user = u.id
				INNER JOIN supplier su ON s.id_supplier = su.id
				ORDER BY s.id
			");
		}

		public function get_by_id($id)
		{
			return $this->db->query("
				SELECT
					s.id,
					su.id as id_supplier,
					su.nama as supplier,
					u.id as id_user,
					u.nama as user,
					
				FROM $this->table
				INNER JOIN user u ON s.id_user = u.id
				INNER JOIN supplier su ON s.id_supplier = su.id
				WHERE s.id = $id
				ORDER BY s.id
			");
		}

		public function get_by_date($date = null)
		{
			if (! $date) {
				$date = date('Ymd');
			}
			
			$this->db->like('id', $date);
			return $this->db->get($this->table);
		}

		public function create()
		{
			$data = [
				"id" => $this->new_id(),
				"id_supplier" => $this->input->post('id_supplier'),
				"id_user" => $this->input->post('id_user')
			];
			return $this->db->insert($this->table, $data);
		}


		public function new_id()
		{
			$today = date("Ymd");
			$id   = '001';
			$last = $this->db->query("SELECT id FROM ".$this->table."  ORDER BY id DESC LIMIT 1")->row();

			if (! $last) {
				return "IN_".$today.$id;
			}

			$last = $last->id;
			$last_date = substr($last, 3, 8);

			if (! $last_date == $today) {
				return "IN_".$today.$id;	
			
			}
			
			$new = substr($last, 11);
			$new++;
			$new = substr($id, 0, -(strlen($new))).$new;
			return "IN_".$today.$new;
			
		}

		// ================================================== DETAIL SUPPLY

		public function get_detail($id_supply)
		{
			return $this->db->get_where("detail_supply", ["id_supply" => $id_supply]);
		}

		public function create_detail_supply()
		{
			$data = [
				"id_supply" => $this->input->post('id_supply'),
				"id_barang" => $this->input->post('id_barang'),
				"qty" => $this->input->post('qty'),
			];
			return $this->db->insert("detail_supply", $data);
		}


	}
?>

