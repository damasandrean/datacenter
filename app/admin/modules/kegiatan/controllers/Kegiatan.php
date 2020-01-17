<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends MY_Controller
{

	public function __construct()
	{
		$this->load->model('M_kegiatan');
		$this->load->library('recaptcha');
	}

	public function index()
	{
		if (\strpos(get_role()->role, "2")) {
			$data['content'] = 'kegiatan';
			$this->load->view('template', $data);
		} else {
			echo "Tidak Ada Akses";
		}
	}

	public function kegiatan_today()
	{
		if (\strpos(get_role()->role, "3")) {
			$data['content'] = 'kegiatantoday';
			$this->load->view('template', $data);
		} else {
			echo "Tidak Ada Akses";
		}
	}



	public function ajax_action_add_kegiatan()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');


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
				"nama_kegiatan" => post("nama_kegiatan")
			);
			$add = $this->M_kegiatan->insert_table("tbl_kegiatan", $data);
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
					"redirect" => '' . base_url() . $this->config->item('index_page') . 'kegiatan'
				);
				print json_encode($json_data);
			}
		}
	}

	function ajax_action_datatable_kegiatan()
	{
		$column = "*";
		$table = "tbl_kegiatan";
		$column_order = array('nama_kegiatan');
		$column_search = array('nama_kegiatan');
		$order = array('id_kegiatan' => 'DESC');
		$where = '';
		$joins = '';
		$list = $this->M_kegiatan->get_datatables($column, $table, $column_order, $column_search, $order, $where, $joins);

		$link = '' . base_url() . $this->config->item('index_page') . '/kegiatan';
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $key->nama_kegiatan;
			$row[] = '<input type="button" class="btn btn-danger btn-sm" onclick="ajaxItemDelete(' . "'" . $link . "'" . ',' . "'ajax_action_delete_admin'" . ',' . $key->id_kegiatan . ')"  value="Hapus">
					<input type="button" class="btn btn-info btn-sm"  onclick="ajax_show_edit_modal(' . $key->id_kegiatan . ')" value="Edit">';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_kegiatan->count_all($table, $where, $joins),
			"recordsFiltered" => $this->M_kegiatan->count_filtered($column, $table, $column_order, $column_search, $order, $where, $joins),
			"data" => $data,
		);

		echo json_encode($output);
	}

	function ajax_action_get_kegiatan()
	{
		$id = $this->uri->segment(3);
		$data = $this->M_kegiatan->fetch_table('*', 'tbl_kegiatan', 'id_kegiatan = ' . $id, '', '', 0, 0, TRUE);

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
		$delete = $this->M_kegiatan->delete_table("tbl_kegiatan", "id_kegiatan", $id);
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
				"redirect" => '' . base_url() . $this->config->item('index_page') . 'kegiatan'
			);
			print json_encode($json_data);
		}
	}

	function ajax_action_edit()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');


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
		$id = $this->uri->segment(3);

		### TRANSACTION START
		$this->db->trans_start();
		$data = array(
			"nama_kegiatan" => post("nama_kegiatan")
		);


		$edit = $this->M_kegiatan->update_table('tbl_kegiatan', $data, 'id_kegiatan', $id);

		$this->db->trans_complete();
		### TRANSACTION END

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
				"redirect" => '' . base_url() . $this->config->item('index_page') . '/kegiatan/'
			);
			print json_encode($json_data);
		}
	}
	function ajax_action_get_kegiatan_all()
	{
		$data = $this->M_kegiatan->fetch_table('*', 'tbl_kegiatan', '', '', '', 0, 0, TRUE);

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
}
