<?php
class M_master extends CI_Model
{
	public function __construct ()
	{
		parent::__construct();
		//load the pdo db config 
		//$this->pdo = $this->load->database('pdo', true);

	}
	
	public function get_paper_board(){
		$this->db->order_by("type", "asc");
		$pdoResult = $this->db->get('paper_boards');
		return $this->udf->return_result_array($pdoResult, 'M_master::get_paper_board');
	}
	
	public function update_paper_board($data, $edit_condition){
		$this->db->update('paper_boards', $data, $edit_condition);	
	}
		
}