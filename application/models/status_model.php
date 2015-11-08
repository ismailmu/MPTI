<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_Model extends CI_Model {
	
	public function get() {
		return $this->db->get('m_status')->result();
	}
	
	public function getById($id) {
		return $this->db->get_where('m_status', array('status_code' => $id));
	}
		
	public function addGroupStatus($group,$status,$user,$action) {
		return $this->db->insert('m_group_status', array('group_code' => $group
			,'status_code' => $status,'created_by' => $user
			,'action' => $action));
	}
	
	public function deleteGroupStatus($group) {
		return $this->db->delete('m_group_status', array('group_code' => $group));
	}
}