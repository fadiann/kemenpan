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
	unset($_SESSION['key_search']);
	unset($_SESSION['val_search']);
	unset($_SESSION['val_method']);
}

$paging_request = "main.php?method=par_risk_peng_int";
$acc_page_request = "risk_pi_acc.php";
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
$gridHeader = array ("Nama", "Nilai", "Keterangan");
$gridDetail = array ("pi_name", "pi_value", "pi_desc");
$gridWidth = array ("30", "20", "30");

$key_by = array ("Nama", "Nilai", "Keterangan");
$key_field = array ("pi_name", "pi_value", "pi_desc");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pengendalian Internal";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->risk_pi_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pengendalian Internal";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($fname != "" && $fnilai != "") {
			$params->risk_pi_add ( $fname, $fnilai, $fdesc );
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
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($fname != "" && $fnilai != "") {
			$params->risk_pi_edit ( $fdata_id, $fname, $fnilai, $fdesc );
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
		$params->risk_pi_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->risk_pi_count ($key_search, $val_search, $key_field);
		$rs = $params->risk_pi_view_grid ( $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Pengendalian Internal";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
