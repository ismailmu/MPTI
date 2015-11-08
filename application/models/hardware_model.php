<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hardware_Model extends CI_Model {
	
	public function get() {
		return $this->db->query('select h.hardware_code,h.hardware_name,h.type_code,t.type_name,h.merk_code,m.merk_name,h.status,h.is_active 
		from m_hardware h join m_type t on h.type_code = t.type_code join m_merk m on m.merk_code = h.merk_code order by h.hardware_code;')->result();
	}
	
	public function getById($id) {
		return $this->db->query("select h.hardware_code,h.hardware_name,h.type_code,t.type_name,h.merk_code,m.merk_name,h.status,h.is_active 
		from m_hardware h join m_type t on h.type_code = t.type_code join m_merk m on m.merk_code = m.merk_code where hardware_code='$id'")->result();
	}
	
	public function getByType($type,$status) {
		return $this->db->query("select h.hardware_code,h.hardware_name,h.type_code,t.type_name,h.merk_code,m.merk_name,h.status,h.is_active 
		from m_hardware h join m_type t on h.type_code = t.type_code 
		join m_merk m on m.merk_code = h.merk_code where h.type_code='$type' and h.status='$status' and h.is_active=1")->result();
	}
	
	private function getMaxId() {
		$query=$this->db->query("select IFNULL(MAX(MID(hardware_code,2,length(hardware_code)-1)),0)+1 as mx from m_hardware");
		$mx = intval($query->row()->mx)+1000;
		return 'H'.substr(strval($mx),1);
	}
	
	public function add($hardware) {
		$hardware['hardware_code']=$this->getMaxId();
		return $this->db->insert('m_hardware', $hardware);
	}
	
	public function edit($hardware,$id) {
		$this->db->where('hardware_code',$id);
		return $this->db->update('m_hardware', $hardware);
	}
}