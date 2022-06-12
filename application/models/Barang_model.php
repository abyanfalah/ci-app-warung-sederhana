<?php 
	/**
	 * 
	 */
	class Barang_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'barang';

		public function get_all()
		{
			return $this->db->query("
					SELECT 
						b.id,
						b.nama,
						jb.nama as jenis,
						b.harga,
						b.satuan,
						b.stok
					FROM barang b INNER JOIN jenis_barang jb
					on b.id_jenis = jb.id
					ORDER BY b.id;
				");
		}

		public function get_by_id($id)
		{
			return $this->db->query("
					SELECT 
						b.id,
						b.nama,
						jb.nama as jenis,
						b.harga,
						b.satuan,
						b.stok
					FROM barang b INNER JOIN jenis_barang jb
					on b.id_jenis = jb.id
					WHERE b.id = '".$id."'
				");
		}

		public function create()
		{
			$data = [
				"id" => $this->new_id(),
				"nama" => $this->input->post("nama"),
				"id_jenis" => $this->input->post("jenis"),
				"harga" => $this->input->post("harga"),
				"satuan" => $this->input->post("satuan")
			];

			return $this->db->insert($this->table, $data);
		}

		public function update($id)
		{
			$data = [
				"nama" => $this->input->post("nama"),
				"id_jenis" => $this->input->post("jenis"),
				"harga" => $this->input->post("harga"),
				"satuan" => $this->input->post("satuan")
			];

			return $this->db->update($this->table, $data, ["id" => $id]);
		}

		public function delete($id)
		{
			return $this->db->delete($this->table, ["id" => $id]);
		}

		public function get_jenis()
		{
			return $this->db->get('jenis_barang');
		}

		public function get_satuan()
		{
			return $this->db->get('satuan');
		}

		public function add_stok($id)
		{
			$this->db->set('stok');
			return $this->db->update($this->table, $this->input->post('stok'), ["id" => $id]);
		}

		public function new_id()
		{
			$id = 'B001';
			$last = $this->db->query("SELECT id FROM ".$this->table."  ORDER BY id DESC LIMIT 1")->row()->id;

			if ($last) {
				$new = substr($last, 1);
				$new++;
				$new = substr($id, 0, -(strlen($new))).$new;
				
				return $new;
			}else{
				return $id;
			}
		}
	}
?>

