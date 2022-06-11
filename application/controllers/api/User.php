<?php 
	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

		public function index($id = null)
		{
			$message = null;
			$status  = null;
			$result  = null;

			switch ($_SERVER['REQUEST_METHOD']) {
				case 'GET':
					if(! $id){
						$result = $this->user_model->get_all()->result();
					}else{
						$result = $this->user_model->get_by_id($id)->result();
					}
					$message = "Data retrieved";
					$status  = 200;
					break;

				case 'POST':
					if ($this->user_model->create()) {
						$new_id = $this->user_model->new_id();
						$result = $this->input->post();
						$message = "user created with id => ".$new_id;
						$status  = 200;
					}else{
						$message = "user not created";
						$status  = 500;
					}

					// var_dump($this->input->post());

					break;
				
				case 'PUT':
					if (! $id) { die("need user id to perform updation"); }

					if ($this->user_model->update($id)) {
						$message = "user with id => $id updated";
						$status  = 200;
					}else{
						$message = "user not updated";
						$status  = 500;
					}
					break;

				case 'DELETE':
					if (! $id) { die("need user id to perform deletion"); }
						
					if ($this->user_model->delete($id)) {
						$message = "user deleted";
						$status  = 200;
					}else{
						$message = "user not deleted";
						$status  = 500;
					}
					break;

				default:
					header('HTTP/1.0 405 Method Not Allowed');
					die();
					break;
			}



			$res = [
				"result"  => $result,
				"message" => $message,
				"status"  => $status
			];

			header("Content-type: application/json");
			echo json_encode($res);
		}
	}
 ?>