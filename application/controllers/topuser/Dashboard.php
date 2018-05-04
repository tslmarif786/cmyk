<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('m_login');
		$this->user_info = $this->session->userdata('userInfo');
		if(empty($this->user_info)){
			redirect(base_url('topuser'));
		}
	}	
	
	public function index(){	
		$data['user_info'] = $this->user_info;
		$data['file'] = 'admin/v_dashboard';
		$this->load->view('admin/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */