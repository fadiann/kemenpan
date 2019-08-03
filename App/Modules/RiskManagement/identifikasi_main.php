<?php
include_once "App/Classes/risk_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/param_class.php";

$risks    = new risk($ses_userId);
$auditees = new auditee($ses_userId);
$params = new param($ses_userId);
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

$ses_penetapan_id = $Helper->replacetext($_SESSION['ses_penetapan_id']);
$paging_request   = "main.php?method=risk_identifikasi";
$acc_page_request = "identifikasi_acc.php";

$list_page_sasaran   = "risk_identifikasi_view_sasaran.php";
$list_page_indikator = "risk_identifikasi_view_indikator.php";

$list_page_risiko = "risk_identifikasi_view_risiko.php";
$edit_risiko      = "identifikasi_risiko_edit.php";

$rs_penetapan      = $risks->penetapan_data_viewlist($ses_penetapan_id);
$arr_penetapan     = $rs_penetapan->FetchRow();

// create grid
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
$offset           = ($noPage - 1) * $num_row;
$def_page_request = $paging_request . "&page=$noPage";
$grid             = "App/Templates/Grids/grid_risiko.php";

$gridHeader = array("Nomor Risiko", "Sasaran", "Indikator", "Kejadian", "Kategori", "Penyebab", "Dampak");
$gridDetail = array("identifikasi_no_risiko", "identifikasi_selera", "identifikasi_id", "identifikasi_id", "identifikasi_id", "identifikasi_id", "identifikasi_id");
$gridWidth  = array("10", "20", "10", "10", "10", "10", "10");

$key_by    = array("Nomor Risiko", "Sasaran");
$key_field = array("identifikasi_no_risiko", "identifikasi_selera");

$widthAksi  = "10";
$iconEdit   = "1";
$iconDel    = "1";
$iconDetail = "0";
// end grid

