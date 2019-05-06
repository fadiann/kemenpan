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

$paging_request = "main.php?method=par_sub_type";
$acc_page_request = "temuan_sub_type_acc.php";
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
$gridHeader = array ("Kode Sub Kelompok", "Sub Kelompok", "Kelompok");
$gridDetail = array ("sub_type_code", "sub_type_name", "finding_type_name");
$gridWidth = array ("10", "25", "25");

$key_by = array ("Kode Sub Kelompok", "Sub Kelompok", "Kelompok");
$key_field = array ("sub_type_code", "sub_type_name", "finding_type_name");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Sub Kelompok";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->sub_kel_data_viewlist ( $fdata_id );
		$page_title = "Ubah Sub Kelompok";
		break;
	case "postadd" :
		$fkel_temuan = $Helper->replacetext ( $_POST ["kel_temuan"] );
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fkel_temuan != "" && $fcode != "" && $fname != "") {
			$rs_cek = $params->cek_kode_sub_kel ( $fcode, $fkel_temuan );
			$arr_cek = $rs_cek->FetchRow ();
			$ftype_id = $arr_cek ['sub_type_id'];
			$del_st = $arr_cek ['sub_type_del_st'];
			if ($ftype_id == "") {
				$params->sub_kel_add ( $fkel_temuan, $fcode, $fname );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_sub_kel_del ( $ftype_id, $fkel_temuan, $fcode, $fname );
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
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fkel_temuan != "" && $fcode != "" && $fname != "") {
			$rs_cek = $params->cek_kode_sub_kel ( $fcode, $fkel_temuan, $fdata_id );
			$arr_cek = $rs_cek->FetchRow ();
			$ftype_id = $arr_cek ['sub_type_id'];
			$del_st = $arr_cek ['sub_type_del_st'];
			if ($ftype_id == "") {
				$params->sub_kel_edit ( $fdata_id, $fkel_temuan, $fcode, $fname );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_sub_kel_del ( $ftype_id, $fkel_temuan, $fcode, $fname );
					$params->sub_kel_delete ( $fdata_id );
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
		$params->sub_kel_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->sub_kel_count ($key_search, $val_search, $key_field);
		$rs = $params->sub_kel_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Sub Kelompok";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
