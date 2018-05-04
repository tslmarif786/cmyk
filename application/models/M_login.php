<?php
class M_login extends CI_Model
{
	public function __construct ()
	{
		parent::__construct();
		//load the pdo db config 
		//$this->pdo = $this->load->database('pdo', true);

	}
	
	public function get_user_permission($user_id){
		$sql = "select id, permissions from permissions where user_id='$user_id'";
		$query = $this->db->query($sql);
		return $this->udf->return_row_array($query, 'M_User::get_user_permission');
	}
	
	public function checkValidUser($email,$pw)
	{
		//$sql="select id, user_name, email_id, user_type from admin_login where email_id=? and password=?";
		/*$stmt = $this->db->prepare($select_query); //prepare statement does not support in codeigntier
		$stmt->bindValue(1,$email, PDO::PARAM_STR);
		$stmt->bindValue(2,MD5($pw), PDO::PARAM_STR);
		$stmt->execute(); */
		//using the pdo config
		//$pdoResult = $this->db->query($sql, array($email, MD5($pw) ) );
		$pdoResult = $this->db->get_where('admin_login', array('email_id'=>$email, 'password'=>MD5($pw) ) );
		return $this->udf->return_row_array($pdoResult, 'm_login::checkValidUser');
	}
	
	public function checkEmailIdExist($emailId, $userId=''){
		if(empty($userId)){
			$sql = "select id from login_info where email_id='$emailId'";
		}
		else{
			$sql = "select id from login_info where email_id='$emailId' and id <>$userId";
		}
		$query = $this->db->query($sql);
		return $this->udf->return_row_array($query, 'M_Login::checkEmailIdExist');
	}
	
	public function change_password($old_pw,$new_pw,$id)
	{
		$query = $this->db->update('applicant_login_info',array('password'=>$new_pw),array('id'=>$id,'password'=>$old_pw));
	}
	public function check_current_password($password,$id)
	{
		$query = $this->db->get_where('applicant_login_info',array('id'=>$id,'password'=>$password));
		return $this->udf->return_row_array($query,'M_utility::check_current_password');
	}
	public function reset_password($where, $data)
	{
		$query = $this->db->update('applicant_login_info', $data, $where);
	}
	public function set_login_info()
	{
		$sql = "select id, email_id from applicant_login_info where first_name=''";
		$query = $this->db->query($sql);
		return $this->udf->return_result_array($query, 'M_admin_login::set_login_info');
	}
	public function update_login_info($id)
	{
		
		 $sql = "UPDATE
    applicant_login_info as li,
    applicant_personal_info as pi
SET
    li.first_name = pi.first_name,
    li.mid_name = pi.mid_name,
	li.last_name = pi.last_name,
	li.mobile_no = pi.mobile_no

WHERE
    li.id = pi.applicant_id and pi.applicant_id='$id'";
	 
	 $this->db->query($sql);
	}
	
}