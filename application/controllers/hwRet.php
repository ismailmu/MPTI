<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HwRet extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Form Return Hardware';
			$data['grid'] = $this->tbl->getByHw("");
			$this->load->view('hwRet',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function hwRetResult() {
		if($this->session->userdata('user_session')){
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Preview Form Return Hardware';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'),$data['user_code']);
			
			$this->load->view('hwRet_result',$data);
			$this->load->view('hwRet_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function hwRetPdf() {
		if($this->session->userdata('user_session')){
			$this->load->helper('exportpdf_helper');
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Form Hardware Return';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'),$data['user_code']);
			$output=$this->load->view('hwRet_result',$data,true);
			$pdf_filename="hwRet.pdf";
			generate_pdf($output, $pdf_filename);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
}