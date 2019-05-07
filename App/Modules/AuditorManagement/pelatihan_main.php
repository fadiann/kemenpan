<?
include_once "App/Classes/auditor_class.php";
$auditors = new auditor ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=auditor_detil&auditor=" . $fdata_id;
$acc_page_request = "pelatihan_acc.php";
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
		"Jenis Pelatihan",
		"Nama Pelatihan",
		"Durasi",
		"Penyelengara" 
);
$gridDetail = array (
		"1",
		"2",
		"3",
		"4"
);
$gridWidth = array (
		"15",
		"15",
		"15",
		"30" 
);
$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pelatihan";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $auditors->pelatihan_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pelatihan";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $auditors->pelatihan_data_viewlist ( $fdata_id );
		$page_title = "Rincian Pelatihan";
		break;
	case "postadd" :
		$auditor_id = $Helper->replacetext ( $_POST ["auditor_id"] );
		$fkompetensi_id = $Helper->replacetext ( $_POST ["kompetensi_id"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdurasi = $Helper->replacetext ( $_POST ["durasi"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$fpenyelenggara = $Helper->replacetext ( $_POST ["penyelenggara"] );
		$fsertifikat = $Helper->replacetext ( $_FILES ["sertifikat"] ["name"] );
		if ($fkompetensi_id != "" && $fname != "" && $fdurasi != "" && $ftanggal_akhir != "" && $fpenyelenggara != "") {
			$auditors->pelatihan_add ( $auditor_id, $fkompetensi_id, $fname, $fdurasi, $ftanggal_awal, $ftanggal_akhir, $fpenyelenggara, $fsertifikat );
			$Helper->UploadFile ( "Upload_Sertifikat", "sertifikat", "" );
			$Helper->js_alert_act ( 3 );
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
		$fkompetensi_id = $Helper->replacetext ( $_POST ["kompetensi_id"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fdurasi = $Helper->replacetext ( $_POST ["durasi"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$fpenyelenggara = $Helper->replacetext ( $_POST ["penyelenggara"] );
		$sertifikat = $Helper->replacetext ( $_FILES ["sertifikat"] ["name"] );
		$sertifikat_old = $Helper->replacetext ( $_POST ["sertifikat_old"] );
		if ($fkompetensi_id != "" && $fname != "" && $fdurasi != "" && $ftanggal_akhir != "" && $fpenyelenggara != "") {
			if (! empty ( $sertifikat )) {
				$Helper->UploadFile ( "Upload_Sertifikat", "sertifikat", $sertifikat_old );
			} else {
				$sertifikat = $sertifikat_old;
			}
			$auditors->pelatihan_edit ( $fdata_id, $fkompetensi_id, $fname, $fdurasi, $ftanggal_awal, $ftanggal_akhir, $fpenyelenggara, $sertifikat );
			$Helper->js_alert_act ( 1 );
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
		$auditors->pelatihan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $auditors->pelatihan_count ( $fdata_id );
		$rs = $auditors->pelatihan_viewlist ( $fdata_id, $offset, $num_row );
		$page_title = "Daftar Pelatihan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
