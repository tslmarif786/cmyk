<?php
class M_Party extends CI_Model
{
	public function __construct ()
	{
		parent::__construct();
		//load the pdo db config 
		//$this->pdo = $this->load->database('pdo', true);

	}
	
	public function get_parties($party_id=''){
		if(empty($party_id)){
			$pdoResult = $this->db->get('parties');
			return $this->udf->return_result_array($pdoResult, 'm_login::checkValidUser');
		}
		else{
			$sql = "select * from parties where id=?";
			$pdoResult = $this->db->query($sql, array($party_id ) );
			return $this->udf->return_row_array($pdoResult, 'm_login::checkValidUser');
		}
	}
	
	public function update_party($data, $edit_condition){
		$this->db->update('parties', $data, $edit_condition);	
	}
		
}