<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} elseif (@$position == 2) {
	include_once "../../Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class dashboard
{
    public $_db;
    public $userId;
    public function __construct($userId = "")
    {
        $this->_db    = new Databases();
        $this->userId = $userId;
    }
    public function uniq_id()
    {
        return $this->_db->uniqid();
    }
    public function dashboard_assign_count($year="", $tipe_audit = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "select count(distinct assign_id) FROM assignment
                left join assignment_auditor on assign_id = assign_auditor_id_assign
                left join assignment_lha on assign_id = lha_id_assign
                left join par_audit_type on assign_tipe_id = audit_type_id
                where 1=1 " . $condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }
    public function dashboard_non_assign_count($year="", $tipe_audit = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "select count(distinct assign_id) FROM assignment
                left join assignment_auditor on assign_id = assign_auditor_id_assign
                left join assignment_lha on assign_id = lha_id_assign
                left join par_audit_type on assign_tipe_id = audit_type_id
                where 1=1 AND assign_id_plan = '' " . $condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function dashboard_plan_count($year="", $tipe_audit = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and audit_plan_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }
        $sql = "select count(distinct audit_plan_id) FROM audit_plan
                left join par_audit_type on audit_plan_tipe_id = audit_type_id
                left join audit_plan_auditor on audit_plan_id = plan_auditor_id_plan
                left join user_apps as a on audit_plan_userID_propose = a.user_id
                left join user_apps as b on audit_plan_userID_approve = b.user_id
                where 1=1 ".$condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }
    public function auditee_list($year = "", $tipe_audit = "", $status = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }
        if ($status != "") {
            $condition .= " and tl_status = '" . $status . "'";
        }
        $sql = "select DISTINCT auditee_id, concat(auditee_kode) as auditee_title, auditee_name
                FROM auditee
                left join finding_internal on finding_auditee_id = auditee_id
                left join assignment on assign_id = finding_assign_id
                inner join par_audit_type on assign_tipe_id = audit_type_id
                left join rekomendasi_internal on rekomendasi_finding_id = finding_id
                left join tindaklanjut_internal on tl_rek_id = rekomendasi_id
                where 1=1 " . $condition . " order by auditee_name";
        $data = $this->_db->_dbquery($sql);
        // echo $sql;
        return $data;
    }
    public function auditee_viewlist($year = "", $tipe_audit = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }
        $sql = "select DISTINCT auditee_id, concat(auditee_kode,'-',auditee_name) as auditee_title, auditee_name
                FROM assignment_auditee
                inner join auditee on assign_auditee_id_auditee = auditee_id
                inner join assignment on assign_auditee_id_assign = assign_id
                inner join finding_internal on finding_assign_id = assign_id
                left join par_audit_type on assign_tipe_id = audit_type_id
                where 1=1 ".$condition." order by auditee_name";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }
    public function get_auditor()
    {
        $sql = "select DISTINCT auditor_id, auditor_name
                FROM auditor WHERE auditor_del_st = '1'";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }

    public function count_per($auditor, $year, $tipe_audit)
    {
        $condition = "";
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }
        if ($year != "") {
            $condition .= "and assign_tahun = '" . $year . "'";
        }
        $sql = "select count(*)
                FROM assignment_auditor
                join assignment on assign_auditor_id_assign = assign_id
                left join assignment_surat_tugas on assign_id = assign_surat_id_assign
                left join par_audit_type on assign_tipe_id = audit_type_id
                join auditor on assign_auditor_id_auditor = auditor_id
                where auditor_id = '" . $auditor . "' ".$condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function finding_audit_count($assign_id, $year = '')
    {
        $condition = '';

        if ($year != '') {
            $condition = " and assign_tahun = '$year'";
        }

        $sql = "select count(distinct finding_id) FROM finding_internal
                inner join auditee on finding_auditee_id = auditee_id
                inner join assignment on assign_id = finding_assign_id
                left join rekomendasi_internal on rekomendasi_finding_id = finding_id
                LEFT JOIN par_finding_type ON finding_internal.finding_type_id = par_finding_type.finding_type_id
                LEFT JOIN par_finding_jenis ON finding_jenis_id = jenis_temuan_id
                LEFT JOIN par_kode_penyebab ON finding_penyebab_id = kode_penyebab_id
                where finding_auditee_id = '" . $assign_id . "'$condition";
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function rekomendasi_audit_count($assign_id, $year= '')
    {
        $condition = '';

        if ($year != '') {
            $condition = " and assign_tahun = '$year'";
        }

        $sql = "select count(*) FROM rekomendasi_internal
                left join finding_internal on rekomendasi_finding_id = finding_id
                inner join assignment on assign_id = finding_assign_id
                left join auditee on finding_auditee_id = auditee_id
                where finding_auditee_id = '" . $assign_id . "'$condition";
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function tindak_lanjut_count($assign_id, $year ='')
    {
        $condition = '';

        if ($year != '') {
            $condition = " and assign_tahun = '$year'";
        }

        $sql = "select count(*) from tindaklanjut_internal
                left join rekomendasi_internal on tl_rek_id = rekomendasi_id
                left join finding_internal on rekomendasi_finding_id = finding_id
                inner join assignment on assign_id = finding_assign_id
                left join auditee on finding_auditee_id = auditee_id
                where finding_auditee_id = '$assign_id' $condition";
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function audit_type_data_viewlist($id = "")
    {
        $condition = "";
        if ($id != "") {
            $condition = " and audit_type_id = '" . $id . "' ";
        }

        $sql  = "select audit_type_name FROM par_audit_type where audit_type_del_st = 1 " . $condition;
        $data = $this->_db->_dbquery($sql);
        $arr = $data->FetchRow();
        return $arr[0];
    }

    public function finding_type_view()
    {
        $sql = "select finding_type_id, finding_type_code, finding_type_name
                FROM par_finding_type where finding_type_del_st = 1";

        $data = $this->_db->_dbquery($sql);
        return $data;
    }

    public function finding_type_finding_count($id, $year, $tipe_audit)
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "select count(*) FROM finding_internal
                left join par_finding_type on par_finding_type.finding_type_id = 
                finding_internal.finding_type_id 
                left join assignment on finding_assign_id = assign_id
                left join par_audit_type on assign_tipe_id = audit_type_id
                where finding_internal.finding_type_id = '".$id."'".$condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function get_finding_sub_type($finding_type_name)
    {
        $sql = "select sub_type_id, sub_type_name from par_finding_sub_type
                left join par_finding_type on sub_type_id_type = finding_type_id
                where sub_type_del_st = 1 and finding_type_name = '".$finding_type_name."'"; 
        $data = $this->_db->_dbquery($sql);
        return $data;  
    }

    public function finding_type_finding_sub_count($id, $year, $tipe_audit)
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }
        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }
        $sql = "select count(*) FROM finding_internal
                left join par_finding_sub_type on par_finding_sub_type.sub_type_id = 
                finding_internal.finding_sub_id 
                left join assignment on finding_assign_id = assign_id
                left join par_audit_type on assign_tipe_id = audit_type_id
                where finding_internal.finding_sub_id = '".$id."'".$condition;
        $data = $this->_db->_dbquery($sql);
        $arr  = $data->FetchRow();
        return $arr[0];
    }

    public function get_program_code($id)
    {
        $sql = "SELECT ref_program_code FROM program_audit LEFT JOIN ref_program_audit ON ref_program_id = program_id_ref WHERE program_id = '$id'";

        $result = $this->_db->_dbquery($sql);

        $arr = $result->FetchRow();

        return $arr['ref_program_code'];   
    }

    public function get_kertas_kerja_no($id)
    {
        $sql = "SELECT kertas_kerja_no FROM kertas_kerja WHERE kertas_kerja_id = '$id'";

        $result = $this->_db->_dbquery($sql);

        $arr = $result->FetchRow();

        return $arr['kertas_kerja_no'];   
    }

    public function get_temuan_no($id)
    {
        $sql = "SELECT finding_no FROM finding_internal WHERE finding_id = '$id'";

        $result = $this->_db->_dbquery($sql);

        $arr = $result->FetchRow();

        return $arr['finding_no'];   
    }

    public function get_surat_tugas_no($id)
    {
        $sql = "SELECT assign_surat_no FROM assignment_surat_tugas WHERE assign_surat_id = '$id'";

        $result = $this->_db->_dbquery($sql);

        $arr = $result->FetchRow();

        return $arr['assign_surat_no'];
    }

    public function get_assign_kegiatan_name($id)
    {
        $sql = "SELECT assign_kegiatan FROM assignment WHERE assign_id = '$id'";

        $result = $this->_db->_dbquery($sql);

        $arr = $result->FetchRow();

        return $arr['assign_kegiatan'];
    }

    public function list_rekomendasi_per_assign($auditee, $year = "", $tipe_audit = "")
    {
        $condition = "";

        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }

        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "SELECT             
                rekomendasi_id, 
                rekomendasi_desc, 
                kode_rek_code,
                CASE rekomendasi_status
                    WHEN '1' THEN 'Selesai'
                    ELSE 'Belum Selesai'
                END as rekomendasi_status
                FROM rekomendasi_internal
                LEFT JOIN par_kode_rekomendasi ON rekomendasi_id_code = kode_rek_id
                LEFT JOIN finding_internal ON rekomendasi_finding_id = finding_id
                LEFT JOIN assignment ON assign_id = finding_assign_id
                LEFT JOIN auditee ON finding_auditee_id = auditee_id
                LEFT JOIN par_audit_type ON assign_tipe_id = audit_type_id
                WHERE auditee_kode = '$auditee' $condition";
        $data = $this->_db->_dbquery($sql);

        return $data;
    }

    public function list_temuan_per_assign($auditee_kode, $year = '', $tipe_audit = '')
    {
        $condition = '';

        if ($year != '') {
            $condition = " and assign_tahun = '$year'";
        }

        if ($tipe_audit != "") {
            $condition .= " and audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "SELECT 
                distinct finding_no,
                finding_judul,
                concat(finding_type_code, '.' ,sub_type_code) AS kode_temuan
                FROM finding_internal
                LEFT JOIN auditee ON finding_auditee_id = auditee_id
                LEFT JOIN assignment ON assign_id = finding_assign_id
                LEFT JOIN par_audit_type ON assign_tipe_id = audit_type_id
                LEFT JOIN rekomendasi_internal ON rekomendasi_finding_id = finding_id
                LEFT JOIN par_finding_type ON par_finding_type.finding_type_id = 
                finding_internal.finding_type_id
                LEFT JOIN par_finding_sub_type ON finding_sub_id = sub_type_id
                LEFT JOIN par_finding_jenis ON finding_jenis_id = jenis_temuan_id
                LEFT JOIN par_kode_penyebab ON finding_penyebab_id = kode_penyebab_id
                WHERE auditee_kode = '" . $auditee_kode . "'$condition";
        
        $data = $this->_db->_dbquery($sql);
        
        return $data;
    }

    public function list_tindak_lanjut_per_assign($auditee_kode, $year = '', $tipe_audit = '')
    {
        $condition = '';

        if ($year != '') {
            $condition = " AND assign_tahun = '$year'";
        }

        if ($tipe_audit != "") {
            $condition .= " AND audit_type_id = '" . $tipe_audit . "'";
        }

        $sql = "SELECT tl_desc,
                CASE tl_status
                    WHEN '0' THEN 'Belum Diajukan'
                    WHEN '1' THEN 'Sedang Menunggu Persetujuan'
                    WHEN '2' THEN 'Selesai'
                    ELSE 'Dalam Proses'
                END AS tl_status
                FROM tindaklanjut_internal
                LEFT JOIN rekomendasi_internal ON tl_rek_id = rekomendasi_id
                LEFT JOIN finding_internal ON rekomendasi_finding_id = finding_id
                LEFT JOIN assignment ON assign_id = finding_assign_id
                LEFT JOIN par_audit_type ON assign_tipe_id = audit_type_id
                LEFT JOIN auditee ON finding_auditee_id = auditee_id
                WHERE auditee_kode = '$auditee_kode' $condition";
        $data = $this->_db->_dbquery($sql);
        
        return $data;
    }

    //
    public function get_auditee_assign_id_per_lha($id)
    {
        $sql = "SELECT assign_id, assign_auditee_id_auditee FROM assignment_auditee INNER JOIN assignment on assign_id = assign_auditee_id_assign INNER JOIN assignment_lha on assign_id = lha_id_assign WHERE lha_id = '$id'";
        
        $data = $this->_db->_dbquery($sql);
        // echo $sql;
       $rs = $data->FetchRow();

       return $rs;
    }

    public function temuan_list($auditee_id, $year = "")
    {
        $condition = "";
        if ($year != "") {
            $condition .= " and assign_tahun = '" . $year . "'";
        }

        $sql = "select finding_id, finding_judul
                FROM finding_internal
                join assignment on assign_id = finding_assign_id
                where finding_auditee_id = '" . $auditee_id . "'".$condition;
        $data = $this->_db->_dbquery($sql);
        return $data;
    }

    public function rekomendasi_per_temuan($finding_id)
    {
        $sql = "select rekomendasi_id, rekomendasi_desc, rekomendasi_dateline
                FROM rekomendasi_internal
                where rekomendasi_finding_id = '" . $finding_id . "'";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }

    public function tl_per_rekomendasi($rekomendasi_id, $status = "")
    {
        $condition = "";
        if ($status != "") {
            $condition .= " and tl_status = '" . $status . "'";
        }

        $sql = "select tl_desc, tl_status
                FROM rekomendasi_internal
                left join tindaklanjut_internal on tl_rek_id = rekomendasi_id
                where rekomendasi_id = '" . $rekomendasi_id . "'".$condition;
        $data = $this->_db->_dbquery($sql);
        return $data;   
    }

    public function count_rekomendasi_per_temuan($finding_id, $status = "")
    {
        if ($status != "") {
            $condition .= " and tl_status = '" . $status . "'";
        }

        $sql = "select count(*) from rekomendasi_internal
            left join tindaklanjut_internal on tl_rek_id = rekomendasi_id
                where rekomendasi_finding_id = '".$finding_id."'".$condition;
        $data = $this->_db->_dbquery($sql);
        // echo $sql;
        $arr = $data->FetchRow();
        return $arr[0];
    }

    public function count_rekomendasi_per_auditee($auditee_id)
    {
        $sql = "select count(*) from rekomendasi_internal
                left join finding_internal on finding_id = rekomendasi_finding_id
                left join tindaklanjut_internal on tl_rek_id = rekomendasi_id
                where finding_auditee_id = '".$auditee_id."'";
        $data = $this->_db->_dbquery($sql);
        // echo $sql;
        $arr = $data->FetchRow();
        return $arr[0];
    }
    public function rekap_penugasan_by_auditor($auditor_id, $tahun)
    {
        $sql = "SELECT `assignment`.`assign_id`, assignment.`assign_tahun`, assignment.`assign_end_date`, 
                assignment.`assign_kegiatan`, auditee.`auditee_name`, par_audit_type.`audit_type_name`, 
                auditor.`auditor_id`, auditor.`auditor_name`, ref_program_audit.`ref_program_title`, program_audit.`program_status`, program_audit.`program_id` FROM `assignment`
                INNER JOIN assignment_auditee ON assignment.`assign_id` = assignment_auditee.`assign_auditee_id_assign`
                INNER JOIN auditee ON assignment_auditee.`assign_auditee_id_auditee` = auditee.`auditee_id`
                INNER JOIN par_audit_type ON assignment.`assign_tipe_id` = par_audit_type.`audit_type_id`
                INNER JOIN program_audit ON assignment.`assign_id` = program_audit.`program_id_assign`
                INNER JOIN ref_program_audit ON program_audit.`program_id_ref` = ref_program_audit.`ref_program_id`
                INNER JOIN auditor ON program_audit.`program_id_auditor` = auditor.`auditor_id`
                WHERE assignment.`assign_tahun` = '$tahun' AND program_audit.`program_id_auditor` = '$auditor_id' ORDER BY assignment.`assign_end_date` DESC";
        // echo $sql;
        $data = $this->_db->_dbquery($sql);
        return $data;
    }
    public function rekap_kka_by_pka($pka_id)
    {
		$sql = "select kertas_kerja_id, kertas_kerja_desc, kertas_kerja_no, kertas_kerja_kesimpulan, kertas_kerja_date, kertas_kerja_attach, auditee_name, auditee_id, ref_program_title, kertas_kerja_id_program, ref_program_code, create_by.auditor_name as create_name, kerja_kerja_created_date, approve_by.auditor_name as approve_name, kertas_kerja_approve_date, assign_tahun, kertas_kerja_status
				FROM kertas_kerja 
				join program_audit on kertas_kerja_id_program = program_id
				join assignment on program_id_assign = assign_id
				left join auditee on program_id_auditee = auditee_id
				left join ref_program_audit on program_id_ref = ref_program_id
				left join auditor as create_by on kertas_kerja_created_by = create_by.auditor_id
				left join auditor as approve_by on kertas_kerja_approve_by = approve_by.auditor_id
				where kertas_kerja_id_program = '" . $pka_id . "' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
    }
    public function rekap_finding_by_kka($kka_id)
    {
		$sql = "SELECT finding_status FROM finding_internal 
                INNER JOIN kertas_kerja ON finding_internal.`finding_kka_id` = kertas_kerja.`kertas_kerja_id`
				where kertas_kerja.`kertas_kerja_id` = '" . $kka_id . "' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
    }
}
