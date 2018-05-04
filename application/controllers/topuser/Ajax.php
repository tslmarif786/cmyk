<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
		$this->load->model('admin_utility');
		//$this->load->model('m_stock');
	}	
		
	//----Paper Stock Receipt
	public function get_party_detail(){
		$party_name  = $this->input->post('pname'); 
		$result = $this->admin_utility->get_single_data('parties', 'id, mobile_num', $order='', $filter_by=array('pname'=>$party_name));
		
		echo json_encode($result);
	}
	
	public function get_paper_type(){
		$pb_category  = $this->input->post('category'); 
		$result = $this->admin_utility->get_data('paper_boards', 'id, type', $order='type asc', $filter_by=array('category'=>$pb_category));
		
		echo json_encode($result);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */