<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merk_Model extends CI_Model {
	
	public function get() {
		return $this->db->get('m_merk')->result();
	}
	
	public function getById($id) {
		return $this->db->get_where('m_merk', array('merk_code' => $id))->result();
	}
	
	private function getMaxId() {
		$query=$this->db->query("select IFNULL(MAX(cast(MID(merk_code,2,length(merk_code)-1) as unsigned)),0)+1 as mx from m_merk");
		$mx = intval($query->row()->mx)+100;
		return 'M'.substr(strval($mx),1);
	}
	
	public function add($merk) {
		$merk['merk_code']=$this->getMaxId();
		return $this->db->insert('m_merk', $merk);
	}
	
	public function edit($merk,$id) {
		$this->db->where('merk_code',$id);
		return $this->db->update('m_merk', $merk);
	}
}