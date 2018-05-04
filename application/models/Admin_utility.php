<?php
class Admin_utility extends CI_Model
{
	public function __construct ()
	{
		parent::__construct();
	}
	/**
		Purpose: At the time of pay now in admin panel, Email id is required for updating apps_status in lead_generated table. 
	**/
	public function get_states(){
		$sql = "select id, state from state";
		$query = $this->db->query($sql);
		return $this->udf->return_result_array($query, 'Admin_utility::get_states');
	}
	
	public function set_data($table_name, $dataInfo){
		$this->db->insert($table_name, $dataInfo);
		return $this->db->insert_id();
	}
	
	public function get_single_data($table_name, $columns, $order='', $filter_by=array()){
		if($columns != '*'){
			$this->db->select($columns);
		}
		if($order!=''){
			$this->db->order_by($order); 
		}
		if(empty($filter_by)){
			$pdoResult = $this->db->get($table_name);
		}
		else{
			$pdoResult = $this->db->get_where($table_name, $filter_by);
		}
		return $this->udf->return_row_array($pdoResult, 'Admin_utility::get_single_data');
	}
	
	public function get_data($table_name, $columns, $order='', $filter_by=array()){
		if($columns != '*'){
			$this->db->select($columns);
		}
		if($order!=''){
			$this->db->order_by($order); 
		}
		if(empty($filter_by)){
			$pdoResult = $this->db->get($table_name);
		}
		else{
			$pdoResult = $this->db->get_where($table_name, $filter_by);
		}
		return $this->udf->return_result_array($pdoResult, 'Admin_utility::get_data');
	}
	
	public function get_balance_qty($party, $paper_type, $size, $sizein, $GSM){
		$sql = "select bqty from stock_report where pname='$party' and pb_type='$paper_type' and pb_size='$size' and pb_sizein='$sizein' and gsm='$GSM' order by id desc limit 0,1";
		
		$query = $this->db->query($sql);
		return $this->udf->return_row_array($query, 'Admin_utility::get_balance_qty');
	}
	
	public function get_pagination($table_name, $columns, $order='', $filter_by=array(), $limit=''){
		
	}
	
}