switch ($_action) {
	//INDIKATOR
	case "getindikator":
		$data_id         = $Helper->replacetext($_REQUEST['data_id']);
		$rs_indikator    = $risks->indikator_view_bySasaran($data_id);
		$count_indikator = $rs_indikator->recordCount();
		$page_title      = "Daftar Indikator";
		$page_request    = $list_page_indikator;
		break;

	case "editindikator":
		$data_id         = $Helper->replacetext($_REQUEST['data_id']);
		$rs_indikator    = $risks->indikator_view_byId($data_id);
		$page_title      = "Ubah Data Indikator";
		$page_request    = $edit_indikator;
		break;
	case "postindikator":
		$id_identifikasi	= $Helper->unixid();
		$id_sasaran			= $Helper->replacetext($_POST["id_sasaran"]);
		$count				= count($_POST['indikator']);
		for($x = 0; $x < $count; $x++){
			$id_indikator		= $Helper->unixid();
			$indikator            = $Helper->replacetext($_POST["indikator"][$x]);
			$risks->identifikasi_indikator_add($id_indikator, $ses_penetapan_id, $id_sasaran, $indikator);
		}
		//die();
		$Helper->js_alert_act(3);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	//END INDIKATOR

	//RISIKO
	case "getrisiko":
		$data_id            = $Helper->replacetext($_REQUEST['data_id']);
		$_SESSION['indikator_id'] = $data_id;
		$rs_identifikasi    = $risks->identifikasi_view_byIndikator($data_id);
		$count_identifikasi = $rs_identifikasi->recordCount();
		$page_title         = "Daftar Risiko";
		$page_request       = $list_page_risiko;
		break;
	case "editrisiko":
		$data_id            = $Helper->replacetext($_REQUEST['data_id']);
		$rs           		= $risks->identifikasi_data_viewlist($data_id);
		$arr 				= $rs->FetchRow();
		$page_title         = "Ubah Data Risiko";
		$page_request       = $edit_risiko;
		$_nextaction  		= "posteditrisiko";
		break;
	case "posteditrisiko":
		$fdata_id     = $Helper->replacetext($_POST["data_id"]);
		$indikator_id = $Helper->replacetext($_POST["indikator_id"]);
		$fnama        = $Helper->replacetext($_POST["nama"]);
		$fkategori    = $Helper->replacetext($_POST["kategori"]);
		$fpenyebab    = $Helper->replacetext($_POST["penyebab"]);
		$fdampak      = $Helper->replacetext($_POST["dampak"]);
		if ($fnama != "" && $fkategori != "" && $fpenyebab != "" && $fdampak != "") {
			$risks->identifikasi_edit($fdata_id, $fnama, $fkategori, $fpenyebab, $fdampak);
			$risks->reset_data_risk($ses_penetapan_id);
			$Helper->js_alert_act(1);
		} else {
			$Helper->js_alert_act(5);
		}
		echo "<script>window.open('main.php?method=risk_identifikasi&data_action=getrisiko&data_id=$indikator_id', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postrisiko":
		$id_indikator		= $Helper->replacetext($_POST["indikator"]);
		$count				= count($_POST['nama']);
		for($x = 0; $x < $count; $x++){
			$nama				= $Helper->replacetext($_POST["nama"][$x]);
			$kategori			= $Helper->replacetext($_POST["kategori"][$x]);
			$penyebab			= $Helper->replacetext($_POST["penyebab"][$x]);
			$dampak				= $Helper->replacetext($_POST["dampak"][$x]);
			$risks->identifikasi_add($ses_penetapan_id, $id_indikator, '0', $nama, $kategori, $penyebab, $dampak);
		}
		$Helper->js_alert_act(3);
		echo "<script>window.open('main.php?method=risk_identifikasi&data_action=getrisiko&data_id=$id_indikator', '_self');</script>";
		$page_request = "blank.php";
		break;
	//END RISIKO
	
	case "postsasaran":
		$id_identifikasi	= $Helper->unixid();
		$count				= count($_POST['sasaran']);
		for($x = 0; $x < $count; $x++){
			$id_sasaran			= $Helper->unixid();
			$sasaran            = $Helper->replacetext($_POST["sasaran"][$x]);
			$risks->identifikasi_sasaran_add($id_sasaran, $id_identifikasi, $ses_penetapan_id, $sasaran);
		}
		$Helper->js_alert_act(3);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;






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
		$id_identifikasi	= $Helper->unixid();
		$id_sasaran			= $Helper->unixid();
		$id_indikator		= $Helper->unixid();
		$sasaran            = $Helper->replacetext($_POST["sasaran"]);
		$count				= count($_POST['nama']);
		$rs_get_penetapan   = $risks->penetapan_data_viewlist($ses_penetapan_id);
		$arr_get_penetapan  = $rs_get_penetapan->FetchRow();
		$count_identifikasi = trim($risks->get_count_identifikasi($ses_penetapan_id));
		$loopUntil          = 3 - strlen($count_identifikasi);
		$no_identifikasi    = str_repeat('0', $loopUntil) . $count_identifikasi;
		$nomor_risiko       = $arr_get_penetapan['auditee_kode'] . $no_identifikasi;
		
		if ($sasaran != "") {
			$risks->identifikasi_sasaran_add($id_sasaran, $id_identifikasi, $ses_penetapan_id, $sasaran);
			for($x = 0; $x < $count; $x++){
				$data_detail	= array();
				$indikator      = $Helper->replacetext($_POST["indikator"][$x]);
				$kejadian		= $Helper->replacetext($_POST["nama"][$x]);
				$kategori		= $Helper->replacetext($_POST["kategori"][$x]);
				$penyebab		= $Helper->replacetext($_POST["penyebab"][$x]);
				$dampak			= $Helper->replacetext($_POST["dampak"][$x]);
				$risks->identifikasi_indikator_add($id_indikator, $id_sasaran, $indikator);
				$risks->identifikasi_add($ses_penetapan_id, $id_indikator, $nomor_risiko, $kejadian, $kategori, $penyebab, $dampak);
			}
			//die();
			$risks->reset_data_risk($ses_penetapan_id);
			$Helper->js_alert_act(3);
		} else {
			$Helper->js_alert_act(5);
		}
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getdelete":
		$fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
		$risks->identifikasi_delete($fdata_id);
		$risks->reset_data_risk($ses_penetapan_id);
		$Helper->js_alert_act(2);
		echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
		$page_request = "blank.php";
		break;

	default:
		// $recordcount  = $risks->identifikasi_count($ses_penetapan_id, $key_search, $val_search, $key_field);
		$rs_sasaran   = $risks->identifikasi_sasaran_viewlist($ses_penetapan_id);
		$page_title   = "Daftar Sasaran Identifikasi Risiko";
		$page_request = $list_page_sasaran;
	break;
}
include_once $page_request;
?>