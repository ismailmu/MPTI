<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hw_Model extends CI_Model {
	
	//digunakan untuk form Hardware
	public function getById($id,$user) {
		return $this->db->query("select t.ticket_code,t.ticket_name,t.sn
		,(case when u2.user_code = '$user' then u.user_code else u2.user_code end) as nik_to
		,(case when u2.user_code = '$user' then u.departement else u2.departement end) as dept_to
		,(case when u2.user_code = '$user' then u.user_name else u2.user_name end) as name_to 
		,mt.type_name,ts.desc_status
		from t_ticket t 
		join t_ticket_status ts on t.ticket_code = ts.ticket_code and ts.status_code='ST01' 
		join (
			select ticket_code,created_by from t_ticket_status where ticket_code='$id' order by id desc limit 1
		)ts2  on t.ticket_code = ts2.ticket_code
		join m_user u on u.user_code = ts.created_by 
		join m_user u2 on u2.user_code = ts2.created_by 
		join m_type mt on mt.type_code = t.type_code 	
		where t.ticket_code='$id'");
	}
	
	//digunakan untuk Browse Ticket hardware
	public function getByHw($id) {
		return $this->db->query("select t.* from t_ticket t 
		join t_ticket_status ts on t.ticket_code=ts.ticket_code 
		join (select max(id) maxId from t_ticket_status group by ticket_code) maxT on maxT.maxId=ts.id 
		where ts.status_code IN('ST02','ST04') and t.created_by like'%$id%';")->result();
	}
}