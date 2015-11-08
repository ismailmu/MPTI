<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_Model extends CI_Model {
	
	public function addGroupMenu($group,$menu,$user) {
		return $this->db->insert('m_group_menu', array('group_code' => $group,'menu_code' => $menu,'created_by' => $user));
	}
	
	public function deleteGroupMenu($group) {
		return $this->db->delete('m_group_menu', array('group_code' => $group));
	}
}