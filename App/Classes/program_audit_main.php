<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/kertas_kerja_class.php";
include_once "App/Classes/finding_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$assigns = new assign ( $ses_userId );
$params = new param ( $ses_userId );
$programaudits = new programaudit ( $ses_userId );
$kertas_kerjas = new kertas_kerja ( $ses_userId );
$findings = new finding ( $ses_userId );

$ses_assign_id = $_SESSION ['ses_assign_id'];

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

if(isset($_POST["val_search"])){
	@session_start();
	$_SESSION['key_search'] = $Helper->replacetext($_POST["key_search"]);
	$_SESSION['val_search'] = $Helper->replacetext($_POST["val_search"]);
	$_SESSION['val_method'] = $method;
}

$key_search = @$_SESSION['key_search'];
$val_search = @$_SESSION['val_search'];
$val_method = @$_SESSION['val_method'];

if(@$method!=@$val_method){
	$key_search = "";
	$val_search = "";
	$val_method = "";
}

$paging_request = "main.php?method=programaudit";
$acc_page_request = "program_audit_acc.php";
$cetak_page_request = "program_audit_print.php";
$ikhtisar_page_request = "ikhtisar_temuan.php";
$list_page_request = "audit_view.php";

// ==== buat grid ===//
$num_row = 10;
@$str_page = $Helper->replacetext ( $_GET ['page'] );
if (isset ( $str_page )) {
	if (is_numeric ( $str_page ) && $str_page != 0) {
		$noPage = $str_page;
	} else {
		$noPage = 1;
	}
} else {
	$noPage = 1;
}
$offset = ($noPage - 1) * $num_row;

$def_page_request = $paging_request . "&page=$noPage";
$view_parrent = "assign_view_parrent.php";
$grid = "App/Templates/Grids/grid_program_audit.php";
$gridHeader = array ("Satuan Kerja", "Kode", "Prosedur", "Auditor", "Status", "KKA");
$gridDetail = array ("auditee_name", "ref_program_code", "ref_program_procedure", "auditor_name", "program_status", "program_id");
$gridWidth = array ("15", "10", "25", "15", "10", "5");

$key_by = array ("Satuan Kerja", "Kode", "Sub Bidang Subtansi", "Auditor");
$key_field = array ("auditee_name", "ref_program_code", "ref_program_title", "auditor_name");

$widthAksi = "15";
$iconDetail = "1";
// === end grid ===//

$rs_assign = $assigns->assign_viewlist( $ses_assign_id );
$arr_assign = $rs_assign->FetchRow();

$status_katim="";

$status_katim = $assigns->assign_cek_katim($ses_assign_id, $ses_userId );

switch ($_action) {
	case "getcetak" :
		$page_request = $cetak_page_request;

		$auditee_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs_assign = $assigns->assign_viewlist ($ses_assign_id);
		$arr = $rs_assign->FetchRow();

		$page_title = "Cetak PKA";
		break;
	case "getikhtisar" :
		$page_request = $ikhtisar_page_request;

		$auditee_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs_assign = $assigns->assign_viewlist ($ses_assign_id);
		$arr = $rs_assign->FetchRow();

		$page_title = "Cetak Ikhtisar Temuan";
		break;
	case "getajukan_pka" :
	case "getapprove_pka" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_pka"] );

		$rs = $programaudits->program_audit_viewlist ( $id );
		$page_title = "Pengajuan Program Kerja Audit";
		break;
	case "postkomentar" :
		$id_pka = $Helper->replacetext ( $_POST ["data_id"] );
		$status = $Helper->replacetext ( $_POST ["status_pka"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );

		$Helper->hapus_notif($id_pka);
		if ($status != "") {

            if($status==1){ 
                $get_user_id = $programaudits->get_user_by_posisi($ses_assign_id, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
                $notif_to_user_id = $get_user_id; //ke katim
	            	
	            if($notif_to_user_id!=""){
	                $Helper->insert_notif($id_pka, $ses_userId, $notif_to_user_id, 'program_audit', '(Program Audit)... '.$fkomentar, $ftanggal);
	            }
            } elseif ($status == 3) {
            	$get_user_id = $programaudits->get_user_by_posisi($ses_assign_id, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
                $notif_to_user_id = $get_user_id; //ke katim
	            	
	            if($notif_to_user_id!=""){
	                $Helper->insert_notif($id_pka, $ses_userId, $notif_to_user_id, 'program_audit', '(Program Audit) '.$fkomentar, $ftanggal);
	            }
            }
    
            $programaudits->program_audit_update_status($id_pka, $status, $ftanggal);
            
            if ($fkomentar != "") {
                $programaudits->program_audit_add_komentar($id_pka, $fkomentar, $ftanggal);
                $Helper->js_alert_act(3);
            }
        
        } else {
            $Helper->js_alert_act(10);
        }
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "kertas_kerja" :
		$_SESSION ['ses_program_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=kertas_kerja', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Program Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $programaudits->program_audit_viewlist ( $fdata_id );
		$page_title = "Ubah Program Audit";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $programaudits->program_audit_viewlist ( $fdata_id );
		$page_title = "Detail Program Audit";
		break;
	case "postadd" :
		$fauditee = $Helper->replacetext ( $_POST ["auditee"] );
		$fauditor = $Helper->replacetext ( $_POST ["auditor"] );
		$program_jam = $Helper->replacetext ( $_POST ["jamm"] );
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		$fref_program = $Helper->replacetext ( $_POST ["ref_program"] );
		$flampiran = $Helper->replacetext ( $_FILES ["attach"] ["name"]);
		$ex_ref_program = explode ( ",", $fref_program );
		$cek_ref_program = count ( $ex_ref_program );
		if ($fauditee != "" && $fauditor != "" && $program_jam != "" && $cek_ref_program != "0") {
			$Helper->UploadFile ( "Upload_ProgramAudit", "attach", "");
			for($i = 0; $i < $cek_ref_program; $i ++) {
				$programaudits->program_audit_add ( $ses_assign_id, $fauditee, $ex_ref_program [$i], $fauditor, $program_jam, $flampiran, $ftanggal );
			}
			$Helper->js_alert_act ( 3 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fauditee = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fauditor = $Helper->replacetext ( $_POST ["auditor"] );
		$program_jam = $Helper->replacetext ( $_POST ["jamm"] );
		$fref_program = $Helper->replacetext ( $_POST ["ref_program"] );
		$flampiran = $Helper->replacetext ( $_FILES ["attach"] ["name"] );
		$flampiran_old = $Helper->replacetext ( $_POST ["attach_old"] );
		if ($fauditee != "" && $fauditor != "" && $program_jam != "" && $fref_program != "") {
			if (! empty ( $flampiran )) {
				$Helper->UploadFile ( "Upload_ProgramAudit", "attach", $flampiran_old );
			} else {
				$flampiran = $flampiran_old;
			}
			$programaudits->program_audit_edit ( $fdata_id, $fauditee, $fref_program, $fauditor, $program_jam, $flampiran );
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$programaudits->program_audit_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$back			= "window.open('main.php?method=auditassign', '_self');";
		$recordcount = $programaudits->program_audit_count ( $ses_assign_id, $key_search, $val_search, $key_field );
		$rs = $programaudits->program_audit_view_grid ( $ses_assign_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Program Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
