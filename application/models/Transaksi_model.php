<?php 
	/**
	 * 
	 */
	class Transaksi_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'transaksi';

		public function get_all()
		{
			return $this->db->query("
				SELECT
					t.id,
					t.total,
					u.nama as user,
					-- p.nama as pelanggan
					t.pelanggan as pelanggan
				FROM transaksi t 
				INNER JOIN user u ON t.id_user = u.id
				-- INNER JOIN pelanggan p ON t.pelanggan = p.nama
				ORDER BY t.id
			");
		}

		public function get_by_id($id)
		{
			return $this->db->query("
				SELECT
					t.id,
					t.total,
					u.nama as user,
					p.nama as pelanggan
				FROM transaksi t INNER JOIN user u ON t.id_user = u.id
				INNER JOIN pelanggan p ON t.pelanggan = p.nama
				WHERE t.id = $id
				ORDER BY t.id
			");
		}

		public function create()
		{
			$data = [
				"id" => $this->new_id(),
				"total" => $this->input->post('total'),
				"id_user" => $this->input->post('id_user'),
				"pelanggan" => $this->input->post('pelanggan')
			];
			return $this->db->insert($this->table, $data);
		}

		// public function update($id)
		// {
		// 	$data = [
		// 		"nama" => $this->input->post("nama"),
		// 		"id_jenis" => $this->input->post("jenis"),
		// 		"harga" => $this->input->post("harga"),
		// 		"satuan" => $this->input->post("satuan")
		// 	];

		// 	return $this->db->update($this->table, $data, ["id" => $id]);
		// }

		// public function delete($id)
		// {
		// 	return $this->db->delete($this->table, ["id" => $id]);
		// }

		public function new_id()
		{
			$id   = '001';
			$last = $this->db->query("SELECT id FROM ".$this->table."  ORDER BY id DESC LIMIT 1")->row();

			if ($last) {
				$last = $last->id;
				$new = substr($last, 8);
				$new++;
				$new = substr($id, 0, -(strlen($new))).$new;
				
				return date("Ymd").$new;
			}else{
				return date("Ymd").$id;
			}
		}

		public function create_detail_transaksi()
		{
			$data = [
				"id_transaksi" => $this->input->post('id_transaksi'),
				"id_barang" => $this->input->post('id_barang'),
				"qty" => $this->input->post('qty'),
			];
			return $this->db->insert("detail_transaksi", $data);
		}
	}
?>

