<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		$this->load->model('M_user');
		$this->load->library('recaptcha');
	}

		public function index(){
			$data['content'] = 'user';
			$this->load->view('template',$data);
		
	}


	public function ajax_action_add_user(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');


		if($this->form_validation->run()==FALSE){
			$error = $this->form_validation->error_array();
			$json_data =  array(
				"result" => FALSE ,
				"message" => array('head'=> 'Failed', 'body'=> 'Pastikan Data terisi Semua'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}else{
			$data = array(
				"username" => post("username"),
				"password" => md5(post("password"))
			);
			$add = $this->M_user->insert_table("tbl_user",$data);
			if($add==FALSE){
				$json_data =  array(
					"result" => FALSE ,
					"message" => array('head'=> 'Failed', 'body'=> 'Gagal Menambah Data'),
					"form_error" => $error,
					"redirect" => ''
				);
				print json_encode($json_data);
				die();
			}else{
				$json_data =  array(
					"result" => TRUE,
					"message" => array('head'=> 'Success', 'body'=> 'Sukses Mengisi data'),
					"form_error" => '',
					"redirect" => ''.base_url().$this->config->item('index_page').'user'
				);
				print json_encode($json_data);
			}

		}
	}

	function ajax_action_datatable_admin(){
		$column = "*";
		$table = "tbl_user";
		$column_order = array('username');
		$column_search = array('username');
		$order = array('id_user' => 'DESC'); 
		$where = '';
		$joins = '';
		$list = $this->M_user->get_datatables($column,$table,$column_order,$column_search,$order,$where,$joins);
		
		$link = ''.base_url().$this->config->item('index_page').'/user';
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->username;
			$row[] = '<input type="button" class="btn btn-danger btn-sm" onclick="ajaxItemDelete('."'".$link."'".','."'ajax_action_delete_admin'".','.$key->id_user.')"  value="Hapus">
					<input type="button" class="btn btn-info btn-sm"  onclick="ajax_show_edit_modal('.$key->id_user.')" value="Edit">';
			$data[] = $row;
		}
	
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_user->count_all($table,$where,$joins),
			"recordsFiltered" => $this->M_user->count_filtered($column,$table,$column_order,$column_search,$order,$where,$joins),
			"data" => $data,
		);
		
		echo json_encode($output);
	}

    function ajax_action_get_user(){
		$id = $this->uri->segment(3);
		$data = $this->M_user->fetch_table('*', 'tbl_user', 'id_user = '. $id, '', '', 0, 0 ,TRUE);

		if(count($data) == 0){
			$json_data =  array(
				"result" => FALSE ,
				"message" => array('head'=> 'Failed', 'body'=> 'Gagal mengambil Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}else{
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head'=> 'Success', 'body'=> 'Sukses mengambil Data'),
				"form_error" => '',
				"redirect" => '',
				"data" => $data
			);
			print json_encode($json_data);
		}
	}

	public function ajax_action_delete_admin(){
		$id = $this->uri->segment(3);
		$delete = $this->M_user->delete_table("tbl_user","id_user",$id);
		if($delete==FALSE){
			$json_data =  array(
				"result" => FALSE ,
				"message" => array('head'=> 'Failed', 'body'=> 'Gagal Menghapus Data'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}else{
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head'=> 'Success', 'body'=> 'Sukses Menghapus data'),
				"form_error" => '',
				"redirect" => ''.base_url().$this->config->item('index_page').'user'
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_edit(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');


		### FORM VALIDATION
		if($this->form_validation->run()==FALSE){
			$error = $this->form_validation->error_array();
			$json_data =  array(
				"result" => FALSE ,
				"message" => array('head'=> 'Failed', 'body'=> 'Pastikan Data terisi Semua'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}
		$id = $this->uri->segment(3);

		### TRANSACTION START
		$this->db->trans_start();
		if(post('password') != ''){
				$data = array(
					"username" => post("username"),
					"password" => md5(post("password"))
		);
		}else{
				$data = array(
					"username" => post("username")
				);
		}
		

		$edit = $this->M_user->update_table('tbl_user', $data, 'id_user', $id);

		$this->db->trans_complete();
		### TRANSACTION END

		if($edit == FALSE){
			$json_data =  array(
				"result" => FALSE ,
				"message" => array('head'=> 'Failed', 'body'=> 'Gagal update Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		}else{
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head'=> 'Success', 'body'=> 'Sukses update Data'),
				"form_error" => '',
				"redirect" => ''.base_url().$this->config->item('index_page').'/user/'
			);
			print json_encode($json_data);
		}
	}
}
?>