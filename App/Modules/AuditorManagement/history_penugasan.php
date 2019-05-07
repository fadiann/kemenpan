<?
include_once "App/Classes/auditor_class.php";
$auditors = new auditor ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=auditor_detil&auditor=" . $fdata_id;
$list_page_request = "pelatihan_view.php";

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
		"No Surat Tugas",
		"Satuan Kerja",
		"Posisi Penugasan"
);
$gridDetail = array (
		"1",
		"2",
		"3"
);
$gridWidth = array (
		"25",
		"30",
		"25" 
);
$widthAksi = "15";
$iconEdit = "0";
$iconDel = "0";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	default :
		$recordcount = $auditors->history_penugasan_count ( $fdata_id );
		$rs = $auditors->history_penugasan_viewlist ( $fdata_id, $offset, $num_row );
		$page_title = "Daftar History Penugasan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
