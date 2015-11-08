<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {
	
	public function get() {
		return $this->db->query('SELECT u.user_code,u.user_name,u.branch_code
		,c.branch_name,u.no_ext,u.no_hp,u.email,u.group_code,g.group_name,u.is_active,u.departement FROM m_user u 
		join m_branch c on u.branch_code = c.branch_code join m_group g on u.group_code = g.group_code')->result();
	}
	
	public function getById($id) {
		return $this->db->query("SELECT u.user_code,u.user_name,u.branch_code
		,c.branch_name,u.no_ext,u.no_hp,u.email,u.group_code,g.group_name,u.is_active,u.password,u.departement FROM m_user u 
		join m_branch c on u.branch_code = c.branch_code join m_group g on u.group_code = g.group_code where u.user_code='$id'")->result();
	}
	
	public function getUserPassLogin($user) {
		return $this->db->query("select user_code,password,group_code,is_active 
		from m_user where user_code='$user'")->result();
	}
	
	public function getUserLogin($user) {
		return $this->db->query("select user_code,user_name,departement,group_code 
		from m_user where user_code='$user'");
	}
	
	public function getUserMenu($id) {
		return $this->db->query("SELECT m.menu_name,m.icon,href FROM m_menu m join m_group_menu gm on m.menu_code=gm.menu_code
		where gm.group_code='$id' order by m.order_menu")->result();
	}
	
	public function add($user) {
		return $this->db->insert('m_user', $user);
	}
	
	public function edit($user,$id) {
		$this->db->where('user_code',$id);
		return $this->db->update('m_user', $user);
	}
	
	public function isAlreadyId($id) {
		$query=$this->db->query("select count(1) as c1 from m_user where user_code='$id'");
		return $query->row()->c1;
	}
}