<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_Model extends CI_Model {
	
	public function get() {
		return $this->db->get('m_type')->result();
	}
	
	public function getById($id) {
		return $this->db->get_where('m_type', array('type_code' => $id))->result();
	}
	
	private function getMaxId() {
		$query=$this->db->query("select IFNULL(MAX(cast(MID(type_code,2,length(type_code)-1) as unsigned)),0)+1 as mx from m_type");
		$mx = intval($query->row()->mx)+100;
		return 'T'.substr(strval($mx),1);
	}
	
	public function add($type) {
		$type['type_code']=$this->getMaxId();
		return $this->db->insert('m_type', $type);
	}
	
	public function edit($type,$id) {
		$this->db->where('type_code',$id);
		return $this->db->update('m_type', $type);
	}
}