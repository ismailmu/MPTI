<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function index()
	{
		$this->load->model('branch_model','tblBranch');
		$data['grid'] = $this->tblBranch->get();
		$data['title'] = 'Register User';
		$this->load->view('register',$data);
	}
		
	public function add() {
		$this->load->model('user_model','tbl');
		$id=$this->input->post('txtCode');
		
		$this->load->model('group_model','tblGroup');
		$group=$this->tblGroup->getByGroupUser();
		$data['dataFrom']= array(
		   'user_code' => $id,
           'user_name' => $this->input->post('txtName'),
           'group_code' => $group,
           'branch_code' => $this->input->post('txtBranchCode'),
           'email' => $this->input->post('txtEmail'),
           'no_ext' => $this->input->post('txtNoExt'),
           'no_hp' => $this->input->post('txtNoHp'),
		   'departement' => $this->input->post('txtDepartement'),
           'password' => md5($id.$this->input->post('txtPass')),
           'is_active' => 1,
           'created_by' => 'register'
        );
		
		if ($this->tbl->isAlreadyId($id)==0) {
			if ($this->tbl->add($data['dataFrom'])) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>User successfully add.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>User failed add.</div>';
			}
		}else {
			$data['alert']='<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data failed add, because already NIK : '.$id.'</div>';
		}
		$this->load->model('branch_model','tblBranch');
		$data['grid'] = $this->tblBranch->get();
		$data['title'] = 'Register User';
		
		$this->load->view('register',$data);
	}
}