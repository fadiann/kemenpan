<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class kertas_kerja {
	var $_db;
	var $userId;
	function kertas_kerja($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	function uniq_id() {
		return $this->_db->uniqid ();
	}
	function kertas_kerja_count($id_program_audit, $key_search, $val_search, $all_field) {
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
		$sql = "select count(*) FROM kertas_kerja
				join program_audit on kertas_kerja_id_program = program_id
				where kertas_kerja_id_program = '" . $id_program_audit . "' ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function kertas_kerja_view_grid($id_program_audit, $key_search, $val_search, $all_field, $offset, $num_row) {
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
		$sql = "select kertas_kerja_id, kertas_kerja_no, kertas_kerja_kesimpulan, kertas_kerja_date, kertas_kerja_status, program_id_assign
				from kertas_kerja
				join program_audit on kertas_kerja_id_program = program_id
				where kertas_kerja_id_program = '" . $id_program_audit . "' ".$condition." 
				order by kertas_kerja_date DESC
				LIMIT $offset, $num_row";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function kertas_kerja_viewlist($id) {
		$sql = "select kertas_kerja_id, kertas_kerja_desc, kertas_kerja_no, kertas_kerja_kesimpulan, kertas_kerja_date, kertas_kerja_attach, auditee_name, auditee_id, ref_program_title, kertas_kerja_id_program, ref_program_code, create_by.auditor_name as create_name, kerja_kerja_created_date, approve_by.auditor_name as approve_name, kertas_kerja_approve_date, assign_tahun
				FROM kertas_kerja 
				join program_audit on kertas_kerja_id_program = program_id
				join assignment on program_id_assign = assign_id
				left join auditee on program_id_auditee = auditee_id
				left join ref_program_audit on program_id_ref = ref_program_id
				left join auditor as create_by on kertas_kerja_created_by = create_by.auditor_id
				left join auditor as approve_by on kertas_kerja_approve_by = approve_by.auditor_id
				where kertas_kerja_id = '" . $id . "' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function kertas_kerja_add($id_kka, $program_id, $no_kka, $kertas_kerja, $kesimpulan, $kertas_kerja_date, $kka_attach) {
		$sql = "insert into kertas_kerja 
				(kertas_kerja_id, kertas_kerja_id_program, kertas_kerja_no, kertas_kerja_desc, kertas_kerja_kesimpulan, kertas_kerja_date, kertas_kerja_attach) 
				values 
				('" . $id_kka . "', '" . $program_id . "', '" . $no_kka . "', '" . $kertas_kerja . "', '" . $kesimpulan . "', '" . $kertas_kerja_date . "', '" . $kka_attach . "')";
		$aksinyo = "Menambah Kertas Kerja Dengan ID " . $program_id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function kertas_kerja_edit($id, $no_kka, $kertas_kerja, $kesimpulan, $kertas_kerja_date, $kka_attach) {
		$sql = "update kertas_kerja set kertas_kerja_no = '" . $no_kka . "', kertas_kerja_desc = '" . $kertas_kerja . "', kertas_kerja_kesimpulan = '" . $kesimpulan . "', kertas_kerja_date = '" . $kertas_kerja_date . "', kertas_kerja_attach = '" . $kka_attach . "'
				where kertas_kerja_id = '" . $id . "' ";
		$aksinyo = "Mengubah Kertas Kerja dengan ID " . $id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function kertas_kerja_delete($id) {
		$sql = "delete from kertas_kerja where kertas_kerja_id = '" . $id . "' ";
		$aksinyo = "Menghapus Kertas Kerja Audit dengan ID " . $id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function kka_update_status($id, $status) {
		$sql = "update kertas_kerja set kertas_kerja_status = '" . $status . "'
				where kertas_kerja_id = '" . $id . "' ";
		$this->_db->_dbquery ( $sql );
	}
	function kka_komentar_viewlist($id) {
		$sql = "select auditor_name, kertas_kerja_comment_desc, kertas_kerja_comment_date
				FROM kertas_kerja_comment
				left join user_apps on kertas_kerja_comment_user_id = user_id
				left join auditor on user_id_internal = auditor_id
				where kertas_kerja_comment_kka_id = '" . $id . "' order by kertas_kerja_comment_date ASC";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function kka_add_komentar($id, $komentar, $tanggal) {
		$sql = "insert into kertas_kerja_comment 
				(kertas_kerja_comment_id, kertas_kerja_comment_kka_id, kertas_kerja_comment_user_id, kertas_kerja_comment_desc, kertas_kerja_comment_date) 
				values
				('" . $this->uniq_id () . "','" . $id . "','" . $this->userId . "','" . $komentar . "','" . $tanggal . "')";
		$aksinyo = "Mengomentari Kertas Kerja dengan ID " . $id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	
	function getdata_assign($program_id) {
		$sql = "SELECT program_id_assign, program_id_auditee 
				from program_audit
				where program_id = '" . $program_id . "' "; // echo $sql;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function cek_owner_kka($kka_id, $user_id) {
		$condition = "";
		if($kka_id!="") $condition .= " and kertas_kerja_id = '".$kka_id."' ";
		$sql = "SELECT count(*) FROM kertas_kerja
				left join program_audit on kertas_kerja_id_program = program_id
				left join user_apps on program_id_auditor = user_id_internal
				WHERE user_id = '" . $user_id . "' ".$condition; //echo $sql;
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	
	function cek_owner_program($program_id, $user_id) {
		$condition = "";
		if($program_id!="") $condition .= " and program_id = '".$program_id."' ";
		$sql = "SELECT count(*) FROM program_audit
				left join user_apps on program_id_auditor = user_id_internal
				WHERE user_id = '" . $user_id . "' ".$condition;
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	function cek_posisi($id_assign){
		$sql = "select DISTINCT assign_auditor_id_posisi from assignment_auditor
				left join user_apps on assign_auditor_id_auditor = user_id_internal
				where user_id = '".$this->userId."' and assign_auditor_id_assign = '".$id_assign."'";
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	function get_user_by_posisi($id_prog, $id_posisi=""){
		$condition = '';
		if($id_posisi!='') $condition = " and assign_auditor_id_posisi = '".$id_posisi."' ";
		//else $condition = " and program_id_auditor = ";
		$sql = "select DISTINCT user_id from assignment_auditor
				join user_apps on assign_auditor_id_auditor = user_id_internal
				join program_audit on assign_auditor_id_assign = program_id_assign
				where program_id = '".$id_prog."'". $condition;
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	function get_user_owner($id_prog){
		$sql = "select DISTINCT user_id from kertas_kerja
				join program_audit on kertas_kerja_id_program = program_id
				join user_apps on program_id_auditor = user_id_internal
				where kertas_kerja_id_program = '".$id_prog."'" ;
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [0];
	}
	function insert_lampiran_kka($id_kka, $kka_attach) {
		$sql = "insert into kertas_kerja_attachment 
				(kka_attach_id, kka_attach_kka_id, kka_attach_filename) 
				values 
				('" . $this->uniq_id () . "', '" . $id_kka . "', '" . $kka_attach . "')";
		$this->_db->_dbquery ( $sql );
	}
	function delete_lampiran_kka ($id_kka, $kka_attach){
		$sql = "delete from kertas_kerja_attachment where kka_attach_kka_id = '" . $id_kka . "' and kka_attach_filename = '" . $kka_attach . "' ";
		$this->_db->_dbquery ( $sql );
	}
	function list_kka_lampiran($id_kka){
		$sql = "select kka_attach_id, kka_attach_kka_id, kka_attach_filename from kertas_kerja_attachment
				where kka_attach_kka_id = '".$id_kka."'" ;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function insert_update_kertas_kerja($kertas_kerja_id, $kertas_kerja_id_program, $kertas_kerja_no, $kertas_kerja_desc, $kertas_kerja_kesimpulan, $kertas_kerja_date, $kertas_kerja_attach) {
		$sql = "insert into kertas_kerja 
				(kertas_kerja_id, kertas_kerja_id_program, kertas_kerja_no, kertas_kerja_desc, kertas_kerja_kesimpulan, kertas_kerja_attach, kertas_kerja_date) 
				values 
				('".$kertas_kerja_id."', '".$kertas_kerja_id_program."', '".$kertas_kerja_no."', '".$kertas_kerja_desc."', '".$kertas_kerja_kesimpulan."', '".$kertas_kerja_attach."', '".$kertas_kerja_date."')
				
				ON DUPLICATE KEY UPDATE kertas_kerja_id = '".$kertas_kerja_id."', kertas_kerja_id_program = '".$kertas_kerja_id_program."', kertas_kerja_no = '".$kertas_kerja_no."', kertas_kerja_desc = '".$kertas_kerja_desc."', kertas_kerja_kesimpulan = '".$kertas_kerja_kesimpulan."', kertas_kerja_attach = '".$kertas_kerja_attach."', kertas_kerja_date = '".$kertas_kerja_date."' ";
		$this->_db->_dbquery ( $sql );
	}	
	
	function insert_update_lampiran_kertas_kerja($kka_attach_id, $kka_attach_kka_id, $kka_attach_filename) {
		$sql = "insert into kertas_kerja_attachment 
				(kka_attach_id, kka_attach_filename, kka_attach_kka_id) 
				values 
				('".$kka_attach_id."', '".$kka_attach_filename."', '".$kka_attach_kka_id."')
				
				ON DUPLICATE KEY UPDATE kka_attach_id = '".$kka_attach_id."', kka_attach_filename = '".$kka_attach_filename."', kka_attach_kka_id = '".$kka_attach_kka_id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function kertas_kerja_by_pka($id_prog, $id_auditor){
		$sql = "select kertas_kerja_id, kertas_kerja_id_program, kertas_kerja_no, kertas_kerja_desc, kertas_kerja_kesimpulan, kertas_kerja_date, kertas_kerja_attach, kertas_kerja_status
				from kertas_kerja
				join program_audit on kertas_kerja_id_program = program_id
				where kertas_kerja_id_program = '".$id_prog."' and program_id_auditor = '".$id_auditor."' " ;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	// end kka
}
?>
