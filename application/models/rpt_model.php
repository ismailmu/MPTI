<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpt_Model extends CI_Model {
	
	public function getByYear() {
		return $this->db->query("select distinct year(date_open) as year from t_ticket")->result();
	}
	
	public function getRptDuration($month,$year) {
		return $this->db->query("select t.ticket_code,ticket_name,date_open,date_closed,u.user_name,b.branch_name,s.status_name
		,(CASE WHEN TIMESTAMPDIFF(DAY,date_open,date_closed) > 0 THEN TIMESTAMPDIFF(DAY,date_open,date_closed)
        	WHEN TIMESTAMPDIFF(HOUR,date_open,date_closed) > 0 THEN TIMESTAMPDIFF(HOUR,date_open,date_closed)
        	WHEN TIMESTAMPDIFF(MINUTE,date_open,date_closed) > 0 THEN TIMESTAMPDIFF(MINUTE,date_open,date_closed)
        	WHEN TIMESTAMPDIFF(SECOND,date_open,date_closed) > 0 THEN TIMESTAMPDIFF(SECOND,date_open,date_closed)
        	ELSE NULL END) dur,
    	(CASE 
        	WHEN TIMESTAMPDIFF(DAY,date_open,date_closed) > 0 THEN 'Day(s)'
        	WHEN TIMESTAMPDIFF(HOUR,date_open,date_closed) > 0 THEN 'Hour(s)'
        	WHEN TIMESTAMPDIFF(MINUTE,date_open,date_closed) > 0 THEN 'Minute(s)'
        	WHEN TIMESTAMPDIFF(SECOND,date_open,date_closed) > 0 THEN 'Second(s)'
        	ELSE NULL END) durLabel 
		from t_ticket t join t_ticket_status ts on t.ticket_code=ts.ticket_code join (select max(id) maxId from t_ticket_status 
		group by ticket_code) maxT on maxT.maxId=ts.id 
		join m_status s on s.status_code = ts.status_code join m_user u on t.created_by=u.user_code 
		join m_branch b on u.branch_code=b.branch_code where month(date_open)=$month and year(date_open)=$year;")->result();
	}
	
	public function getRptDashboard($month,$year,$status,$tipe) {
		$sql="";
		if ($tipe == 1) {
			$sql = "select MONTHNAME(STR_TO_DATE(month(date_open), '%m')) as monthT, count(1) as c1 
				from t_ticket t join t_ticket_status ts on t.ticket_code=ts.ticket_code join (select max(id) maxId 
				from t_ticket_status group by ticket_code) maxT on maxT.maxId=ts.id join m_status s on s.status_code = ts.status_code 
				join m_user u on t.created_by=u.user_code join m_branch b on u.branch_code=b.branch_code 
				where year(date_open)=$year ";
		}else {
			$sql = "select MONTHNAME(STR_TO_DATE(month(date_open), '%m')) as monthT, mt.type_name,count(1) as c1 
				from t_ticket t join t_ticket_status ts on t.ticket_code=ts.ticket_code join (select max(id) maxId 
				from t_ticket_status group by ticket_code) maxT on maxT.maxId=ts.id join m_status s on s.status_code = ts.status_code 
				join m_user u on t.created_by=u.user_code join m_branch b on u.branch_code=b.branch_code 
				join m_type mt on t.type_code = mt.type_code where month(date_open)=$month and year(date_open)=$year ";
		}
		
		if ($status=="ST00") {
			$sql .= "and ts.status_code like '%%'";
		}else {
			$sql .= "and ts.status_code = '$status'";
		}
		
		$sql .= "GROUP BY MONTHNAME(STR_TO_DATE(month(date_open), '%m'))";
		if ($tipe==1) {
			$sql .= " ORDER BY month(date_open);";
		}else {
			$sql .= ",mt.type_name ORDER BY month(date_open),mt.type_name;";
		}
		//echo $sql;
		return $this->db->query($sql)->result();
	}
}