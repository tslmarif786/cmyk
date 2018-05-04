<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('sendsmsPOST'))
{
   function sendsmsPOST($mobileNumber, $senderId, $message, $ContentType)
	{
		$serverUrl = '167.114.117.218'; // msg.msgclub.net
		$routeId = 1; //2->Promotional Route, Transactional Route=1, Promotional SenderID=3	
		$authKey = '82db61483355dc37804f2a7fda9589c2';
		
		//Prepare you post parameters
		$postData = array(
			'mobileNumbers' => $mobileNumber,        
			'senderId' => $senderId,
			'smsContent' => $message,
			'smsContentType' =>$ContentType,
			'routeId' => $routeId
		);


		$data_json = json_encode($postData);

		$url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;

		// init the resource
		$ch = curl_init();
		
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
		));

		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch)){
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		return $output;
	}
}