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

$ses_penetapan_id  = $_SESSION['ses_penetapan_id'];
$paging_request    = "main.php?method=risk_identifikasi";
$acc_page_request  = "identifikasi_acc.php";
$list_page_request = "risk_view.php";
$rs_penetapan      = $risks->penetapan_data_viewlist($ses_penetapan_id);
$arr_penetapan     = $rs_penetapan->FetchRow();

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

$grid       = "App/Templates/Grids/grid_risiko.php";
$gridHeader = array("Nomor Risiko", "Kejadian Risiko", "Kategori Risiko", "Penyebab Risiko", "Dampak Risiko");
$gridDetail = array("identifikasi_no_risiko", "identifikasi_nama_risiko", "risk_kategori", "identifikasi_penyebab", "identifikasi_selera");
$gridWidth  = array("10", "25", "15", "20", "10");

$key_by    = array("Nomor Risiko", "Kejadian Risiko", "Kategori Risiko", "Penyebab Risiko", "Dampak Risiko");
$key_field = array("identifikasi_no_risiko", "identifikasi_nama_risiko", "risk_kategori", "identifikasi_penyebab", "identifikasi_selera");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd":
		$_nextaction  = "postadd";
		$page_request = $acc_page_request;
		$page_title   = "Tambah Identifikasi";
		break;
	case "getedit":
		$_nextaction  = "postedit";
		$page_request = $acc_page_request;
		$fdata_id     = $Helper->replacetext($_REQUEST["data_id"]);
		$rs           = $risks->identifikasi_data_viewlist($fdata_id);
		$page_title   = "Ubah Identifikasi";
		break;
	case "postadd":
		$id					= $Helper->unixid();
		$fnama              = $Helper->replacetext($_POST["nama"]);
		$fkategori          = $Helper->replacetext($_POST["kategori"]);
		$fpenyebab          = $Helper->replacetext($_POST["penyebab"]);
		$fdampak            = $Helper->replacetext($_POST["dampak"]);
		$rs_get_penetapan   = $risks->penetapan_data_viewlist($ses_penetapan_id);
		$arr_get_penetapan  = $rs_get_penetapan->FetchRow();
		$count_identifikasi = trim($risks->get_count_identifikasi($ses_penetapan_id));
		$loopUntil          = 3 - strlen($count_identifikasi);
		$no_identifikasi    = str_repeat('0', $loopUntil) . $count_identifikasi;
		$nomor_risiko       = $arr_get_penetapan['auditee_kode'] . $no_identifikasi;

		$data_detail = [
			$id,
			$Helper->postData('sasaran'),
			$Helper->postData('indikator')
		];

		if ($fnama != "" && $fkategori != "" && $fpenyebab != "" && $fdampak != "") {
			$risks->identifikasi_add( $id, $ses_penetapan_id, $nomor_risiko, $fnama, $fkategori, $fpenyebab, $fdampak);
			$risks->identifikasi_detail_add($data_detail);
			$risks->reset_data_risk($ses_penetapan_id);
			$Helper->js_alert_act(3);
		} else {
			$Helper->js_alert_act(5);
		}
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postedit":
		$fdata_id  = $Helper->replacetext($_POST["data_id"]);
		$fnama     = $Helper->replacetext($_POST["nama"]);
		$fkategori = $Helper->replacetext($_POST["kategori"]);
		$fpenyebab = $Helper->replacetext($_POST["penyebab"]);
		$fdampak   = $Helper->replacetext($_POST["dampak"]);
		$data_detail = [
			$Helper->postData('sasaran'),
			$Helper->postData('indikator'),
			$fdata_id
		];
		if ($fnama != "" && $fkategori != "" && $fpenyebab != "" && $fdampak != "") {
			$risks->identifikasi_edit($fdata_id, $fnama, $fkategori, $fpenyebab, $fdampak);
			$risks->identifikasi_detail_edit($data_detail);
			$risks->reset_data_risk($ses_penetapan_id);
			$Helper->js_alert_act(1);
		} else {
			$Helper->js_alert_act(5);
		}
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getdelete":
		$fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
		$risks->identifikasi_delete($fdata_id);
		$risks->identifikasi_detail_delete($fdata_id);
		$risks->reset_data_risk($ses_penetapan_id);
		$Helper->js_alert_act(2);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
	break;

	default:
		$recordcount = $risks->identifikasi_count($ses_penetapan_id, $key_search, $val_search, $key_field);
		$rs = $risks->identifikasi_view_grid($ses_penetapan_id, $key_search, $val_search, $key_field, $offset, $num_row);
		$page_title = "Daftar Identifikasi Risiko";
		$page_request = $list_page_request;
	break;
}
include_once $page_request;
?>