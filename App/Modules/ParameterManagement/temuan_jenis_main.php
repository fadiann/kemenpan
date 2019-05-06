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

$paging_request = "main.php?method=par_jenis_temuan";
$acc_page_request = "temuan_jenis_acc.php";
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
$gridHeader = array ("Kode Jenis Temuan", "Jenis Temuan", "Sub Kelompok", "Kelompok");
$gridDetail = array ("jenis_temuan_code", "jenis_temuan_name", "sub_type_name", "finding_type_name");
$gridWidth = array ("10", "25", "25", "20");

$key_by = array ("Kode Jenis Temuan", "Jenis Temuan", "Sub Kelompok", "Kelompok");
$key_field = array ("jenis_temuan_code", "jenis_temuan_name", "sub_type_name", "finding_type_name");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Jenis Temuan";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->jenis_temuan_data_viewlist ( $fdata_id );
		$page_title = "Ubah Jenis Temuan";
		break;
	case "postadd" :
		$fkel_temuan = $Helper->replacetext ( $_POST ["kel_temuan"] );
		$fsub_id = $Helper->replacetext ( $_POST ["sub_id"] );
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fkel_temuan != "" && $fsub_id != "" && $fcode != "" && $fname != "") {
			$rs_cek = $params->cek_kode_jenis_temuan ( $fcode, $fkel_temuan, $fsub_id );
			$arr_cek = $rs_cek->FetchRow ();
			$fjenis_id = $arr_cek ['jenis_temuan_id'];
			$del_st = $arr_cek ['jenis_temuan_del_st'];
			if ($fjenis_id == "") {
				$params->jenis_temuan_add ( $fsub_id, $fcode, $fname );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_jenis_temuan_del ( $fjenis_id, $fsub_id, $fcode, $fname );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $fcode);
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
		$fkel_temuan = $Helper->replacetext ( $_POST ["kel_temuan"] );
		$fsub_id = $Helper->replacetext ( $_POST ["sub_id"] );
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fkel_temuan != "" && $fsub_id != "" && $fcode != "" && $fname != "") {
			$rs_cek = $params->cek_kode_jenis_temuan ( $fcode, $fkel_temuan, $fsub_id, $fdata_id );
			$arr_cek = $rs_cek->FetchRow ();
			$fjenis_id = $arr_cek ['jenis_temuan_id'];
			$del_st = $arr_cek ['jenis_temuan_del_st'];
			if ($fjenis_id == "") {
				$params->jenis_temuan_edit ( $fdata_id, $fsub_id, $fcode, $fname );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_jenis_temuan_del ( $fjenis_id, $fsub_id, $fcode, $fname );
					$params->jenis_temuan_delete ( $fdata_id );
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
		$params->jenis_temuan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->jenis_temuan_count ($key_search, $val_search, $key_field);
		$rs = $params->jenis_temuan_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Jenis Temuan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
