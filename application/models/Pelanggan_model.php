<?php 
	/**
	 * 
	 */
	class Pelanggan_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'pelanggan';

		public function get_all()
		{
			$this->db->order_by('nama');
			return $this->db->get($this->table);
		}

		public function get_by_nama($nama)
		{
			return $this->db->get_where($this->table, ["nama" => $nama]);
		}

		public function get_by_telpon($telpon)
		{
			return $this->db->get_where($this->table, ["telpon" => $telpon]);
		}

		public function create()
		{
			$data = [
				"nama" => $this->input->post("nama"),
				"telpon" => $this->input->post("telpon"),
				"alamat" => $this->input->post("alamat")
			];

			return $this->db->insert($this->table, $data);
		}

		public function update($old_telpon)
		{
			$data = [
				"nama" => $this->input->post("nama"),
				"telpon" => $this->input->post("telpon"),
				"alamat" => $this->input->post("alamat")
			];

			return $this->db->update($this->table, $data, ["telpon" => $old_telpon]);
		}

		public function delete($nama)
		{
			return $this->db->delete($this->table, ["nama" => $nama]);
		}
	}
?>

