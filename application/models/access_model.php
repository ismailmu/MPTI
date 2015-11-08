<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Model extends CI_Model {
	
	public function getMenuByGroupCode($id) {
		return $this->db->query("select ifnull(gm.group_code,'$id')group_code,m.menu_code,m.menu_name,
		(case when gm.menu_code is null then 0 else 1 end) isChecked from m_menu m left join ( 
		select group_code,menu_code from m_group_menu where group_code='$id' )gm on m.menu_code=gm.menu_code order by m.order_menu;")->result();
	}
	
	public function getStatusByGroupCode($id) {
		return $this->db->query("select s.status_code,s.status_name,(case when gsV.status_code is null then 0 else 1 end) isView
		,(case when gsS.status_code is null then 0 else 1 end) isSave from m_status s
		left join ( select group_code,status_code from m_group_status where group_code = '$id' and action='view')gsV
		on s.status_code = gsV.status_code 
		left join ( select group_code,status_code from m_group_status where group_code = '$id' and action='save')gsS 
		on s.status_code = gsS.status_code order by s.order_status")->result();
	}
}