<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/audit_plann_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$plannings = new planning ( $ses_userId );

$ses_plan_id = $_SESSION ['ses_plan_id'];

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

$paging_request = "main.php?method=anggota_plan";
$acc_page_request = "anggota_plan_acc.php";
$list_page_request = "audit_view.php";

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

$view_parrent = "plan_view_parrent.php";
$grid = "App/Templates/Grids/grid_audit.php";
$gridHeader = array ("Nama Auditor", "Nama Auditee", "Posisi");
$gridDetail = array ("auditor_name", "auditee_name", "posisi_name");
$gridWidth = array ("30", "30", "25");

$key_by = array ("Nama Auditor", "Nama Auditee", "Posisi");
$key_field = array ("auditor_name", "auditee_name", "posisi_name");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

$rs_plan = $plannings->planning_viewlist ( $ses_plan_id );
$arr_plan = $rs_plan->FetchRow();

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Auditor";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $plannings->plan_auditor_viewlist ( $fdata_id );
		$page_title = "Ubah Auditor";
		break;
	case "getdetail" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		echo "<script>window.open('" . $acc_page_request_detil . "&auditor=" . $fdata_id . "', '_self');</script>";
		break;
	case "postadd" :
		$count	= count($_POST['auditee_id']);
		for($x = 0; $x < $count; $x++){
			$fauditee_id 		= $Helper->replacetext ( $_POST ["auditee_id"][$x] );
			$fanggota_id 		= $Helper->replacetext ( $_POST ["anggota_id"][$x] );
			$fposisi_id 		= $Helper->replacetext ( $_POST ["posisi_id"][$x] );
			$ftanggal_awal 		= $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"][$x] ) );
			$ftanggal_akhir 	= $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"][$x] ) );
			$convert_tgl_awal	= $Helper->date_db ($ftanggal_awal);
			$convert_tgl_akhir 	= $Helper->date_db ($ftanggal_akhir);
			$count_plan_date 	= (($convert_tgl_akhir - $convert_tgl_awal) / 86400) + 1;
			$count_weekend 		= $Helper->cek_holiday ( $convert_tgl_awal, $convert_tgl_akhir );
			$hari_kerja 		= $count_plan_date - $count_weekend;		
			if ($fauditee_id != "" && $fanggota_id != "" && $fposisi_id != "") {
				$id_plan_anggota = $plannings->uniq_id ();
				$plannings->plan_auditor_add ( $id_plan_anggota, $fauditee_id, $fanggota_id, $fposisi_id, $convert_tgl_awal, $convert_tgl_akhir, $count_plan_date, $ses_plan_id, $hari_kerja );
				
				/*DETAIL AUDITOR*/
				// $fidsbu 			= $_POST ["idsbu"];
				// $fjml_hari 			= $_POST ["jml_hari"];
				// $fnilai 			= $_POST ["nilai"];
				// $ftotal_biaya 		= $_POST ["total_biaya"];
				// $sum_biaya 			= 0;
				// for($i = 0; $i < count ( $fidsbu ); $i ++) {
				// 	$plannings->plan_auditor_detil_add ( $id_plan_anggota, $fidsbu [$i], $fjml_hari [$i], $fnilai [$i], $ftotal_biaya [$i] );
				// 	$sum_biaya = $sum_biaya+$ftotal_biaya [$i];
				// }
				// $plannings->plan_auditor_update_sum_biaya( $id_plan_anggota,$sum_biaya);
				/*END DETAIL AUDITOR*/
				}
		}
		if(in_array('', $_POST['auditee_id']) || in_array('', $_POST['anggota_id']) || in_array('', $_POST['posisi_id'])){
			$Helper->js_alert_act ( 5 );
		} else {
			$Helper->js_alert_act ( 3 );
		}
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fanggota_id = $Helper->replacetext ( $_POST ["anggota_id"] );
		$fposisi_id = $Helper->replacetext ( $_POST ["posisi_id"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_plan_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_plan_date - $count_weekend;
		// $fidsbu = $_POST ["idsbu"];
		// $fjml_hari = $_POST ["jml_hari"];
		// $fnilai = $_POST ["nilai"];
		// $ftotal_biaya = $_POST ["total_biaya"];
		// $sum_biaya = 0;
		if ($fauditee_id != "" && $fanggota_id != "" && $fposisi_id != "") {
			$plannings->plan_auditor_edit ( $fdata_id, $fauditee_id, $fanggota_id, $fposisi_id, $ftanggal_awal, $ftanggal_akhir, $count_plan_date, $hari_kerja);

			// $plannings->plan_auditor_detil_clean ( $fdata_id );
			// for($i = 0; $i < count ( $fidsbu ); $i ++) {
			// 	$plannings->plan_auditor_detil_add ( $fdata_id, $fidsbu [$i], $fjml_hari [$i], $fnilai [$i], $ftotal_biaya [$i] );
			// 	$sum_biaya = $sum_biaya+$ftotal_biaya [$i];
			// }
			// $plannings->plan_auditor_update_sum_biaya( $fdata_id, $sum_biaya);
			
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$plannings->auditor_plan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $plannings->auditor_plan_count ( $ses_plan_id, $key_search, $val_search, $key_field );
		$rs = $plannings->auditor_plan_view_grid ( $ses_plan_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$rs_cek = $plannings->auditor_plan_view_grid ( $ses_plan_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Susunan Tim";
		$arr_cek = $rs_cek->FetchRow ();
		if ($arr_cek ['audit_plan_status'] == 2) {
			$iconAdd = 0;
		}
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
