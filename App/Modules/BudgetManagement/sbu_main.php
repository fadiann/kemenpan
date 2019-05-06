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

$paging_request = "main.php?method=par_sbu";
$acc_page_request = "sbu_acc.php";
$list_page_request = "budget_view.php";

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
$gridHeader = array ("Kode SBU", "Nama SBU", "No Urut" , "Status Jml Hari");
$gridDetail = array ("sbu_kode", "sbu_name", "sbu_sort", "status");
$gridWidth = array ("20", "30", "10", "20");

$key_by = array ("Kode SBU", "Nama SBU");
$key_field = array ("sbu_kode", "sbu_name");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah SBU";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->sbu_data_viewlist ( $fdata_id );
		$page_title = "Ubah SBU";
		break;
	case "postadd" :
		$fkode = $Helper->replacetext ( $_POST ["kode"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		$fstatus = $Helper->replacetext ( $_POST ["status"] );
		if ($fkode != "" && $fname != "") {
			$rs_kode = $params->cek_kode_sbu ( $fkode );
			$arr_kode = $rs_kode->FetchRow ();
			$fsbu_id = $arr_kode ['sbu_id'];
			$del_st = $arr_kode ['sbu_del_st'];
			if ($fsbu_id == "") {
				$params->sbu_add ( $fkode, $fname, $fsort, $fstatus );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_sbu_del ( $fsbu_id, $fname, $fsort, $fstatus );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fkode );
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
		$fkode = $Helper->replacetext ( $_POST ["kode"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		$fstatus = $Helper->replacetext ( $_POST ["status"] );
		if ($fkode != "" && $fname != "") {
			$rs_kode = $params->cek_kode_sbu ( $fkode, $fdata_id );
			$arr_kode = $rs_kode->FetchRow ();
			$fsbu_id = $arr_kode ['sbu_id'];
			$del_st = $arr_kode ['sbu_del_st'];
			if ($fsbu_id == "") {
				$params->sbu_edit ( $fdata_id, $fkode, $fname, $fsort, $fstatus );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_sbu_del ( $fsbu_id, $fname, $fsort, $fstatus );
					$params->sbu_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fkode );
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
		$params->sbu_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->sbu_count ($key_search, $val_search, $key_field);
		$rs = $params->sbu_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar SBU";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
