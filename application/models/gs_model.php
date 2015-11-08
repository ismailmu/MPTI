<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gs_Model extends CI_Model {
	
	//digunakan untuk form Gs
	public function getById($id) {
		return $this->db->query("select t.ticket_code,t.ticket_name,u.user_name,u.departement,h.hardware_code,h.hardware_name,mt.type_name
		,mm.merk_name,ts.desc_status,ts2.desc_status as 'analisa',u2.user_name as 'admin',u.user_code from t_ticket t 
		join t_ticket_status ts on t.ticket_code = ts.ticket_code and ts.status_code='ST01' 
		join t_ticket_status ts2 on t.ticket_code = ts2.ticket_code and ts2.status_code='ST04' 
		join m_user u on u.user_code = t.created_by join m_user u2 on u2.user_code = ts2.created_by 
		join m_hardware h on h.hardware_code = t.hardware_code 
		join m_type mt on mt.type_code = h.type_code join m_merk mm on mm.merk_code = h.merk_code 
		where t.ticket_code='$id';");
	}
	
	//digunakan untuk Browse Ticket Gs
	public function getByGs($user) {
		return $this->db->query("select t.ticket_code,t.ticket_name,h.hardware_name from t_ticket t 
		join t_ticket_status ts on t.ticket_code=ts.ticket_code 
		join (select max(id) maxId from t_ticket_status group by ticket_code) maxT on maxT.maxId=ts.id 
		join m_hardware h on t.hardware_code = h.hardware_code where ts.status_code = 'ST04' 
		and t.created_by like '%$user%';")->result();
	}
	
	//digunakan untuk form return Gs
	public function getRetById($id,$user) {
		return $this->db->query("select t.ticket_code,t.ticket_name,h.hardware_code,h.hardware_name,mt.type_name
		,mm.merk_name,ts.desc_status
		,(case when u2.user_code = '$user' then u.user_code else u2.user_code end) as nik_to
		,(case when u2.user_code = '$user' then u.departement else u2.departement end) as dept_to
		,(case when u2.user_code = '$user' then u.user_name else u2.user_name end) as name_to from t_ticket t 
		join t_ticket_status ts on t.ticket_code = ts.ticket_code and ts.status_code='ST01' 
		join t_ticket_status ts2 on t.ticket_code = ts2.ticket_code and ts2.status_code='ST04'
		join m_user u on u.user_code = ts.created_by join m_user u2 on u2.user_code = ts2.created_by 
		join m_hardware h on h.hardware_code = t.hardware_code 
		join m_type mt on mt.type_code = h.type_code join m_merk mm on mm.merk_code = h.merk_code 
		where t.ticket_code='$id'");
	}
}