<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/rekomendasi_class.php";
include_once "App/Classes/tindaklanjut_class.php";
include_once "App/Classes/assignment_class.php";

$auditors = new auditor ( $ses_userId );
$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );
$tindaklanjuts = new tindaklanjut ( $ses_userId );
$assigns = new assign ( $ses_userId );

$ses_finding_id = $_SESSION ['ses_finding_id'];

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

$paging_request = "main.php?method=rekomendasi_tl";
$acc_page_request = "rekomendasi_acc.php";
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

$view_parrent = "rekomendasi_view_parrent.php";
$grid = "App/Templates/Grids/grid_monitoring.php";
$gridHeader = array ("Desc Rekomendasi", "Batas Waktu", "PIC", "Status", "Tindak Lanjut");
$gridDetail = array ("1", "2", "3", "4", "0");
$gridWidth = array ("30", "15", "15", "10", "10");

$key_by = array ("Rekomendasi", "PIC");
$key_field = array ("rekomendasi_desc", "pic_name");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "tindaklanjut" :
		$_SESSION ['ses_rekomendasi_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=tindaklanjut', '_self');</script>
<?
		break;
	default :
		$recordcount = $rekomendasis->rekomendasi_count ( $ses_finding_id, "", $key_search, $val_search, $key_field );
		$rs = $rekomendasis->rekomendasi_view_grid ( $ses_finding_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Rekomendasi";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
