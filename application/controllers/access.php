<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('group_model','tbl');
			$data['title'] = 'Access Control';
			$data['gridGroup'] = $this->tbl->get();
			$data['groupSelected'] = "";
			$this->load->view('access',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function changeGroup() {
		if($this->session->userdata('user_session')){
			$group = $this->input->post('cboGroup');
			$this->load->model('group_model','tbl');
			$data['title'] = 'Access Control';
			$data['gridGroup'] = $this->tbl->get();
			$data['groupSelected'] = "$group";
			
			$this->load->model('access_model','tblAccess');
			$data['gridMenu'] = $this->tblAccess->getMenuByGroupCode($group);
			$data['gridStatus'] = $this->tblAccess->getStatusByGroupCode($group);
			$this->load->view('access',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function addProcess() {
		if($this->session->userdata('user_session')) {
			$this->load->model('group_model','tbl');
			
			$data['title'] = 'Access Control';
			$data['gridGroup'] = $this->tbl->get();
			$data['groupSelected'] = "";
			$code = $this->input->post('txtCode');
			$user=$this->session->userdata('user_session')->user_code;
			
			$this->load->model('menu_model','tblMenu');
			$this->tblMenu->deleteGroupMenu($code);
			
			$MenuArr = $this->input->post('chkMenu');
			if (is_array($MenuArr)) {
				foreach ($MenuArr as $key => $value) {
					$this->tblMenu->addGroupMenu($code,$value,$user);
				}
			}
			$this->load->model('status_model','tblStatus');
			$this->tblStatus->deleteGroupStatus($code);
			
			$viewArr = $this->input->post('chkView');
			if (is_array($viewArr)) {
				foreach ($viewArr as $key => $value) {
					$this->tblStatus->addGroupStatus($code,$value,$user,'view');
				}
			}
			$saveArr = $this->input->post('chkSave');
			if (is_array($saveArr)) {
				foreach ($saveArr as $key => $value) {
					$this->tblStatus->addGroupStatus($code,$value,$user,'save');
				}
			}
			$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully edit.</div>';
			$this->load->view('access',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
}