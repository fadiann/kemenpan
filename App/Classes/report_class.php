<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} elseif (@$position == 2) {
	include_once "../../Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class report {
	var $_db;
	var $userId;
	function __construct($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	
	function report_siklus_risiko($kategori_id, $tahun, $auditee) {
		$condition = "";
		if($auditee!="") $condition = "and penetapan_auditee_id = '" . $auditee . "'";
		$sql = "select identifikasi_id, risk_kategori, identifikasi_no_risiko, identifikasi_nama_risiko, identifikasi_penyebab, identifikasi_selera, 
				analisa_bobot_kat_risk, analisa_ri, analisa_bobot_risk, analisa_kemungkinan, analisa_kemungkinan_name, analisa_dampak, analisa_dampak_name, analisa_nilai_ri,
				evaluasi_risiko_residu, evaluasi_komponen, evaluasi_efektifitas, evaluasi_risiko_residu, evaluasi_efektifitas_name, evaluasi_risiko_residu_name,
				penanganan_risiko_id, penanganan_plan, penanganan_date, penanganan_pic_id, risk_penanganan_jenis, pic_name,
				penetapan_auditee_id,
				monitoring_action, monitoring_date, monitoring_plan_action, monitoring_tenggat_waktu
				FROM risk_identifikasi
				left join risk_penetapan on identifikasi_penetapan_id = penetapan_id
				left join par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				left join par_risk_penanganan on penanganan_risiko_id = risk_penanganan_id
				left join auditee_pic on penanganan_pic_id = pic_id
				where penetapan_status = '2' and identifikasi_kategori_id = '".$kategori_id."' and penetapan_tahun = '".$tahun."' ".$condition; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function get_assignment_id($auditee_id, $tahun) {
		$sql = "select assign_id
				FROM assignment
				join assignment_auditee on assign_id = assign_auditee_id_assign 
				where assign_auditee_id_auditee = '".$auditee_id."' and assign_tahun = '".$tahun."' "; 
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow();
		return $arr[0];
	}
	
	function get_anggota($assign_id, $auditee_id, $posisi_code) {
		$sql = "select auditor_name
				FROM assignment_auditor
				join auditor on assign_auditor_id_auditor = auditor_id 
				left join par_posisi_penugasan on assign_auditor_id_posisi = posisi_id 
				where assign_auditor_id_assign = '".$assign_id."' and assign_auditor_id_auditee = '".$auditee_id."' and posisi_code = '".$posisi_code."' "; 
		$rs = $this->_db->_dbquery ( $sql );
		$arr = $rs->FetchRow();
		return $arr[0];
	}
	
	function assign_program_audit_list($aspek_id, $assign_id, $auditee_id) {
		$sql = "select program_id, program_day, auditor_name, assign_kegiatan, ref_program_procedure, ref_program_title, program_jam
				FROM program_audit
				left join assignment on program_id_assign = assign_id
				left join ref_program_audit on program_id_ref = ref_program_id
				left join auditor on program_id_auditor = auditor_id
				where ref_program_aspek_id = '".$aspek_id."' and program_id_assign = '".$assign_id."' and program_id_auditee = '".$auditee_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function program_kka_list($program_id) {
		$sql = "select kertas_kerja_no
				FROM kertas_kerja
				where kertas_kerja_id_program = '".$program_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function kertas_kerja_list($assign_id, $auditee_id) {
		$sql = "select kertas_kerja_id, kertas_kerja_no, kertas_kerja_desc, kertas_kerja_kesimpulan, auditor_name, ref_program_title
				FROM kertas_kerja
				left join program_audit on kertas_kerja_id_program = program_id
				left join ref_program_audit on program_id_ref  = ref_program_id
				left join auditor on program_id_auditor = auditor_id
				where program_id_assign = '".$assign_id."' and program_id_auditee = '".$auditee_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function assign_list($assign_id) {
		$sql = "select assign_id, assign_surat_no, assign_no_lha, assign_date_lha, assign_periode, lha_ringkasan, assign_dasar, lha_metodologi, assign_kegiatan, lha_tujuan_audit, lha_ruanglingkup, lha_batasan, lha_kegiatan, assign_start_date, assign_end_date, lha_strategi_laporan, lha_hasil, lha_status, audit_type_name
				FROM assignment
				left join assignment_surat_tugas on assign_id = assign_surat_id_assign
				left join par_audit_type on audit_type_id = assign_tipe_id
				join assignment_lha on assign_id = lha_id_assign
				where assign_id = '".$assign_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function temuan_list($assign_id, $auditee_id) {
		$sql = "select finding_id, finding_judul, finding_kondisi, finding_kriteria, finding_sebab, finding_akibat, finding_tanggapan_auditee, finding_tanggapan_auditor
				FROM finding_internal
				where finding_assign_id = '".$assign_id."' and finding_auditee_id = '".$auditee_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function rekomendasi_list($finding_id) {
		$sql = "select rekomendasi_id, rekomendasi_desc
				FROM rekomendasi_internal
				where rekomendasi_finding_id = '".$finding_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function tindak_lanjut_list($finding_id) {
		$sql = "select tl_desc
				FROM tindaklanjut_internal
				left join rekomendasi_internal on rekomendasi_id = tl_rek_id
				where rekomendasi_finding_id = '".$finding_id."' "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function plan_data_viewlist($tahun) {
		$sql = "select audit_plan_id, audit_plan_start_date, audit_plan_end_date
				FROM audit_plan
				where audit_plan_tahun = '".$tahun."'"; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function list_auditor_per_assign($tahun, $auditor_id, $tipe_audit) {
		$condition="";
		if($tahun!="") $condition .= "and assign_tahun = '".$tahun."'";
		if($auditor_id!="") $condition .= "and auditor_id = '".$auditor_id."'";
		if($tipe_audit!="") $condition .= "and assign_tipe_id = '".$tipe_audit."'";
		$sql = "select distinct auditor_name, auditor_nip, assign_surat_no, assign_surat_tgl, assign_auditor_start_date, assign_auditor_end_date, assign_tahun, assign_kegiatan, audit_type_name, posisi_name
				FROM assignment_auditor
				join assignment on assign_auditor_id_assign = assign_id
				left join assignment_surat_tugas on assign_id = assign_surat_id_assign
				left join par_posisi_penugasan on assign_auditor_id_posisi = posisi_id
				left join par_audit_type on assign_tipe_id = audit_type_id
				join auditor on assign_auditor_id_auditor = auditor_id 
				where 1=1 ".$condition." order by assign_auditor_start_date "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	
	function rekap_laporan($tahun) {
		$sql = "SELECT * FROM assignment INNER JOIN assignment_laporan
		ON assignment.`assign_id` = assignment_laporan.`assignment_id` WHERE assign_tahun = '".$tahun."' ORDER BY assign_start_date DESC"; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function rekap_pelaksanaan($tahun) {
		$sql = "SELECT assignment.`assign_id`, assignment.`assign_kegiatan`, assignment.`assign_start_date`, assignment_laporan.`file_laporan`, auditee.`auditee_name`, assign_end_date
		FROM assignment 
		INNER JOIN assignment_laporan ON assignment.`assign_id` = assignment_laporan.`assignment_id`
		INNER JOIN assignment_auditee ON assignment.`assign_id` = assignment_auditee.`assign_auditee_id_assign`
		INNER JOIN auditee ON assignment_auditee.`assign_auditee_id_auditee` = auditee.`auditee_id`
		WHERE assign_tahun = '".$tahun."' ORDER BY assign_start_date DESC"; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function get_tim($assign_id) {
		$sql = "SELECT assignment.`assign_id`, assignment_auditor.`assign_auditor_id_auditor`, auditor.`auditor_name`, par_posisi_penugasan.`posisi_code` FROM assignment
		INNER JOIN assignment_auditor ON assignment.`assign_id` = assignment_auditor.`assign_auditor_id_assign`
		INNER JOIN auditor ON auditor.`auditor_id` = assignment_auditor.`assign_auditor_id_auditor`
		INNER JOIN par_posisi_penugasan ON assignment_auditor.`assign_auditor_id_posisi` = par_posisi_penugasan.`posisi_id`
		WHERE assign_id = '".$assign_id."' ORDER BY par_posisi_penugasan.`posisi_sort` ASC"; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
}
?>
