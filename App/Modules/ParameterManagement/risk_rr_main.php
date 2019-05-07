<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

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

$paging_request = "main.php?method=par_risk_rr";
$acc_page_request = "risk_rr_acc.php";
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
$gridHeader = array ("Nama", "Range", "Nilai", "Warna");
$gridDetail = array ("rr_name", "range_rr", "rr_value", "rr_warna");
$gridWidth = array ("35", "15", "15", "15");

$key_by = array ("Nama", "Nilai", "Warna");
$key_field = array ("rr_name", "rr_value", "rr_warna");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Tingkat Risiko Residu";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->risk_rr_data_viewlist ( $fdata_id );
		$page_title = "Ubah Tingkat Risiko Residu";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fatas = $Helper->replacetext ( $_POST ["atas"] );
		$fbawah = $Helper->replacetext ( $_POST ["bawah"] );
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		$fwarna = $Helper->replacetext ( $_POST ["warna"] );
		if ($fname != "" && $fatas != "" && $fbawah != "" && $fnilai != "") {
			$params->risk_rr_add ( $fname, $fatas, $fbawah, $fnilai, $fwarna );
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
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fatas = $Helper->replacetext ( $_POST ["atas"] );
		$fbawah = $Helper->replacetext ( $_POST ["bawah"] );
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		$fwarna = $Helper->replacetext ( $_POST ["warna"] );
		if ($fname != "" && $fatas != "" && $fbawah != "" && $fnilai != "") {
			$params->risk_rr_edit ( $fdata_id, $fname, $fatas, $fbawah, $fnilai, $fwarna );
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
		$params->risk_rr_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->risk_rr_count ($key_search, $val_search, $key_field);
		$rs = $params->risk_rr_view_grid ( $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Tingkat Risiko Residu";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
