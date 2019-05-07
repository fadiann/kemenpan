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

$paging_request = "main.php?method=par_kode_rek";
$acc_page_request = "kode_rekomendasi_acc.php";
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
$gridHeader = array ("Kode Rekomendasi", "Keterangan");
$gridDetail = array ("kode_rek_code", "kode_rek_desc");
$gridWidth = array ("30", "50");

$key_by = array ("Kode Rekomendasi", "Keterangan");
$key_field = array ("kode_rek_code", "kode_rek_desc");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Kode Rekomendasi";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->kode_rek_data_viewlist ( $fdata_id );
		$page_title = "Ubah Kode Rekomendasi";
		break;
	case "postadd" :
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($fcode != "") {
			$rs_nama = $params->cek_kode_rek ( $fcode );
			$arr_nama = $rs_nama->FetchRow ();
			$fkode_rek_id = $arr_nama ['kode_rek_id'];
			$del_st = $arr_nama ['kode_rek_del_st'];
			if ($fkode_rek_id == "") {
				$params->kode_rek_add ( $fcode, $fdesc );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_kode_rek_del ( $fkode_rek_id, $fcode, $fdesc );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fcode );
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
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($fcode != "") {
			$rs_nama = $params->cek_kode_rek ( $fcode, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fkode_rek_id = $arr_nama ['kode_rek_id'];
			$del_st = $arr_nama ['kode_rek_del_st'];
			if ($fkode_rek_id == "") {
				$params->kode_rek_edit ( $fdata_id, $fcode, $fdesc );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_kode_rek_del ( $fkode_rek_id, $fcode, $fdesc );
					$params->kode_rek_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fcode );
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
		$params->kode_rek_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->kode_rek_count ($key_search, $val_search, $key_field);
		$rs = $params->kode_rek_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Kode Rekomendasi";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
