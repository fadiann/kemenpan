<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/finding_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$assigns = new assign ( $ses_userId );
$programaudits = new programaudit ( $ses_userId );
$findings = new finding ( $ses_userId );

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

$paging_request = "main.php?method=followupassign";
$acc_page_request = "audit_assign_acc.php";
$list_page_request = "audit_view.php";

unset ( $_SESSION ['ses_kka_id'] );

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
$grid = "App/Templates/Grids/grid_monitoring.php";
$gridHeader = array ("Nama Kegiatan", "Obyek Audit", "No & Tanggal SPT", "Tahun", "Upload Data Awal", "Temuan Audit", "Matriks TL");
$gridDetail = array ("0", "0", "5", "4", "0", "0", "0");
$gridWidth = array ("35", "35", "15", "10", "10", "10", "10");

$key_by = array ("Tahun");
$key_field = array ("assign_tahun");

$widthAksi = "10";
$iconAdd = "0";
$iconEdit = "0";
$iconDel = "0";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "view_finding" :
		$_SESSION ['ses_assign_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
		<script>window.open('main.php?method=finding_tl', '_self');</script>
		<?
		break;
	case "view_matriks" :
		$_SESSION ['ses_assign_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
		<script>window.open('main.php?method=matriks_tl', '_self');</script>
		<?
		break;
	case "upload_data" :
		$_nextaction = "postupload";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->assign_viewlist ( $fdata_id );
		$page_title = "Upload Data Awal";
		break;
	case "postupload" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );

		if($fdata_id!=""){
			$assigns->assign_del_upload ( $fdata_id);
			for($i = 1; $i <=5; $i ++) {
				$ffile = $Helper->replacetext ( $_FILES ["file_".$i] ["name"] );
				$ffile_old = $Helper->replacetext ( $_POST ["file_".$i."_old"] );
				$cek_del = $Helper->replacetext ( $_POST ["del_".$i] );
				if (! empty ( $ffile )) {
					$Helper->UploadFile ( "Upload_Pengawasan", "file_".$i, $ffile_old );
				} else {
					if($cek_del==1){
						$ffile = "";
					}else{
						$ffile = $ffile_old;
					}
				}

				if (! empty ( $ffile ))
				$assigns->assign_add_upload ( $fdata_id, $ffile );
			}

			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->assign_viewlist ( $fdata_id );
		$page_title = "Rincian Penugasan Audit";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$assigns->assign_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $assigns->assign_tl_count ($base_on_id_eks, $key_search, $val_search, $key_field);
		$rs = $assigns->assign_tl_view_grid ($base_on_id_eks, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Tindak Lanjut Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
