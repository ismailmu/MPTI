<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('ticket_model','tbl');
			$session=$this->session->userdata('user_session');
			$data['title'] = 'Ticket';	
			$data['grid'] = $this->tbl->getByCriteria($session->group_code,$session->user_code);
			$data['isAllowTicket']=$this->tbl->getIsAllowTicket($session->user_code,'save');
			$this->load->model('group_model','tblGroup');
			$this->load->view('ticket',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function add() {
		if($this->session->userdata('user_session')){
			$this->load->model('ticket_model','tbl');
			$this->load->model('type_model','tblType');
			$data['title'] = 'Ticket';
			$data['flag']='Add';
			$data['gridType']=$this->tblType->get();
			$data['gridStatus']=$this->tbl->getTicketStatusByGroup($this->session->userdata('user_session')->group_code);
			$data['isAllowTicket']=$this->tbl->getIsAllowTicket($this->session->userdata('user_session')->user_code,'save');
			$this->load->view('ticket_ae',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	public function edit($id) {
		$this->load->model('ticket_model','tbl');
		$this->load->model('type_model','tblType');
		$data['title'] = 'Ticket';
		$data['flag']='Edit';
		
		$data['gridType']=$this->tblType->get();
		$data['gridStatus']=$this->tbl->getTicketStatusByGroup($this->session->userdata('user_session')->group_code);
		$data['isAllowTicket']=$this->tbl->getIsAllowTicket($this->session->userdata('user_session')->user_code,'save');
		$data['id'] = $this->tbl->getById($id);
		$this->load->view('ticket_ae',$data);
	}
	
	public function addProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Ticket';
			$data['flag']='Add';
	
			$this->load->model('ticket_model','tbl');
			$status=$this->input->post('cboStatus');
			$data['dataFrom']= array(
			   'ticket_name' => $this->input->post('txtName'),
	           'type_code' => $this->input->post('txtTypeCode'),
	           'problem_type' => $this->input->post('cboProblemType'),
	           'date_open' => date("Y-m-d H:i:s"),
	           'sn' => $this->input->post('txtSN'),
	           'created_by' => $this->session->userdata('user_session')->user_code
	        );
			//$result=$this->tbl->add($data['dataFrom'],$status,$this->input->post('txtDesc'));
			//echo $result;
			if ($this->tbl->add($data['dataFrom'],$status,$this->input->post('txtDesc'))) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully add.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed add.</div>';
			}
			unset($data['dataFrom']);
			$session=$this->session->userdata('user_session');
			$this->load->model('ticket_model','tbl');
			$data['grid'] = $this->tbl->getByCriteria($session->group_code,$session->user_code);
			$data['isAllowTicket']=$this->tbl->getIsAllowTicket($session->user_code,'save');
			$this->load->view('ticket',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}

	public function editProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Ticket';
			$data['flag']='Edit';
	
			$this->load->model('ticket_model','tbl');
			$status=$this->input->post('cboStatus');
			$hw=$this->input->post('txtHardwareCode');
			if ($hw=="") {
				$hw=null;
			}
			$dateClosed=($status=="ST05")?date("Y-m-d H:i:s"):null;
			
			if ($status=="ST01") {
				$data['dataFrom']= array(
		           'ticket_name' => $this->input->post('txtName'),
		           'type_code' => $this->input->post('txtTypeCode'),
		           'problem_type' => $this->input->post('cboProblemType')
		        );
			}else if ($status=="ST04") {
				$data['dataFrom']= array(
				   'hardware_code' => $hw
		        );	  
			}
			else if ($status=="ST05") {
				$data['dataFrom']= array(
				   'date_closed' => $dateClosed
		        );	  
			}else { //ST02 dan ST03
				$data['dataFrom']= null;
			}
			
			if ($this->tbl->edit($data['dataFrom'],$this->input->post('txtCode'),$status,$this->input->post('txtDesc')
					,$this->session->userdata('user_session')->user_code,$hw)) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully edit.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed edit.</div>';
			}
			unset($data['dataFrom']);
			$this->load->model('ticket_model','tbl');
			$session=$this->session->userdata('user_session');
			$data['grid'] = $this->tbl->getByCriteria($session->group_code,$session->user_code);
			$data['isAllowTicket']=$this->tbl->getIsAllowTicket($session->user_code,'save');
			$this->load->view('ticket',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
}