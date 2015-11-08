<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GsRet extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('gs_model','tbl');
			$data['title'] = 'Form Return GS';
			$data['grid'] = $this->tbl->getByGs($this->session->userdata('user_session')->user_code);
			$this->load->view('gsRet',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function gsRetResult() {
		if($this->session->userdata('user_session')){
			$this->load->model('gs_model','tbl');
			$data['title'] = 'Preview Form Return GS';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getRetById($this->input->post('txtCode'),$data['user_code']);
			
			$this->load->view('gsRet_result',$data);
			$this->load->view('gsRet_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function gsRetPdf() {
		if($this->session->userdata('user_session')){
			$this->load->helper('exportpdf_helper');
			$this->load->model('gs_model','tbl');
			$data['title'] = 'Preview Form Return GS';
			$data['user_code']=$this->session->userdata('user_session')->user_code;
			$data['user_name']=$this->session->userdata('user_session')->user_name;
			$data['departement']=$this->session->userdata('user_session')->departement;
			
			$data['grid']= $this->tbl->getRetById($this->input->post('txtCode'),$data['user_code']);
			$output=$this->load->view('gsRet_result',$data,true);
			$pdf_filename="gsRet.pdf";
			generate_pdf($output, $pdf_filename);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
}