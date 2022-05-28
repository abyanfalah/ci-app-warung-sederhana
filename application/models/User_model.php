<?php 
	/**
	 * 
	 */
	class User_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		private $table = 'user';

		public function get_all()
		{
			return $this->db->query("
					SELECT 
						u.id,
						u.username,
						u.password,
						u.nama,
						u.alamat,
						u.lahir,
						u.id_akses,
						a.nama as akses
					FROM user u INNER JOIN akses a
					on u.id_akses = a.id
					ORDER BY u.id;
				");
		}

		public function get_by_id($id)
		{
			return $this->db->query("
					SELECT 
						u.id,
						u.username,
						u.password,
						u.nama,
						u.alamat,
						u.lahir,
						u.id_akses,
						a.nama as akses
					FROM user u INNER JOIN akses a
					on u.id_akses = a.id
					WHERE u.id = '".$id."'
					ORDER BY u.id;
				");
		}

		public function create()
		{
			$data = [
				"id" => $this->new_id(),
				"username" => $this->input->post('username'),
				"password" => sha1($this->input->post('password')),
				"nama" => $this->input->post("nama"),
				"alamat" => $this->input->post("alamat"),
				"lahir" => $this->input->post("lahir"),
				"id_akses" => $this->input->post("akses")
			];

			return $this->db->insert($this->table, $data);
		}

		public function update($id)
		{
			$data = [
				"username" => $this->input->post('username'),
				"nama" => $this->input->post("nama"),
				"alamat" => $this->input->post("alamat"),
				"lahir" => $this->input->post("lahir"),
				"id_akses" => $this->input->post("akses")
			];

			return $this->db->update($this->table, $data, ["id" => $id]);
		}

		public function delete($id)
		{
			return $this->db->delete($this->table, ["id" => $id]);
		}

		public function check_username()
		{
			return $this->db->get_where($this->table, [
				"username" => $this->input->post('username')
			])->num_rows();
		}

		public function check_username_with_password()
		{
			return $this->db->get_where($this->table, [
				"username" => $this->input->post('username'),
				"password" => sha1($this->input->post('password'))
			])->row_array();
		}

		public function get_accesses()
		{
			return $this->db->get('akses')->result();
		}


		public function new_id()
		{
			$id = 'U001';
			$last = $this->db->query("SELECT id FROM user  ORDER BY id DESC LIMIT 1")->row()->id;

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

