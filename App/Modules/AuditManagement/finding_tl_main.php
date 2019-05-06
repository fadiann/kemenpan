<?
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/kertas_kerja_class.php";
include_once "App/Classes/rekomendasi_class.php";
include_once "App/Classes/param_class.php";

$assigns = new assign ( $ses_userId );
$kertas_kerjas = new kertas_kerja ( $ses_userId );
$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );
$params = new param ( $ses_userId );

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

$paging_request = "main.php?method=finding_tl";

$acc_page_request = "finding_acc.php";
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
$grid = "App/Templates/Grids/grid_monitoring.php";
$gridHeader = array ("No Temuan", "Judul Temuan", "Satuan Kerja", "Rekomendasi", "Status");
$gridDetail = array ("finding_no", "finding_judul", "auditee_name", "finding_id", "status");
$gridWidth = array ( "10", "35", "15", "20", "10");

$key_by = array ("No Temuan", "Judul Temuan", "Satuan Kerja");
$key_field = array ("finding_no", "finding_judul", "auditee_name");

$widthAksi = "10";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "view_rekomendasi" :
		$_SESSION ['ses_finding_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=rekomendasi_tl', '_self');</script>
<?
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $findings->finding_viewlist ( $fdata_id );
		$page_title = "Rincian Temuan Audit";
		break;
	default :
		$recordcount = $findings->finding_tl_count ( $ses_assign_id, "", $key_search, $val_search, $key_field);
		$rs = $findings->finding_tl_view_grid ( $ses_assign_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Temuan Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
