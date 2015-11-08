<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch_Model extends CI_Model {
	
	public function get() {
		return $this->db->get('m_branch')->result();
	}
	
	public function getById($id) {
		return $this->db->get_where('m_branch', array('branch_code' => $id))->result();
	}
	
	private function getMaxId() {
		$query=$this->db->query("select IFNULL(MAX(cast(MID(branch_code,2,length(branch_code)-1) as unsigned)),0)+1 as mx from m_branch");
		$mx = intval($query->row()->mx)+100;
		return 'B'.substr(strval($mx),1);
	}
	
	public function add($branch) {
		$branch['branch_code']=$this->getMaxId();
		return $this->db->insert('m_branch', $branch);
	}
	
	public function edit($branch,$id) {
		$this->db->where('branch_code',$id);
		return $this->db->update('m_branch', $branch);
	}
}