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

$paging_request = "main.php?method=par_kode_penyebab";
$acc_page_request = "kode_penyebab_acc.php";
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
$gridHeader = array ("Nama", "Keterangan");
$gridDetail = array ("kode_penyebab_name", "kode_penyebab_desc");
$gridWidth = array ("30", "50");

$key_by = array ("Nama", "Keterangan");
$key_field = array ("kode_penyebab_name", "kode_penyebab_desc");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Kode Penyebab";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->kode_penyebab_data_viewlist ( $fdata_id );
		$page_title = "Ubah Kode Penyebab";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_kode_penyebab ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$fkode_penyebab_id = $arr_nama ['kode_penyebab_id'];
			$del_st = $arr_nama ['kode_penyebab_del_st'];
			if ($fkode_penyebab_id == "") {
				$params->kode_penyebab_add ( $fname, $fdesc );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_kode_penyebab_del ( $fkode_penyebab_id, $fname, $fdesc );
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
		if ($fname != "") {
			$rs_nama = $params->cek_nama_kode_penyebab ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fkode_penyebab_id = $arr_nama ['kode_penyebab_id'];
			$del_st = $arr_nama ['kode_penyebab_del_st'];
			if ($fkode_penyebab_id == "") {
				$params->kode_penyebab_edit ( $fdata_id, $fname, $fdesc );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_kode_penyebab_del ( $fkode_penyebab_id, $fname, $fdesc );
					$params->kode_penyebab_delete ( $fdata_id );
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
		$params->kode_penyebab_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->kode_penyebab_count ($key_search, $val_search, $key_field);
		$rs = $params->kode_penyebab_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Kode Penyebab";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
