<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpt extends CI_Controller {
	
	public function dur()
	{
		if($this->session->userdata('user_session')){
			
			$data['title'] = 'Report Duration';
			$this->load->model('rpt_model','tbl');
			$data['grid'] = $this->tbl->getByYear();
			$this->load->view('rpt_dur',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function durResult() {
		if($this->session->userdata('user_session')){
			$this->load->model('rpt_model','tbl');
			$data['title'] = 'Preview Report Duration';
			$data['month']=$this->input->post('cboMonth');
			$data['year']=$this->input->post('cboYear');
			$data['grid']= $this->tbl->getRptDuration($data['month'],$data['year']);
			$this->load->view('dur_result',$data);
			$this->load->view('dur_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function durPdf() {
		if($this->session->userdata('user_session')){
			$this->load->helper('exportpdf_helper');
			$this->load->model('rpt_model','tbl');
			$data['grid']= $this->tbl->getRptDuration($this->input->post('month'),$this->input->post('year'));
			$output=$this->load->view('dur_result',$data,true);
			$pdf_filename='rpt_duration.pdf';
			generate_pdf($output, $pdf_filename);
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
	
	public function dash()
	{
		if($this->session->userdata('user_session')){
			
			$data['title'] = 'Dashboard';
			$this->load->model('rpt_model','tbl');
			$data['grid'] = $this->tbl->getByYear();
			
			$this->load->model('status_model','tblStatus');
			$data['gridStatus'] = $this->tblStatus->get();
			$this->load->view('rpt_dash',$data);
		}else {
			$this->load->view('login');
		}
	}
	
	public function jsonDash() {
		$this->load->model('rpt_model','tbl');
		$data['month']=$this->input->get('month');
		$data['year']=$this->input->get('year');
		$data['status']=$this->input->get('status');
		$data['tipe']=$this->input->get('tipe');
		$query = $this->tbl->getRptDashboard($data['month'],$data['year'],$data['status'],$data['tipe']);
		echo json_encode($query);
	}
	
	public function dashResult() {
		$data['title'] = 'Preview Dashboard';
		$data['month']=$this->input->get('cboMonth');
		$data['year']=$this->input->get('cboYear');
		$data['status']=$this->input->get('cboStatus');
		if ($data['status']=="ST00") {
			$data['status_name']="All";
		}else {
			$this->load->model('status_model','tbl');
			$data['status_name']=$this->tbl->getById($data['status'])->row()->status_name;
		}
		
		
		$this->load->view('dash_result',$data);
		$this->load->view('dash_footer');
	}
	
	public function dash2Result() {
		
		$data['title'] = 'Preview Dashboard';
		$data['month']=$this->input->get('cboMonth');
		$data['year']=$this->input->get('cboYear');
		$data['status']=$this->input->get('cboStatus');
		if ($data['status']=="ST00") {
			$data['status_name']="All";
		}else {
			$this->load->model('status_model','tbl');
			$data['status_name']=$this->tbl->getById($data['status'])->row()->status_name;
		}
		
		$this->load->view('dash_result',$data);
	}
	
	public function dashPdf() {
		if($this->session->userdata('user_session')){
			$data['month']=$this->input->get('cboMonth');
			$data['year']=$this->input->get('cboYear');
			$data['status']=$this->input->get('cboStatus');
			$user=$this->session->userdata('user_session')->user_code;
			$fileName="dashboard_".$user.".pdf";
			$file= PDFS_DIR.$fileName;
			//echo $file;
			$fileUrl=base_url() . 'assets/pdfs/'.$fileName;
			
			//echo $file;
			$url="\"".base_url()."index.php/rpt/dash2Result?cboMonth=".$data['month'] . "&cboYear=".$data['year']."&cboStatus=".$data['status']."\"";
			$command="\"".WKHTMLPDF_DIR."\" -T 0 -B 0 -L 0 -R 0 $url \"".$file."\"";
			//echo $command;
			echo shell_exec($command);
			
			header('Content-Description: File Transfer');
			header("Content-type: application/pdf");
			header("Content-disposition: attachment; filename=".$fileName);
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			
			$this->load->view('dash_result',$data);
			$this->load->view('dash_footer');
		}else {
			$data['session_desc']='Session expired';
			$this->load->view('login');
		}
	}
}