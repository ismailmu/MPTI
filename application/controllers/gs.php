<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gs extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('user_session')){
			$this->load->model('gs_model','tbl');
			$data['title'] = 'Form GS';
			$data['grid'] = $this->tbl->getByGs("");
			$this->load->view('gs',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function gsResult() {
		if($this->session->userdata('user_session')){
			$this->load->model('gs_model','tbl');
			$data['title'] = 'Preview Form GS';
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'));
			$this->load->view('gs_result',$data);
			$this->load->view('gs_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function gsPdf() {
		if($this->session->userdata('user_session')){
			$this->load->helper('exportpdf_helper');
			$this->load->model('gs_model','tbl');
			$data['grid']= $this->tbl->getById($this->input->post('txtCode'));
			$output=$this->load->view('gs_result',$data,true);
			$pdf_filename="gs.pdf";
			generate_pdf($output, $pdf_filename);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
}