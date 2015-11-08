<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merk extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('merk_model','tbl');
			$data['title'] = 'Merk';
			$data['grid'] = $this->tbl->get();
			$this->load->view('merk',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function add() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Merk';
			$data['flag']='Add';
			$this->load->view('merk_ae',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
	public function edit($id) {
		if($this->session->userdata('user_session')) {
			$this->load->model('merk_model','tbl');
			$data['title'] = 'Merk';
			$data['flag']='Edit';
			
			$data['id'] = $this->tbl->getById($id);
			$this->load->view('merk_ae',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
	
	public function addProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Merk';
			$data['flag']='Add';
	
			$this->load->model('merk_model','tbl');
			
			$data['dataFrom']= array(
	           'merk_name' => $this->input->post('txtName'),
	           'is_active' => $this->input->post('chkActive'),
	           'created_by' => $this->session->userdata('user_session')->user_code
	        );
			if ($this->tbl->add($data['dataFrom'])) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully add.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed add.</div>';
			}
			unset($data['dataFrom']);
			$this->load->model('merk_model','tbl');
			$data['title'] = 'Merk';
			$data['grid'] = $this->tbl->get();
			$this->load->view('merk',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}

	public function editProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Merk';
			$data['flag']='Edit';
	
			$this->load->model('merk_model','tbl');
			
			$data['dataFrom']= array(
	           'merk_name' => $this->input->post('txtName'),
	           'is_active' => $this->input->post('chkActive'),
	           'modified_by' => $this->session->userdata('user_session')->user_code
	           ,'modified_date' => date("Y-m-d H:i:s")
	        );
			if ($this->tbl->edit($data['dataFrom'],$this->input->post('txtCode'))) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully edit.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed edit.</div>';
			}
			unset($data['dataFrom']);
			$this->load->model('merk_model','tbl');
			$data['title'] = 'Merk';
			$data['grid'] = $this->tbl->get();
			$this->load->view('merk',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
}