<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('user_model','tbl');
			$data['grid'] = $this->tbl->get();
			$data['title'] = 'Reset Password';
			$this->load->view('reset',$data);
		}else {
			//$data['session_desc']='Please login';
			$this->load->view('login');
		}
		
	}
		
	public function resetPass() {
		if($this->session->userdata('user_session')){
			$this->load->model('user_model','tbl');
			$user=$this->input->post('txtCode');
			$data['dataFrom']= array(
	           'password' => md5($user . $this->input->post('txtNewPass'))
			);
			
			if ($this->tbl->edit($data['dataFrom'],$user)) {
				$data['alert']='<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password successfully change.</div>';
			}else {
				$data['alert']='<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password failed change.</div>';
			}
			$data['title'] = 'Reset Password';
			$this->load->view('reset',$data);
		}else {
			$this->load->view('login');
		}
	}
}