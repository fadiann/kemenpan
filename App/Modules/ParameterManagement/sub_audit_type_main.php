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

$paging_request = "main.php?method=par_subaudit_type";
$acc_page_request = "sub_audit_type_acc.php";
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
$gridHeader = array ("Tipe Audit", "Nama Sub Tipe", "Keterangan");
$gridDetail = array ("audit_type_name", "sub_audit_type_name", "sub_audit_type_desc");
$gridWidth = array ("25", "25", "35");

$key_by = array ("Tipe Audit", "Nama Sub Tipe", "Keterangan");
$key_field = array ("audit_type_name", "sub_audit_type_name", "sub_audit_type_desc");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Sub Tipe Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->sub_audit_type_data_viewlist ( $fdata_id );
		$page_title = "Ubah Sub Tipe Audit";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$ftype = $Helper->replacetext ( $_POST ["type_id"] );
		if ($fname != "" && $ftype) {
			$rs_nama = $params->cek_nama_sub_audit_type ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$fsub_tipe_audit_id = $arr_nama ['sub_audit_type_id'];
			$del_st = $arr_nama ['sub_audit_type_del_st'];
			if ($fsub_tipe_audit_id == "") {
				$params->sub_audit_type_add ( $fname, $fdesc, $ftype );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_sub_audit_type_del ( $fsub_tipe_audit_id, $fname, $fdesc, $ftype );
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
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$ftype = $Helper->replacetext ( $_POST ["type_id"] );
		if ($fname != "" && $ftype) {
			$rs_nama = $params->cek_nama_sub_audit_type ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fsub_tipe_audit_id = $arr_nama ['sub_audit_type_id'];
			$del_st = $arr_nama ['sub_audit_type_del_st'];
			if ($fsub_tipe_audit_id == "") {
				$params->sub_audit_type_edit ( $fdata_id, $fname, $fdesc, $ftype );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->sub_update_audit_type_del ( $fsub_tipe_audit_id, $fname, $fdesc, $ftype );
					$params->sub_audit_type_delete ( $fdata_id );
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
		$params->sub_audit_type_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->sub_audit_type_count ($key_search, $val_search, $key_field);
		$rs = $params->sub_audit_type_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Sub Tipe Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
