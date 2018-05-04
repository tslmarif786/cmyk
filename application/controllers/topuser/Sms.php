<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends CI_Controller {

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
		$this->load->model('m_party');
	}	
	
	public function job_info(){	
		$data['user_info'] = $this->user_info;
		$data['file'] = 'admin/v_party_list';
		//---Get Party List
		$data['party_list'] = $this->m_party->get_parties();
		$this->load->view('admin/template', $data);
	}
	
	public function job_info_process(){					
		$mobileNumber = $this->input->post('mobile');
		//$mobileNumber = '9696573320';
		$senderId = 'DARPAN';
		$smsContentType = 'unicode';
		$message = 'आप का जॉब प्रिंट हो चुका है कटिंग व लेमिनेशन के लिए सम्पर्क करे ';
		
		$this->load->helper('sms');
		
		$smsResponse = sendsmsPOST($mobileNumber,$senderId,$message,$smsContentType);
		echo $smsResponse;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */