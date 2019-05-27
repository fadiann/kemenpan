<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class programaudit {
	var $_db;
	var $userId;
	function __construct($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	function uniq_id() {
		return $this->_db->uniqid ();
	}
	function program_audit_count($assign_id, $key_search, $val_search, $all_field) {
		$condition = "";
		if($val_search!=""){
			if($key_search!="") $condition = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition = " and (".$condition.")";
			}
		}
		
		$sql = "select count(*) FROM program_audit
				left join auditee on program_id_auditee = auditee_id
				left join ref_program_audit on program_id_ref = ref_program_id
				left join auditor on program_id_auditor = auditor_id
				where program_id_assign = '".$assign_id."' ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function program_audit_view_grid($assign_id, $key_search, $val_search, $all_field, $offset, $num_row) {
		$condition = "";
		if($val_search!=""){
			if($key_search!="") $condition = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition = " and (".$condition.")";
			}
		}
		$sql = "select program_id, auditee_name, ref_program_code, ref_program_title, auditor_name, ref_program_procedure, program_status
				from program_audit
				left join auditee on program_id_auditee = auditee_id
				left join ref_program_audit on program_id_ref = ref_program_id
				left join auditor on program_id_auditor = auditor_id
				where program_id_assign = '".$assign_id."'  ".$condition." LIMIT $offset, $num_row ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function program_audit_viewlist($id) {
		$sql = "select program_id, program_id_assign, program_id_auditee, program_id_ref, program_id_auditor, program_start, program_end, program_day, auditee_name, auditor_name, ref_program_title, ref_program_code, ref_program_procedure, program_jam, program_lampiran
				FROM program_audit 
				left join auditee on program_id_auditee = auditee_id
				left join auditor on program_id_auditor = auditor_id
				left join ref_program_audit on program_id_ref = ref_program_id
				where program_id = '".$id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function program_audit_add($assign_id, $id_auditee, $id_ref, $id_auditor, $program_jam, $lampiran, $date) {
		$id = $this->uniq_id ();
		$sql = "insert into program_audit 
				(program_id, program_id_assign, program_id_auditee, program_id_ref, program_id_auditor, program_jam, program_lampiran, program_create_by, program_create_date) 
				values 
				('".$id."', '".$assign_id."', '".$id_auditee."', '".$id_ref."', '".$id_auditor."', '".$program_jam."', '".$lampiran."', '".$this->userId."', '".$date."')";
		$aksinyo = "Menambah Program Audit ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function program_audit_edit($id, $id_auditee, $id_ref, $id_auditor, $program_jam, $lampiran) {
		$sql = "update program_audit set program_id_auditee = '".$id_auditee."',program_id_ref = '".$id_ref."', program_id_auditor = '".$id_auditor."', program_jam = '".$program_jam."', program_lampiran = '".$lampiran."'
				where program_id = '".$id."' ";
		$aksinyo = "Mengubah Program Audit dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function program_audit_update_status($id, $status, $date) {
		$sql = "update program_audit set program_status = '".$status."', program_approve_by = '".$this->userId."', program_approve_date = '".$date."'
				where program_id = '".$id."' ";
		$aksinyo = "Mengubah Status Program Audit dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function program_audit_komentar_viewlist($id) {
		$sql = "select auditor_name, program_comment_desc, program_comment_date
				FROM program_audit_comment
				left join user_apps on program_comment_user_id = user_id
				left join auditor on user_id_internal = auditor_id
				where program_comment_program_id = '".$id."' order by program_comment_date ASC"; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function program_audit_add_komentar($id, $komen, $tgl) {
		$sql = "insert into program_audit_comment 
				(program_comment_id, program_comment_program_id, program_comment_user_id, program_comment_desc, program_comment_date) 
				values
				('".$this->uniq_id ()."','".$id."','".$this->userId."','".$komen."','".$tgl."')";
		$this->_db->_dbquery ( $sql );
	}
	function kertas_kerja_prog_delete($id) {
		$sql = "delete from kertas_kerja where kertas_kerja_id_program = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function program_audit_delete($id) {
		$this->kertas_kerja_prog_delete ( $id );
		$sql = "delete from program_audit where program_id = '".$id."' ";
		$aksinyo = "Menghapus Program Audit dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function get_assign_aspek($id_assign, $id_auditee) {
		$sql = "select distinct aspek_id, aspek_name
				FROM program_audit
				left join ref_program_audit on program_id_ref = ref_program_id
				left join par_aspek on ref_program_aspek_id = aspek_id
				where program_id_assign = '".$id_assign."' and program_id_auditee = '".$id_auditee."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function get_user_by_posisi($id_assign, $id_posisi=""){
		$condition = '';
		if($id_posisi!='') $condition = " and assign_auditor_id_posisi = '".$id_posisi."' ";
		$sql = "select DISTINCT user_id from assignment_auditor
				join user_apps on assign_auditor_id_auditor = user_id_internal
				where assign_auditor_id_assign = '".$id_assign."'". $condition;
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	function program_audit_by_assign($assign_id, $owner_id=""){
		$condition = '';
		if($owner_id!='') $condition = " and program_id_auditor = '".$owner_id."' ";
		$sql = "select program_id, program_id_assign, program_id_auditee, program_id_ref, program_id_auditor, program_jam, program_lampiran, program_create_by, program_create_date, program_status
				FROM program_audit 
				where program_id_assign = '".$assign_id."' ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function insert_update_program_audit($program_id, $assign_id, $id_auditee, $id_ref, $id_auditor, $program_jam, $lampiran, $program_create_by, $date) {
		$sql = "insert into program_audit 
				(program_id, program_id_assign, program_id_auditee, program_id_ref, program_id_auditor, program_jam, program_lampiran, program_create_by, program_create_date) 
				values 
				('".$program_id."', '".$assign_id."', '".$id_auditee."', '".$id_ref."', '".$id_auditor."', '".$program_jam."', '".$lampiran."', '".$program_create_by."', '".$date."')
				ON DUPLICATE KEY UPDATE program_id = '".$program_id."', program_id_assign = '".$assign_id."', program_id_auditee = '".$id_auditee."', program_id_ref = '".$id_ref."', program_id_auditor = '".$id_auditor."', program_jam = '".$program_jam."', program_lampiran = '".$lampiran."', program_create_by = '".$program_create_by."', program_create_date = '".$date."' ";
		$this->_db->_dbquery ($sql);
	}
}
?>
