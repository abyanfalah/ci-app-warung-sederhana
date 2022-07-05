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
					t.pelanggan as pelanggan
				FROM transaksi t INNER JOIN user u ON t.id_user = u.id
				-- INNER JOIN pelanggan p ON t.pelanggan = p.nama
				WHERE t.id = $id
				ORDER BY t.id
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
			$today = date("Ymd");

			if ($last) {
				$last = $last->id;
				$last_date = substr($last, 0, 8);

				if ($last_date == $today) {
					$new = substr($last, 8);
					$new++;
					$new = substr($id, 0, -(strlen($new))).$new;
					return $today.$new;
				}else{
					return $today.$id;	
				}
			}else{
				return $today.$id;
			}
		}

		// ================================================== DETAIL TRANSAKSI

		public function get_detail($id_transaksi)
		{
			return $this->db->get_where("detail_transaksi", ["id_transaksi" => $id_transaksi]);
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

