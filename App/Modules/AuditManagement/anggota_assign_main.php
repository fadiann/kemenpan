<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$assigns = new assign ( $ses_userId );

$ses_assign_id = $_SESSION ['ses_assign_id'];

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

$paging_request = "main.php?method=anggota_assign";
$acc_page_request = "anggota_assign_acc.php";
$list_page_request = "audit_view.php";

// ==== buat grid ===//
$num_row = 5;
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

$view_parrent = "assign_view_parrent.php";
$grid = "App/Templates/Grids/grid_assign.php";
$gridHeader = array ("Nama Auditor", "Nama Auditee", "Posisi");
$gridDetail = array ("auditor_name", "auditee_name", "posisi_name");
$gridWidth = array ("30", "30", "25");

$key_by = array ("Nama Anggota", "Nama Auditee", "Posisi");
$key_field = array ("auditor_name", "auditee_name", "posisi_name");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

$rs_assign = $assigns->assign_viewlist( $ses_assign_id );
$arr_assign = $rs_assign->FetchRow();

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Anggota";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->assign_auditor_viewlist ( $fdata_id );
		$page_title = "Ubah Anggota";
		break;
	case "getdetail" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		echo "<script>window.open('" . $acc_page_request_detil . "&auditor=" . $fdata_id . "', '_self');</script>";
		break;
	case "postadd" :
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fanggota_id = $Helper->replacetext ( $_POST ["anggota_id"] );
		$fposisi_id = $Helper->replacetext ( $_POST ["posisi_id"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_assign_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_assign_date - $count_weekend;
		$fhari_persiapan = $Helper->replacetext ( $_POST ["hari_persiapan"] );
		$fhari_pelaksanaan = $Helper->replacetext ( $_POST ["hari_pelaksanaan"] );
		$fhari_pelaporan = $Helper->replacetext ( $_POST ["hari_pelaporan"] );
		$fidsbu = $_POST ["idsbu"];
		$fjml_hari = $_POST ["jml_hari"];
		$fnilai = $_POST ["nilai"];
		$ftotal_biaya = $_POST ["total_biaya"];
		$sum_biaya = 0;
		if ($fauditee_id != "" && $fanggota_id != "" && $fposisi_id != "") {
			$id_assign_anggota = $assigns->uniq_id ();
			$assigns->assign_auditor_add ( $id_assign_anggota, $fauditee_id, $fanggota_id, $fposisi_id, $ftanggal_awal, $ftanggal_akhir, $count_assign_date, $ses_assign_id, $hari_kerja, $fhari_persiapan, $fhari_pelaksanaan, $fhari_pelaporan );
			
			for($i = 0; $i < count ( $fidsbu ); $i ++) {
				$assigns->assign_auditor_detil_add ( $id_assign_anggota, $fidsbu [$i], $fjml_hari [$i], $fnilai [$i], $ftotal_biaya [$i] );
				$sum_biaya = $sum_biaya+$ftotal_biaya [$i];
			}
			$assigns->assign_auditor_update_sum_biaya( $id_assign_anggota, $sum_biaya);
			
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
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fanggota_id = $Helper->replacetext ( $_POST ["anggota_id"] );
		$fposisi_id = $Helper->replacetext ( $_POST ["posisi_id"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_assign_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_assign_date - $count_weekend;
		$fhari_persiapan = $Helper->replacetext ( $_POST ["hari_persiapan"] );
		$fhari_pelaksanaan = $Helper->replacetext ( $_POST ["hari_pelaksanaan"] );
		$fhari_pelaporan = $Helper->replacetext ( $_POST ["hari_pelaporan"] );
		$fidsbu = $_POST ["idsbu"];
		$fjml_hari = $_POST ["jml_hari"];
		$fnilai = $_POST ["nilai"];
		$ftotal_biaya = $_POST ["total_biaya"];
		$sum_biaya = 0;
		if ($fauditee_id != "" && $fanggota_id != "" && $fposisi_id != "") {
			$assigns->assign_auditor_edit ( $fdata_id, $fauditee_id, $fanggota_id, $fposisi_id, $ftanggal_awal, $ftanggal_akhir, $count_assign_date, $hari_kerja, $fhari_persiapan, $fhari_pelaksanaan, $fhari_pelaporan );

			$assigns->assign_auditor_detil_clean ( $fdata_id );
			for($i = 0; $i < count ( $fidsbu ); $i ++) {
				$assigns->assign_auditor_detil_add ( $fdata_id, $fidsbu [$i], $fjml_hari [$i], $fnilai [$i], $ftotal_biaya [$i] );
				$sum_biaya = $sum_biaya+$ftotal_biaya [$i];
			}
			$assigns->assign_auditor_update_sum_biaya( $fdata_id, $sum_biaya);
			
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
		$assigns->assign_auditor_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $assigns->auditor_assign_count ( $ses_assign_id, $key_search, $val_search, $key_field);
		$rs = $assigns->auditor_assign_view_grid ( $ses_assign_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Anggota";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
