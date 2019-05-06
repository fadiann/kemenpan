<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=par_kategori_ref";
$acc_page_request = "kat_ref_acc.php";
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
$gridHeader = array (
		"Nama" 
);
$gridDetail = array (
		"1"
);
$gridWidth = array (
		"80" 
);
$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Kategori Referensi";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->ref_kat_data_viewlist ( $fdata_id );
		$page_title = "Ubah Kategori Referensi";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_ref_kat ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$fkategori_ref_id = $arr_nama ['kategori_ref_id'];
			$del_st = $arr_nama ['kategori_ref_del_st'];
			if ($fkategori_ref_id == "") {
				$params->ref_kat_add ( $fname );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_kat_del ( $fkategori_ref_id );
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
			$rs_nama = $params->cek_nama_ref_kat ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fkategori_ref_id = $arr_nama ['kategori_ref_id'];
			$del_st = $arr_nama ['kategori_ref_del_st'];
			if ($fkategori_ref_id == "") {
				$params->ref_kat_edit ( $fdata_id, $fname );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_ref_kat_del ( $fkategori_ref_id );
					$params->ref_kat_delete ( $fdata_id );
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
		$params->ref_kat_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->ref_kat_count ();
		$rs = $params->ref_kat_viewlist ( $offset, $num_row );
		$page_title = "Daftar Kategori Referensi";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
