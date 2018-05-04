<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	}	
	
	public function index(){
		$this->user_info = $this->session->userdata('userInfo');
		if(!empty($this->user_info)){
			redirect(base_url('topuser/dashboard'));
		}
		$this->load->view('admin/v_login');
	}
	
	public function check_valid_user(){
		$emailId = $this->input->post('login_id');
		$password = $this->input->post('password');
		
		$this->load->model('m_login');
		
		$result = $this->m_login->checkValidUser($emailId, $password);
		if(empty($result)){
			$this->session->set_flashdata('login_msg', array('fail'=>'Email id or password you entered is incorrect.'));
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			$this->session->set_userdata('userInfo', $result);
			redirect(base_url('topuser/dashboard'));
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('userInfo');
		redirect(base_url('topuser'));
		//redirect($_SERVER['HTTP_REFERER']);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */