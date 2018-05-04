<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

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
	
	//----Party / Company
	public function party_registration(){
		$data['user_info'] = $this->user_info;
		$data['file'] = 'admin/v_party_registration';
		//---GET State List
		$data['state_list'] = $this->admin_utility->get_states();
		//---Get Party List
		$data['party_list'] = $this->m_party->get_parties();
		
		$this->load->view('admin/template', $data);
	}
	public function registration_process(){
		if(isset($_SERVER['REQUEST_METHOD'])){
			$party_data= array(
				'pname' => $this->input->post('pname'),
				'cpname' => $this->input->post('cpname'),
				'email_id' => $this->input->post('email_id'),
				'mobile_num' => $this->input->post('mobile_num'),
				'tin_num' => $this->input->post('tin_num'),
				'ptype' => $this->input->post('rdo_ptype'),
				'plimit' => $this->input->post('plimit'),
				'opening_bal' => $this->input->post('opening_bal'),
				'bill_open_bal' => $this->input->post('bill_open_bal'),
				'oadds' => $this->input->post('oadds'),
				'ocity' => $this->input->post('ocity'),
				'ostate' => $this->input->post('ostate'),
				'opincode' => $this->input->post('opincode'),
				'fadds' => $this->input->post('fadds'),
				'fcity' => $this->input->post('fcity'),
				'fstate' => $this->input->post('fstate'),
				'fpincode' => $this->input->post('fpincode'),
				'added_by'=> $this->user_info['id']
			);
			$pid = $this->input->post('pid');
			if(empty($pid)){
				$this->admin_utility->set_data('parties', $party_data);
				$this->session->set_flashdata('msg', 'insert');
			}
			else{
				$this->m_party->update_party($party_data, array('id'=>$pid));
				$this->session->set_flashdata('msg', 'update');
			}
			redirect(base_url('topuser/master/party_registration'));
		}
		else{
			echo 'Sorry for inconvenience';
		}
	}
	
	//----Paper / Board Entry
	public function paper_board(){
		$this->load->model('m_master');
		$data['user_info'] = $this->user_info;
		$data['file'] = 'admin/masters/v_paper_board';
		
		//---Get Paper List
		$data['paper_board_list'] = $this->m_master->get_paper_board();
		
		$this->load->view('admin/template', $data);
	}
	
	public function paper_board_entry(){		
		if(isset($_SERVER['REQUEST_METHOD'])){
			$this->load->model('m_master');
			
			$party_data= array(
				'type' => $this->input->post('type'),
				'category' => $this->input->post('category')
			);
			$pid = $this->input->post('pid'); 
			if(empty($pid)){
				$this->admin_utility->set_data('paper_boards', $party_data);
				$this->session->set_flashdata('msg', 'insert');
			}
			else{
				$this->m_master->update_paper_board($party_data, array('id'=>$pid));
				$this->session->set_flashdata('msg', 'update');
			}
			redirect(base_url('topuser/master/paper_board'));
		}
		else{
			echo 'Sorry for inconvenience';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */