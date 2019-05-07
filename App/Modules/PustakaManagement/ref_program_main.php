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

$paging_request = "main.php?method=ref_program";
$acc_page_request = "ref_program_acc.php";
$list_page_request = "pustaka_view.php";

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
$gridHeader = array ("Kode", "Aspek", "Sub Aspek");
$gridDetail = array ( "1", "2" , "3");
$gridWidth = array ( "25", "30", "30");
$widthAksi = "15";
$iconDetail = "1";

$key_by = array ("Kode", "Aspek", "Sub Aspek");
$key_field = array ("ref_program_code", "aspek_name", "ref_program_title");
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pustaka Program Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->ref_program_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pustaka Program Audit";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->ref_program_data_viewlist ( $fdata_id );
		$page_title = "Rincian Pustaka Program Audit";
		break;
	case "postadd" :
		$ftipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$faspek_id = $Helper->replacetext ( $_POST ["aspek_id"] );
		$ftitle = $Helper->replacetext ( $_POST ["title"] );
		$fprocedure = $Helper->replacetext ( $_POST ["procedure"] );
		if ($ftipe_audit != "" && $fcode != "" && $ftitle != "") {
			$rs_kode = $params->cek_kode_ref_program ( $fcode );
			$arr_kode = $rs_kode->FetchRow ();
			$fref_id = $arr_kode ['ref_program_id'];
			$del_st = $arr_kode ['ref_program_del_st'];
			if ($fref_id == "") {
				$params->ref_program_add ( $ftipe_audit, $fcode, $faspek_id, $ftitle, $fprocedure );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_program_del ( $fref_id, $ftipe_audit, $fcode, $faspek_id, $ftitle, $fprocedure );
					$Helper->js_alert_act ( 3 );
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
		$ftipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fcode = $Helper->replacetext ( $_POST ["code"] );
		$faspek_id = $Helper->replacetext ( $_POST ["aspek_id"] );
		$ftitle = $Helper->replacetext ( $_POST ["title"] );
		$fprocedure = $Helper->replacetext ( $_POST ["procedure"] );
		if ($ftipe_audit != "" && $fcode != "" && $ftitle != "") {
			$rs_kode = $params->cek_kode_ref_program ( $fcode, $fdata_id );
			$arr_kode = $rs_kode->FetchRow ();
			$fref_id = $arr_kode ['ref_program_id'];
			$del_st = $arr_kode ['ref_program_del_st'];
			if ($fref_id == "") {
				$params->ref_program_edit ( $fdata_id, $ftipe_audit, $fcode, $faspek_id, $ftitle, $fprocedure );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_program_del ( $fref_id, $ftipe_audit, $fcode, $faspek_id, $ftitle, $fprocedure );
					$params->ref_program_delete ( $fdata_id );
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
		$params->ref_program_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->ref_program_count ($key_search, $val_search, $key_field);
		$rs = $params->ref_program_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Pustaka Program Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
