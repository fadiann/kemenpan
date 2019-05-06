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

$paging_request = "main.php?method=rekomendasi";
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
$grid = "App/Templates/Grids/grid_assign.php";
$gridHeader = array ("Rekomendasi", "Batas Waktu", "PIC", "Status");
$gridDetail = array ("1", "2", "3", "4");
$gridWidth = array ("40", "15", "15", "10");

$key_by = array ("Rekomendasi", "PIC");
$key_field = array ("rekomendasi_desc", "pic_name");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Rekomendasi";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $rekomendasis->rekomendasi_viewlist ( $fdata_id );
		$page_title = "Ubah Rekomendasi";
		break;
	case "postadd" :
		$fkode_rekomendasi = $Helper->replacetext ( $_POST ["kode_rekomendasi"] );
		$frekomendasi_desc = $Helper->replacetext ( $_POST ["rekomendasi_desc"] );
		$frekomendasi_pic = $Helper->replacetext ( $_POST ["rekomendasi_pic"] );
		$ftarget_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["target_date"] ) );
		$frekomendasi_date = $Helper->date_db ( date ( "d-m-Y" ) );
		if ($fkode_rekomendasi != "" && $frekomendasi_desc != "" && $frekomendasi_pic != "" && $ftarget_date != "") {
			$rekomendasis->rekomendasi_add ( $ses_finding_id, $fkode_rekomendasi, $frekomendasi_desc, $frekomendasi_pic, $ftarget_date, $frekomendasi_date );
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
		$fkode_rekomendasi = $Helper->replacetext ( $_POST ["kode_rekomendasi"] );
		$frekomendasi_desc = $Helper->replacetext ( $_POST ["rekomendasi_desc"] );
		$frekomendasi_pic = $Helper->replacetext ( $_POST ["rekomendasi_pic"] );
		$ftarget_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["target_date"] ) );
		if ($fkode_rekomendasi != "" && $frekomendasi_desc != "" && $frekomendasi_pic != "" && $ftarget_date != "") {
			$rekomendasis->rekomendasi_edit ( $fdata_id, $fkode_rekomendasi, $frekomendasi_desc, $frekomendasi_pic, $ftarget_date );
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
		$rekomendasis->rekomendasi_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
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
