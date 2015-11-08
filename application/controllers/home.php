<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->view('home');
		}else {
			//$data['session_desc']='Please login';
			$this->load->view('login');
		}
		
	}
	
	public function loginProcess() {
		$user=$this->input->post('txtUserId');
		$pass=md5($user . $this->input->post('txtPassword'));
		$this->load->model('user_model','tbl');
		$query=$this->tbl->getUserPassLogin($user);
		$userDb="";
		$isActive=0;
		$passDb="";
		$group="";
		foreach ($query as $key => $value) {
			$userDb=$value->user_code;
			$isActive=$value->is_active;
			$passDb=$value->password;
			$group=$value->group_code;
		}
		if ($userDb==$user) {
			if ($passDb == $pass) {
				if ($isActive == 1) {
					$this->session->set_userdata('user_session',$this->tbl->getUserLogin($user)->row());
					$data['menu'] = $this->tbl->getUserMenu($group);
				
					$this->session->set_userdata('menu_session',$data['menu']);
					$this->load->view('home');	
				}else {
					$data['session_desc']='NIK not active';
					$this->load->view('login',$data);
				}
			}else {
				$data['session_desc']='NIK or Password wrong';
				$this->load->view('login',$data);
			}	
		}else {
			$data['session_desc']='NIK Not Register';
			$this->load->view('login',$data);
		}
		
	}
	
	public function logoutProcess() {
		$this->session->unset_userdata('user_session');
		$this->session->unset_userdata('menu_session');
		//$this->session->sess_destroy();
		$data['session_desc']='You has been logout';
		$this->load->view('login',$data);
	}
	
	public function changeIndex() {
		if($this->session->userdata('user_session')){
			$data['title'] = 'Change Password';
			$data['dataFrom']= array(
	           'user_code' => $this->session->userdata('user_session')->user_code
	        );
			$this->load->view('change',$data);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function changePass() {
		if($this->session->userdata('user_session')){
			$this->load->model('user_model','tbl');
			$user=$this->session->userdata('user_session')->user_code;
			$pass=md5($user . $this->input->post('txtOldPass'));
			$query=$this->tbl->getUserLogin($user,$pass);
			
			if ($query->num_rows() > 0) {
				$pass=md5($user . $this->input->post('txtNewPass'));
				
				$data['dataFrom']= array(
	           		'user_code' => $user,
	           		'password' => $pass
	           	);
				if ($this->tbl->edit($data['dataFrom'],$user)) {
					$data['alert']='<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password successfully change.</div>';
				}else {
					$data['alert']='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password failed change.</div>';
				}
				$data['title'] = 'Change Password';
				$this->load->view('change',$data);
			}else {
				$data['dataFrom']= array(
	           		'user_code' => $user
	           	);
				$data['alert']='<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Old Password Incorrect.</div>';
				$data['title'] = 'Change Password';
				$this->load->view('change',$data);
			}
		}else {
			$this->load->view('login');
		}
	}
}