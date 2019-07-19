<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class planning {
	var $_db;
	var $userId;
	function __construct($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	function uniq_id() {
		return $this->_db->uniqid ();
	}

	function cek_perencanaan($id_penetapan_risiko) {
		$sql = "select penetapan_set_pkat FROM risk_penetapan
				where penetapan_id = '".$id_penetapan_risiko."' ";
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}

	// Planning
	function planning_count($base_on_id_int="", $key_search, $val_search, $all_field) {
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

		$sql = "select count(distinct audit_plan_id) FROM audit_plan
				left join par_audit_type on audit_plan_tipe_id = audit_type_id
				left join audit_plan_auditor on audit_plan_id = plan_auditor_id_plan
				left join user_apps as a on audit_plan_userID_propose = a.user_id
				left join user_apps as b on audit_plan_userID_approve = b.user_id
				where 1=1 ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function planning_view_grid($base_on_id_int="", $key_search, $val_search, $all_field, $offset, $num_row) {
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

		$sql = "select distinct audit_plan_id, audit_type_name, case audit_plan_status when '1' then 'Diajukan' when '2' then 'disetujui' when '3' then 'Ditolak' else 'Belum Diajukan' end as status_plan, audit_plan_kegiatan,
				audit_plan_start_date, audit_plan_end_date, audit_plan_status,
				a.user_username as user_propose,
				b.user_username as user_approve
				from audit_plan
				left join par_audit_type on audit_plan_tipe_id = audit_type_id
				left join audit_plan_auditor on audit_plan_id = plan_auditor_id_plan
				left join user_apps as a on audit_plan_userID_propose = a.user_id
				left join user_apps as b on audit_plan_userID_approve = b.user_id
				where 1=1 ".$condition." order by audit_plan_start_date DESC
				LIMIT $offset, $num_row";
				//echo $sql;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function planning_viewlist($id) {
		$sql = "select audit_plan_id, audit_plan_tipe_id, audit_plan_tahun, audit_plan_start_date, audit_plan_end_date, audit_type_name, audit_plan_kegiatan, audit_plan_periode, audit_plan_code, audit_plan_biaya, audit_plan_sub_tipe, audit_type_opsi, sub_audit_type_name, audit_type_code
				FROM audit_plan
				left join par_audit_type on audit_plan_tipe_id = audit_type_id
				left join par_sub_audit_type on audit_plan_sub_tipe = sub_audit_type_id
				where audit_plan_id = '".$id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function planning_auditee_viewlist($id) {
		$sql = "select audit_plan_auditee_id_plan, audit_plan_auditee_id_auditee, auditee_name, auditee_propinsi_id, audit_plan_auditee_hari, audit_plan_auditee_id
				FROM audit_plan_auditee
				join auditee on audit_plan_auditee_id_auditee = auditee_id
				where audit_plan_auditee_id_plan = '".$id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function planning_komentar_viewlist($id) {
		$sql = "select auditor_name, plan_comment_desc, plan_comment_date
				FROM audit_plan_comment
				left join user_apps on plan_comment_user_id = user_id
				left join auditor on user_id_internal = auditor_id
				where plan_comment_plan_id = '".$id."' order by plan_comment_date ASC";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function planning_add($id_plann, $kode_plan, $tipe_audit, $tahun, $tanggal_awal, $tanggal_akhir, $hari_kerja, $tujuan, $periode, $biaya_audit, $sub_type) {
		$sql = "insert into audit_plan
				(audit_plan_id, audit_plan_code, audit_plan_tipe_id, audit_plan_tahun, audit_plan_start_date, audit_plan_end_date, audit_plan_hari, audit_plan_kegiatan, audit_plan_periode, audit_plan_biaya, audit_plan_sub_tipe)
				values
				('".$id_plann."', '".$kode_plan."', '".$tipe_audit."', '".$tahun."', '".$tanggal_awal."', '".$tanggal_akhir."', '".$hari_kerja."', '".$tujuan."', '".$periode."', '".$biaya_audit."', '".$sub_type."')";
		$aksinyo = "Menambah Plan ID ".$id_plann;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function planning_add_auditee($id_plann, $id_auditee, $jml_hr) {
		$sql = "insert into audit_plan_auditee
				(audit_plan_auditee_id_plan, audit_plan_auditee_id_auditee, audit_plan_auditee_hari)
				values
				('".$id_plann."','".$id_auditee."','".$jml_hr."')";
		$this->_db->_dbquery ( $sql );
	}
	function planning_edit_auditee($id_detail, $id_auditee, $jml_hr) {
		$sql = "update audit_plan_auditee set audit_plan_auditee_id_auditee = '".$id_auditee."',  audit_plan_auditee_hari = '".$jml_hr."' where audit_plan_auditee_id = '".$id_detail."' ";
		$this->_db->_dbquery ( $sql );
	}
	function planning_del_auditee($id) {
		$sql = "delete from audit_plan_auditee where audit_plan_auditee_id = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function planning_add_komentar($id_plann, $komentar, $tanggal) {
		$sql = "insert into audit_plan_comment
				(plan_comment_id, plan_comment_plan_id, plan_comment_user_id, plan_comment_desc, plan_comment_date)
				values
				('".$this->uniq_id ()."','".$id_plann."','".$this->userId."','".$komentar."','".$tanggal."')";
		$this->_db->_dbquery ( $sql );
	}
	function planning_edit($id, $tipe_audit, $tahun, $tanggal_awal, $tanggal_akhir, $hari_kerja, $kegiatan, $periode, $biaya_audit, $sub_type) {
		$sql = "update audit_plan set audit_plan_tipe_id = '".$tipe_audit."', audit_plan_tahun = '".$tahun."', audit_plan_start_date = '".$tanggal_awal."', audit_plan_end_date = '".$tanggal_akhir."', audit_plan_hari = '".$hari_kerja."', audit_plan_kegiatan = '".$kegiatan."', audit_plan_periode = '".$periode."',  audit_plan_biaya = '".$biaya_audit."',  audit_plan_sub_tipe = '".$sub_type."'
				where audit_plan_id = '".$id."' ";
		$aksinyo = "Mengubah Perencanaan Audit dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function planning_delete($id) {
		$this->planning_del_auditee ( $id );
		$this->planning_del_auditor ( $id );
		$sql = "delete from audit_plan where audit_plan_id = '".$id."' ";
		$aksinyo = "Menghapus Perencanaan Audit dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function planning_update_status($id, $status, $from) {
		$condition = "";
		if ($from == 'getajukan')
			$condition = ", audit_plan_userID_propose = '".$this->userId."' ";
		if ($from == 'getapprove')
			$condition = ", audit_plan_userID_approve = '".$this->userId."' ";
		$sql = "update audit_plan set audit_plan_status = '".$status."' ".$condition."
				where audit_plan_id = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function planning_add_assign($id) {
		$id_assign = $this->uniq_id ();
		$sql1 = "insert into assignment (assign_id, assign_tipe_id, assign_tahun, assign_start_date, assign_end_date, assign_hari, assign_biaya, assign_kegiatan, assign_id_plan, assign_periode)
				select '".$id_assign."', audit_plan_tipe_id, audit_plan_tahun, audit_plan_start_date, audit_plan_end_date, audit_plan_hari, audit_plan_biaya, audit_plan_kegiatan, audit_plan_id, audit_plan_periode
				from audit_plan where audit_plan_id = '".$id."' ";
		$this->_db->_dbquery ( $sql1 );

		$sql2 = "insert into assignment_auditee (assign_auditee_id_assign, assign_auditee_id_auditee)
				select '".$id_assign."', audit_plan_auditee_id_auditee
				from audit_plan_auditee where audit_plan_auditee_id_plan = '".$id."' ";
		$this->_db->_dbquery ( $sql2 );

		$sql3 = "insert into assignment_auditor (assign_auditor_id, assign_auditor_id_assign, assign_auditor_id_auditee, assign_auditor_id_auditor, assign_auditor_cost, assign_auditor_day, assign_auditor_id_posisi, assign_auditor_start_date, assign_auditor_end_date, assign_auditor_workday)
				select plan_auditor_id, '".$id_assign."', plan_auditor_id_auditee, plan_auditor_id_auditor, plan_auditor_cost, plan_auditor_day, plan_auditor_id_posisi, plan_auditor_start_date, plan_auditor_end_date, plan_auditor_workday
				from audit_plan_auditor where plan_auditor_id_plan = '".$id."' ";
		$this->_db->_dbquery ( $sql3 );

		$sql4 = "insert into assignment_auditor_detil (anggota_assign_detil_id, anggota_assign_detil_kode_sbu, anggota_assign_detil_jml_hari, anggota_assign_detil_nilai, anggota_assign_detil_total)
				select DISTINCT anggota_plan_detil_id, anggota_plan_detil_nama_sbu, anggota_plan_detil_jml_hari, anggota_plan_detil_nilai, anggota_plan_detil_total
				from audit_plan_auditor_detil
				join audit_plan_auditor on anggota_plan_detil_id = plan_auditor_id
				where plan_auditor_id_plan = '".$id."' ";
		$this->_db->_dbquery ( $sql4 );

		$sql5 = "insert into assignment_lha (lha_id, lha_id_assign) values ('".$this->uniq_id()."', '".$id_assign."') ";
		$this->_db->_dbquery ( $sql5 );
	}
	function plan_tahun_viewlist() {
		$sql = "select DISTINCT audit_plan_tahun
				FROM audit_plan
				where 1=1 " ;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function plan_tipe_viewlist($tahun="", $opsi="") {
		$condition = "";
		if($tahun!="") $condition = " and audit_plan_tahun = '".$tahun."' ";
		// if($opsi!="") $condition = " and audit_type_opsi != '".$opsi."' ";
		$sql = "select DISTINCT audit_type_id, audit_type_name, audit_type_opsi, audit_type_code
				FROM audit_plan
				left join par_audit_type on audit_plan_tipe_id = audit_type_id
				where 1=1 ".$condition ;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}

	function plan_sub_tipe_viewlist($tipe = "",$in_tipe = "") {
		$condition = "";
		if($in_tipe!="") $condition = " and audit_plan_tipe_id in ( ".$in_tipe." ) ";
		else $condition = " and audit_plan_tipe_id = '".$tipe."' ";
		$sql = "select sub_audit_type_id, sub_audit_type_name, sum(audit_plan_biaya) as sum_anggaran
				FROM audit_plan
				left join par_sub_audit_type on audit_plan_sub_tipe = sub_audit_type_id
				where 1=1 ".$condition." group by sub_audit_type_id, sub_audit_type_name" ;
		
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}

	function plan_report_viewlist($tipe, $sub,$in_tipe="") {
		$condition = "";
		if($in_tipe!="") $condition = " where audit_plan_tipe_id in ( ".$in_tipe." ) ";
		else $condition = " where audit_plan_tipe_id = '".$tipe."' ";
		$sql = "select DISTINCT audit_plan_id, audit_type_code
				FROM audit_plan
				left join par_audit_type on audit_plan_tipe_id = audit_type_id
				left join audit_plan_auditee on audit_plan_id = audit_plan_auditee_id_plan
				".$condition;
				
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}

	function planning_month($id,$month) {
		$sql = "select distinct audit_plan_id
				FROM audit_plan
				where audit_plan_id =  '".$id."' and (MONTH(DATE_FORMAT(FROM_UNIXTIME(`audit_plan_start_date`), '%Y-%m-%d')) <=  '".$month."' and MONTH(DATE_FORMAT(FROM_UNIXTIME(`audit_plan_end_date`), '%Y-%m-%d')) >=  '".$month."') " ; // 
		$rs = $this->_db->_dbquery ( $sql );
		// 
		$arr = $rs->FetchRow();
		return $arr['audit_plan_id'];
	}
	// end Planning

	// anggota
	function auditor_plan_count($plan_id, $key_search, $val_search, $all_field) {
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
		$sql = "select count(*)
				from audit_plan_auditor
				join audit_plan on plan_auditor_id_plan = audit_plan_id
				left join auditee on plan_auditor_id_auditee = auditee_id
				left join auditor on plan_auditor_id_auditor = auditor_id
				left join par_posisi_penugasan on plan_auditor_id_posisi = posisi_id
				where plan_auditor_id_plan = '".$plan_id."' ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function auditor_plan_view_grid($plan_id, $key_search, $val_search, $all_field, $offset, $num_row) {
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
		$sql = "select plan_auditor_id, auditor_name, auditee_name, posisi_name, plan_auditor_cost, plan_auditor_day, audit_plan_status
				from audit_plan_auditor
				join audit_plan on plan_auditor_id_plan = audit_plan_id
				left join auditee on plan_auditor_id_auditee = auditee_id
				left join auditor on plan_auditor_id_auditor = auditor_id
				left join par_posisi_penugasan on plan_auditor_id_posisi = posisi_id
				where plan_auditor_id_plan = '".$plan_id."' ".$condition." order by posisi_sort
				LIMIT $offset, $num_row ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function plan_auditor_add($id, $auditee_id, $anggota_id, $posisi_id, $tanggal_awal, $tanggal_akhir, $jml_hari, $plan_id, $hari_kerja) {
		$sql = "insert into audit_plan_auditor
				(plan_auditor_id, plan_auditor_id_auditee, plan_auditor_id_auditor, plan_auditor_id_posisi, plan_auditor_start_date, plan_auditor_end_date, plan_auditor_day, plan_auditor_id_plan, plan_auditor_workday)
				values
				('".$id."','".$auditee_id."','".$anggota_id."','".$posisi_id."','".$tanggal_awal."','".$tanggal_akhir."','".$jml_hari."','".$plan_id."','".$hari_kerja."')";
		$aksinyo = "Menambah anggota dengan id ".$id." pada planning id ".$plan_id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function plan_auditor_detil_add($id, $kode, $jml_hari, $nilai, $total) {
		$sql = "insert into audit_plan_auditor_detil
				(anggota_plan_detil_id, anggota_plan_detil_nama_sbu, anggota_plan_detil_jml_hari, anggota_plan_detil_nilai, anggota_plan_detil_total)
				values
				('".$id."','".$kode."','".$jml_hari."','".$nilai."','".$total."')";
		$this->_db->_dbquery ( $sql );
	}
	function plan_auditor_detil_clean($id) {
		$sql = "delete from audit_plan_auditor_detil where anggota_plan_detil_id = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function plan_auditor_viewlist($id) {
		$sql = "select plan_auditor_id, plan_auditor_id_auditee, plan_auditor_id_auditor, plan_auditor_id_posisi, plan_auditor_day, plan_auditor_cost, auditor_golongan, plan_auditor_start_date, plan_auditor_end_date, auditor_name
				from audit_plan_auditor
				left join auditor on plan_auditor_id_auditor = auditor_id
				where plan_auditor_id = '".$id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function plan_auditor_detil_viewlist($id) {
		$sql = "select anggota_plan_detil_id, anggota_plan_detil_nama_sbu, anggota_plan_detil_jml_hari, anggota_plan_detil_nilai, anggota_plan_detil_total
				from audit_plan_auditor_detil
				where anggota_plan_detil_id = '".$id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function plan_auditor_edit($id, $auditee_id, $anggota_id, $posisi_id, $tanggal_awal, $tanggal_akhir, $jml_hari, $jml_hari_kerja) {
		$sql = "update audit_plan_auditor set plan_auditor_id_auditee = '".$auditee_id."', plan_auditor_id_auditor = '".$anggota_id."', plan_auditor_id_posisi = '".$posisi_id."', plan_auditor_start_date = '".$tanggal_awal."', plan_auditor_end_date = '".$tanggal_akhir."', plan_auditor_day = '".$jml_hari."', plan_auditor_workday = '".$jml_hari_kerja."'
				where plan_auditor_id = '".$id."' ";
		$aksinyo = "Mengubah Anggota id ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function plan_auditor_update_sum_biaya($id, $biaya_audit) {
		$sql = "update audit_plan_auditor set plan_auditor_cost = '".$biaya_audit."' where plan_auditor_id = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function auditor_plan_delete($id) {
		$this->plan_auditor_detil_clean($id);
		$sql = "delete from audit_plan_auditor where plan_auditor_id = '".$id."' ";
		$aksinyo = "Menghapus anggota id ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function planning_del_auditor($id) {
		$sql = "delete from audit_plan_auditor where plan_auditor_id_plan = '".$id."' ";
		$this->_db->_dbquery ( $sql );
	}
	function planning_list_auditor($id) {
		$sql = "select auditor_id, auditor_name, posisi_name, posisi_code
				from audit_plan_auditor
				left join auditor on plan_auditor_id_auditor = auditor_id
				left join par_posisi_penugasan on plan_auditor_id_posisi  = posisi_id
				where plan_auditor_id_plan = '".$id."' order by posisi_sort, auditor_name";
		$data = $this->_db->_dbquery ( $sql );
		
		return $data;
	}
}
?>
