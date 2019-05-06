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

$paging_request = "main.php?method=ref_audit";
$acc_page_request = "ref_audit_acc.php";
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

$grid = "grid.php";
$gridHeader = array ("Referensi", "Keterangan", "Kategori", "Lampiran", "Link");
$gridDetail = array ("1", "2", "3", "4", "5");
$gridWidth = array ("15", "25", "10", "10", "20");
$widthAksi = "15";
$iconDetail = "0";

$key_by = array ("Referensi", "Keterangan", "Kategori", "Lampiran", "Link");
$key_field = array ("ref_audit_nama", "ref_audit_desc", "kategori_ref_name", "ref_audit_attach");
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pustaka Referensi Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->ref_audit_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pustaka Referensi Audit";
		break;
	case "postadd" :
		$fid_kategori = $Helper->replacetext ( $_POST ["id_kategori"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$flinksumber = $Helper->replacetext ( $_POST ["linksumber"] );
		$fattach = $Helper->replacetext ( $_FILES ["attach"] ["name"] );
		if ($fid_kategori != "" && $fname != "") {
			$rs_kode = $params->cek_kode_ref_audit ( $fname, $fid_kategori );
			$arr_kode = $rs_kode->FetchRow ();
			$fref_audit_id = $arr_kode ['ref_audit_id'];
			$del_st = $arr_kode ['ref_audit_del_st'];
			if ($fref_audit_id == "") {
				$params->ref_audit_add ( $fid_kategori, $fname, $fdesc, $fattach, $flinksumber );
				$Helper->UploadFile ( "Upload_Ref", "attach", "" );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_audit_del ( $fref_audit_id, $fid_kategori, $fname, $fdesc, $flinksumber );
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
		$fid_kategori = $Helper->replacetext ( $_POST ["id_kategori"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		$flinksumber = $Helper->replacetext ( $_POST ["linksumber"] );
		$fattach = $Helper->replacetext ( $_FILES ["attach"] ["name"] );
		$fattach_old = $Helper->replacetext ( $_POST ["attach_old"] );
		if ($fid_kategori != "" && $fname != "") {
			$rs_kode = $params->cek_kode_ref_audit ( $fname, $fid_kategori, $fdata_id );
			$arr_kode = $rs_kode->FetchRow ();
			$fref_audit_id = $arr_kode ['ref_audit_id'];
			$del_st = $arr_kode ['ref_audit_del_st'];
			if ($fref_audit_id == "") {
				if (! empty ( $fattach )) {
					$Helper->UploadFile ( "Upload_Ref", "attach", $fattach_old );
				} else {
					$fattach = $fattach_old;
				}
				$params->ref_audit_edit ( $fdata_id, $fid_kategori, $fname, $fdesc, $fattach, $flinksumber );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_audit_del ( $fref_audit_id, $fid_kategori, $fname, $fdesc, $flinksumber );
					$params->ref_audit_delete ( $fdata_id );
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
		$params->ref_audit_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->ref_audit_count ($key_search, $val_search, $key_field);
		$rs = $params->ref_audit_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Referensi Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
