<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		$this->load->model('M_login');
		$this->load->library('recaptcha');
	}

		public function index(){
		$this->load->view('login');	
		
	}

		 public function ajax_action_login(){
		$this->form_validation->set_rules('username', 'Username',  'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE){
			$form_error = $this->form_validation->error_array();
			$response =  array(
				'result' => FALSE,
				"message" => array('head'=> 'Failed', 'body'=> 'Pastikan data terisi semua.'),
				'form_error' => $form_error,
			);
			echo json_encode($response, JSON_PRETTY_PRINT);
			die();
		}else{
			$username = post('username');
			$password = post('password');

			$dataarr = array(
				'username' => $username,
				'password' => $password
			);

			$login = $this->db->get_where('tbl_user', $dataarr);
			if($login->num_rows() > 0){
				$sess = $login->row_array();
				
			
				$data = array(
					'id' => $sess['id_user']
				);

				$this->session->set_userdata($data);

                $data = array(
                    "result" => TRUE,
                    "message" => array('head'=> 'Success', 'body'=> 'Berhasil'),
                    "form_error" => '',
                    "redirect" => base_url().$this->config->item('index_page').'dashboard/'
                );
                echo json_encode($data);
				die();
			}else{
				$data = array(
                    "result" => FALSE,
                    "message" => array('head'=> 'failed', 'body'=> 'Pastikan Username dan Password anda benar'),
                    "form_error" => '',
                    "redirect" => ''
                );
                echo json_encode($data);
                die();
			}
		}
	}

	function ajax_action_logout(){
		$this->session->sess_destroy();
		$data = array(
			"result" => TRUE,
			"message" => array('head'=> 'Success', 'body'=> 'Berhasil'),
			"form_error" => '',
			"redirect" => base_url().$this->config->item('index_page').'/login/'
		);
		echo json_encode($data);
		redirect(base_url().$this->config->item('index_page').'/login/');		
		die();
	}

}
?>