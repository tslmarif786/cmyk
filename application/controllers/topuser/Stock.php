<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $user_info = array();
	
	public function __construct(){
		parent::__construct();
		$this->user_info = $this->session->userdata('userInfo');
		if(empty($this->user_info)){
			redirect(base_url('topuser'));
		}
		
		$this->load->model('admin_utility');
		//$this->load->model('m_stock');
	}	
		
	//----Paper Stock Receipt
	public function receipt(){
		$data['user_info'] = $this->user_info;
		$data['file'] = 'admin/v_stock_receipt';
		//---GET Parties List
		$data['party_list'] = $this->admin_utility->get_data('parties', 'id, pname', 'pname asc');
		
		//---GET Paper Type
		$data['paper_types'] = $this->admin_utility->get_data('paper_boards', 'id, type', 'type asc', $filter_by=array('category'=>'Paper'));
		
		//---Get Paper Record
		//$data['stock_receipt'] = 
		
		$this->load->view('admin/template', $data);
	}
	public function receiving_process(){
		if(isset($_SERVER['REQUEST_METHOD'])){
			if($this->input->post('pb_category')=='Paper'){
				$pb_unit = 'Ream';
			}
			else{
				$pb_unit = 'Gross';
			}
			$paper_type = $this->input->post('pb_type');
			$size = $this->input->post('pb_size');
			$sizein = $this->input->post('pb_sizein');
			$party = $this->input->post('pname');
			$GSM = $this->input->post('gsm');
			$qty = $this->input->post('rqty').$pb_unit;
			
			$date_arr = explode('/',$this->input->post('added_on'));
			$now = $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0].' '.date('H:i:s');
			
			//-----Get Balance Qty
			$balQtyResult = $this->admin_utility->get_balance_qty($party, $paper_type, $size, $sizein, $GSM);
			if(empty($balQtyResult)){
				$bal_qty = 0;
			}
			else{
				$bal_qty = $balQtyResult['bqty'];
			}
			$total_bal_qty = $bal_qty + $this->input->post('rqty');
			
			$party_data= array(
				'pname' => $party,
				'pb_type' => $paper_type,
				'pb_size' => $size,
				'pb_sizein' => $sizein,
				'gsm' => $GSM,
				'weight' => $this->input->post('weight'),
				'quantity' => $this->input->post('rqty'),
				'pb_category' => $this->input->post('pb_category'),
				'pb_unit' => $pb_unit,
				'particulars' => $this->input->post('particulars'),
				'narration' => $this->input->post('narration'),
				'added_on' => $now
			);
			/*
			$pid = $this->input->post('pid');
			if(empty($pid)){
				$this->admin_utility->set_data('parties', $party_data);
				$this->session->set_flashdata('msg', 'insert');
			}
			else{
				$this->m_party->update_party($party_data, array('id'=>$pid));
				$this->session->set_flashdata('msg', 'update');
			}*/
			$insert_id = $this->admin_utility->set_data('receipthead', $party_data);
			
			$stock_data= array(
				'receipt_id'=>$insert_id,
				'pname' => $party,
				'pb_type' => $paper_type,
				'pb_size' => $size,
				'pb_sizein' => $sizein,
				'gsm' => $GSM,
				'weight' => $this->input->post('weight'),
				'rqty' => $this->input->post('rqty'),
				'iqty' => 0,
				'bqty' => $total_bal_qty,
				'pb_category' => $this->input->post('pb_category'),
				'pb_unit' => $pb_unit,
				'particulars' => $this->input->post('particulars'),
				'narration' => $this->input->post('narration'),
				'added_on' => $now
			);
			$insert_id = $this->admin_utility->set_data('stock_report', $stock_data);
			
			$mobileNumber = $this->input->post('mobile_no');
			$now = date('d-m-Y H:i');
			//$mobileNumber = '9696573320';
			$senderId = 'DARPAN';
			$smsContentType = 'english';
			$message = "Paper Recd.\nSN/$insert_id Dt. $now\nType: $paper_type\nSize: $size $sizein\nGSM: $GSM\nQty: $qty\nParty: $party";
		
			$this->load->helper('sms'); 
		
			$smsResponse = sendsmsPOST($mobileNumber.',9557366888',$senderId,$message,$smsContentType);
			//echo $smsResponse;
			$this->session->set_flashdata('msg', array('type'=>'succ', 'info'=>'Stock has been added successfully'));
			redirect(base_url('topuser/stock/receipt'));
		}
		else{
			echo 'Sorry for inconvenience';
		}
	}
	
	public function get_paper_type(){
		$pb_category  = $this->input->post('category'); 
		$result = $this->admin_utility->get_data('paper_boards', 'id, type', $order='type asc', $filter_by=array('category'=>$pb_category));
		
		echo json_encode($result);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */