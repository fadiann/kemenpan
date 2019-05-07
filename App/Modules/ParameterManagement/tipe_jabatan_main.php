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

$paging_request = "main.php?method=par_tipe_jabatan";
$acc_page_request = "tipe_jabatan_acc.php";
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
$gridHeader = array ("Jenis Jabatan", "Jabatan", "Urutan");
$gridDetail = array ("jenis_jabatan", "jenis_jabatan_sub", "jenis_jabatan_sort");
$gridWidth = array ("30", "40", "10");

$key_by = array ("Jenis Jabatan", "Jabatan");
$key_field = array ("jenis_jabatan", "jenis_jabatan_sub");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Jenis Jabatan";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->jabatan_auditor_data_viewlist ( $fdata_id );
		$page_title = "Ubah Jenis Jabatan";
		break;
	case "postadd" :
		$ftype = $Helper->replacetext ( $_POST ["type"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		if ($ftype != "" && $fname != "") {
			$rs_nama = $params->cek_nama_jabatan_auditor ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$fdata_id = $arr_nama ['jenis_jabatan_id'];
			$del_st = $arr_nama ['jenis_jabatan_del_st'];
			if ($fdata_id == "") {
				$params->jabatan_auditor_add ( $ftype, $fname, $fsort );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_jabatan_auditor_del ( $fdata_id, $ftype, $fname, $fsort );
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
		$ftype = $Helper->replacetext ( $_POST ["type"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		if ($ftype != "" && $fname != "") {
			$rs_nama = $params->cek_nama_jabatan_auditor ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fjabatan_id = $arr_nama ['jenis_jabatan_id'];
			$del_st = $arr_nama ['jenis_jabatan_del_st'];
			if ($fjabatan_id == "") {
				$params->jabatan_auditor_edit ( $fdata_id, $ftype, $fname, $fsort );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_jabatan_auditor_del ( $fjabatan_id, $ftype, $fname, $fsort );
					$params->jabatan_auditor_delete ( $fdata_id );
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
		$params->jabatan_auditor_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->jabatan_auditor_count ($key_search, $val_search, $key_field);
		$rs = $params->jabatan_auditor_viewlist ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Jenis Jabatan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
