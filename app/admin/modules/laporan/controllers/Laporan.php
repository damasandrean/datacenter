<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    
    public function __construct()
    {
        $this->load->model('M_laporan');
    }
    
    public function index()
    {
        if(\strpos(get_role()->role, "5")){
            $data['content'] = 'laporan';
            $data['page_active'] = 'laporan';
            $this->load->view('template', $data); 
        }else{
            echo "Tidak Ada Akses";         
        }   
      
        
    }

   
    function ajax_action_datatable_mutasi(){
        $column = "a.*,b.*";
        $table = "a__laporan a";
        $column_order = array('desc_laporan');
        $column_search = array('desc_laporan');
        $order = array('id_laporan' => 'DESC'); 
        $where = '';
        $joins = array(
            array(
                'table' => 'mr__merchant b',
                'condition' => 'a.id_merchant = b.id_merchant',
                'jointype' => ''
            ),
        );
        $list = $this->M_mutasi->get_datatables($column,$table,$column_order,$column_search,$order,$where,$joins);
        
        $link = ''.base_url().$this->config->item('index_page').'/mutasi';
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->name_merchant;
            $row[] = $key->created_at;
            $row[] = addNumber($key->total+$key->kurir_price);
            if($key->status_mutasi == 1){
               $row[] = "<badge class='badge badge-success'>Penambahan</badge>";
            }else if($key->status_mutasi == 2){
               $row[] = "<badge class='badge badge-danger'>Pengurangan</badge>";
            }else  if($key->status_mutasi == 3){
               $row[] = "<badge class='badge badge-info'>Penarikan Dana</badge>";
            }else{
               $row[] = "---"; 
            }
            $row[] = $key->desc_mutasi;
            $data[] = $row;
        }
    
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_mutasi->count_all($table,$where,$joins),
            "recordsFiltered" => $this->M_mutasi->count_filtered($column,$table,$column_order,$column_search,$order,$where,$joins),
            "data" => $data,
        );
        
        echo json_encode($output);
    }

       public function get_saldo(){
            $sum_tambah = $this->M_mutasi->fetch_joins('a__mutasi ', 'sum(total) as jumlah','', 'id_merchant ='."'".$this->session->userdata('id')."' AND status_mutasi = 1",'',TRUE);
            $sum_kurang = $this->M_mutasi->fetch_joins('a__mutasi ', 'sum(total) as jumlah','', 'id_merchant ='."'".$this->session->userdata('id')."' AND status_mutasi = 2",'',TRUE);
            $sum_tambah_kurir = $this->M_mutasi->fetch_joins('a__mutasi ', 'sum(kurir_price) as jumlah','', 'id_merchant ='."'".$this->session->userdata('id')."' AND status_mutasi = 1",'',TRUE);
            $sum_kurang_kurir = $this->M_mutasi->fetch_joins('a__mutasi ', 'sum(kurir_price) as jumlah','', 'id_merchant ='."'".$this->session->userdata('id')."' AND status_mutasi = 2",'',TRUE);

            $sum_wd = $this->M_mutasi->fetch_joins('a__mutasi ', 'sum(total) as jumlah','', 'id_merchant ='."'".$this->session->userdata('id')."' AND status_mutasi = 3",'',TRUE);
            $jumlah_sum = (int) $sum_tambah[0]->jumlah  + (int) $sum_tambah_kurir[0]->jumlah ;
            $jumlah  =  $jumlah_sum - (int) $sum_wd[0]->jumlah;
            print_r($jumlah);
        }

    
    

    
}
