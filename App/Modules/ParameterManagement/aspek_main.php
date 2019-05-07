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

$paging_request = "main.php?method=par_aspek";
$acc_page_request = "aspek_acc.php";
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
$gridHeader = array ("Aspek Program Audit");
$gridDetail = array ("aspek_name");
$gridWidth = array ("80");

$key_by = array ("Bidang Substansi");
$key_field = array ("aspek_name");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Aspek Program Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->bidang_sub_data_viewlist ( $fdata_id );
		$page_title = "Ubah Aspek Program Audit";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_bidang_sub ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$faspek_id = $arr_nama ['aspek_id'];
			$del_st = $arr_nama ['aspek_del_st'];
			if ($faspek_id == "") {
				$params->bidang_sub_add ( $fname );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_bidang_sub_del ( $faspek_id, $fname );
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
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_bidang_sub ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$faspek_id = $arr_nama ['aspek_id'];
			$del_st = $arr_nama ['aspek_del_st'];
			if ($faspek_id == "") {
				$params->bidang_sub_edit ( $fdata_id, $fname );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_bidang_sub_del ( $faspek_id, $fname );
					$params->bidang_sub_delete ( $fdata_id );
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
		$params->bidang_sub_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->bidang_sub_count ($key_search, $val_search, $key_field);
		$rs = $params->bidang_sub_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Aspek Program Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
