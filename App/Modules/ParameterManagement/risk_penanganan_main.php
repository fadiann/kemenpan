<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=par_risk_penanganan";
$acc_page_request = "risk_penanganan_acc.php";
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

$grid = "App/Templates/Grids/grid.php";
$gridHeader = array (
		"Jenis Penanganan",
		"Keterangan",
		"Penanganan" 
);
$gridDetail = array (
		"1",
		"2",
		"3" 
);
$gridWidth = array (
		"20",
		"40",
		"20" 
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
		$page_title = "Tambah Penanganan Risiko";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->risk_penanganan_data_viewlist ( $fdata_id );
		$page_title = "Ubah Penanganan Risiko";
		break;
	case "postadd" :
		$fjenis = $Helper->replacetext ( $_POST ["jenis"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$fstatus = $Helper->replacetext ( $_POST ["status"] );
		if ($fjenis != "") {
			$params->risk_penanganan_add ( $fjenis, $fdesc, $fstatus );
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
		$fjenis = $Helper->replacetext ( $_POST ["jenis"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$fstatus = $Helper->replacetext ( $_POST ["status"] );
		if ($fjenis != "") {
			$params->risk_penanganan_edit ( $fdata_id, $fjenis, $fdesc, $fstatus );
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
		$params->risk_penanganan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->risk_penanganan_count ();
		$rs = $params->risk_penanganan_viewlist ( $offset, $num_row );
		$page_title = "Daftar Penanganan Risiko";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
