<?php
class Udf
{
	private $CI;
	private $limit;
	public function __construct()
	{
		$this->CI    = &get_instance();
		//$this->CI->output->enable_profiler(true);
	}
	public function return_result_array($query,$name)
	{
		$dbError = $this->CI->db->error();
		if($dbError['code']=='00000'){  //Means No Error in query execution
			if($query->num_rows()>0){
				$result = $query->result_id->fetchAll(PDO::FETCH_ASSOC);
			}
			else{
				$result=array();  
			}
			$query->free_result();
			
			return $result;
		}
		else{
			echo $name; echo '<br>'; echo $dbError['message'];
		}
	}
	
	public function return_row_array($query,$name)
	{
		$dbError = $this->CI->db->error();
		if($dbError['code']=='00000'){  //Means No Error in query execution
			if($query->num_rows()>0){
				$result = $query->result_id->fetch(PDO::FETCH_ASSOC);
			}
			else{
				$result=array();  
			}
			$query->free_result();
			
			return $result;
		}
		else{
			echo $name; echo '<br>'; echo $dbError['message']; 	exit(0);  
		}
		
	}
		
	function rand_string( $length ) 
	{
		$str='';
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	function rand_no( $length ) 
	{
		$str='';
		$chars = "123456789";	
		
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	public function pgn_var()
	{
	    $config['per_page'] = 10;  
		$config['num_links'] = 5; 
		$config['prev_link'] = '&laquo;';
		$config['next_link'] = '&raquo;';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['full_tag_open'] ='<ul>';
		$config['full_tag_close'] ='</ul>';
		$config['num_tag_open']='<li>';
		$config['num_tag_close']='</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		return $config;
    }
	public function pagination_config_frontpanel()
	{
	    $config['per_page'] = 15;  
		$config['num_links'] = 5; 
		$config['prev_link'] = '&laquo;';
		$config['next_link'] = '&raquo;';
		$config['first_link'] = false;
		$config['last_link'] = false;
		// $config['full_tag_open'] ='<ul>';
		// $config['full_tag_close'] ='</ul>';
		// $config['num_tag_open']='<a>';
		// $config['num_tag_close']='</a>';
		// $config['next_tag_open'] = '<a>';
		// $config['next_tag_close'] = '</a>';
		// $config['prev_tag_open'] = '<a>';
		// $config['prev_tag_close'] = '</a>';
		$config['cur_tag_open'] = '&nbsp;<strong>';
		$config['cur_tag_close'] = '</strong>';
		return $config;
    }
	
	public function send_mail_amazon_ses($from, $to, $subject, $content, $fileInfo, $otherRecepients=array()){
		$final_message = $content;
		$returnpath = 'tasleem@getadmissions.com';
		//==============Mail goes through SES (Amazon Service) ============== 
		require_once('application/libraries/SimpleEmailServiceMessage.php');
		require_once('application/libraries/SimpleEmailService.php');
		require_once('application/libraries/SimpleEmailServiceRequest.php');
		$ses = new SimpleEmailService('AKIAIEAVDS7OREFU3CNA','DJjmbv2aGz4exM0oo0aDOxlMuVFhvd+N2ONCWO8I');
		$m = new SimpleEmailServiceMessage();
		$m->setFrom($from);
		$m->setSubjectCharset('ISO-8859-1');
		$m->setMessageCharset('ISO-8859-1');
		$m->setSubject($subject);
		$m->addTo($to);
		if(!empty($fileInfo)){
			$m->addCustomHeader("Force-headers:\t1");
			foreach($fileInfo as $row){
				$m->addAttachmentFromData($row['file_name'], $row['file_data'], $row['file_mime']);
			}
			$m->setMessageFromString('',$final_message);
		}
		else{
			$m->addRawMessageFromString('html', $final_message, 'text/html');
		}
		
		if(!empty($otherRecepients)){
			if(!empty($otherRecepients['CC']) ){
				$m->addCC($otherRecepients['CC']);
			}
			if(!empty($otherRecepients['BCC']) ){
				$m->addBCC($otherRecepients['BCC']);
			}
		}
		$m->setReturnPath($returnpath);
		$response=$ses->sendEmail($m);
		return $response;
	}
	function send_mail($from, $to, $subject, $content, $otherRecepients=array())
    {
		$config = array(
            'mailtype' => 'html',
            'wordwrap' => TRUE, 
            'newline' => "\r\n", 
            'crlf' => "\r\n" 
		);
		
        $final_message = $content;
		
		$this->CI->load->library('email', $config);
		$this->CI->email->from($from, 'Tirumalabearings');
		$this->CI->email->to($to); 
		
		if(!empty($otherRecepients)){
			if(!empty($otherRecepients['CC']) ){
				$this->CI->email->cc($otherRecepients['CC']);
			}
			if(!empty($otherRecepients['BCC']) ){
				$this->CI->email->bcc($otherRecepients['BCC']);
			}
		}
		$this->CI->email->subject($subject);
		$this->CI->email->message($final_message);	
		
		$resp=$this->CI->email->send();
		if($resp){
		  return 1;
		}
		else{  
		  return $this->CI->email->print_debugger();
		}
		
	}
	
}




