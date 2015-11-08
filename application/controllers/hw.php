<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hw extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Form Hardware';
			$data['grid'] = $this->tbl->getByHw($this->session->userdata('user_session')->user_code);
			$this->load->view('hw',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function hwResult() {
		if($this->session->userdata('user_session')){
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Preview Form Hardware';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'),$data['user_code']);
			
			$this->load->view('hw_result',$data);
			$this->load->view('hw_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function hwPdf() {
		if($this->session->userdata('user_session')){
			$this->load->helper('exportpdf_helper');
			$this->load->model('hw_model','tbl');
			$data['title'] = 'Form Hardware';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'),$data['user_code']);
			$output=$this->load->view('hw_result',$data,true);
			$pdf_filename="hw.pdf";
			generate_pdf($output, $pdf_filename);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
}