<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('user_model','tbl');
			$data['title'] = 'User';
			$data['grid'] = $this->tbl->get();
			$this->load->view('user',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function add() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'User';
			$data['flag']='Add';
			
			$this->load->model('group_model','tblGroup');
			$data['gridGroup'] = $this->tblGroup->get();
			
			$this->load->model('branch_model','tblBranch');
			$data['gridBranch'] = $this->tblBranch->get();
				
			$this->load->view('user_ae',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
	
	public function edit($id) {
		if($this->session->userdata('user_session')) {
			$this->load->model('user_model','tbl');
			$data['title'] = 'User';
			$data['flag']='Edit';
			
			$this->load->model('group_model','tblGroup');
			$data['gridGroup'] = $this->tblGroup->get();
				
			$this->load->model('branch_model','tblBranch');
			$data['gridBranch'] = $this->tblBranch->get();
			
			$data['id'] = $this->tbl->getById($id);
			$this->load->view('user_ae',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
	
	public function addProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'User';
			$data['flag']='Add';
	
			$this->load->model('user_model','tbl');
			$id=$this->input->post('txtCode');
			$data['dataFrom']= array(
			   'user_code' => $id,
	           'user_name' => $this->input->post('txtName'),
	           'group_code' => $this->input->post('txtGroupCode'),
	           'branch_code' => $this->input->post('txtBranchCode'),
	           'email' => $this->input->post('txtEmail'),
	           'no_ext' => $this->input->post('txtNoExt'),
	           'no_hp' => $this->input->post('txtNoHp'),
			   'departement' => $this->input->post('txtDepartement'),
	           'password' => md5($id.$this->input->post('txtPass')),
	           'is_active' => $this->input->post('chkActive'),
	           'created_by' => $this->session->userdata('user_session')->user_code
	        );
			
			if ($this->tbl->isAlreadyId($id)==0) {
				if ($this->tbl->add($data['dataFrom'])) {
					$data['alert']='<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully add.</div>';
				}else {
					$data['alert']='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed add.</div>';
				}
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed add, because already NIK : '.$id.'</div>';
			}
			
			unset($data['dataFrom']);
			$this->load->model('user_model','tbl');
			$data['title'] = 'User';
			$data['grid'] = $this->tbl->get();
			
			$this->load->view('user',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}

	public function editProcess() {
		if($this->session->userdata('user_session')) {
			$data['title'] = 'Branch';
			$data['flag']='Edit';
	
			$this->load->model('user_model','tbl');
			$id=$this->input->post('hidCode');
			$data['dataFrom']= array(
	           'user_name' => $this->input->post('txtName'),
	           'group_code' => $this->input->post('txtGroupCode'),
	           'branch_code' => $this->input->post('txtBranchCode'),
	           'email' => $this->input->post('txtEmail'),
	           'no_ext' => $this->input->post('txtNoExt'),
	           'no_hp' => $this->input->post('txtNoHp'),
			   'departement' => $this->input->post('txtDepartement'),
	           'password' => md5($id.$this->input->post('txtPass')),
	           'is_active' => $this->input->post('chkActive'),
	           'modified_by' => $this->session->userdata('user_session')->user_code
	           ,'modified_date' => date("Y-m-d H:i:s")
	        );
			if ($this->tbl->edit($data['dataFrom'],$id)) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data successfully edit.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed edit.</div>';
			}
			unset($data['dataFrom']);
			$this->load->model('user_model','tbl');
			$data['title'] = 'User';
			$data['grid'] = $this->tbl->get();
			$this->load->view('user',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login',$data);
		}
	}
}