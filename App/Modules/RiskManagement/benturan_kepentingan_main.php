<?php
include_once "App/Classes/risk_class.php";
include_once "App/Classes/auditee_class.php";

$risks    = new risk($ses_userId);
$auditees = new auditee($ses_userId);
@$_action = $Helper->replacetext($_REQUEST["data_action"]);

if (isset($_POST["val_search"])) {
	@session_start();
	$_SESSION['key_search'] = $Helper->replacetext($_POST["key_search"]);
	$_SESSION['val_search'] = $Helper->replacetext($_POST["val_search"]);
	$_SESSION['val_method'] = $method;
}

$key_search = @$_SESSION['key_search'];
$val_search = @$_SESSION['val_search'];
$val_method = @$_SESSION['val_method'];

if (@$method != @$val_method) {
	$key_search = "";
	$val_search = "";
	$val_method = "";
}

$paging_request    = "main.php?method=benturan_kepentingan";
$acc_page_request  = "benturan_kepentingan_acc.php";
$list_page_request = "benturan_kepentingan_view.php";

// ==== buat grid ===//
$num_row = 10;
@$str_page = $Helper->replacetext($_GET['page']);
if (isset($str_page)) {
	if (is_numeric($str_page) && $str_page != 0) {
		$noPage = $str_page;
	} else {
		$noPage = 1;
	}
} else {
	$noPage = 1;
}
$offset = ($noPage - 1) * $num_row;

$def_page_request = $paging_request . "&page=$noPage";

$grid       = "App/Templates/Grids/grid_benturan_kepentingan.php";
$gridHeader = array("Tahun", "Uraian", "Pelaku Yang Terkait", "Rencana Aksi");
$gridDetail = array("tahun", "uraian", "pelaku", "rencana_aksi");
$gridWidth  = array("5", "25", "15", "20");

$key_by    = array("Tahun", "Uraian", "Pelaku Yang Terkait", "Rencana Aksi");
$key_field = array("tahun", "uraian", "pelaku", "rencana_aksi");

$widthAksi  = "10";
$iconEdit   = "1";
$iconDel    = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd":
		$_nextaction  = "postadd";
		$page_request = $acc_page_request;
		$page_title   = "Tambah Benturan Kepentingan";
		break;
	case "getedit":
		$_nextaction  = "postedit";
		$page_request = $acc_page_request;
		$fdata_id     = $Helper->replacetext($_REQUEST["data_id"]);
		$row          = $risks->benturan_kepentingan_viewById($fdata_id)->FetchRow();
		$page_title   = "Ubah Benturan Kepentingan";
		break;
	case "postadd":
		$id			  = $Helper->unixid();
		$data = [
			$id,
			$Helper->postData('uraian'),
			$Helper->postData('pelaku'),
			$Helper->postData('rencana'),
			$Helper->postData('tahun'),
		];
		// var_dump($_POST);
		// die();
		$risks->benturan_kepentingan_add($data);
		$Helper->js_alert_act(3);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postedit":
		$id  = $Helper->replacetext($_POST["data_id"]);
		$data = [
			$Helper->postData('uraian'),
			$Helper->postData('pelaku'),
			$Helper->postData('rencana'),
			$Helper->postData('tahun'),
			$id
		];
		$risks->benturan_kepentingan_edit($data);
		$Helper->js_alert_act(1);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getdelete":
		$fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
		// var_dump($_REQUEST);
		// die();
		$Helper->deleteData('benturan_kepentingan', 'benturan_kepentingan_id', $fdata_id);
		$Helper->js_alert_act(2);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
	break;

	default:
		$recordcount  = $risks->benturan_kepentingan_count($key_search, $val_search, $key_field);
		$rs           = $risks-> benturan_kepentingan_view_grid($key_search, $val_search, $key_field, $offset, $num_row);
		$page_title   = "Benturan Kepentingan";
		$page_request = $list_page_request;
	break;
}
include_once $page_request;
