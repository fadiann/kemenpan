<?php
if(isset($_REQUEST['data_action'])){
// var_dump($_REQUEST);

include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/dashboard_class.php";

$auditors      = new auditor ( $ses_userId );
$auditees      = new auditee ( $ses_userId );
$assigns       = new assign ( $ses_userId );
$programaudits = new programaudit ( $ses_userId );
$findings      = new finding ( $ses_userId );
$dashboards    = new dashboard ( $ses_userId );

$_action    = $Helper->replacetext($_REQUEST['data_action']);

$view_penugasan = "view_penugasan.php";

switch ($_action) {
    case 'lihat_penugasan' :
        $filter_tahun      = $Helper->postData('tahun');
        $filter_auditor_id = $Helper->postData('auditor_id');
        $row_auditor       = $auditors->auditor_data_viewlist($filter_auditor_id)->FetchRow();
        $rs                = $dashboards->rekap_penugasan_by_auditor($filter_auditor_id, $filter_tahun);
        $page_title        = 'Rekapitulasi Penugasan Auditor';
        include $view_penugasan;
		break;
	default :
        break;
    }
}else{
    header('location: main.php');
}
?>