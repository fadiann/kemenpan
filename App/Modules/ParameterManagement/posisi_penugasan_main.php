<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=par_posisi_penugasan";
$acc_page_request = "posisi_penugasan_acc.php";
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
$gridHeader = array (
		"Nama",
		"Urutan" 
);
$gridDetail = array (
		"1",
		"2" 
);
$gridWidth = array (
		"50",
		"30" 
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
		$page_title = "Tambah Posisi Penugasan";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->posisi_penugasan_data_viewlist ( $fdata_id );
		$page_title = "Ubah posisi Penugasan";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_posisi_penugasan ( $fname );
			$arr_nama = $rs_nama->FetchRow ();
			$fposisi_id = $arr_nama ['posisi_id'];
			$del_st = $arr_nama ['posisi_del_st'];
			if ($fposisi_id == "") {
				$posisi = $params->uniq_id ();
				$params->posisi_penugasan_add ( $posisi, $fname, $fsort );			
				
				$rs_menu_parrent = $Helper->menu_akses ();
				while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
					$rs_menu_child = $Helper->menu_akses ( $arr_menu_parrent ['akses_menu'] );
					while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
						$akses = $Helper->replacetext ( $_POST ["child_" . $arr_menu_child ['akses_id']] );
						if (! empty ( $akses )) $params->posisi_add_role ( $posisi, $akses );
					}
				}
				
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_posisi_penugasan_del ( $fposisi_id, $fname, $fsort );
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
		$fsort = $Helper->replacetext ( $_POST ["sort"] );
		if ($fname != "") {
			$rs_nama = $params->cek_nama_posisi_penugasan ( $fname, $fdata_id );
			$arr_nama = $rs_nama->FetchRow ();
			$fposisi_id = $arr_nama ['posisi_id'];
			$del_st = $arr_nama ['posisi_del_st'];
			if ($fposisi_id == "") {
				$params->clean_posisi_role ( $fdata_id );
				$params->posisi_penugasan_edit ( $fdata_id, $fname, $fsort );
				$params->clean_posisi_role ( $fdata_id );
				
				$rs_menu_parrent = $Helper->menu_akses ();
				while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
					$rs_menu_child = $Helper->menu_akses ( $arr_menu_parrent ['akses_menu'] );
					while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
						$akses = $Helper->replacetext ( $_POST ["child_" . $arr_menu_child ['akses_id']] );
						if (! empty ( $akses )) $params->posisi_add_role ( $fdata_id, $akses );
					}
				}
				
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_posisi_penugasan_del ( $fposisi_id, $fname, $fsort );
					$params->posisi_penugasan_delete ( $fdata_id );
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
		$params->posisi_penugasan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->posisi_penugasan_count ();
		$rs = $params->posisi_penugasan_viewlist ( $offset, $num_row );
		$page_title = "Daftar Posisi Penugasan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
