<?php
defined('BASEPATH') or exit('No direct script access allowed');

class level extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_level');
		$this->load->library('recaptcha');
	}

	public function index()
	{
		if (\strpos(get_role()->role, "6")) {
			$data['content'] = 'level';
			$this->load->view('template', $data);
		} else {
			echo "Tidak Ada Akses";
		}
	}


	public function ajax_action_add_level()
	{
		$this->form_validation->set_rules('name_level', 'name_level', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');


		if ($this->form_validation->run() == FALSE) {
			$error = $this->form_validation->error_array();
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Pastikan Data terisi Semua'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$data = array(
				"name_level" => post("name_level"),
				"role" => post("role"),
				"created_at" => date("Y-m-d H:i:s")
			);
			$add = $this->M_level->insert_table("sys_level", $data);
			if ($add == FALSE) {
				$json_data =  array(
					"result" => FALSE,
					"message" => array('head' => 'Failed', 'body' => 'Gagal Menambah Data'),
					"form_error" => $error,
					"redirect" => ''
				);
				print json_encode($json_data);
				die();
			} else {
				$json_data =  array(
					"result" => TRUE,
					"message" => array('head' => 'Success', 'body' => 'Sukses Mengisi data'),
					"form_error" => '',
					"redirect" => '' . base_url() . $this->config->item('index_page') . '/level'
				);
				print json_encode($json_data);
			}
		}
	}

	function ajax_action_datatable_level()
	{
		$column = "*";
		$table = "sys_level";
		$column_order = array('name_level');
		$column_search = array('name_level');
		$order = array('id_level' => 'DESC');
		$where = '';
		$joins = '';
		$list = $this->M_level->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins);

		$link = '' . base_url() . $this->config->item('index_page') . '/level';
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->name_level;
			$row[] = $key->role;
			$row[] = '<input type="button" class="btn btn-danger btn-sm" onclick="ajaxItemDelete(' . "'" . $link . "'" . ',' . "'ajax_action_delete_level'" . ',' . $key->id_level . ')"  value="Hapus">
					<input type="button" class="btn btn-info btn-sm"  onclick="ajax_show_edit_modal(' . $key->id_level . ')" value="Edit">';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_level->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_level->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);

		echo json_encode($output);
	}

	function ajax_action_get_menu()
	{
		$data = $this->M_level->fetch_table('*', 'sys_menu', '', '', '', 0, 0, TRUE);

		if (count($data) == 0) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Gagal mengambil Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Sukses mengambil Data'),
				"form_error" => '',
				"redirect" => '',
				"data" => $data
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_get_level()
	{
		$id = post('id_level');
		$data = $this->M_level->fetch_joins('sys_level ', '*', '', 'id_level = ' . $id, '', TRUE);

		if (count($data) == 0) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Gagal mengambil Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Sukses mengambil Data'),
				"form_error" => '',
				"redirect" => '',
				"data" => $data
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_get_all_level()
	{
		$data = $this->M_level->fetch_joins('sys_level ', '*', '', '', '', TRUE);

		if (count($data) == 0) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Gagal mengambil Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Sukses mengambil Data'),
				"form_error" => '',
				"redirect" => '',
				"data" => $data
			);
			print json_encode($json_data);
		}
	}

	public function ajax_action_delete_level()
	{
		$id = $this->uri->segment(3);
		// $delete = $this->M_sys->delete_table("sys_api","id_api",$id);
		// $this->db->trans_start();
		$data = array(
			"delete_at" => date("Y-m-d H:i:s")
		);


		$delete = $this->M_level->update_table('sys_level', $data, 'id_level', $id);
		if ($delete == FALSE) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Gagal Menghapus Data'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Sukses Menghapus data'),
				"form_error" => '',
				"redirect" => '' . base_url() . $this->config->item('index_page') . '/sys_api'
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_edit_level()
	{
		$this->form_validation->set_rules('id_level', 'name_api', 'required');
		if ($this->form_validation->run() == FALSE) {
			$error = $this->form_validation->error_array();
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Pastikan Data terisi Semua'),
				"form_error" => $error,
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$data = array(
				"name_level" => post("name_level"),
				"role" => post("role"),
				"update_at" => date("Y-m-d H:i:s")
			);
			$edit = $this->M_level->update_table("sys_level", $data, "id_level", post("id_level"));
			if ($edit == FALSE) {
				$json_data =  array(
					"result" => FALSE,
					"message" => array('head' => 'Failed', 'body' => 'Gagal Menambah Data'),
					"form_error" => $error,
					"redirect" => ''
				);
				print json_encode($json_data);
				die();
			} else {
				$json_data =  array(
					"result" => TRUE,
					"message" => array('head' => 'Success', 'body' => 'Sukses Mengisi data'),
					"form_error" => '',
					"redirect" => '' . base_url() . $this->config->item('index_page') . '/level'
				);
				print json_encode($json_data);
			}
		}
	}
}
