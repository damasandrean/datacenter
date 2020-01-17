<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_petugas');
		$this->load->library('recaptcha');
	}

	public function index()
	{
		if (\strpos(get_role()->role, "1")) {
			$data['content'] = 'petugas';
			$this->load->view('template', $data);
		} else {
			echo "Tidak Ada Akses";
		}
	}

	function ajax_action_datatable_petugas()
	{
		$column = "*";
		$table = "tbl_petugas";
		$column_order = array('nama_petugas');
		$column_search = array('nama_petugas');
		$order = array('id_petugas' => 'DESC');
		$where = '';
		$joins = '';
		$list = $this->M_petugas->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins);
		$link = '' . base_url() . $this->config->item('index_page') . '/petugas';
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->nama_petugas;
			$row[] = '<input type="button" class="btn btn-danger btn-sm" onclick="ajaxItemDelete(' . "'" . $link . "'" . ',' . "'ajax_action_delete_admin'" . ',' . $key->id_petugas . ')"  value="Hapus">
					<input type="button" class="btn btn-info btn-sm"  onclick="ajax_show_edit_modal(' . $key->id_petugas . ')" value="Edit">';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_petugas->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_petugas->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function ajax_action_add_admin()
	{
		$this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required');


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
				"nama_petugas" => post("nama_petugas")
			);
			$add = $this->M_petugas->insert_table("tbl_petugas", $data);
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
					"redirect" => '' . base_url() . $this->config->item('index_page') . '/petugas'
				);
				print json_encode($json_data);
			}
		}
	}
	function ajax_action_get_admin()
	{
		$id = $this->uri->segment(3);
		$data = $this->M_petugas->fetch_table('*', 'tbl_petugas', 'id_petugas = ' . $id, '', '', 0, 0, TRUE);

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

	public function ajax_action_delete_admin()
	{
		$id = $this->uri->segment(3);
		$delete = $this->M_petugas->delete_table("tbl_petugas", "id_petugas", $id);
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
				"redirect" => '' . base_url() . $this->config->item('index_page') . '/petugas'
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_edit()
	{
		$this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required');
		### FORM VALIDATION
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
		}
		$data = array(
			"nama_petugas" => post("nama_petugas")
		);

		$edit = $this->M_petugas->update_table('tbl_petugas', $data, 'id_petugas', post("id_petugas"));
		if ($edit == FALSE) {
			$json_data =  array(
				"result" => FALSE,
				"message" => array('head' => 'Failed', 'body' => 'Gagal update Data'),
				"form_error" => '',
				"redirect" => ''
			);
			print json_encode($json_data);
			die();
		} else {
			$json_data =  array(
				"result" => TRUE,
				"message" => array('head' => 'Success', 'body' => 'Sukses update Data'),
				"form_error" => '',
				"redirect" => '' . base_url() . $this->config->item('index_page') . '/petugas/'
			);
			print json_encode($json_data);
		}
	}
}
