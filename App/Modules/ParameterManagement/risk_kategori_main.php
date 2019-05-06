<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=par_risk_kategori";
$acc_page_request = "risk_kategori_acc.php";
$list_page_request = "param_view.php";

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

$grid = "grid.php";
$gridHeader = array (
		"Kategori Risiko" 
);
$gridDetail = array (
		"1" 
);
$gridWidth = array (
		"75" 
);
$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Kategori Risiko";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->risk_kategori_data_viewlist ( $fdata_id );
		$page_title = "Ubah Kategori Risiko";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_risk_kategori ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$frisk_kategori_id = $arr_nama ['risk_kategori_id'];
			$del_st = $arr_nama ['risk_kategori_del_st'];
			if ($frisk_kategori_id == "") {
				$params->risk_kategori_add ( $fname );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_risk_kategori_del ( $frisk_kategori_id, $fname );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $fname );
				}
			}
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
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_risk_kategori ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$frisk_kategori_id = $arr_nama ['risk_kategori_id'];
			$del_st = $arr_nama ['risk_kategori_del_st'];
			if ($frisk_kategori_id == "") {
				$params->risk_kategori_edit ( $fdata_id, $fname );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_risk_kategori_del ( $frisk_kategori_id, $fname );
					$params->risk_kategori_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fname );
				}
			}
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
		$params->risk_kategori_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->risk_kategori_count ();
		$rs = $params->risk_kategori_viewlist ( $offset, $num_row );
		$page_title = "Daftar Kategori Risiko";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
